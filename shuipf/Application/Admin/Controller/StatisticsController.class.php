<?php

//资源统计
namespace Admin\Controller;

use Common\Controller\AdminBase;
use Admin\Service\User;
use Admin\Model\ArtCategoryModel;

class StatisticsController extends AdminBase
{
    protected $ReCulture = null;
    protected $Comartcenter = null;
    protected $Library = null;
    protected $Immaterial = null;
    protected $Industry = null;
    protected $PolicyCulture = NULL;
    protected $Active = NULL;
    private $Category = NULL;

    protected function _initialize()
    {
        parent::_initialize();
        $this->ReCulture = D('Admin/ReCulture');
        $this->Comartcenter = D('Admin/Comartcenter');
        $this->Library = D('Admin/Library');
        $this->Immaterial = D('Admin/Immaterial');
        $this->Industry = D('Admin/Industry');
        $this->PolicyCulture = D('Admin/PolicyCulture');
        $this->Active = D('Admin/Active');
        $this->Category = D('Admin/ArtCategory');
        $result = D('Admin/ArtCategory')->getCategory(ArtCategoryModel::TYPE_ALL);
        $this->assign('result', $result);
        $this->assign('AuditStatus', \Admin\Controller\AuditController::$auditStatus);
    }

    protected function process_reculture($where, $current_user, $filter = array())
    {
        //var_dump($where);exit;
        $reculture_total_count = $this->ReCulture->where($where)->count();
        $reculture_video_count = $this->ReCulture->where($where)->where('video != ""')->count();
        $reculture_audio_count = $this->ReCulture->where($where)->where('audio != ""')->count();
        $reculture_picture_data = $this->ReCulture->where($where)->field('image')->select();
        $reculture_picture_count = 0;
        foreach ($reculture_picture_data as $p) {
            $reculture_picture_count += count(explode(",", $p['image']));
        }

        if ($current_user != 'admin') {
            $reculture_area_count = $this->ReCulture->where($where)->where(array('area' => array('between', D('Admin/Area')->getIDSpan(User::getInstance()->getInfo()['area']))))->count();
            $reculture_area_name = D('Admin/Area')->getFullAreaName(User::getInstance()->getInfo()['area']);
        } else {
            if ($filter["area"]) {
                $reculture_area_count = $this->ReCulture->where($where)->where($filter["area"])->count();
                $reculture_area_name = D('Admin/Area')->getFullAreaName($filter["area"]["area"][1][0]);
            } else {
                $reculture_area_count = $reculture_total_count;
                $reculture_area_name = "山西";
            }
        }

        if ($filter["addtime"]) {
            $reculture_min_date = $this->ReCulture->where($where)->where($filter["addtime"])->field("addtime")->order("addtime")->limit(1)->select()[0]['addtime'];
            $reculture_max_date = $this->ReCulture->where($where)->where($filter["addtime"])->field("addtime")->order("-addtime")->limit(1)->select()[0]['addtime'];
            $reculture_date_count = $this->ReCulture->where($where)->where($filter["addtime"])->count();
        } else {
            $reculture_min_date = $this->ReCulture->where($where)->field("addtime")->order("addtime")->limit(1)->select()[0]['addtime'];
            $reculture_max_date = $this->ReCulture->where($where)->field("addtime")->order("-addtime")->limit(1)->select()[0]['addtime'];
            $reculture_date_count = $reculture_total_count;
        }

        if ($where["art_cid"]) {
            $cate_name = D('Admin/ArtCategory')->getCurrentCategory($where["art_cid"][1][0])["name"];
        } else {
            $cate_name = "文化艺术";
        }
        $result = array(
            "video" => array(
                "cate_name" => $cate_name,
                "total_count" => $reculture_total_count,
                "name" => "视频",
                "count" => $reculture_video_count,
                "area_name" => $reculture_area_name,
                "area_count" => $reculture_area_count,
                "min_date" => $reculture_min_date,
                "max_date" => $reculture_max_date,
                "date_count" => $reculture_date_count,
                "url_link" => "/index.php?g=Admin&m=Art&a=search&menuid=168",
            ),
            "audio" => array(
                "cate_name" => $cate_name,
                "total_count" => $reculture_total_count,
                "name" => "音频",
                "count" => $reculture_audio_count,
                "area_name" => $reculture_area_name,
                "area_count" => $reculture_area_count,
                "min_date" => $reculture_min_date,
                "max_date" => $reculture_max_date,
                "date_count" => $reculture_date_count,
                "url_link" => "/index.php?g=Admin&m=Art&a=search&menuid=168",
            ),
            "picture" => array(
                "cate_name" => $cate_name,
                "total_count" => $reculture_total_count,
                "name" => "图片",
                "count" => $reculture_picture_count,
                "area_name" => $reculture_area_name,
                "area_count" => $reculture_area_count,
                "min_date" => $reculture_min_date,
                "max_date" => $reculture_max_date,
                "date_count" => $reculture_date_count,
                "url_link" => "/index.php?g=Admin&m=Art&a=search&menuid=168",
            ),
            "text" => array(
                "cate_name" => $cate_name,
                "total_count" => $reculture_total_count,
                "name" => "文本",
                "count" => $reculture_total_count,
                "area_name" => $reculture_area_name,
                "area_count" => $reculture_area_count,
                "min_date" => $reculture_min_date,
                "max_date" => $reculture_max_date,
                "date_count" => $reculture_date_count,
                "url_link" => "/index.php?g=Admin&m=Art&a=search&menuid=168",
            ),
        );
        if ($filter["file_type"]["file_type"] == "all") {
            return $result;
        } else {
            return array($filter["file_type"]["file_type"] => $result[$filter["file_type"]["file_type"]]);
        }
    }

