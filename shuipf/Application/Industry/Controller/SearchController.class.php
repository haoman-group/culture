<?php

namespace Industry\Controller;
use Admin\Service\User;
use Common\Controller\Base;
use Think\Controller;
class SearchController extends IndustryBaseController {
     protected $Page_Size = 20;
	public function index(){
			
			$data =$_POST;
			// var_dump($data);
			
				if($data['searchtype']==1){
					if($data['parent_catid'] !='' && $data['cid'] =='' ){
                        $where['art_cid']=$data['parent_catid'];
					}elseif($data['parent_catid'] =='' && $data['cid'] ==''){
                         unset($where['art_cid']);
					}else{
						 $where['art_cid']=$data['cid'];
					}

				}else{

					if($data['parent_catid'] !='' && $data['cid'] =='' ){
						//echo 123;
                        $where['art_cid']=$data['parent_catid'];
					}elseif($data['parent_catid'] =='' && $data['cid'] ==''){
						//echo 235;
                        unset($where['art_cid']);
					}else{
						//echo 456;
						 $where['art_cid']=$data['cid'];
					}
					if(empty($data['area'])){
						//echo 459;
                      unset($where['areaid']);
					}else{
						
						$where['areaid']=$data['area'];
					}
					if(empty($data['select_date'])){
						unset($where['select_date']);

					}elseif($data['select_date'] ==1){
						$start_time=time()-7*24*2600;
						$endtime=time();
						$where['inputtime']=array('between',array($start_time,$endtime));

					}elseif($data['select_date'] ==2){
                        $start_time=time()-30*24*2600;
						$endtime=time();
						$where['inputtime']=array('between',array($start_time,$endtime));
					}elseif($data['select_date'] ==3){
                        $start_time=time()-365*24*2600;
						$endtime=time();
						$where['inputtime']=array('between',array($start_time,$endtime));
					}
				}
				// var_dump($where);exit;
     			
			    if(!empty($data['title'])){
                      $name = trim($data['title']);//去除两端空格
				      $name = htmlspecialchars($data['title']);//把html标签转为实体
				      $where['publish_name'] = array('like','%'.$name.'%');
				}
			  
				$catname=D('Admin/ArtCategory')->where(array('cid'=>$where['art_cid']))->getField('name');
				if(empty($catname)){
                   $catname="全部";
				}
// //				$where = array();
                //var_dump($where);
				 $count =D("Admin/PolicyCulture")->where($where)->count();
                 $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
                 $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
                 $data = D("Admin/PolicyCulture")->where($where)->page($pagenum . ',' . $this->Page_Size)->order("id desc")->select();
				// var_dump( $data);exit;
			    // echo D("Admin/PolicyCulture")->getLastsql();exit;
				 $categorylists=D('Admin/ArtCategory')->where(array('parent_cid'=>5))->select();
                   foreach ($categorylists as $key => $value) {
                   if($value['is_parent'] == 1){
                     $categorylists[$key]['grandson_list']=D('Admin/ArtCategory')->where(array('parent_cid'=>$value['cid']))->select();
                     }
                     }
               
                $pageinfo["page"] = $page->show('sellercenter');
                $pageinfo['count'] = $count;
				$this->assign('catname',$catname);
				$this->assign('categoryinfo',$data);
				$this->assign('categorylists',$categorylists);
                $pageinfo["page"] = $page->show('sellercenter');
                $pageinfo['count'] = $count;
				 $this->assign(compact('data','active_type','pageinfo'));
				$this->display();
		}

		public function getallchildlist($cid){
    //     $cid=I("cid");
      // var_dump($cid);
        $data['parent_item']=M('Categorymore')->where(array('catid'=> $cid,'ismenu'=>'1'))->find();
                         //echo M('Categorymore')->getLastsql();
            $data['child_list']=M('Categorymore')->where(array('parentid' => $data['parent_item']['catid'],'ismenu'=>'1'))->select();
       
        foreach( $data['child_list'] as $k=>$v){
            if($v['child']==1){
               $v['arrchildid']=explode(",",$v['arrchildid']);
               $v['arrchildid']=array_splice($v['arrchildid'],1);
              
               foreach($v['arrchildid'] as $a=>$b){
                  $data['child_list'][$k]['grandson_list'][$a]=M('Categorymore')->where(array('catid' => $b,'ismenu'=>'1'))->find();

               }
            }

        }
        return $data['child_list'];
       
    }
}