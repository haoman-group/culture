<?php
//艺术节H5 后台
namespace Festival\Controller;

class WapController extends BaseController {
    protected function _initialize(){
        parent::_initialize();
        $this->view->theme('Wap');
        $this->model = D('Admin/Festival');
        $this->category = $this->model->getCategory();
        // echo $this->view->parseTemplate();
    }
    //首页
    public function index(){
        //精品推荐
        $position[0] = $this->model->where(array('position'=>'yes','categorytype'=>['between','200,299'],'isdelete'=>0,'title'=>['neq',''],'content'=>['neq',''],'image'=>['neq','']))->order('updatetime desc')->find();
        $position[1] = $this->model->where(array('position'=>'yes','categorytype'=>['between','10,19'],'isdelete'=>0,'title'=>['neq',''],'content'=>['neq',''],'image'=>['neq','']))->order('updatetime desc')->find();
        $position[2] = $this->model->where(array('position'=>'yes','categorytype'=>['between','20,29'],'isdelete'=>0,'title'=>['neq',''],'content'=>['neq',''],'image'=>['neq','']))->order('updatetime desc')->find();
        $position[3] = $this->model->where(array('position'=>'yes','categorytype'=>['between','20,29'],'isdelete'=>0,'title'=>['neq',''],'content'=>['neq',''],'image'=>['neq','']))->order('id desc')->find();
        //媒体报道
        $media = $this->model->getData('1',5);
        //展览类活动
        $exhibition = $this->model->where(array('categorytype'=>['between','200,299'],'isdelete'=>0,'title'=>['neq','']))->limit(4)->order('id desc')->select();
        //带图片的展览类活动
        // $exhibition_img = $this->model->where(['categorytype'=>['between','10,19'],'isdelete'=>0,'title'=>['neq',''],'image'=>['NEQ','']])->order('id desc')->find();
        //主题性活动
        // $topic = $this->model->getData('3');
        //表演类活动
        foreach($this->category as $key=>$cate){
            if((int)$key > 10 && (int)$key <20){
                $perform[$cate] = $this->model->getData($key,4);
            }
        }
        //获取公告
        $notic = $this->model->where(['categorytype'=>'301','isdelete'=>0])->order('id')->find();
        //直播列表
        $live = $this->model->getLiveData(3);
        // 演出论坛
        $interpret = D('Admin/Interpret')->where(array('isdelete'=>0))->limit(8)->order('id desc')->select();
        // 演出活动新闻简报
        $briefing= D('Admin/Briefing')->where(array('isdelete'=>0))->limit(8)->order('id desc')->select();
        
        $this->view->assign(compact('position','media','exhibition','topic','perform','exhibition_img','notic','live','interpret','briefing'));
        $this->view->display();
    }
    //列表页
    public function more(){
        $cid = I('get.categorytype',null);
        $type=I('request.type',null);
        if(!empty($cid)){
            $data = $this->model->where(['categorytype'=>$cid,'isdelete'=>0])->order('id')->select();
            $categoryname = $this->model->getCategoryNameByKey($cid);
        }else{
            if($type){
                if($type == 'Briefing'){
                    $data = D('Admin/Briefing')->where(array('isdelete'=>0))->order('id')->select();
                    $categoryname = '演出活动新闻简报';
                }else if($type=='Interpret'){
                    //获取详细数据
                    $data = D('Admin/Interpret')->where(array('isdelete'=>0))->order('id')->select();
                    $categoryname = '演出论坛';
                }
            }else{
                $this->error('未指定内容！');
            }
        }
        $this->assign(compact('data','categoryname','type'));
        $this->view->display();
    }
    //展览类活动 列表
    public function exhibition(){
        //其他表演类视频资料
        foreach($this->category[2] as $key=>$cate){
            if((int)$key > 200 && (int)$key <299){
                $tmp['key'] =$key;
                $tmp['name'] =$cate;
                $tmp['data'] = $this->model->getData($key,5);
                $exhibition[] =$tmp;
            }
        }
        $this->assign(compact('exhibition'));
        $this->view->display();
        // $data = $this->model->where(['categorytype'=>2])->limit(10)->select();
        // $this->assign(compact('data'));
        // $this->view->display();
    }
    //主题性活动 列表
    public function themeact(){
        //其他表演类视频资料
        foreach($this->category as $key=>$cate){
            if((int)$key > 20 && (int)$key <29){
                $tmp['key'] =$key;
                $tmp['name'] =$cate;
                $tmp['data'] = $this->model->getData($key,5);
                $theme[] = $tmp;
            }
        }
        $this->assign(compact('top','theme'));
        $this->view->display();
    }
    //表演类活动 列表
    public function perform(){
        //顶部内容，有GET参数则获取，没有GET参数获取最新一条
        $id = I('request.id',null);
        if($id){
            $top = $this->model->where(['id'=>$id])->find();
        }else{
            $top = $this->model->where(['categorytype'=>['between','10,19']])->order('id desc')->find();
        }
        //其他表演类视频资料
        foreach($this->category as $key=>$cate){
            if((int)$key > 10 && (int)$key <20){
                $tmp['key'] =$key;
                $tmp['name'] =$cate;
                $tmp['data'] = $this->model->getData($key,5);
                $perform[] = $tmp;
            }
        }
        $this->assign(compact('top','perform'));
        $this->view->display();
    }
    //直播 列表
    public function live(){
        //顶部内容，有GET参数则获取，没有GET参数获取最新一条
        $id = I('request.id',null);
        if($id){
            $top = $this->model->where(['id'=>$id])->find();
            if(!empty($top['url']) && empty($top['voide'])){
                header('Location: ' . $top['url']);
            }
        }else{
            $top = $this->model->where(['categorytype'=>'401'])->order('id desc')->find();
        }
        //其他表演类视频资料
        $live = $this->model->where(['categorytype'=>'401'])->order('id desc')->select();
        $this->assign(compact('top','live'));
        $this->view->display();
    }
    //详情页
    public function detail(){
        $id = I('request.id',null);
        $type = I('request.type',null);
        if($type){
            if($type == 'Briefing'){
                $data = D('Admin/Briefing')->where(['id'=>$id])->find();
                $data['categoryname'] = '演出活动新闻简报';
                //获取推荐数据
                $position = D('Admin/Briefing')->where(['isdelete'=>0,'id'=>['NEQ',$data['id']]])->limit(3)->select();    
            }
            else if($type=='Interpret'){
                //获取详细数据
                $data = D('Admin/Interpret')->where(['id'=>$id])->find();
                $data['categoryname'] = '演出论坛';
                //获取推荐数据
                $position = D('Admin/Interpret')->where(['isdelete'=>0,'id'=>['NEQ',$data['id']]])->limit(3)->select();
            }
        }else{
            //浏览量自增
            $this->model->hits($id);
            //获取详细数据
            $data = $this->model->where(['id'=>$id])->find();
            $data['categoryname'] = $this->category[$data['categorytype']];
            //获取推荐数据
            $position = $this->model->where(['categorytype'=>$data['categorytype'],'id'=>['NEQ',$data['id']]])->limit(3)->select();
        }
        $this->assign(compact('data','position','type'));
        $this->view->display();
    }
}