    protected function process_publicculture($where, $current_user, $filter = array())
    {
        
        // for art_cid = 2, public culture
        if (is_null($where["art_cid"]) || in_array(2, $where["art_cid"][1])) {
            // total count
            $comartcenter_total_count = $this->Comartcenter->where($where)->count();
            $library_total_count = $this->Library->where($where)->count();
            $publicculture_total_count = $comartcenter_total_count + $library_total_count;
            // area count
            if ($current_user != 'admin') {
                if ($filter["area"]) {
                    $publicculture_area_count = $this->Comartcenter->where($where)->where(array('area' => array('between', D('Admin/Area')->getIDSpan(User::getInstance()->getInfo()['area']))))->where($filter["area"])->count()
                        + $this->Library->where($where)->where(array('area' => array('between', D('Admin/Area')->getIDSpan(User::getInstance()->getInfo()['area']))))->where($filter["area"])->count();
                    $publicculture_area_name = D('Admin/Area')->getFullAreaName(User::getInstance()->getInfo()['area']);
                } else {
                    $publicculture_area_count = $this->Comartcenter->where($where)->where(array('area' => array('between', D('Admin/Area')->getIDSpan(User::getInstance()->getInfo()['area']))))->count() + $this->Library->where($where)->where(array('area' => array('between', D('Admin/Area')->getIDSpan(User::getInstance()->getInfo()['area']))))->count();
                    $publicculture_area_name = D('Admin/Area')->getFullAreaName(User::getInstance()->getInfo()['area']);
                }
            } else {
                if ($filter["area"]) {
                    $publicculture_area_count = $this->Comartcenter->where($where)->where($filter["area"])->count() + $this->Library->where($where)->where($filter["area"])->count();
                    $publicculture_area_name = D('Admin/Area')->getFullAreaName($filter["area"]["area"][1][0]);
                } else {
                    $publicculture_area_count = $publicculture_total_count;
                    $publicculture_area_name = "山西";
                }
            }
            // date count
            if ($filter["addtime"]) {
                $library_min_date = $this->Library->where($where)->where($filter["addtime"])->field("addtime")->order("addtime")->limit(1)->select()[0]['addtime'];
                $library_max_date = $this->Library->where($where)->where($filter["addtime"])->field("addtime")->order("-addtime")->limit(1)->select()[0]['addtime'];
                $library_date_count = $this->Library->where($where)->where($filter["addtime"])->count();

                $comartcenter_min_date = $this->Comartcenter->where($where)->where($filter["addtime"])->field("addtime")->order("addtime")->limit(1)->select()[0]['addtime'];
                $comartcenter_max_date = $this->Comartcenter->where($where)->where($filter["addtime"])->field("addtime")->order("-addtime")->limit(1)->select()[0]['addtime'];
                $comartcenter_date_count = $this->Comartcenter->where($where)->where($filter["addtime"])->count();

                $publicculture_min_date = min($library_min_date, $comartcenter_min_date);
                $publicculture_max_date = max($library_max_date, $comartcenter_max_date);
                $publicculture_date_count = $library_date_count + $comartcenter_date_count;
            } else {
                $library_min_date = $this->Library->where($where)->field("addtime")->order("addtime")->limit(1)->select()[0]['addtime'];
                $library_max_date = $this->Library->where($where)->field("addtime")->order("-addtime")->limit(1)->select()[0]['addtime'];

                $comartcenter_min_date = $this->Comartcenter->where($where)->field("addtime")->order("addtime")->limit(1)->select()[0]['addtime'];
                $comartcenter_max_date = $this->Comartcenter->where($where)->field("addtime")->order("-addtime")->limit(1)->select()[0]['addtime'];
                $publicculture_min_date = min($library_min_date, $comartcenter_min_date);
                $publicculture_max_date = max($library_max_date, $comartcenter_max_date);
                $publicculture_date_count = $publicculture_total_count;
            }
            if ($where["art_cid"]) {
                $cate_name = D('Admin/ArtCategory')->getCurrentCategory($where["art_cid"][1][0])["name"];
            } else {
                $cate_name = "公共文化";
            }
            $result = array(
                "text" => array(
                    "cate_name" => $cate_name,
                    "total_count" => $publicculture_total_count,
                    "name" => "文本",
                    "count" => $publicculture_total_count,
                    "area_name" => $publicculture_area_name,
                    "area_count" => $publicculture_area_count,
                    "min_date" => $publicculture_min_date,
                    "max_date" => $publicculture_max_date,
                    "date_count" => $publicculture_date_count,
                    "url_link" => "",
                ),
            );
            if ($filter["file_type"]["file_type"] == "all") {
                return $result;
            } else {
                return array($filter["file_type"]["file_type"] => $result[$filter["file_type"]["file_type"]]);
            }
        } else if (in_array(43, $where["art_cid"][1])) {
            // total count
            $library_total_count = $this->Library->where($where)->count();
            // area count
            if ($current_user != 'admin') {
                if ($filter["area"]) {
                    $library_area_count = $this->Library->where($where)->where(array('area' => array('between', D('Admin/Area')->getIDSpan(User::getInstance()->getInfo()['area']))))->where($filter["area"])->count();
                    $library_area_name = D('Admin/Area')->getFullAreaName(User::getInstance()->getInfo()['area']);
                } else {
                    $library_area_count = $this->Library->where($where)->where(array('area' => array('between', D('Admin/Area')->getIDSpan(User::getInstance()->getInfo()['area']))))->count();
                    $library_area_name = D('Admin/Area')->getFullAreaName(User::getInstance()->getInfo()['area']);
                }
            } else {
                if ($filter["area"]) {
                    $library_area_count = $this->Library->where($where)->where($filter["area"])->count();
                    $library_area_name = D('Admin/Area')->getFullAreaName($filter["area"]["area"][1][0]);
                } else {
                    $library_area_count = $library_total_count;
                    $library_area_name = "山西";
                }
            }
            // date count
            if ($filter["addtime"]) {
                $library_min_date = $this->Library->where($where)->where($filter["addtime"])->field("addtime")->order("addtime")->limit(1)->select()[0]['addtime'];
                $library_max_date = $this->Library->where($where)->where($filter["addtime"])->field("addtime")->order("-addtime")->limit(1)->select()[0]['addtime'];
                $library_date_count = $this->Library->where($where)->where($filter["addtime"])->count();
            } else {
                $library_min_date = $this->Library->where($where)->field("addtime")->order("addtime")->limit(1)->select()[0]['addtime'];
                $library_max_date = $this->Library->where($where)->field("addtime")->order("-addtime")->limit(1)->select()[0]['addtime'];


                $library_date_count = $library_total_count;
            }
            if ($where["art_cid"]) {
                $cate_name = D('Admin/ArtCategory')->getCurrentCategory($where["art_cid"][1][0])["name"];
            } else {
                $cate_name = "公共文化";
            }
            $result = array(
                "text" => array(
                    "cate_name" => $cate_name,
                    "total_count" => $library_total_count,
                    "name" => "文本",
                    "count" => $library_total_count,
                    "area_name" => $library_area_name,
                    "area_count" => $library_area_count,
                    "min_date" => $library_min_date,
                    "max_date" => $library_max_date,
                    "date_count" => $library_date_count,
                    "url_link" => "/index.php?g=Admin&m=Library&a=search&menuid=170",
                ),
            );
            if ($filter["file_type"]["file_type"] == "all") {
                return $result;
            } else {
                return array($filter["file_type"]["file_type"] => $result[$filter["file_type"]["file_type"]]);
            }
        } else if (in_array(44, $where["art_cid"][1])) {
            // total count
            $comartcenter_total_count = $this->Comartcenter->where($where)->count();
            // area count
            if ($current_user != 'admin') {
                if ($filter["area"]) {
                    $comartcenter_area_count = $this->Comartcenter->where($where)->where(array('area' => array('between', D('Admin/Area')->getIDSpan(User::getInstance()->getInfo()['area']))))->where($filter["area"])->count();
                    $comartcenter_area_name = D('Admin/Area')->getFullAreaName(User::getInstance()->getInfo()['area']);
                } else {
                    $comartcenter_area_count = $this->Comartcenter->where($where)->where(array('area' => array('between', D('Admin/Area')->getIDSpan(User::getInstance()->getInfo()['area']))))->count();
                    $comartcenter_area_name = D('Admin/Area')->getFullAreaName(User::getInstance()->getInfo()['area']);
                }
            } else {
                if ($filter["area"]) {
                    $comartcenter_area_count = $this->Comartcenter->where($where)->where($filter["area"])->count();
                    $comartcenter_area_name = D('Admin/Area')->getFullAreaName($filter["area"]["area"][1][0]);
                } else {
                    $comartcenter_area_count = $comartcenter_total_count;
                    $comartcenter_area_name = "山西";
                }
            }
            // date count
            if ($filter["addtime"]) {
                $comartcenter_min_date = $this->Comartcenter->where($where)->where($filter["addtime"])->field("addtime")->order("addtime")->limit(1)->select()[0]['addtime'];
                $comartcenter_max_date = $this->Comartcenter->where($where)->where($filter["addtime"])->field("addtime")->order("-addtime")->limit(1)->select()[0]['addtime'];
                $comartcenter_date_count = $this->Comartcenter->where($where)->where($filter["addtime"])->count();
            } else {
                $comartcenter_min_date = $this->Comartcenter->where($where)->field("addtime")->order("addtime")->limit(1)->select()[0]['addtime'];
                $comartcenter_max_date = $this->Comartcenter->where($where)->field("addtime")->order("-addtime")->limit(1)->select()[0]['addtime'];

                $comartcenter_date_count = $comartcenter_total_count;
            }
            if ($where["art_cid"]) {
                $cate_name = D('Admin/ArtCategory')->getCurrentCategory($where["art_cid"][1][0])["name"];
            } else {
                $cate_name = "公共文化";
            }
            $result = array(
                "text" => array(
                    "cate_name" => $cate_name,
                    "total_count" => $comartcenter_total_count,
                    "name" => "文本",
                    "count" => $comartcenter_total_count,
                    "area_name" => $comartcenter_area_name,
                    "area_count" => $comartcenter_area_count,
                    "min_date" => $comartcenter_min_date,
                    "max_date" => $comartcenter_max_date,
                    "date_count" => $comartcenter_date_count,
                    "url_link" => "/index.php?g=Admin&m=ComArtCenter&a=search&menuid=171",
                ),
            );
            if ($filter["file_type"]["file_type"] == "all") {
                return $result;
            } else {
                return array($filter["file_type"]["file_type"] => $result[$filter["file_type"]["file_type"]]);
            }
        }
    }

