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
<ol class="am-breadcrumb">
  <li><a href="/Phone" class="am-icon-home">首页</a></li>
  <li><a href="/Phone/Business/lists">诚信评价列表</a></li>
  <!-- <li class="am-active">内容</li> -->
  
</ol>
<!-- 首页轮播 -->
  <div class="container">
	<form role="form" action="{:U('Phone/Business/do_business_alliance')}" method="post" enctype="multipart/form-data">
	<div class="form-group">
    
		<label for="name">企业名称:</label>
		<input type="text" class="form-control"  placeholder="请输入项目名称" name="name">
	</div>

    <div class="form-group">
    
		<p class="address">企业所在地:</p>
		<select id="area" class="LinkageSel" name="area[]"></select>
        <input type="hidden" name="area" class="area" value=""/>
	</div>
	

    <div class="form-group">
    
			<p class="address">注册资本:(以万为单位)</p>
        
		<input type="text" class="form-control"  placeholder="请输入注册资本" name="registered">
	
    </div>
      <div class="form-group">
    
			<p class="address">企业地址:(以万为单位)</p>
        
		<input type="text" class="form-control"  placeholder="请输入注册资本" name="adress">
	
    </div>
    <div class="form-group">
    
		<label for="name">法人代表:</label>
		<input type="text" class="form-control"   name="legal_person">
	</div>
     <div class="form-group">
    
		<label for="name">联系人:</label>
		<input type="text" class="form-control"   name="linkman">
	</div>
     <div class="form-group">
    
		<label for="name">联系电话:</label>
		<input type="text" class="form-control"   name="telephone">
         <input type="hidden" name="uid" value="{$uid}">
	</div>
     <div class="form-group">
    
		<label for="name">年营业额：</label>
		<input type="text" class="form-control"   name="turnover">
         <input type="hidden" name="uid" value="{$uid}">
	</div>

     <div class="form-group">
    
		<label for="name">联系人邮箱：</label>
		<input type="text" class="form-control"   name="email">
         <input type="hidden" name="uid" value="{$uid}">
	</div>

    <div class="form-group">
    
		<label for="name">公司注册类型:</label>
		<select name="company_type"><span>*</span>
                        <option value="请选择">请选择</option>
                        <option value="国有">国有</option>
                        <option value="民营">民营</option>
                        <option value="混合">混合</option>
                        <option value="其他">其他</option>
                    </select>
	</div>

     <div class="form-group">
    
		<label for="name">所属行业:</label>
		<select name="industry"><span>*</span>
                		<option value="请选择">请选择</option>
                		<option value="新闻出版发行服务">新闻出版发行服务</option>
                		<option value="广播电视电影服务">广播电视电影服务</option>
                		<option value="文化艺术服务">文化艺术服务</option>
                		<option value="文化信息传输服务">文化信息传输服务</option>
                		<option value="文化创意和设计服务">文化创意和设计服务</option>
                		<option value="文化休闲娱乐服务">文化休闲娱乐服务</option>
                		<option value="工艺美术品的生产">工艺美术品的生产</option>
                        <option value="文化产品生产的辅助生产">文化产品生产的辅助生产</option>
                        <option value="文化产品的生产">文化产品的生产</option>
                        <option value="文化专用设备服务">文化专用设备服务</option>
                	</select>
	</div>

    <div class="form-group">
    
		<label for="name">企业商标:</label>
        <input type="file"  name="photo" id="_f">
	</div>
    <div class="form-group">
    
		<label for="name">经营范围:</label>
		<textarea class="form-control" rows="3" name="range"></textarea> 
	</div>
      <div class="form-group">
    
		<label for="name">产品介绍:</label>
		<textarea class="form-control" rows="3" name="introduce"></textarea> 
	</div>
      <div class="form-group">
    
		<label for="name">企业概况:</label>
		<textarea class="form-control" rows="3" name="company_content"></textarea> 
	</div>

   

    <div class="form-group">
    
		<label for="name">展示页面:</label>
		<script type="text/javascript">
         var GV = {
         DIMAUB: "{$config_siteurl}",
         JS_ROOT: "{$config_siteurl}statics/js/"
        };
                         </script>
    <script id="editor_product" type="text/javascript" name="survey" style="height: 300px;"></script>
    <?php echo \Form::editor("editor_product"); ?> 
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