<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/policy.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/page_common.css" />
      <style>
     .select_area{
         display:none;
     }
    </style>   
</block>

<block name="content">
    <div id="nav">
        <div class="container">
            <ul style="float: left;">
                <li><a href="{:U('Industry/Index/index')}" class="home_src">首页</a></li>
                <li><span>></span></li>
                <li><a href="{:U('Industry/Index/lists',array('catid'=>28))}">政策法规</a></li>
                <li><span>></span></li>
                <li><a href="javascript:;" class="href_tail">{$catname}</a></li>
            </ul>
            <div class="nav_search search" style="float: left;color: #393939;font-size: 14px;margin-left: 75px;">

                  <form action="{:U('Industry/Search/index')}" method="post">
                <input type="hidden" name="searchtype" value="1">
                    <span style="padding-right: 25px;">信息搜索</span>
                    <input  id="b" style="background: #f5f5f5;border: 1px solid #bebebe;border-radius: 8px;height: 25px;width: 250px;margin-right: 15px;" type="text" name="title" id="" value="{$Think.get.searchcontent}" />
                    <select name="parent_catid" id="parentItems" style="border-radius: 8px;border: 1px solid #bebebe;margin-right: 25px;width: 110px;">
                        <option value="全部">全部</option>
                        <volist name="categorylists" id="vo">
                        <option value="{$vo['catid']}">{$vo['catname']}</option>
                        </volist>
                        <!--<option value="国际政策法规">国际政策法规</option>
                        <option value="国外政策法规">国外政策法规</option>
                        <option value="国家政策法规">国家政策法规</option>
                        <option value="本省政策法规">本省政策法规</option>
                        <option value="外省政策法规">外省政策法规</option>
                        <option value="政策解读">政策解读</option>-->

                    </select>
                     <select id="grandsonItems" name="cid"  style="display:none" style="border-radius: 8px;border: 1px solid #bebebe;margin-right: 25px;width:110px;">
                               <option value="">请选择</option>
                                <volist name="categorylists['3']['grandson_list']" id="vo">
                                    <option value="{$vo['catid']}">{$vo['catname']}</option>
                                </volist>
                            </select>
                    <!--<div class="select" style="display:none;">
                     <select id="area" class="" style="border-radius:8px;border:1px solid #bebebe;margin-right:25px;width:110px;">
                    </select>
                    <select id="date" class="select_date" style="border-radius: 8px;border: 1px solid #bebebe;margin-right: 25px;width: 110px;">
                     <option value="1">一周内</option>
                      <option  value="2">一月内</option>
                       <option  value="3">一年内</option>
                    </select>
                    </div>-->
                    <input type="submit" class="btnsear"  value="搜索" style="margin-right: 20px;border: 1px solid #BEBEBE;width: 65px;height: 27px;border-radius: 8px;text-align: center;line-height: 25px;color: black;text-indent: 0em;font-size: 14px;background: white;">