    protected function process_immaterial($where, $current_user, $filter = array())
    {
        $immaterial_total_count = $this->Immaterial->where($where)->count();
        if ($current_user != 'admin') {
            $immaterial_area_count = $this->Immaterial->where($where)->where(array('area' => array('between', D('Admin/Area')->getIDSpan(User::getInstance()->getInfo()['area']))))->count();
            $immaterial_area_name = D('Admin/Area')->getFullAreaName(User::getInstance()->getInfo()['area']);
        } else {
            if ($filter["area"]) {
                $immaterial_area_count = $this->Immaterial->where($where)->where($filter["area"])->count();
                $immaterial_area_name = D('Admin/Area')->getFullAreaName($filter["area"]["area"][1][0]);
            } else {
                $immaterial_area_count = $immaterial_total_count;
                $immaterial_area_name = "山西";
            }
        }
        if ($filter["addtime"]) {
            $immaterial_min_date = $this->Immaterial->where($where)->where($filter["addtime"])->field("addtime")->order("addtime")->limit(1)->select()[0]['addtime'];
            $immaterial_max_date = $this->Immaterial->where($where)->where($filter["addtime"])->field("addtime")->order("-addtime")->limit(1)->select()[0]['addtime'];
            $immaterial_date_count = $this->Immaterial->where($where)->where($filter["addtime"])->count();
        } else {
            $immaterial_min_date = $this->Immaterial->where($where)->field("addtime")->order("addtime")->limit(1)->select()[0]['addtime'];
            $immaterial_max_date = $this->Immaterial->where($where)->field("addtime")->order("-addtime")->limit(1)->select()[0]['addtime'];
            $immaterial_date_count = $immaterial_total_count;
        }
        if ($where["art_cid"]) {
            $cate_name = D('Admin/ArtCategory')->getCurrentCategory($where["art_cid"][1][0])["name"];
        } else {
            $cate_name = "非物质文化遗产";
        }
        $result = array(
            "text" => array(
                "cate_name" => $cate_name,
                "total_count" => $immaterial_total_count,
                "name" => "文本",
                "count" => $immaterial_total_count,
                "area_name" => $immaterial_area_name,
                "area_count" => $immaterial_area_count,
                "min_date" => $immaterial_min_date,
                "max_date" => $immaterial_max_date,
                "date_count" => $immaterial_date_count,
                "url_link" => "/index.php?g=Admin&m=Immaterial&a=search&menuid=172",
            ),
        );
        if ($filter["file_type"]["file_type"] == "all") {
            return $result;
        } else {
            return array($filter["file_type"]["file_type"] => $result[$filter["file_type"]["file_type"]]);
        }
    }

