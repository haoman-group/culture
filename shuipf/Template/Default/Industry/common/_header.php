<div class="header">
    
    <div class="content">
   
        <a href="{$config_siteurl}"  ><img src="{$config_siteurl}statics/ci/images/industryLogo.gif" style="width:252px;height:70px;"></a>
        <ul class="top_menuList right">
            <!-- <li class="top_menuItem">
                <a class="top_menuItemA" href="{$config_siteurl}">首页</a>
            </li> -->
            <li class="top_menuItem">
<!--                <a class="top_menuItemA" href="__ROOT__{:getCategory(1,'url')}">资讯中心</a> 

                <div class="top_menuItemDiv">
                    <table class="table menu_Zx">
                        <tbody>
                        <tr>
                            <td>
                                <a href=".{:getCategory(2,'url')}">产业要闻</a>

                            </td>
                            <td>
                                <a href=".{:getCategory(3,'url')}">地市动态</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href=".{:getCategory(4,'url')}">图片新闻</a>
                            </td>
                            <td>
                                <a href=".{:getCategory(5,'url')}">视频新闻</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href=".{:getCategory(6,'url')}">热点专题</a>

                            </td>
                            <td>
                                <a href=".{:getCategory(7,'url')}">通知通告</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href=".{:getCategory(11,'url')}">文化资源</a>
                            </td>
                            <td>
                                <a href=".{:getCategory(9,'url')}">产业研究</a>
                            </td>
                        </tr>
                        <tr>
-->
                           <!--  <td>
                                <a href="{:U('Industry/Forum/index')}">我的创意</a>
                            </td> -->
<!--
                            <td>
                                <a href=".{:getCategory(10,'url')}">产业案例</a>
                            </td>
                        </tr>
                        
                        </tbody>
                    </table>
                </div>
            </li>
-->
            <!-- <li class="top_menuItem">
                <a class="top_menuItemA" href=".{:getCategory(28,'url')}">政策法规</a>
                <div class="top_menuItemDiv">
                    <table class="table menu_Zx">
                        <tbody>
                        <tr>
                            <td>
                                <a href=".{:getCategory(25,'url')}">国际政策法规</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href=".{:getCategory(26,'url')}">国外政策法规</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href=".{:getCategory(27,'url')}">国家政策法规</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href=".{:getCategory(33,'url')}">本省政策法规</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href=".{:getCategory(34,'url')}">外省政策法规</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href=".{:getCategory(15,'url')}">政策解读</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </li> -->
            <li class="top_menuItem">
                <a class="top_menuItemA" href="{:U('Industry/Industry/index')}">产业项目</a>
                <div class="top_menuItemDiv">
                    <table class="table menu_Zx">
                        <tbody>
                        <tr>
                            <td>
                                <a href="{:U('Industry/Industry/obj_display')}">项目展示</a>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <a href="{:U('Industry/Supply/index')}">供需展示</a>
                            </td>
                        </tr>
                        <tr>
                            <td>

                                <a href="{:U('Industry/Industry/add_conpany')}">山西文化产业公共服务平台</a>



                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </li>
            <li class="top_menuItem">
<!--                <a class="top_menuItemA" href="{:U('Industry/Product/index')}">产品展示</a>-->
                <!--<a class="top_menuItemA" href="http://<?=$_SERVER['SERVER_NAME']?>:8082/" target="_blank">产品展示</a>-->
                 <a class="top_menuItemA" href="{:U('Industry/Shop/index')}" target="_blank">产品展示</a>
                 <!--<div class="top_menuItemDiv">-->
                    <!--<table class="table menu_Zx">
                        <tbody>
                        <tr>
                            <td>
                                <a href="{:U('Industry/Product/subject')}">主题馆</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{:U('Industry/Product/area')}">地市馆</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{:U('Industry/Product/travel')}">旅游馆</a>
                            </td>
                        </tr>
                       <!--  <tr>
                            <td>
                                <a href="#">国际馆</a>
                            </td>
                        </tr> -->
                        <!--<tr>
                            <td>
                                <a href="{:U('Member/Product/add')}">产品发布</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>-->
                <!--</div> -->
            </li>
            <li class="top_menuItem">
                <a class="top_menuItemA" href="{:U('Industry/Index/lists',array('catid'=>21))}">金融服务</a>
                <div class="top_menuItemDiv">
                    <table class="table menu_Zx">
                        <tbody>
                        <tr>
                            <td>
                                <a href="{:U('Industry/Finance/index')}">金融代理</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{:U('Industry/Index/lists',array('catid'=>35))}">信贷专区</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{:U('Industry/Finance/credit_apply')}">企业诚信评价</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{:U('Industry/Finance/bank')}">文化银行</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{:U('Industry/Finance/fund')}">企业基金</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </li>
            <li class="top_menuItem">
                <a class="top_menuItemA" href="{:U('Industry/Index/lists',array('catid'=>16))}">消费服务</a>
                <div class="top_menuItemDiv">
                    <table class="table menu_Zx">
                        <tbody>
                        <tr>
                            <td>
                                <a href="{:U('Industry/Index/lists',array('catid'=>17))}">消费资讯</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{:U('Industry/Index/lists',array('catid'=>18))}">优惠信息</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{:U('Industry/Consume/consume')}">商家联盟</a>
                            </td>
                        </tr>
                       
                        </tbody>
                    </table>
                </div>
            </li>
        </ul>

    </div>
</div>
