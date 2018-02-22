<?php
namespace Festival\Controller;
// 表演类活动
class StageshowController extends BaseController {
       protected $Page_Size =8;
       protected $Page_size =8;
    protected function _initialize(){
        parent::_initialize();
    }
    public function index(){
        $cid=I('cid',null);
        $address=I('address',null);
        if($address){
            switch ($address) {
            case 'sx':
               $where['site']="山西大剧院";
                break;
            case 'qn':
               $where['site']="青年宫演艺中心";
                break;    
            case 'xg':
               $where['site']="星光剧场";
                break;
            case 'ty':
               $where['site']="太原工人文化宫";
                break;
            case 'jy':
               $where['site']="山西大剧院小剧场";
                break;        
            default:
                # code...
                break;
        }
        }
        if($cid){
        $data=D('Admin/Festival')->where(array('categorytype'=>$cid,'isdelete'=>0,'title'=>array('neq','')))->limit(4)->order('id desc')->select();
        $num=D('Admin/Festival')->where(array('categorytype'=>$cid,'isdelete'=>0,'title'=>array('neq','')))->count();
       
        
        $category=array();
        switch ($cid) {
            case '11':
                $category['name']="优秀剧目汇演";
                $category['englishname']="Excellent dramas display";
                break;
            case '12':
                $category['name']="音乐舞蹈曲艺杂技大赛";
                $category['englishname']="Acrobatics Competition";
                break;    
            case '13':
                $category['name']="喝彩山西-山西籍文艺名家演唱会";
                $category['englishname']="Acclaim Shanxi";
                break;
            case '14':
                $category['name']="韵味山西'梅花奖'";
                $category['englishname']="Shanxi plum blossom Award";
                break;
            case '15':
                $category['name']="文艺精品惠民演出";
                $category['englishname']="Huimin performances";
                break;        
            default:
                # code...
                break;
                
        }
           $where['categorytype']=I('cid');
        }else{
            $rand=array(11,12,13,14,15);
            $where['categorytype']=array('in',$rand);
            $where['sidelete']=0;
            $data=D('Admin/Festival')->where($where)->limit(4)->order('id desc')->select();
            $num=D('Admin/Festival')->where($where)->count();
        }
        
        $category=array();
        $category['name']="全部";
        $category['englishname']="All dramas display";
        $pagenum = I('get.page', '1', '');
        $where['isdelete'] = 0; 
        $count =D('Admin/Festival')->where($where)->order('id desc')->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $voide = D('Admin/Festival')->where($where)->page($pagenum . ',' . $this->Page_Size)->order('id desc')->select();
        //echo D('Admin/Festival')->getLastsql();exit;
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
         //var_dump($data);exit;
        $this->assign('voide',$voide);
        $this->assign('num',$num);
        $this->assign('category',$category);
        $this->display();
    }
    public function show(){
        $pagenum = I('get.page', '1', '');
        $id=I('id');
        $data=D('Admin/Festival')->where(array('id'=>$id))->find();
        $data['images']=unserialize($data['images']);
        //var_dump($data);exit;
        $voide=D('Admin/Festival')->where(array('title'=>array('like','%'.$data['title'].'%'),'isdelete'=>0,'categorytype'=>array('in',array(11,12,13,14,15),'title'=>array('neq',''))))->limit(6)->order('id desc')->select();
       // echo D('Admin/Festival')->getLastsql();exit;
         $count=D('Admin/Festival')->where(array('title'=>array('like','%'.$data['title'].'%'),'isdelete'=>0,'categorytype'=>array('in',array(11,12,13,14,15))))->count();
        //var_dump($count);
        $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $message = D('Admin/Festival')->where(array('title'=>array('like','%'.$data['title'].'%'),'isdelete'=>0,'categorytype'=>array(in,array(11,12,13,14,15))))->page($pagenum . ',' . $this->Page_size)->order('id desc')->select();
        //$pageinfo["page"] = $page->show('sellercenter');
        //$pageinfo['count'] = $count;
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->assign('count',$count);
        $this->assign('voide',$voide);
        //$this->assign('message', $message);
        $this->display();
    }

}