    protected function process_industry($where, $current_user, $filter = array())
    {
        $industry_total_count = $this->Industry->where($where)->count();
        if ($current_user != 'admin') {
            $industry_area_count = $this->Industry->where($where)->where(array('area' => array('between', D('Admin/Area')->getIDSpan(User::getInstance()->getInfo()['area']))))->count();
            $industry_area_name = D('Admin/Area')->getFullAreaName(User::getInstance()->getInfo()['area']);
        } else {
            if ($filter["area"]) {
                $industry_area_count = $this->Industry->where($where)->where($filter["area"])->count();
                $industry_area_name = D('Admin/Area')->getFullAreaName($filter["area"]["area"][1][0]);
            } else {
                $industry_area_count = $industry_total_count;
                $industry_area_name = "山西";
            }
        }
        if ($filter["addtime"]) {
            $industry_min_date = $this->Industry->where($where)->where($filter["addtime"])->field("addtime")->order("addtime")->limit(1)->select()[0]['addtime'];
            $industry_max_date = $this->Industry->where($where)->where($filter["addtime"])->field("addtime")->order("-addtime")->limit(1)->select()[0]['addtime'];
            $industry_date_count = $this->Industry->where($where)->where($filter["addtime"])->count();
        } else {
            $industry_min_date = $this->Industry->where($where)->field("addtime")->order("addtime")->limit(1)->select()[0]['addtime'];
            $industry_max_date = $this->Industry->where($where)->field("addtime")->order("-addtime")->limit(1)->select()[0]['addtime'];
            $industry_date_count = $industry_total_count;
        }
        if ($where["art_cid"]) {
            $cate_name = D('Admin/ArtCategory')->getCurrentCategory($where["art_cid"][1][0])["name"];
        } else {
            $cate_name = "文化产业";
        }
        $result = array(
            "text" => array(
                "cate_name" => $cate_name,
                "total_count" => $industry_total_count,
                "name" => "文本",
                "count" => $industry_total_count,
                "area_name" => $industry_area_name,
                "area_count" => $industry_area_count,
                "min_date" => $industry_min_date,
                "max_date" => $industry_max_date,
                "date_count" => $industry_date_count,
                "scale"=>$filter['scale'],
                "url_link" => "/index.php?g=Admin&m=Industry&a=search&menuid=173",
            ),
        );
        if ($filter["file_type"]["file_type"] == "all") {
            return $result;
        } else {
            return array($filter["file_type"]["file_type"] => $result[$filter["file_type"]["file_type"]]);
        }
    }

