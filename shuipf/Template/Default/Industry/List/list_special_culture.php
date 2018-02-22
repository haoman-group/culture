<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/policy.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/page_common.css" />
    <style>

    </style>
</block>

<block name="content">
    <div id="nav">
        <div class="container">
            <ul>
                <li><a href="{:U('Industry/Index/index')}" class="home_src">首页</a></li>
                <li><span>></span></li>
                <li><a href="{:U('Industry/Index/lists',array('catid'=>1))}">资讯中心</a></li>
                <li><span>></span></li>
                <li><a href="{:U('Industry/Index/lists',array('catid'=>11))}">文化资源</a></li>
                <li><span>></span></li>

                <li><a href="#" style="color: #2058c2;">{$catname}</a></li>
            </ul>

        </div>
    </div>
    <div id="content">
        <div class="container industry clearfix">
            <div class="industry-left">
                <h2><img  src="{$config_siteurl}statics/ci/images/news/resources.jpg "  alt="个人中心" style="top: 0;left: 0;width: 238px;" /></h2>
                <ul>
                    <?php
                    function find_parentid($catid,$parentid){
                        static $arr = array();
                        if($parentid!= 0){
                            $data = D('category')->where(array('catid'=> $parentid ))->find();
                            $arr[] = $data['catid'];
                            find_parentid($data['catid'],$data['parentid']);
                        }
                        return $arr;

                    }
                    $parent_catid = find_parentid($catid,$parentid);

                    

                    ?>


                    <content action="category" catid="$parent_catid[1]" order="listorder ASC" >
                        
                         <volist name="data" id="v1">
                         <eq name='v1[catid]' value="$parent_catid[0]">
                            <li <eq name="v1[catid]" value="$catid">style="background:#f1f1f1"</eq>><a href="<eq name='v1[child]' value='1'>javascript:<else/>.{$v1.url}</eq>" style="color: #bd1514;"><span>●</span>{$v1.catname}</a></li>
                            <eq name="v1[child]" value="1">
                                <content action="category" catid="$v1[catid]" order="listorder ASC" >
                                    <volist name="data" id="v2">
                                        <li <eq name="v2[catid]" value="$catid">style="background:#f1f1f1"</eq>><a href="<eq name='v2[child]' value='1'>javascript:<else/>.{$v2.url}</eq>"><span>&nbsp;&nbsp;&nbsp;&nbsp;●</span>{$v2.catname}</a></li>
                                        <eq name="v2[child]" value="1">
                                            <content action="category" catid="$v2[catid]" order="listorder ASC" >
                                                <volist name="data" id="v3">
                                                    <li <eq name="v3[catid]" value="$catid">style="background:#f1f1f1"</eq>><a href="<eq name='v3[child]' value='1'>javascript:<else/>.{$v3.url}</eq>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$v3.catname}</a></li>
                                                </volist>
                                            </content>
                                        </eq>
                                    </volist>
                                </content>
                            </eq>
                            </eq>
                        </volist>
                    </content>


                </ul>
            </div>

            <div class="industry-right">
                <h5><span>{$catname}</span></h5>
                <ul class="list">

                    <content action = "lists" catid = "$catid" order = "id DESC" num= "15" page = "$page">

                        <volist name="data" id="vo">
                            <li>{$i}<a href=".{$vo.url}">{$vo.title|str_cut=###,40}</a><span>{$vo.inputtime|date="Y-m-d",###}</span></li>
                        </volist>

                    </content>

                </ul>
                <div class="page_div">
                    {$pages}
                </div>
            </div>
        </div>
    </div>

</block>