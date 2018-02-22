<?php
/**
 * Created by PhpStorm.
 * User: zsun
 * Date: 11/27/16
 * Time: 01:53
 */

namespace Libs\Util;
require 'vendor/autoload.php';
use Elasticsearch\ClientBuilder;

class CuSearch
{
    static $FilterMap = [
        'sub_cate_name_xiju' => ['name' => "剧种", 'count' => 6, 'min' => 3, 'table' => 'reculture'],
        'sub_cate_name_yinyue' => ['name' => "乐种", 'count' => 6, 'min' => 3, 'table' => 'reculture'],
        'sub_cate_name_meishu' => ['name' => "子类别", 'count' => 6, 'min' => 3, 'table' => 'reculture'],
        'sub_cate_name_quyi' => ['name' => "曲种", 'count' => 6, 'min' => 3, 'table' => 'reculture'],
        'troupe' => ['name' => "剧团", 'count' => 6, 'min' => 3, 'table' => 'reculture'],
        'example' => ['name' => "代表作", 'count' => 6, 'min' => 3, 'table' => 'reculture'],
        'awards' => ['name' => "获奖情况", 'count' => 6, 'min' => 3, 'table' => 'reculture'],
        'band' => ['name' => "乐团", 'count' => 6, 'min' => 3, 'table' => 'reculture'],
        'figures' => ['name' => "代表人物", 'count' => 6, 'min' => 3, 'table' => 'reculture'],
        'performer' => ['name' => "表演者", 'count' => 6, 'min' => 3, 'table' => 'reculture'],
        'artist' => ['name' => "艺术家", 'count' => 6, 'min' => 3, 'table' => 'reculture'],
        'agency' => ['name' => "机构", 'count' => 6, 'min' => 3, 'table' => 'reculture'],

//        'level' => ['name' => "会硬编码", 'count' => 6, 'min' => 1, 'table' => 'immaterial/industry'],
        're_batch' => ['name' => "批次", 'count' => 6, 'min' => 3, 'table' => 'immaterial'],
        're_name' => ['name' => "姓名", 'count' => 6, 'min' => 3, 'table' => 'immaterial'],
        're_sex' => ['name' => "性别", 'count' => 6, 'min' => 1, 'table' => 'immaterial'],
//        're_birth' => ['name' => "应该换成年龄", 'count' => 6, 'min' => 3, 'table' => 'immaterial'],
        'prot_projects' => ['name' => "保护区内国家级非遗代表性项目", 'count' => 6, 'min' => 3, 'table' => 'immaterial'],
        'ba_name' => ['name' => "基地名称", 'count' => 6, 'min' => 3, 'table' => 'immaterial'],

        'publish_agency' => ['name' => "发布机构", 'count' => 6, 'min' => 3, 'table' => 'policy'],
    ];

