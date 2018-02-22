<?php

// +----------------------------------------------------------------------
// | 分类统计数据表
// +----------------------------------------------------------------------
// | Author: libing
// +----------------------------------------------------------------------

namespace Admin\Model;

use Common\Model\Model;

class CategoryStatisticsModel extends Model {
    //获取区域统计数据信息
    public function getAreaStatistics($cid){
        $sql = "SELECT 
                    name, IFNULL(total_num, 0) as total
                FROM
                    cu_area ca
                        LEFT JOIN
                    (SELECT 
                        FLOOR(area / 10000) * 10000 AS area,
                            SUM(total_num) AS total_num
                    FROM
                        cu_category_statistics
                    WHERE
                        cid = '".$cid."'
                    GROUP BY FLOOR(area / 10000)) ccs ON ccs.area = ca.id
                WHERE
                    ca.span = 10000 AND ca.pid = 25000000 AND ca.status = 0 order by ca.id";
        return $this->query($sql);
    }

    public function getChartStatistics($cid) {
        if(in_array($cid,['174','175','178','179'])){$cid = 5;}
        $data['title'] = D('Admin/ArtCategory')->where(array('cid'=>$cid == 6 ? "1" : $cid))->getField("name");
        $sql = "SELECT 
            cac.cid, if(cac.cid = ".$cid.", '全部', cac.name) AS name, SUM(IFNULL(total_num, 0)) as total_num
            FROM cu_category_statistics ccs
            RIGHT JOIN (
            SELECT cid, `name` FROM cu_art_category WHERE cid = ".$cid." OR parent_cid = ".$cid.") cac
            ON cac.cid = ccs.cid
            GROUP BY cac.cid
            order by cac.cid;";
        $list = $this->query($sql);
        $data['name_list'] = array();
        $data['sum_list'] = array();
        $data['pie_list'] = array();
        $data['pie_legend_list'] = array();
        foreach ($list as $item) {
            array_push($data['name_list'], $item['name']);
            array_push($data['sum_list'], $item['total_num']);
            if ($item['cid'] != $cid) {
                array_push($data['pie_legend_list'], $item['name']);
                array_push($data['pie_list'], array('value'=>$item['total_num'], 'name'=>$item['name']));
            }
        }
        return $data;
    }
}
