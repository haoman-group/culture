<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 07/01/2017
 * Time: 22:25
 */

namespace Admin\Controller;

use Common\Controller\AdminBase;
use Admin\Service\User;
use Admin\Model\ArtCategoryModel;

class AnalysisController extends AdminBase {

    protected function _initialize()
    {
        parent::_initialize();
        $category = M('ArtCategory')->where(array('status'=>0, 'isdelete'=>0, 'parent_cid'=>0, 'cid'=>array('lt', 6)))->select();;
        $this->assign('result', $category);
    }

    public function analysis() {
        $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
        $data['default_art'] = "1";
        $datatype = I('datatype', 'click');
        if ($datatype == 'click') {
            $data['ajax_url'] = "/Api/Statistics/clickrate";
        } else if ($datatype == 'download') {
            $data['ajax_url'] = "/Api/Statistics/downloadrate";
        }
        $this->assign("data", $data);
        $this->display();
    }

    public function action() {
        $this->display();
    }
}