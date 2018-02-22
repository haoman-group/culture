<?php
//群众文艺
namespace Pubservice\Controller;

use Admin\Service\User;

class MassartController extends PubBaseController
{
    protected function _initialize()
    {
        parent::_initialize();
        $this->model = D("Admin/Massart");
        $this->category = $this->model->getCategory();
        $userInfo = User::getInstance()->getInfo();
        $this->assign('userInfo', $userInfo);
        $this->assign('admin_url',"<a href='/admin'>[进入后台]</a>");
    }
    public function index(){
        //群星奖-轮播
        $star_slide = $this->model->getDataByCate('star',6);
        //群星奖-顶部列表
        $star_list = $this->model->getStarList(6);
        //农民工歌手大赛
        $worker_sing=$this->model->where(array('isdelete'=>0,'category'=>'worker','session'=>array('ELT',3)))->order('id desc')->limit(3)->select();
        foreach ($worker_sing as $key => $value) {
        $worker_sing[$key]['address']=D('Admin/Area')->where(array('id'=>$value['areaid']))->getField('name'); 
        }
        // $worker_sing['two']=$this->model->where(array('session'=>'2','isdelete'=>0))->order('id desc')->find();
        // $worker_sing['three']=$this->model->where(array('session'=>'3','isdelete'=>0))->order('id desc')->find();
        // $worker_sing['one']['address']=D('Admin/Area')->where(array('id'=>$worker_sing['one']['areaid']))->getField('name'); 
        // $worker_sing['two']['address']=D('Admin/Area')->where(array('id'=>$worker_sing['two']['areaid']))->getField('name'); 
        // $worker_sing['three']['address']=D('Admin/Area')->where(array('id'=>$worker_sing['three']['areaid']))->getField('name'); 
        //广场舞
        //var_dump($worker_sing);exit;
        $dance = $this->model->getDataByCate('dance',5);
        //民俗版画
        $custom= $this->model->getDataByCate('custom',2);
        //网络摄影大赛
        $photography = $this->model->getDataByCate('photography',10);
        //文化惠民专场
        $culture=$this->model->getDataByCate('culture',5);
        $culture_video =   $this->model->where(['category'=>'culture','isdelete'=>0,'video'=>['NEQ','']])->limit(2)->order('id asc')->select();
        // $culture_activty = $this->model->where(['category'=>'culture','isdelete'=>0,'cover'=>['NEQ','']])->limit(2)->order('id desc')->select();
        $culture_activty = null;
        $culture_picture = $this->model->where(['category'=>'culture','isdelete'=>0,'cover'=>['NEQ','']])->limit(2)->order('id asc')->select();
        // dump($photography);
        $this->assign(compact('culture','culture_video','culture_activty','culture_picture'));
        $this->assign('worker_sing',$worker_sing);
        $this->assign(compact('star_slide','star_list','dance','photography','custom'));
        $this->display();
    }
    public function lists(){
        $cate = I('request.cate',null);
        //当前分类名称
        $cateName = $this->category[$cate];
        $sessions = $this->model->getSessionByCate($cate);
        //session
        // var_dump($sessions);exit;
        $session = I('request.session',null);
        $pagenum = I('get.page',1);
        $where = [];
        if($session){
            $where['session'] = $session;
        }else{
             $session = $this->model->getSessionByCate($cate);
        }
        if($cate){
            $where['category'] = $cate;
        }
        $count = $this->model->scope('normal')->where($where)->count();
        $page = new \Libs\Util\Page($count, 12, $pagenum);
        //设置分页参数
        $page->SetPager('baseservices', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        //获取当前页数据
        $data = $this->model->scope('normal')->page($pagenum . ',12')->where($where)->order('id desc')->select();
        //分页跳转的时候保证查询条件
        foreach ($where as $key => $val) {
            $page->parameter[$key] = urlencode($val);
        }
        //分页显示输出
        $page = $page->show('baseservices');
        //推荐数据
        $position = $this->model->getOtherPosition($cate);
        //var_dump($position);exit;
        // echo $this->model->getLastSql();
        //输出
        $this->assign(compact('cate','sessions','cateName','page','data','position'));
        $this->display();
    }
    //详情页
    public function show(){
        $id = I('request.id',null);
        if($id){
            $data = $this->model->where(['id'=>$id])->find();
            $position = $this->model->getDataByCate($data['category'],8);
            //当前分类名称
            $cateName = $this->category[$data['category']];
            $this->assign(compact('data','position','cateName'));
        }else{
            $this->error('错误：未指定内容！');
        }
        $this->display();
    }
    public function search(){
        $this->display();
    }
}
