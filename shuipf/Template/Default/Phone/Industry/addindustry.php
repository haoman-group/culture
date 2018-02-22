<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />
<block name="style">
    <style>
        .my-am-nav{margin-top:0px;}
        .my-am-nav a {font-size:13px;}
        .am-active {font-weight:bold;}
        .am-breadcrumb{margin:0 0 0 0;}
        .am-list{margin-top:0px;}
        .am-header-title{line-height:49px;}
        select{

    height: 20px;
   
    padding: 6px 12px;
    font-size: 14px;
    color: #555;
    line-height: 34px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: content-box;  
        }
        .address{
    
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
        }  
    </style>
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/swiper/swiper.css"> 
    <link rel="stylesheet" href="{$config_siteurl}statics/js/artDialog/skins/default.css"> 
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.css">
    <link href="https://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<script type="text/javascript" src="{$config_siteurl}statics/cu/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/cu/swiper/swiper.min.js"></script> 
    <script src="{$config_siteurl}statics/cu/js/Comm/Category.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/linkagesel/linkagesel-min.js"></script>
<if condition="$_GET['type'] neq 'edit' ">
<script>
$(function(){
    var opts = {
        ajax: '/Api/Address/getArea',
        selStyle: 'margin-left: 3px;',
        select: "#area",
        loaderImg:'/statics/js/linkagesel/ui-anim_basic_16x16.gif',
        defVal: [<?php echo (!empty($data['default_area']) ? $data['default_area'] : $userInfo['default_area']); ?>]
    }
    var linkageSel = new LinkageSel(opts);
    
    linkageSel.onChange(function() {
      
        var selected = linkageSel.getSelectedValue();
        //console.log(selected);
        $(".area").val(selected.toString());
        var addr = "<?php echo  $data['default_area_level'] ?>";
          $(".LinkageSel").eq(0).val()!=='' ? $(".LinkageSel").eq(0).attr("disabled",true) : '';
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
</script>
<else/>
<script>
$(function(){
    var opts = {
        ajax: '/Api/Address/getArea',
        selStyle: 'margin-left: 3px;',
        select: "#area",
        loaderImg:'/statics/js/linkagesel/ui-anim_basic_16x16.gif',
        defVal: [<?php echo (!empty($data['default_area']) ? $data['default_area'] : $userInfo['default_area']); ?>]
    }
    var linkageSel = new LinkageSel(opts);
    
    linkageSel.onChange(function() {
      
        var selected = linkageSel.getSelectedValue();
        //console.log(selected);
        $(".area").val(selected.toString());   
        $(".LinkageSel").next("span") ? $(".LinkageSel").next("span").remove() : '';
        // $(".LinkageSel").eq(0) ? $(".LinkageSel").eq(0).after("<span>省</span>") : '';
        // $(".LinkageSel").eq(1) ? $(".LinkageSel").eq(1).after("<span>市</span>") : '';
        // $(".LinkageSel").eq(2) ? $(".LinkageSel").eq(2).after("<span>县(区)</span>") : '';
        
        $(".LinkageSel").on("change",function(){
            $(".LinkageSel:hidden").next("span").remove();
        })
    });


});
</script>
</if>
</block>
<block name="content">
<!-- 顶部菜单导航 -->
<template file="Phone/Industry/_nav.php"/>

<!-- 首页轮播 -->
  <div class="container">
	<form role="form" action="{:U('Phone/Industry/add_obj_table')}" method="post">
	<div class="form-group">
    
		<label for="name">项目名称:</label>
		<input type="text" class="form-control"  placeholder="请输入项目名称" name="pname">
	</div>

    <div class="form-group">
    
		<p class="address">地址:</p>
		<select id="area" class="LinkageSel" name="area[]"></select>
        <input type="hidden" name="area" class="area" value=""/>
	</div>
	<div class="form-group">
    
		<label for="name">项目类别:</label>
		<select   class=""  name="pcategory" >
        <volist name="industry_category" id="co">
        <option value="{$co['id']}">{$co['categoryname']}</option>
        </volist>
        
        </select>
	</div>

    <div class="form-group">
    
			<p class="address">项目总投资额:(以万为单位)</p>
        
		<input type="text" class="form-control"  placeholder="请输入项目总投资额" name="plimit">
	
    </div>

    <div class="form-group">
    
		<label for="name">项目负责人:</label>
		<input type="text" class="form-control"   name="pleader">
	</div>

     <div class="form-group">
    
		<label for="name">联系电话:</label>
		<input type="text" class="form-control"   name="contactnum">
         <input type="hidden" name="uid" value="{$uid}">
	</div>

    <div class="form-group">
    
		<label for="name">项目简介:</label>
		<textarea class="form-control" rows="3" name="pbriefing"></textarea> 
	</div>

    <div class="form-group">
    
		<label for="name" name="pstage">项目阶段:</label>
		<select   class=""  name="pstage" >
         <volist name="industry_stage" id="st">
        <option value="{$st['sid']}">{$st['stagename']}</option>
        </volist>
        </select>
	</div>

    <div class="form-group">
    
		<label for="name">项目前景:</label>
		<textarea class="form-control" rows="5" name="prospect"></textarea> 
	</div>

    <div class="form-group">
    
		<label for="name">项目图片:</label>
		 <Form function="images" parameter="pthumb,pthumb,'',content"/>
        <span>*（双击预览）</span>
	</div>

     <div class="form-group">
    
		<label for="name">进入投融资项目库：</label>
		<input name="pfinancing" type="radio" value="1"  checked ="checked"/>是
        <input name="pfinancing" type="radio" value="0" />否
	</div>
	<button type="submit" class="btn btn-default">提交</button>
</form>
</div>
  <script type="text/javascript">
        //全局变量
        var GV = {
            DIMAUB: "{$config_siteurl}",
            JS_ROOT: "{$config_siteurl}statics/js/"
        };
    </script>
    <script src="{$config_siteurl}statics/js/wind.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/ci/js/layer/layer.js"></script>
    <script>
        var uid = {$uid};
        checked_login(uid);
    </script>
    <script type="text/javascript" src="{$Config_siteurl}statics/js/content_addtop.js"></script>
    <script>
        function openurl(){
            var radios=document.getElementsByName("judge");

            for(var i=0;i<radios.length;i++){
                if(radios[i].checked){
                    var n=radios[i].value;

                    if(n==1){
                        window.location.href="system-yes.html"
                    }
                    else if(n==0){
                        location.href="system-no.html"
                    }
                }
            }
        }
    </script>
</block>