<!--                    <a href="javascript:;" style="border: 1px solid #bebebe;background: white;width: 55px;height: 25px;border-radius: 8px;padding:1px 10px 2px 10px;line-height: 20px;margin-right: 29px;">搜索</a>-->
                    <a href="javascript:;" style="margin-right: 25px;" class="enhanced">高级搜索</a>
                    <a href="index.php">返回首页</a>
                

            </form>


            </div>


                    <div class="nav_search enhancedsearch" style="float: left;color: #393939;font-size: 14px;margin-left: 75px;display:none;">

                        <form action="{:U('Search/index')}" method="post">
                          <input type="hidden" name="searchtype" value="2">
                    <span style="padding-right: 25px;">信息搜索</span>
                    <input  id="b" style="background: #f5f5f5;border: 1px solid #bebebe;border-radius: 8px;height: 25px;width: 250px;margin-right: 15px;" type="text" name="title" id="" value="{$Think.get.searchcontent}" />
                   <select name="parent_catid" id="parentItemssearch" style="border-radius: 8px;border: 1px solid #bebebe;margin-right: 25px;width: 110px;">
                        <option value="全部">全部</option>
                        <volist name="categorylists" id="vo">
                        <option value="{$vo['catid']}">{$vo['catname']}</option>
                        </volist>
                        <!--<option value="国际政策法规">国际政策法规</option>
                        <option value="国外政策法规">国外政策法规</option>
                        <option value="国家政策法规">国家政策法规</option>
                        <option value="本省政策法规">本省政策法规</option>
                        <option value="外省政策法规">外省政策法规</option>
                        <option value="政策解读">政策解读</option>-->

                    </select>
                         <select id="grandsonItemssearch" name="cid"  style="border-radius: 8px;border: 1px solid #bebebe;margin-right: 25px;width: 110px;display:none;">
                               <option value="">请选择</option>
                                <volist name="categorylists['3']['grandson_list']" id="vo">
                                    <option value="{$vo['catid']}">{$vo['catname']}</option>
                                </volist>
                            </select>
                    
                     <select id="area" class="" style="border-radius:8px;border:1px solid #bebebe;margin-right:25px;width:110px;">
                    </select>
                    <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                    <select id="date" class="select_date" style="border-radius: 8px;border: 1px solid #bebebe;margin-right: 25px;width: 110px;" name="select_date">
                     <option value="1">一周内</option>
                      <option  value="2">一月内</option>
                       <option  value="3">一年内</option>
                    </select>
                    
                    <input type="submit" class="btnsear"  value="高级搜索" style="margin-right: 20px;border: 1px solid #BEBEBE;width: 65px;height: 27px;border-radius: 8px;text-align: center;line-height: 25px;color: black;text-indent: 0em;font-size: 14px;background: white;">
<!--                    <a href="javascript:;" style="border: 1px solid #bebebe;background: white;width: 55px;height: 25px;border-radius: 8px;padding:1px 10px 2px 10px;line-height: 20px;margin-right: 29px;">搜索</a>-->
                    <a href="javascript:;" style="margin-right: 25px;" class="searchback">搜索</a>
                    <a href="index.php">返回首页</a>
                



              </form>
            </div>  
    </div>
    </div>
    <div id="content">
        <div class="container industry clearfix">
            <div class="industry-left">
                <h2 style="width: 260px;">
                <!--<img  src="{$config_siteurl}statics/images/policy.png" alt="个人中心" style="top: 0;left: 0;" />-->
                </h2>
                <ul>
                    <?php
                        function find_parentid($catid,$parentid){
                            static $id;
                            $id = $catid;
                            if($parentid!= 0){
                                $data = D('category')->where(array('catid'=> $parentid ))->find();
                                $id = $data['catid'];
                                find_parentid($data['catid'],$data['parentid']);
                            }
                            return $id;
                        }
                        $parent_catid = find_parentid($catid,$parentid);
                    ?>
                    <!--<content action="category" catid="$parent_catid" order="listorder ASC" >-->
                        <volist name="categorylists" id="v1">
                            <li <eq name="v1[catid]" value="$catid">style="background:#f1f1f1"</eq>><a href="<eq name='v1[child]' value='1'>javascript:<else/>{:U("Industry/Index/lists",array('catid'=>$v1['catid']))}"</eq> style="color: black;"><span>●</span>{$v1.catname}</a></li>
                           
                               
                                    <volist name="v1['grandson_list']" id="v2">
                                        <li <eq name="v2[catid]" value="$catid">style="background:#f1f1f1"</eq>><a href="<eq name='v2[child]' value='1'>javascript:<else/>{:U("Industry/Index/lists",array('catid'=>$v2['catid']))}</eq>"><span>&nbsp;&nbsp;&nbsp;&nbsp;</span>{$v2.catname}</a></li>
                                        <eq name="v2[child]" value="1">
                                           
                                                <volist name="data" id="v3">
                                                    <li <eq name="v3[catid]" value="$catid">style="background:#f1f1f1"</eq>><a href="<eq name='v3[child]' value='1'>javascript:<else/>{:U("Industry/Index/lists",array('catid'=>$v3['catid']))}</eq>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$v3.catname}</a></li>
                                                </volist>
                                           
                                        </eq>
                                    </volist>
                        </volist>
                    <!--</content>-->

                </ul>
            </div>
            <div class="industry-right">
                <h5><span>{$catname}</span></h5>
                <ul class="list">

                    <!--<content action = "lists" catid = "$catid" order = "id DESC" num= "15" page = "$page">-->

                        <volist name="data" id="vo">