    protected function process_policy($where, $current_user, $filter = array())
    {
        $policy_total_count = $this->PolicyCulture->where($where)->count();
        if ($current_user != 'admin') {
            $policy_area_count = $this->PolicyCulture->where($where)->where(array('area' => array('between', D('Admin/Area')->getIDSpan(User::getInstance()->getInfo()['area']))))->count();
            $policy_area_name = D('Admin/Area')->getFullAreaName(User::getInstance()->getInfo()['area']);
        } else {
            if ($filter["area"]) {
                $policy_area_count = $this->PolicyCulture->where($where)->where($filter["area"])->count();
                $policy_area_name = D('Admin/Area')->getFullAreaName($filter["area"]["area"][1][0]);
            } else {
                $policy_area_count = $policy_total_count;
                $policy_area_name = "山西";
            }
        }
        if ($filter["addtime"]) {
            $policy_min_date = $this->PolicyCulture->where($where)->where($filter["addtime"])->field("addtime")->order("addtime")->limit(1)->select()[0]['addtime'];
            $policy_max_date = $this->PolicyCulture->where($where)->where($filter["addtime"])->field("addtime")->order("-addtime")->limit(1)->select()[0]['addtime'];
            $policy_date_count = $this->PolicyCulture->where($where)->where($filter["addtime"])->count();;
        } else {
            $policy_min_date = $this->PolicyCulture->where($where)->field("addtime")->order("addtime")->limit(1)->select()[0]['addtime'];
            $policy_max_date = $this->PolicyCulture->where($where)->field("addtime")->order("-addtime")->limit(1)->select()[0]['addtime'];
            $policy_date_count = $policy_total_count;
        }
        if ($where["art_cid"]) {
            $cate_name = D('Admin/ArtCategory')->getCurrentCategory($where["art_cid"][1][0])["name"];
        } else {
            $cate_name = "文化政策";
        }
        $result = array(
            "text" => array(
                "cate_name" => $cate_name,
                "total_count" => $policy_total_count,
                "name" => "文本",
                "count" => $policy_total_count,
                "area_name" => $policy_area_name,
                "area_count" => $policy_area_count,
                "min_date" => $policy_min_date,
                "max_date" => $policy_max_date,
                "date_count" => $policy_date_count,
                "url_link" => "/index.php?g=Admin&m=Policy&a=search&menuid=174",
            ),
        );
        if ($filter["file_type"]["file_type"] == "all") {
            return $result;
        } else {
            return array($filter["file_type"]["file_type"] => $result[$filter["file_type"]["file_type"]]);
        }
    }

