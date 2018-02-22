<?php

//基类：存放一些公共方法
namespace Cudatabase\Controller;

use Common\Controller\Base;
use Libs\Util\CuSearch;
use Admin\Service\User;
use Member\Controller\Memberbase;
class PubserviceBasesController extends Base
{
    
    protected $Page_Size = 10;
    public $login_type = null;
    protected function _initialize()
    {
        parent::_initialize();
        $this->_checkLogin();
        //获取面包屑导航内容
        $cid = I('get.cid',6);
        
        //区域统计信息
        $this->assign('area_statistics',D('Admin/CategoryStatistics')->getAreaStatistics($cid));
        $this->assign('chart_statistics',D('Admin/CategoryStatistics')->getChartStatistics($cid));
       
    }
    //检测用户是否登录，如果未登录，则跳转至登录页面
    protected function _checkLogin(){
       
        $this->login_type = session('login_type');
        //不检测的模块及方法
        if (MODULE_NAME == 'Cudatabase' && in_array(CONTROLLER_NAME, array('Public')) && in_array(ACTION_NAME, array('doLogin', 'doLogout'))) {
            return true;
        }
        //判断是否为后台管理员登录
        if (User::getInstance()->id) {
            //待办任务个数
           
            $this->assign('gtasks',R('Admin/Action/getGTasks'));
            $this->assign('username',User::getInstance()->username);
            //$this->assign('id',User::getInstance()->id);
            $this->assign('admin_url',"<a href='/admin'>[进入后台]</a>");
            return true;
        }
        //判断是否为前台用户
        if((int) service("Passport")->userid){
            $this->assign('username',service("Passport")->username);
            $this->assign('admin_url',"");
            return true;
        }
        //未登录则跳转至登录页面
        $this->redirect('Cudatabase/Public/doLogin',array('type'=>'database-register'));
    }


    //准备前台显示的数据,用 es
    protected function _prepData($where)
    {
        $search_key = I('get.textfield', '');
        $search_tool = new CuSearch();

        //页面信息数据
        $pageinfo = array();
        //获取页码
        $pagenum = I('get.page', '1', '');

        $result = $search_tool->search($search_key, $where, $pagenum, $this->Page_Size);
        if ($result['count'] < 0){
            $this->assign('recommends', $result['recommends']);
            $this->assign('recommendsMap', $result['recommendsMap']);
            $this->_prepDataUsingDb($where);
        }else{
            $pageinfo["page"] = $result['page']->show('sellercenter');
            $pageinfo["count"] = $result['count'];
            $this->assign('lists', $result['lists']);
            $this->assign('pageinfo', $pageinfo);
            $this->assign('recommends', $result['recommends']);
            $this->assign('recommendsMap', $result['recommendsMap']);
        }
        return;
    }
    protected function _prepDataUsingDb($where)
    {
        //页面信息数据
        $pageinfo = array();
        //获取页码
        $pagenum = I('get.page', '1', '');
        //设置用户条件
        //   $this->where['uid'] = $this->userid;
        //设置搜索条件
        //   $this->_search();
        //排序
        $order = array('id' => 'desc');
        //合并搜索条件和基础条件（array_merge 如果有重复key，则后面的会覆盖前面的）
        //   $where = array_merge($where,$this->where);
        trace($where, '搜索条件2', 'debug');
        //总数
        $count = $this->model->where($where)->count();
        //分页设置
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        //设置分页参数
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        //获取当前页数据
        $data = $this->model->where($where)->page($pagenum . ',' . $this->Page_Size)->order($order)->select();
        //分页跳转的时候保证查询条件
        foreach ($where as $key => $val) {
            $page->parameter[$key] = urlencode($val);
        }
        //分页显示输出
        $pageinfo["page"] = $page->show('sellercenter');
        //处理显示数据
        $this->_special($data);
        //输出记录总数
        $pageinfo['count'] = $count;
        $this->assign('lists', $data);
        $this->assign('pageinfo', $pageinfo);
        return;
    }
}
