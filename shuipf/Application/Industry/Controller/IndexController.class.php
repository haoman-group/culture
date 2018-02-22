<?php

namespace Industry\Controller;
use Admin\Service\User;
use Common\Controller\Base;
use Think\Controller;
use Content\Model\ContentModel;

class IndexController extends IndustryBaseController {
    protected $page_size = 20;  
    public function index(){
    	 $page = isset($_GET[C("VAR_PAGE")]) ? $_GET[C("VAR_PAGE")] : 1;
        $page = max($page, 1);
        //模板处理
        $tp = explode(".", self::$Cache['Config']['indextp']);
        $template = parseTemplateFile("Index/{$tp[0]}");
        //var_dump($template);exit;
        $SEO = seo('', '', self::$Cache['Config']['siteinfo'], self::$Cache['Config']['sitekeywords']);
        //生成路径
        $urls = $this->Url->index($page);
        $GLOBALS['URLRULE'] = $urls['page'];
        $category=M('Categorymore')->where(array('parentid'=>12))->select();
        //var_dump($category);exit;
        //seo分配到模板
        $this->assign("SEO", $SEO);
        $this->assign('category',$category);
        $images=array('0'=>"{$config_siteurl}/statics/img/1111.jpg",'1'=>"{$config_siteurl}/statics/img/22222.jpg",'2'=>"{$config_siteurl}/statics/img/333.jpg");
        //把分页分配到模板
        $this->assign('images',$images);
        $this->assign(C("VAR_PAGE"), $page);
        $this->display();
    }