    protected function process_active($where, $current_user, $filter = array())
    {
        $active_total_count = $this->Active->where($where)->count();
        if ($current_user != 'admin') {
            $active_area_count = $this->Active->where($where)->where(array('area' => array('between', D('Admin/Area')->getIDSpan(User::getInstance()->getInfo()['area']))))->count();
            $active_area_name = D('Admin/Area')->getFullAreaName(User::getInstance()->getInfo()['area']);
        } else {
            if ($filter["area"]) {
                $active_area_count = $this->Active->where($where)->where($filter["area"])->count();
                $active_area_name = D('Admin/Area')->getFullAreaName($filter["area"]["area"][1][0]);
            } else {
                $active_area_count = $active_total_count;
                $active_area_name = "山西";
            }
        }
        if ($filter["addtime"]) {
            $active_min_date = $this->Active->where($where)->where($filter["addtime"])->field("addtime")->order("addtime")->limit(1)->select()[0]['addtime'];
            $active_max_date = $this->Active->where($where)->where($filter["addtime"])->field("addtime")->order("-addtime")->limit(1)->select()[0]['addtime'];
            $active_date_count = $this->Active->where($where)->where($filter["addtime"])->count();
        } else {
            $active_min_date = $this->Active->where($where)->field("addtime")->order("addtime")->limit(1)->select()[0]['addtime'];
            $active_max_date = $this->Active->where($where)->field("addtime")->order("-addtime")->limit(1)->select()[0]['addtime'];
            $active_date_count = $active_total_count;
        }
        if ($where["art_cid"]) {
            $cate_name = D('Admin/ArtCategory')->getCurrentCategory($where["art_cid"][1][0])["name"];
        } else {
            $cate_name = "文化活动";
        }
        $result = array(
            "text" => array(
                "cate_name" => $cate_name,
                "total_count" => $active_total_count,
                "name" => "文本",
                "count" => $active_total_count,
                "area_name" => $active_area_name,
                "area_count" => $active_area_count,
                "min_date" => $active_min_date,
                "max_date" => $active_max_date,
                "date_count" => $active_date_count,
            ),
        );
        if(is_null($where["art_cid"])) {
            $result["text"]["url_link"] = "";
        } else {
            switch (D('Admin/ArtCategory')->getRootCate($where["art_cid"])) {
                case 185:
                    $result["text"]["url_link"] = "/index.php?g=Admin&m=Active&a=lists&menuid=254";
                    break;
                case 186:
                    $result["text"]["url_link"] = "/index.php?g=Admin&m=Active&a=showlists&menuid=255";
                    break;
                case 187:
                    $result["text"]["url_link"] = "/index.php?g=Admin&m=Active&a=activelists&menuid=256";
                    break;
                case 188:
                    $result["text"]["url_link"] = "/index.php?g=Admin&m=Active&a=grouplists&menuid=257";
                    break;
                default:
                    $result["text"]["url_link"] = "";
                    break;
            }
        }
        if ($filter["file_type"]["file_type"] == "all") {
            return $result;
        } else {
            return array($filter["file_type"]["file_type"] => $result[$filter["file_type"]["file_type"]]);
        }
    }

