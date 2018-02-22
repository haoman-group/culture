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
	<form role="form" action="{:U('Phone/Industry/addstage')}" method="post">
    <div class="form-group">
    
			<p class="address">项目总投资额:(以万为单位)</p>
        
		<input type="text" class="form-control"   name="money">
	
    </div>
    <div class="form-group">
    
		<label for="name" name="imethod">融资合作方式:</label>
		<select name="imethod" id="">
	    <option value="">请选择</option>
	    <option value="银行贷款">银行贷款</option>
	    <option value="融资">融资</option>
	    <option value="物权转让">物权转让</option>
	   <option value="其他">其他</option>
	</select>
	</div>
    <div class="form-group">
    
		<label for="name">融资资金用途:</label>
		<textarea class="form-control" rows="5" name="purpose"></textarea> 
	</div>
    <div class="form-group">
    
		<label for="name">资金收益预测:</label>
		<input type="text" class="form-control"   name="term">
	</div>

     <div class="form-group">
    
		<label for="name">投资年限:</label>
		<input type="text" class="form-control"   name="contactnum">
         <input type="hidden" name="uid" value="{$uid}">
         <input type="hidden" name="objid" id="uid" value="{$_GET['oid']}">
         
	</div>

	<button type="submit" class="btn btn-default">提交</button>
</form>
</div>
 
</block>