 public function lists()
    {
        
        //栏目ID
        $catid = I('get.catid', 0, 'intval');
        //echo  $catid;exit;
        $categorylists=$this->getallchildlist("12");
        //分页
        $page = isset($_GET[C("VAR_PAGE")]) ? $_GET[C("VAR_PAGE")] : 1;
         
       //var_dump($page);
        //获取栏目数据
        $category = getCategory($catid);
        //var_dump($category);exit;
        if (empty($category)) {
            send_http_status(404);
            exit;
        }
        //栏目扩展配置信息
        $setting = $category['setting'];

        //检查是否禁止访问动态页
        if ($setting['listoffmoving']) {
            send_http_status(404);
            exit;
        }
        //生成静态分页数
        $repagenum = (int)$setting['repagenum'];
        if ($repagenum && !$GLOBALS['dynamicRules']) {
            //设置动态访问规则给page分页使用
            $GLOBALS['Rule_Static_Size'] = $repagenum;
            $GLOBALS['dynamicRules'] = CONFIG_SITEURL_MODEL . "/index.php?g=industry&a=lists&catid={$catid}&page=*";
        }
        //父目录
        $parentdir = $category['parentdir'];
        //目录
        $catdir = $category['catdir'];
        //生成路径
        $category_url = $this->Url->category_url($catid, $page);
       // var_dump($category_url);exit;
        $category_url['page']['list']="./index.php?g=industry&a=lists&catid={$catid}&page=*";
         $category_url['page']['index']="./index.php?g=industry&a=lists&catid={$catid}";
        // echo $this->Url->getLastsql();exit;
        //取得URL规则
        $urls = $category_url['page'];
        //生成类型为0的栏目
        if ($category['type'] == 0) {
            //栏目首页模板
            $template = $setting['category_template'] ? $setting['category_template'] : 'category';
            //栏目列表页模板
            $template_list = $setting['list_template'] ? $setting['list_template'] : 'list';
            //判断使用模板类型，如果有子栏目使用频道页模板，终极栏目使用的是列表模板
            $template = $category['child'] ? "Category/{$template}" : "List/{$template_list}";
            //去除后缀开始
            $tpar = explode(".", $template, 2);
            //去除完后缀的模板
            $template = $tpar[0];
            unset($tpar);
            $GLOBALS['URLRULE'] = $urls;
        } else if ($category['type'] == 1) {//单页
            $db = D('Content/Page');
            $template = $setting['page_template'] ? $setting['page_template'] : 'page';
            //判断使用模板类型，如果有子栏目使用频道页模板，终极栏目使用的是列表模板
            $template = "Page/{$template}";
            //去除后缀开始
            $tpar = explode(".", $template, 2);
            //去除完后缀的模板
            $template = $tpar[0];
            unset($tpar);
            $GLOBALS['URLRULE'] = $urls;
            $info = $db->getPage($catid);
            $this->assign($category['setting']['extend']);
            $this->assign($info);
        }
        //echo 123;exit;
        //var_dump($pages);exit;
        //把分页分配到模板
        $this->assign(C("VAR_PAGE"), $page);
        //分配变量到模板
        //var_dump($categorylists);exit; 
        $this->assign($category);
        $this->assign('categorylists',$categorylists);
        //seo分配到模板
        // var_dump($template);
        $seo = seo($catid, $setting['meta_title'], $setting['meta_description'], $setting['meta_keywords']);
        $this->assign("SEO", $seo);
        $this->display($template);
    }


public function shows()
    {
       
        $catid = I('get.catid', 0, 'intval');
        $id = I('get.id', 0, 'intval');
        $page = intval($_GET[C("VAR_PAGE")]);
        $page = max($page, 1);
        //获取当前栏目数据
        $category = getCategory($catid);
        //var_dump($category);exit; 
        if (empty($category)) {
            send_http_status(404);
            exit;
        }
        //反序列化栏目配置
        $category['setting'] = $category['setting'];
        //检查是否禁止访问动态页
        if ($category['setting']['showoffmoving']) {
            send_http_status(404);
            exit;
        }
        //模型ID
        $modelid = $category['modelid'];
        $data = ContentModel::getInstance($modelid)->relation(true)->where(array("id" => $id, 'status' => 99))->find();
        if (empty($data)) {
            send_http_status(404);
            exit;
        }
        ContentModel::getInstance($modelid)->dataMerger($data);
        //分页方式
        if (isset($data['paginationtype'])) {
            //分页方式 
            $paginationtype = $data['paginationtype'];
            //自动分页字符数
            $maxcharperpage = (int)$data['maxcharperpage'];
        } else {
            //默认不分页
            $paginationtype = 0;
        }
        //tag
        tag('html_shwo_buildhtml', $data);
        $content_output = new \content_output($modelid);
        //获取字段类型处理以后的数据
        $output_data = $content_output->get($data);
        $output_data['id'] = $id;
        $output_data['title'] = strip_tags($output_data['title']);
        //SEO
        $seo_keywords = '';
        if (!empty($output_data['keywords'])) {
            $seo_keywords = implode(',', $output_data['keywords']);
        }
        $seo = seo($catid, $output_data['title'], $output_data['description'], $seo_keywords);

        //内容页模板
        $template = $output_data['template'] ? $output_data['template'] : $category['setting']['show_template'];
        //去除模板文件后缀
        $newstempid = explode(".", $template);
        $template = $newstempid[0];
        
        unset($newstempid);
        //分页处理
        $pages = $titles = '';
        //分配解析后的文章数据到模板

        unset($output_data['username']);
        $this->assign($output_data);
        //seo分配到模板
        $this->assign("SEO", $seo);
        //栏目ID
        $this->assign("catid", $catid);
        //分页生成处理
        //分页方式 0不分页 1自动分页 2手动分页
        if ($data['paginationtype'] > 0) {
            $urlrules = $this->Url->show($data, $page);
            //手动分页
            $CONTENT_POS = strpos($output_data['content'], '[page]');
            if ($CONTENT_POS !== false) {
                $contents = array_filter(explode('[page]', $output_data['content']));
                $pagenumber = count($contents);
                $pages = page($pagenumber, 1, $page, array(
                    'isrule' => true,
                    'rule' => $urlrules['page'],
                ))->show("default");
                //判断[page]出现的位置是否在第一位 
                if ($CONTENT_POS < 7) {
                    $content = $contents[$page];
                } else {
                    $content = $contents[$page - 1];
                }
                //分页
                
                $this->assign("pages", $pages);
                $this->assign("content", $content);
            }
        } else {
            $this->assign("content", $output_data['content']);
        }
        //var_dump($template);exit;
        $this->display("Show/{$template}");
    }

