<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">

    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>

</block>

<block name='content'>
    <div id="nav">
        <div class="container">
            <ul>
                <li><a href="{:U('Industry/Index/index')}" class="home_src" style="color:#900;">首页</a></li>
                <li><span>></span></li>
                <li><a href="{:U('Industry/index')}">产业项目</a></li>
                <li><span>></span></li>
                <li><a href="#" style="color: #900;">个人中心</a></li>
                <!-- <li><span>></span></li> -->
                <!-- <li><a href="#">国际邮快件综合服务平台</a></li> -->
            </ul>
        </div>
    </div>
    <div id="search">
        <div class="container clearfix">
            <p class="tips">欢迎关注山西文化产业微信公众号：2356982455</p>
            <form action="">
                <input type="text" placeholder="输入你要搜索的关键字" value="" id="b" />
                <input class="search_btn" type="button" value="搜索" onclick="text()" />
            </form>
        </div>
    </div>
    <div id="content">
        <div class="container clearfix">
            <div class="side-left" >
                <h2><img src="{$config_siteurl}statics/images/personCenter.png" alt="个人中心"></h2>
                <ul>
                    <li><a href="{:U('Industry/conpany_project')}">企业项目</a></li>
                    <li class="selected"><a href=".{:getCategory(43,'url')}">个人项目</a></li>
                </ul>
            </div>
            <div class="table-side-right">
                <div style="width:20%;padding:5px">


<!--                    <button onclick="location='{:U("Content/Industry/add_personal")}' ">新增项目</button>-->

                    <button><a href="{:U('Industry/add_personal')}" style="color: white">新增项目</a></button>

<!--                    <button onclick="location='{:U("Content/Industry/add_personal")}' ">新增项目</button>-->


                </div>
                <div style="width:100%">
                    <table>
                        <tr>
                            <th>项目名称</th>
                            <th>项目类别</th>
                            <th>发布时间</th>
                            <th>发布人</th>
                            <th>状态</th>
                        </tr>
                        <?php
	                    $obj = D("Content/IndustryIssue");
                        $data =$obj->where(array('status'=>1,'type'=>0))->order('id desc')->select();

//                     var_dump($data);



                        ?>
                        <foreach name="data" item="vo" orderBy="id ESC">
                            <tr>
                                <td><a href="{:U('Industry/Industry/detail_personal',array('id'=>$vo['id']))}">{$vo.pname|str_cut=###,15}</a></td>
                                <td>{$vo.pcategory}</td>
                                <td>{$vo.inputtime|date="Y-m-d",###}</td>
                                <td>{$vo.pleader}</td>
                                <td>已审核</td>
                                
                            </tr>
                        </foreach>

                    </table>
                </div>
            </div>
        </div>

</block>
<block name="after_scripts">
    <script type="text/javascript" src="{$Config_siteurl}statics/js/layer/layer.js">
</script>
    <script>
        var uid = {$uid};
        checked_login(uid);
    </script>
    <script type="text/javascript" >
        function text(){
            var value = document.getElementById("b").value;
            window.location.href='{:U("Content/Search/index")}&key='+value;
        }
    </script>

</block>

