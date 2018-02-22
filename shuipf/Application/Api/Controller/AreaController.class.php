<?php
/**
 * Created by PhpStorm.
 * User: lbk
 * Date: 12/21/16
 * Time: 1:29 PM
 */

namespace Api\Controller;

use Common\Controller\Base;

class AreaController extends Base {

    public function ajax() {
        $id = I('id',0);
        $area = M('Area')->where(array('pid'=>$id))->getField("id,name,pid");
        echo json_encode($area);exit;
    }
    public function data(){
        $id = I('areaid',0);
        $area = M('Area')->where(array('pid'=>$id))->getField("id,name,pid");
        return json_encode($area);
    }


}