    public function search($search_key, $search_filter, $page_num, $page_size)
    {
        $search_key = trim($search_key);
        $search_result = array();
        $search_result['recommends'] = array();
        $search_result['count'] = -1;
        try {
            $es_client = ClientBuilder::create()
                ->setHosts(C('ELK_HOSTS'))
                ->build();
            $from = ($page_num - 1) * $page_size;
            $search_params = [
                'index' => C('ELK_INDEX'),
                'type' => 'product',
                'body' => [
                    'from' => $from,
                    'size' => $page_size,
                    'sort' => [
                        ['id' => ['order' => 'desc']],
                    ],
                    'query' => [
                        'filtered' => [
                            'filter' => [
                                'bool' => [
                                    'must' => [
                                        ['term' => ['auditstatus' => 35]],
                                        ['term' => ['isdelete' => 0]],
                                    ]
                                ]
                            ]
                        ]
                    ],
                ]
            ];

            if (!empty($search_key)) {
                $search_params['body']['query']['filtered']['query'] = [
                    'bool' => [
                        'should' => [
                            ['term' => ['title' => $search_key]],
                            ['term' => ['cate_name' => $search_key]],
                            ['term' => ['area_display' => $search_key]],
                        ]
                    ]
                ];
            }

            foreach (array_keys(self::$FilterMap) as $filter) {
                if (!array_key_exists('aggs', $search_params['body'])) {
                    $search_params['body']['aggs'] = array();
                }
                $search_params['body']['aggs'][strval($filter)] = array('terms' => ['field' => strval($filter)]);
            }
            /*
             * 添加过滤信息
             */
            // Use query filter
            if (!empty($search_filter['art_cid']) && $search_filter['art_cid'] > 0) {
                $search_params['body']['query']['filtered']['query']['bool']['must'][]
                    = array('match' => array('art_cid' => $search_filter['art_cid']));
            }
            if (!empty($search_filter['represen'])) {
                $search_params['body']['query']['filtered']['query']['bool']['must'][]
                    = array('match' => array('represen' => $search_filter['represen']));
            }
            // 这里 troupe 和 awards 不得不用 filter 而不是 post_filter, 是因为 post_filter 不支持模糊匹配
            if (!empty($search_filter['troupe'])) {
                $search_params['body']['query']['filtered']['query']['bool']['must'][] = array('match'=>array('troupe'=>$search_filter['troupe']));
            }
            if (!empty($search_filter['awards'])) {
                $search_params['body']['query']['filtered']['query']['bool']['must'][] = array('match'=>array('awards'=>$search_filter['awards']));
            }
            // Use post filter
            if (!empty($search_filter['area_display'])) {
                if (!array_key_exists('post_filter', $search_params['body'])) {
                    $search_params['body']['post_filter'] = array('bool' => array('must' => array()));
                }
                $search_params['body']['post_filter']['bool']['must'][] = array('term' => array('area_display' => $search_filter['area_display']));
            }
            if (!empty($search_filter['level'])) {
                if (!array_key_exists('post_filter', $search_params['body'])) {
                    $search_params['body']['post_filter'] = array('bool' => array('must' => array()));
                }
                $search_params['body']['post_filter']['bool']['must'][] = array('term' => array('level' => $search_filter['level']));
            }
            if (!empty($search_filter['age_min']) and !empty($search_filter['age_max'])) {
                if (!array_key_exists('post_filter', $search_params['body'])) {
                    $search_params['body']['post_filter'] = array('bool' => array('must' => array()));
                }
                $search_params['body']['post_filter']['bool']['must'][] = array('range' => array('age' => array('gte' => $search_filter['age_min'], 'lte' => $search_filter['age_max'])));
            }
            // Also post filter
            foreach (array_keys(self::$FilterMap) as $filter) {
                if($filter == "troupe" or $filter == "awards"){
                    continue;
                }
                if (!empty(I('get.' . $filter))) {
                    if (!array_key_exists('post_filter', $search_params['body'])) {
                        $search_params['body']['post_filter'] = array('bool' => array('must' => array()));
                    }
                    $search_params['body']['post_filter']['bool']['must'][] = array('term' => array($filter => I('get.' . $filter)));
                }
            }

            /*
             * 添加过滤信息结束
             */

            $result = $es_client->search($search_params);
            $search_result['count'] = $result['hits']['total'];
            $page = new \Libs\Util\Page($search_result['count'], $page_size, $page_num);
            $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
            $lists = array();
            foreach ($result['hits']['hits'] as $item) {
                $lists[] = $item['_source'];
            }

            /*
             * Get recommends
             */
            if ($search_result['count'] >= 0) {
                foreach (array_keys(self::$FilterMap) as $filter) {
                    $filter_result = $result['aggregations'][$filter]['buckets'];
                    $filter_count = count($filter_result) > self::$FilterMap[$filter]['count'] ? self::$FilterMap[$filter]['count'] : count($filter_result);
                    if ($filter_count < self::$FilterMap[$filter]['min']) {
                        continue;
                    }
                    if ($filter == "troupe") {
                        $customized_filter = D('Admin/CustomizedFilter')->field("item_name")->where(array("filter_name" => "剧团"))->where(array("isdelete"=>0))->select();
                        foreach ($customized_filter as $cf) {
                            $search_result['recommends'][$filter][] = $cf["item_name"];
                        }
                    } elseif ($filter == "awards") {
                        $customized_filter = D('Admin/CustomizedFilter')->field("item_name")->where(array("filter_name" => "获奖情况"))->where(array("isdelete"=>0))->select();
                        foreach ($customized_filter as $cf) {
                            $search_result['recommends'][$filter][] = $cf["item_name"];
                        }
                    } else {
                        for ($filter_idx = 0; $filter_idx < $filter_count; $filter_idx++) {
                            $search_result['recommends'][$filter][] = $filter_result[$filter_idx]['key'];
                        }
                    }
                }
            }
            /*
             * Get recommends end
             */

        } catch (\Elasticsearch\Common\Exceptions\ElasticsearchException $e) {
            $search_result['count'] = -1;
        } catch (Exception $e) {
            $search_result['count'] = -1;
            return $search_result;
        }

        $search_result['lists'] = $lists;
        $search_result['page'] = $page;
        $search_result['recommendsMap'] = self::$FilterMap;
        return $search_result;
    }
}