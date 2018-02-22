<?php

// +----------------------------------------------------------------------
// | ShuipFCMS
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Api\Controller;

class NewsController extends ApiBaseController {
    protected function _initialize(){
        parent::_initialize();
        $this->model =  M('Newest');
    }

    /**
     * 获取新闻列表
     *
     * @return void
     */
    public function index(){
        $where = [];
        $limit = I('get.limit',10);
        if(I('get.image',false)){
            $where['image'] = ['NEQ',''];
        }
        $data = $this->model->where($where)->limit($limit)->order('id desc')->select();
        foreach($data as $i=>$t){
            $data[$i]['category'] = D('Admin/ArtCategory')->where(array('cid'=>$t['news_id']))->getField('name');
            $data[$i]['cover'] = $this->getCoverFormImage($t['image']);
        }
        $this->ajaxReturn(array('status'=>0,'msg'=>"修改成功！",'data'=>$data));
    }
    /**
     * 新闻详情页内容
     *
     * @param [type] $id
     * @return void
     */
    public function detail($id){

    }
    /**
     * 新闻分类
     *
     * @return void
     */
    public function category(){

    }
    /**
     * 获取封面
     *
     * @param [type] $image_serialize
     * @return void
     */
    private function getCoverFormImage($image_serialize){
        if(empty($image_serialize)){
            return null;
        }
        $images = explode(",",$image_serialize);
        $cover = $images[0];//?$images[0]:$image_serialize;
        return (strpos($cover,'http')===0)?$cover:($this->get_current_url($cover));
    }
    /**
     * 获取当前服务器根地址
     *
     * @return void
     */
    private function get_current_url($path){
        $current_url='http://';
        if(isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']=='on'){
            $current_url='https://';
        }
        if($_SERVER['SERVER_PORT']!='80'){
            $current_url.=$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'];
        }else{
            $current_url.=$_SERVER['SERVER_NAME'];
        }
        return $current_url.$path;
    }
}
