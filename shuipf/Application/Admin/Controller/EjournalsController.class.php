<?php

// +----------------------------------------------------------------------
// | 电子期刊 控制器
// +----------------------------------------------------------------------
// | 创建时间: 2017-07-20 09:27:11
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Common\Controller\AdminBase;
use Admin\Service\User;

class EjournalsController extends AdminBase {
    private $model = NULL;
    protected $Page_Size=20;
    protected function _initialize() {
        parent::_initialize();
        $this->model = D('Admin/Ejournals');
        $this->assign('type_array',$this->model->getTypeArray());
        $this->assign('status_array',$this->model->getStatusArray());
    }
    //首页列表
    public function index(){
        $pagenum = I('get.page','1','');
		$count = $this->model->where($where)->count();
		$page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
		$data = $this->model->where($where)->page($pagenum.','.$this->Page_Size)->order('id desc')->select();
		$pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
		$this->assign('data',$data);
        $this->assign('pageinfo',$pageinfo);
		$this->display();
    }
    //新增
    public function add(){
        if(IS_POST){
            $data = I('post.',null);
            if($this->model->create($data)){
                $id = $this->model->add();
                if($id){
                    $this->redirect('edit',['id'=>$id]);
                }else{
                    $this->error('添加错误:'.$this->model->getError());
                }
            }else{
                $this->error('添加数据错误:'.$this->model->getError());
            }
        }else{
            $this->display();
        }
    }
    //修改
    public function edit(){
        $id = I('request.id',null);
        if($id){
            if(IS_POST){
                $data = I('post.', null);
                if($this->model->create($data)){
                    $id = $this->model->save();
                    if($id){
                        $this->success('更新成功!',U('index'));
                    }else{
                        $this->error('更新错误:'.$this->model->getError());
                    }
                }else{
                    $this->error('更新数据错误:'.$this->model->getError());
                }
            }else{
                $data = $this->model->where(['id'=>$id])->find();
                $data['content'] = unserialize($data['content']);
                $this->assign('data',$data);
                $this->display();
            }
        }else{
            $this->error('为指定内容ID');
        }
    }
    public function convert() {
        if (IS_GET) {
            $this->display();
        } else {
            ini_set('max_execution_time','120');
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('pdf');// 设置附件上传类型
            $upload->rootPath  =     './d/pdf/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录
            // 上传文件 
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->ajaxReturn(array('status'=>-1,'msg'=>$upload->getError()));
            }else{// 上传成功

                // $info文件信息数据内容如下：
                // key	附件上传的表单名称
                // savepath	上传文件的保存路径
                // name	上传文件的原始名称
                // savename	上传文件的保存名称
                // size	上传文件的大小
                // type	上传文件的MIME类型
                // ext	上传文件的后缀类型
                // md5	上传文件的md5哈希验证字符串 仅当hash设置开启后有效
                // sha1	上传文件的sha1哈希验证字符串 仅当hash设置开启后有效

                // 转化pdf为png

                $pngPath = $upload->rootPath.$info["pdf"]["savepath"]."/images/".$info["pdf"]["savename"];
                if (!is_dir($pngPath)) {
                    mkdir($pngPath, 0777, true);
                }
                $pngList = $this->pdf2png($upload->rootPath.$info["pdf"]["savepath"].$info["pdf"]["savename"], $pngPath);
                // ----------------------测试代码----------------------
                // $pngList['status']=0;
                // $pngList['msg'] =['/d/file/content/2017/08/5987e5435ecc6.jpg','/d/file/content/2017/08/5987e5435ecc6.jpg','/d/file/content/2017/08/5987e5435ecc6.jpg','/d/file/content/2017/08/5987e5435ecc6.jpg'];
                // ----------------------测试代码----------------------
                if (isset($pngList["status"]) && $pngList["status"] == 0) {
                    // foreach ($pngList['msg'] as $pngFile) {
                    //     $filehtml = $filehtml.$pngFile;
                    // }
                    $this->ajaxReturn(array('status'=>1,'data'=>$pngList['msg']),'JSON');exit;
                }else{
                    $this->ajaxReturn(array('status'=>-1,'data'=>$pngList['msg']),'JSON');exit;
                }
            }
            
        }
    }

    /**
     * * PDF2PNG
     * * @param $pdf  待处理的PDF文件
     * * @param $path 待保存的图片路径
     * * @param $page 待导出的页面 -1为全部 0为第一页 1为第二页
     * * @return      保存好的图片路径和文件名
     * */
    private function pdf2png($pdf,$path,$page=-1)
    {
        if(!extension_loaded('imagick'))
        {
            return array("status"=>1, "msg"=> "imagick plugin does not exist");
        }
        if(!file_exists($pdf))
        {
            return array("status"=>1, "msg"=> "PDF file does not exist");
        }
        try {
            $im = new \Imagick();
            $im->setResolution(120,120);
            $im->setCompressionQuality(100);

            if($page==-1){
                // var_dump(\Imagick::queryformats());
                $im->readImage(SITE_PATH.$pdf);
            }
            else{
                $im->readImage(SITE_PATH.$pdf."[".$page."]");
            }
            $page_num = 1;
            foreach ($im as $Key => $Var)
            {
                $Var->setImageFormat('png');
                $filename = $path."/".$Key.'_'.$page_num.'.png';
                $page_num += 1;
                if($Var->writeImage($filename) == true)
                {
                    $Return[] = $filename;
                }
            }
        } catch (Exception $e) {
            return array("status"=>1, "msg"=> "Message:".$e->getMessage());
        }
        return array("status"=> 0, "msg"=> $Return);
    }

    //删除
    public function delete(){
        $where['id'] = I('id');
        $this->model->where($where)->delete();
        $this->success('删除成功!', U('index'));
    }
}