<!--                            <li>{$i}<a href="{$vo.url}">{$vo.title|str_cut=###,40}</a> <span> {$vo.inputtime|date="Y-m-d",###}</span></li>-->

                                <li style="display: block;">{$i}<a href=".{$vo.url}">{$vo.title|str_cut=###,30}</a>  <span>{$vo.inputtime|date="Y-m-d",###}</span> <span>{$vo.ref_number}</span> </li>
                        </volist>

                    <!--</content>-->

                </ul>
                <div class="page_div">
                    {$pages}
                </div>
            </div>
        </div>
    </div>
</div>
</block>
<block name="after_scripts">
<script src="{$config_siteurl}statics/cu/js/Comm/Category.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/linkagesel/linkagesel-min.js"></script>
    <script type="text/javascript" >
        function text(){
            var value = document.getElementById("b").value;
            var val =document.getElementById("c").value;
            window.location.href='{:U("Search/index")}&key='+value+'&val='+val;
        }
    </script>
    <script>
$(function(){
    var opts = {
        ajax: '/Api/Address/Area',
        selStyle: 'margin-left: 3px;',
        select: "#area",
        loaderImg:'/statics/js/linkagesel/ui-anim_basic_16x16.gif',
       
    }
    var linkageSel = new LinkageSel(opts);
    
    linkageSel.onChange(function() {
      
        var selected = linkageSel.getSelectedValue();
        //console.log(selected);
        $(".area").val(selected.toString());
        var addr = "<?php echo  $data['default_area_level'] ?>";
        //   $(".LinkageSel").eq(0).val()!=='' ? $(".LinkageSel").eq(0).attr("disabled",true) : '';
         if($(".LinkageSel").eq(1).val() !==''){
          if(($(".LinkageSel").eq(1).val())%addr==0){
             $(".LinkageSel").eq(1).attr("disabled",true);
          }else{
              $(".LinkageSel").eq(1).attr("disabled",false);
          }
          };
           if($(".LinkageSel").eq(2).val() !==''){
          if(($(".LinkageSel").eq(2).val())%addr==0){
             $(".LinkageSel").eq(2).attr("disabled",true);
          }else{
              $(".LinkageSel").eq(2).attr("disabled",false);
          }
      };
         
        $(".LinkageSel").next("span") ? $(".LinkageSel").next("span").remove() : '';
        // console.log($(".LinkageSel:hidden").next("span"));
        // $(".LinkageSel").eq(0) ? $(".LinkageSel").eq(0).after("<span>省</span>") : '';
        // $(".LinkageSel").eq(1) ? $(".LinkageSel").eq(1).after("<span>市</span>") : '';
        // $(".LinkageSel").eq(2) ? $(".LinkageSel").eq(2).after("<span>县(区)</span>") : '';
        
        $(".LinkageSel").on("change",function(){
            $(".LinkageSel:hidden").next("span").remove();
        });
    });


});
$(".enhanced").click(function(){
    $(".enhancedsearch").show();
    $(".search").hide();
});

$(".searchback").click(function(){
    $(".enhancedsearch").hide();
    $(".search").show();
});


$("#parentItems").change(function(){
    
    if($("#parentItems").val() == 27){
       $("#grandsonItems").show();
    }else{
         $("#grandsonItems").hide();
    }
});
$("#parentItemssearch").change(function(){
    if($("#parentItemssearch").val() == 27){
       $("#grandsonItemssearch").show();
    }else{
         $("#grandsonItemssearch").hide();
    }
});
</script>
</block>