    public function index()
    {
        $search = I('get.search', '');
        
        $current_user = User::getInstance()->getInfo()['username'];
        if ($search == "1") {
            $this->where['isdelete'] = 0;
            $this->where['auditstatus'] = 35;

            $cid = I('art_cid');
            $childCidList = D('Admin/ArtCategory')->getRecursiveChildCidList($cid);
            empty(I('art_cid')) ? NULL : $this->where['art_cid'] = array('in', array_merge(array($cid), $childCidList));

            $filter = array();
            $filter["area"] = array('area' => array('between', D('Admin/Area')->getIDSpan(I('area'))));
            $filter["file_type"] = array('file_type' => I('file_type'));
            if (!empty(I('start_time')) or !empty(I('end_time'))) {
                $where_start_time = !empty(I('start_time')) ? I('start_time') . " 00:00:00" : '1900-01-01 00:00:00';
                $where_end_time = !empty(I('end_time')) ? I('end_time') . " 23:59:59" : date('Y-m-d 23:59:59', time());
                $filter["addtime"] = array("addtime" => array('between', array($where_start_time, $where_end_time)));
            }

              if (!empty(I('join_date_start')) or !empty(I('join_date_end'))) {
                $where_start_time = !empty(I('start_time')) ? I('start_time') . " 00:00:00" : '1900-01-01 00:00:00';
                $where_end_time = !empty(I('join_date_end')) ? I('join_date_end') . " 23:59:59" : date('Y-m-d 23:59:59', time());
                $filter["join_date"] = array("join_date" => array('between', array($where_start_time, $where_end_time)));
            }
              if (!empty(I('person_num_min')) and !empty(I('person_num_max'))) {
                $person_num_min =  I('person_num_min');
                $person_num_max = I('person_num_max');
                $filter["person_num"] = array("person_num" => array('between', array($person_num_min, $person_num_max)));
            }elseif(!empty(I('person_num_min')) and empty(I('person_num_max'))){
                 $person_num_min =  I('person_num_min');
                  $filter["person_num"] = array("person_num" => array('egt', $person_num_min));

            }elseif(empty(I('person_num_min')) and !empty(I('person_num_max'))){
                 $person_num_max =  I('person_num_max');
                  $filter["person_num"] = array("person_num" => array('elt', $person_num_max));

            }

              if (!empty(I('output_value_min')) and !empty(I('output_value_max'))) {
                $output_value_min =  I('output_value_min');
                $utput_value_max = I('utput_value_max');
                $filter["output_value"] = array("output_value" => array('between', array($output_value_min, $utput_value_max)));
            }elseif(!empty(I('output_value_min')) and empty(I('output_value_max'))){
                 $output_value_min =  I('output_value_min');
                  $filter["output_value"] = array("output_value" => array('egt', $output_value_min));

            }elseif(empty(I('output_value_min')) and !empty(I('output_value_max'))){
                 $output_value_max =  I('output_value_max');
                  $filter["output_value"] = array("output_value" => array('elt', $output_value_max));

            }
            if(!empty(I('scale'))){
               $filter['scale']=I('scale');
            }
            //var_dump($filter);exit;
            if (D('Admin/ArtCategory')->getRootCate($cid)) {
                $data = array();
                //var_dump(D('Admin/ArtCategory')->getRootCate($cid));exit;
                switch (D('Admin/ArtCategory')->getRootCate($cid)) {
                    case 1:
                        $data[0] = $this->process_reculture($this->where, $current_user, $filter);
                        //var_dump($data);exit;
                        if (D('Admin/ArtCategory')->getCategory($cid)) {
                            foreach (D('Admin/ArtCategory')->getCategory($cid) as $cate_line) {
                                $tmpChildList = D('Admin/ArtCategory')->getRecursiveChildCidList($cate_line["cid"]);
                                $this->where["art_cid"][1] = array_merge(array($cate_line["cid"]), $tmpChildList);
                                $data[] = $this->process_reculture($this->where, $current_user, $filter);
                            }
                        }
                        break;
                    case 2:
                        $data[0] = $this->process_publicculture($this->where, $current_user, $filter);
                        if (D('Admin/ArtCategory')->getCategory($cid)) {
                            foreach (D('Admin/ArtCategory')->getCategory($cid) as $cate_line) {
                                $tmpChildList = D('Admin/ArtCategory')->getRecursiveChildCidList($cate_line["cid"]);
                                $this->where["art_cid"][1] = array_merge(array($cate_line["cid"]), $tmpChildList);
                                $data[] = $this->process_publicculture($this->where, $current_user, $filter);
                            }
                        }
                        break;
                    case 3:
                        $data[0] = $this->process_immaterial($this->where, $current_user, $filter);
                        if (D('Admin/ArtCategory')->getCategory($cid)) {
                            foreach (D('Admin/ArtCategory')->getCategory($cid) as $cate_line) {
                                $tmpChildList = D('Admin/ArtCategory')->getRecursiveChildCidList($cate_line["cid"]);
                                $this->where["art_cid"][1] = array_merge(array($cate_line["cid"]), $tmpChildList);
                                $data[] = $this->process_immaterial($this->where, $current_user, $filter);
                            }
                        }
                        break;
                    case 4:
                        $data[0] = $this->process_industry($this->where, $current_user, $filter);
                        //var_dump($data);exit;
                        if (D('Admin/ArtCategory')->getCategory($cid)) {
                            foreach (D('Admin/ArtCategory')->getCategory($cid) as $cate_line) {
                                $tmpChildList = D('Admin/ArtCategory')->getRecursiveChildCidList($cate_line["cid"]);
                                $this->where["art_cid"][1] = array_merge(array($cate_line["cid"]), $tmpChildList);
                                $data[] = $this->process_industry($this->where, $current_user, $filter);
                                //var_dump($data);exit;
                            }
                        }
                        break;
                    case 5:
                        $data[0] = $this->process_policy($this->where, $current_user, $filter);
                        if (D('Admin/ArtCategory')->getCategory($cid)) {
                            foreach (D('Admin/ArtCategory')->getCategory($cid) as $cate_line) {
                                $tmpChildList = D('Admin/ArtCategory')->getRecursiveChildCidList($cate_line["cid"]);
                                $this->where["art_cid"][1] = array_merge(array($cate_line["cid"]), $tmpChildList);
                                $data[] = $this->process_policy($this->where, $current_user, $filter);
                            }
                        }
                        break;
                    case 185:
                    case 186:
                    case 187:
                    case 188:
                        $data[0] = $this->process_active($this->where, $current_user, $filter);
                        if (D('Admin/ArtCategory')->getCategory($cid)) {
                            foreach (D('Admin/ArtCategory')->getCategory($cid) as $cate_line) {
                                $tmpChildList = D('Admin/ArtCategory')->getRecursiveChildCidList($cate_line["cid"]);
                                $this->where["art_cid"][1] = array_merge(array($cate_line["cid"]), $tmpChildList);
                                $data[] = $this->process_active($this->where, $current_user, $filter);
                            }
                        }
                        break;
                }
                $this->ajaxReturn(array(
                    'data' => $data,
                    'status' => 1
                ));
            } else {
                $data = array();
                $data["reculture"] = $this->process_reculture($this->where, $current_user, $filter);
                $data["comartcenter"] = $this->process_publicculture($this->where, $current_user, $filter);
                $data["immaterial"] = $this->process_immaterial($this->where, $current_user, $filter);
                $data["industry"] = $this->process_industry($this->where, $current_user, $filter);
                $data["policy"] = $this->process_policy($this->where, $current_user, $filter);
                $data["active"] = $this->process_active($this->where, $current_user, $filter);
                $this->ajaxReturn(array(
                    'data' => $data,
                    'status' => 1
                ));
            }
        } else {
            $this->where['isdelete'] = 0;
            $this->where['auditstatus'] = 35;

            $data = array();
            $data["reculture"] = $this->process_reculture($this->where, $current_user);
            $data["comartcenter"] = $this->process_publicculture($this->where, $current_user);
            $data["immaterial"] = $this->process_immaterial($this->where, $current_user);
            $data["industry"] = $this->process_industry($this->where, $current_user);
            $data["policy"] = $this->process_policy($this->where, $current_user);
            $data["active"] = $this->process_active($this->where, $current_user);

            $this->assign('data', $data);
            $this->display();
        }
    }

}

?>