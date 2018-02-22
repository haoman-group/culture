<?php
//文化设施
namespace Pubservice\Controller;

use Admin\Service\User;

class FacilityController extends PubBaseController
{
    protected function _initialize()
    {
        parent::_initialize();
        $userInfo = User::getInstance()->getInfo();
        //var_dump($userInfo);exit;
        $this->assign('userInfo', $userInfo);
        $this->assign('admin_url', "<a href='/admin'>[进入后台]</a>");
    }

    public function index()
    {
        //获取带坐标的图书馆数据
        $type = I("get.type", null);
        $county = I("get.county", '');
        $city = I("get.city", $this->area['cityname']);
        $where = array('auditstatus' => 35);
        // if ($county != '') {
        //     $where['area_display'] = array("like", "%".$county."%");
        // }elseif($county == ''&& $city !=''){
        //      $where['area_display'] = array("like", "%".$city."%");

        // }elseif($city =='' && $country=='' ){
        //        unset($where['area_display']); 
        // }
        if($city != '全省'){
            $where['area_display'] = array("like", "%".$city."%");
        }
        // var_dump($where);
        switch ($type) {
            case "图书馆":
                $data = D('Admin/Library')->relation(true)->scope('have_point')->where($where)->select();

                // echo D('Admin/Library')->getLastsql();
                foreach ($data as $key => $value) {
                    $data[$key]['tablename'] = 'Library';
                }
                //var_dump($data);exit;
                break;
            case "文化站":
                 $where['level']="县级";
                 $data = D('Admin/Library')->relation(true)->scope('have_point')->where($where)->select();

                // echo D('Admin/Library')->getLastsql();
                foreach ($data as $key => $value) {
                    $data[$key]['tablename'] = 'Library';
                }
                break;
                case "文化馆":
                $data = D('Admin/Comartcenter')->relation(true)->scope('have_point')->where($where)->select();
               // echo  D('Admin/Comartcenter')->getLastsql();
                foreach ($data as $key => $item) {
                    $data[$key]['name'] = $item['cac_name'];
                    $data[$key]['addr'] = $item['cac_addr'];
                    $data[$key]['tablename'] = 'Comartcenter';
                }
                break;
                 case "":
                $Comartcenter = D('Admin/Comartcenter')->relation(true)->scope('have_point')->where($where)->select();
                //var_dump($Comartcenter);
                foreach ($Comartcenter as $key => $item) {
                    $Comartcenter[$key]['name'] = $item['cac_name'];
                    $Comartcenter[$key]['addr'] = $item['cac_addr'];
                    $Comartcenter[$key]['tablename'] = 'Comartcenter';
                }
                 $Library = D('Admin/Library')->relation(true)->scope('have_point')->where($where)->select();

                 //var_dump($Library);
                foreach ($Library as $key => $value) {
                    $Library[$key]['tablename'] = 'Library';
                }
               
               
                if($Comartcenter=='' && $Library !=''){
                   
                    $data=$Library;
                }elseif($Comartcenter!='' && $Library ==''){
                    $data=$Comartcenter;
                }else{
                    $data=array_merge($Comartcenter,$Library);
                }
                
                break;
                
            default:
                $data = '';
                break;
        }
      // var_dump($data);exit;
        $this->assign('city', $city);
        $this->assign('data', $data);
        $this->BaseServices();
        $this->display();
    }
    
    public function BaseServices(){
        $pagenum = I('get.page',1);
        // $where = $this->_getWhere();
        $where = null;
        $where['isdelete']=0;
        $model = D('Admin/BaseServices');
        $count = $model->scope('normal')->where($where)->count();
        $page = new \Libs\Util\Page($count, 12, $pagenum);
        //设置分页参数
        $page->SetPager('baseservices', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        //获取当前页数据
        $data = $model->scope('normal')->relation(true)->page($pagenum . ',12')->where($where)->order('id desc')->select();
        //分页跳转的时候保证查询条件
        foreach ($where as $key => $val) {
            $page->parameter[$key] = urlencode($val);
        }
        //分页显示输出
        $pageinfo["page"] = $page->show('landmark');
        $pageinfo["data"] = $data;
        //输出
        $this->assign('pageinfo',$pageinfo);
    }


    //资源采集的文化艺术的添加
    //预约参观
    public function bespeak()
    {
        if (IS_POST) {
            $data=$_POST;
            //$data['areaname']=D("Admin/Area")->getFullAreaName($data['areaid']);
            //$data['permanent_address']=$data['areaname'].":".$data['permanent_address'];
            $data['tel']=implode(',',$data['tel']);
             $data['credential_no']=implode(',',$data['credential_no']);
             $data['style']=$data['stylenum'];
            // var_dump($data);exit;
           
            $tablename = I('tablename');
            $id = I('tab_cid');
            $current_attendance_num = I("attendance_num");
            $current_adult_num = I("adult_num");
            $current_student_num = I("student_num");
            $current_elder_num = I("elder_num");
            $current_child_num = I("child_num");
            if ($current_attendance_num < $current_adult_num + $current_student_num + $current_elder_num + $current_child_num) {
                $this->error("预约的成人，学生，老人，孩子人数超出预约参观的总人数，请重新填写");
            } else {
                if (D('Admin/Bespeak')->create($data)) {
                    D('Admin/Bespeak')->add();

                    if ($tablename == 'Active') {
                        $this->success('预约成功!', U('Active/show', array('id' => $id, 'tablename' => 'active')));
                    } else {
                        $this->success('预约成功!', U('Pubservice/Active/index'));
                    }
                } else {
                    $this->error(D('Admin/Bespeak')->getError());
                }
            }
        } else {

            $tab_cid = I('tab_cid');
            $acceptance = D('Admin/Active')->where(array('id' => $tab_cid))->getField('acceptance');
            $num = D('Admin/Bespeak')->where(array('tab_cid' => $tab_cid))->getField('attendance_num', true);
            $num = array_sum($num);
            if ($acceptance > $num) {
                $account = $acceptance - $num;
            } else {
                $account = 0;
            }
            $this->assign('account', $account);
            $this->display();
        }


    }

    public function show()
    {
        $id = I('id');
        $tablename = I('tablename');
        switch ($tablename) {
            case "Library":
                $data = D('Admin/Library')->where(array('id' => $id))->find();
                if($data['name'] == '山西省图书馆'){
                    $this->redirect('library');
                }
                break;
            case "Comartcenter":
                $data = D('Admin/Comartcenter')->where(array('id' => $id))->find();
                break;
            default:
                $data = '';
                break;
        }
        $data['publish_content'] = htmlspecialchars_decode($data['publish_content']);
        // var_dump($data);exit;
        $this->assign('data', $data);
        $this->display();

    }
    //图书馆静态页
    public function  library(){
        $this->display();
    }
}