    //tags标签
    public function tags()
    {
        $tagid = I('get.tagid', 0, 'intval');
        $tag = I('get.tag', '', '');
        $where = array();
        if (!empty($tagid)) {
            $where['tagid'] = $tagid;
        } else if (!empty($tag)) {
            $where['tag'] = $tag;
        }
        //如果条件为空，则显示标签首页
        if (empty($where)) {
            $key = 'Tags_Index_index';
            $dataCache = S($key);
            if (empty($dataCache)) {
                $data = M('Tags')->order(array('hits' => 'DESC'))->limit(100)->select();
                if (!empty($data)) {
                    //查询每个tag最新的一条数据
                    $tagsContent = M('TagsContent');
                    foreach ($data as $k => $r) {
                        $url = $this->Url->tags($r);
                        $data[$k]['url'] = $url['url'];
                        $data[$k]['info'] = $tagsContent->where(array('tag' => $r['tag']))->order(array('updatetime' => 'DESC'))->find();
                    }
                    //进行缓存
                    S($key, $data, 3600);
                }
            } else {
                $data = $dataCache;
            }
            $SEO = seo('', '标签');
            //seo分配到模板
            $this->assign("SEO", $SEO);
            $this->assign('list', $data);
            $this->display("Tags/index");
            return true;
        }
        //分页号
        $page = isset($_GET[C("VAR_PAGE")]) ? $_GET[C("VAR_PAGE")] : 1;
        //根据条件获取tag信息
        $info = M('Tags')->where($where)->find();
        if (empty($info)) {
            $this->error('抱歉，沒有找到您需要的内容！');
        }
        //访问数+1
        M('Tags')->where($where)->setInc("hits");
        //更新最后访问时间
        M('Tags')->where($where)->save(array("lasthittime" => time()));
        $this->assign($data);
        $Urlrules = cache('Urlrules');
        //取得tag分页规则
        $urlrules = $Urlrules[self::$Cache['Config']['tagurl']];
        if (empty($urlrules)) {
            $urlrules = 'index.php?g=Tags&tagid={$tagid}|index.php?g=Tags&tagid={$tagid}&page={$page}';
        } else {
            $urlrules = $urlrules['urlrule'];
        }
        $GLOBALS['URLRULE'] = str_replace('|', '~', str_replace(array('{$tag}', '{$tagid}'), array($info['tag'], $info['tagid']), $urlrules));
        $SEO = seo();
        //seo分配到模板
        $this->assign("SEO", $SEO);
        //把分页分配到模板
        $this->assign(C("VAR_PAGE"), $page);
        $this->assign($info);
        $this->display("Tags/tag");
    }

    public function member_index()
    {
        $this->display('Member/Index/index');
    }

//获取分类

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



    public function policylist(){
        $categorylists=D('Admin/ArtCategory')->where(array('parent_cid'=>5))->select();
        foreach ($categorylists as $key => $value) {
         if($value['is_parent'] == 1){
            $categorylists[$key]['grandson_list']=D('Admin/ArtCategory')->where(array('parent_cid'=>$value['cid']))->select();
         }
        }
        if(empty(I('cid'))){
           $where['art_cid'] =347 ;
        }else{
         $where['art_cid'] = I('cid');
        }
        $pagenum = I('get.page',1);
        $where['isdelete']=0;
       // var_dump($where);
        $count = D("Admin/PolicyCulture")->scope('normal')->where($where)->count();
        $page = new \Libs\Util\Page($count, 12, $pagenum);
        //设置分页参数
        $page->SetPager('baseservices', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        //获取当前页数据
        $categorydata =D("Admin/PolicyCulture")->scope('normal')->page($pagenum . ',12')->where($where)->order('id desc')->select();
        //var_dump($data);exit;
        $categoryname=D('Admin/ArtCategory')->where(array('cid'=>$where['art_cid']))->getField('name');
        //var_dump($categoryname);
        //echo D('Admin/Industry')->getLastsql();
        //分页跳转的时候保证查询条件
        //分页显示输出
        $pageinfo["page"] = $page->show('landmark');
        $pageinfo["data"] = $data;
        //输出
        //var_dump($categorylists);exit;
        $this->assign('categorydata',$categorydata);
        $this->assign('categoryname',$categoryname);
       // $this->assign('pageinfo',$pageinfo);
        $this->assign(compact('data','active_type','pageinfo'));
        $this->assign('categorylists',$categorylists);
        $this->display();

    }


    public function policyshow(){
        $id=I('id');
        $data=D('Admin/PolicyCulture')->where(array('id'=>$id))->find();
        //var_dump($data);exit;
        $about=D('Admin/PolicyCulture')->where(array('id'=>array('neq',$id),'art_cid'=>$data['art_cid'],'isdelete'=>0,'auditstatus'=>35))->limit(10)->order('id desc')->select();
  
       //echo D('Admin/PolicyCulture')->getLastsql();
        $category=D('Admin/ArtCategory')->where(array('cid'=>$data['art_cid']))->find();
        $this->assign('data',$data);
        $this->assign('category',$category);
        $this->assign('about',$about);
        $this->display();
    }

    public function search(){
        $pagenum = I('get.page', '1', '');
        $keywords=I('keywords',null);
        if($keywords){
         $where['publish_name']=array('like','%'.$keywords.'%');
        }
       
        $where['isdelete']=0;
        $count = D('Admin/PolicyCulture')->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->page_size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/PolicyCulture')->where($where)->page($pagenum . ',' . $this->page_size)->order('id desc')->select();
        
      // var_dump($data);exit;
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();
    }


    // public function searchshow(){
    //     $id=I('id');
    //     $data=M('News')->where(array('id'=>$id))->find();
    //     $this->assign('data', $data);
    //     $this->display();
    // }
}