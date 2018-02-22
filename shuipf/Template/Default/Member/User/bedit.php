<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>文化设施预约参观</title>
    <template file="Pubservice/Common/_cssjs"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-facility.css"/>
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/base.css" />
    <style>
        /*.table label.error input[type="text"]{border-color: red;}*/
        /*.table label.error:after{content: '请输入数字类型！';color: red;position: absolute;}*/
        .table label.error-ID input[type="text"] {
            border-color: red;
        }

        .table label.error-ID:after {
            content: '请输入正确的身份证号码！';
            color: red;
            position: absolute;
        }

        .table label.error-phone input[type="text"]{border-color: red;}
        .table label.error-phone:after{content: '手机号码有误，请核对！';color: red;position: absolute;}
       /* .visitRegister .table table input[type="text"].error {
            border-color: red;
            outline-color: transparent;
        }*/

        label.error {
            color: red;
        }
    </style>

</head>

<body>
<div class="wrap">
    <template file="Member/Public/_header"/>
    <div class="stepBar">
        <div class="ggwh_Content">
            <div class="stepBarMain">
                <a href="{:U('Pubservice/Active/index')}" class="link">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{:U('Pubservice/Active/index')}" class="link">文化活动</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;参观预约                    
            </div>
        </div>
    </div>
    <div class="ggwh_Content visitRegister">
        <div class="ul_form">
            <ul class="bespeak_tab clearfix">
			
                <li <if condition="$data['style'] eq '1' "> class="on"</if>><a href="javascript:;">个人</a>
                    <!-- <span>（还能预约199人）</span> -->
                    <if condition="($acceptance - $count) ELT 0">
                        <span>(预约已满，无法报名)</span>
                        <else/>
                        <span>(还能预约:{$acceptance - $count}人)</span>
                    </if>
                </li>
                <li <if condition="$data['style'] eq '2' ">class="on"</if>><a href="javascript:;">团体</a>
                <if condition="($acceptance - $count) ELT 0">
                        <span>(预约已满，无法报名)</span>
                        <else/>
                        <span>(还能预约:{$acceptance - $count}人)</span>
                    </if>
                </li>
            </ul>
            <form action="{:U('bedit')}" method="post" class="J_ajaxForm bespeak_form num1">
                <input type="hidden" style="opacity: 0; width: 0px;" name="areaid" class="area" value="{$data.area}"/>
                <dl>
                    <!--<dt>预约人姓名</dt>
                    <dd><input type="text" name="permanent_name"><i>*</i><span style="color: #ccc;margin-left: 10px;">餐馆预约信息[<i>*</i>]为必填</span></dd>-->
                    
                    <dt>预约参观人数</dt>
                    <dd><select select name="attendance_num" class="attendance_num">
                    <option value="1"<if condition="$data['attendance_num'] eq '1'">selected="selected" </if>>1</option>
                    <option value="2" <if condition="$data['attendance_num'] eq '2'">selected="selected" </if>>2</option>
                    <option value="3" <if condition="$data['attendance_num'] eq '3'">selected="selected" </if>>3</option>
                    </select></dd>
                     <input type="hidden" name="tablename" value="{$data['tablename']}">
                      <input type="hidden" name="tab_cid" value="{$data['tab_cid']}">
                       <input type="hidden" name="area" value="{$data['area']}">
                       <input type="hidden" name="userid" value="{$data['userid']}">
                       <input type="hidden" name="stylenum" value="1" class="stylenum">
					    <input type="hidden" name="id" value="{$data['id']}">
                    <dt>电话</dt>
                    <dd><input type="text" name="tel[]" <if condition="$data['style'] eq 1">value="{$data['tel']['0']}"</if> class="telnum" id="tel"><i>*</i></dd>
                    <dd id="InputsWrapper">
					<volist name="data['tel']" id="vo" offset="1">
					<input type="text" name="tel[]" value="{$vo}" class="telnumr" id="tel" ><i class="teli">*</i>
					</volist></dd>
                    <dt>身份证</dt>
                    <dd><input type="text" name="credential_no[]" <if condition="$data['style'] eq 1">value="{$data['credential_no']['0']}"</if> class="credential_no_num"><i>*</i></dd>
                    <dd id="credential">
					<volist name="data['credential_no']" id="wo" offset="1">
					<input type="text" name="credential_no[]" value="{$wo}" class="credential_no_numr" id="" ><i class="teli">*</i>
					</volist>
					</dd>
                    <!--<dt>年龄</dt>
                    <dd class="hr"><select name="" id=""><?php for($i=16;$i<=70;$i+=6){ ?> <option value="<?php echo $i; ?>----<?php echo $i+5 ?>"><?php echo $i; ?>----<?php echo $i+5 ?></option>  <?php } ?></select><i>*</i><br><span style="color: #f00">注：未成年人和残障人士需在监护人陪同下参观本馆</span></dd>-->
                    <!--<dt>预约参观日期</dt>-->
                    <!--<dd>
                        <input type="text"><i>*</i>&nbsp;&nbsp;时段&nbsp;&nbsp;
                        <select name="" id="">
                            <option value="9:00-11:00">9:00-11:00</option>
                            <option value="14:00-16:00">14:00-16:00</option>
                        </select><i>*</i><br><span>开放时间9:00--17:00(16:00停止入馆)每周一、农历腊月三十、正月初一闭馆</span>
                    </dd>-->
                    <dt>预约备注</dt>
                    <dd><textarea name="notice" id="" cols="30" rows="10"><if condition="$data['style'] eq 1">{$data['notice']}</if></textarea></dd>
                    <dt></dt>
                    <dd>
                        <span>注：</span>1、网上预约请提前三天预约,每个又要证件,每次只能预约3人,当日有效<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2、请持有效证件在山西博物馆东门领票处领取预约门票入馆参观<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3、20人以上团队需电话预约,0351-8789555
                    </dd>
                    <dt></dt>
                    <dd><input class="btn btn_submit mr10 J_ajax_submit_btn" type="submit" value="修改"></dd>
                </dl>
                
            </form>
            <form action="{:U('bedit')}" method="post" class="J_ajaxForm bespeak_form  num2" hidden>
                <input type="hidden" style="opacity: 0; width: 0px;" name="areaid" class="area" value="{$data.area}"/>
                <dl>
                    <dt>团体名称</dt>
                    <dd><input type="text" name="permanent_name" <if condition="$data['style'] eq 2"> value="{$data['permanent_name']}"</if>><i>*</i><span style="color: #ccc;margin-left: 10px;">餐馆预约信息[<i>*</i>]为必填</span></dd>
                    <dt>预约参观人数</dt>
                    <dd><input type="text" name="attendance_num" <if condition="$data['style'] eq 2">value="{$data['attendance_num']}"</if>><i>*</i><span style="color: #ccc;margin-left: 10px;">(人)</sapn></dd>
                    <dt>电话</dt>
                    <dd><input type="text" name="tel[]" <if condition="$data['style'] eq 2">value="{$data['tel']['0']}"</if>><i>*</i></dd>
                    <dt>身份证</dt>
                    <dd><input type="text" name="credential_no[]" <if condition="$data['style'] eq 2">value="{$data['credential_no']['0']}"</if> class="credential_no_num"><i>*</i></dd>
                     <input type="hidden" name="tablename" value="{$data['tablename']}">
                      <input type="hidden" name="tab_cid" value="{$data['tab_cid']}">
                       <input type="hidden" name="area" value="{$data['area']}">
                        <input type="hidden" name="userid" value="{$data['userid']}">
                       <input type="hidden" name="stylenum" value="2" class="stylenum">
					    <input type="hidden" name="id" value="{$data['id']}">
                    <!--<dt>年龄</dt>
                     <dd class="hr"><select name="" id=""><?php for($i=16;$i<=70;$i+=6){ ?> <option value="<?php echo $i; ?>----<?php echo $i+5 ?>"><?php echo $i; ?>----<?php echo $i+5 ?></option>  <?php } ?></select><i>*</i><br><span style="color: #f00">注：未成年人和残障人士需在监护人陪同下参观本馆</span></dd>-->
                    <!--<dt>预约参观日期</dt>
                    <dd>
                        <input type="text"><i>*</i>&nbsp;&nbsp;时段&nbsp;&nbsp;
                        <select name="" id="">
                            <option value="9:00-11:00">9:00-11:00</option>
                            <option value="14:00-16:00">14:00-16:00</option>
                        </select><i>*</i><br><span>开放时间9:00--17:00(16:00停止入馆)每周一、农历腊月三十、正月初一闭馆</span>
                    </dd>-->
                    <dt>预约备注</dt>
                    <dd><textarea name="notice" id="" cols="30" rows="10"><if condition="$data['style'] eq 2">{$data['notice']}</if></textarea></dd>
                    <dt></dt>
                    <dd>
                        <span>注：</span>1、网上预约请提前三天预约,每个又要证件,每次只能预约20人,当日有效<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2、请持有效证件在山西博物馆东门领票处领取预约门票入馆参观<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3、20人以上团队需电话预约,0351-8789555
                    </dd>
                    <dt></dt>
                    <dd><input class="btn btn_submit mr10 J_ajax_submit_btn" type="submit" value="修改"></dd>
                </dl>
            </form>
        </div>
        
        <div class="tuijian">
            <h5>活动推荐</h5>
            <ul class="clearfix">
            <volist name="active" id="vo">
                <li>
                    <div class="li">
                        <div class="img"><img src="{$vo['image']}" alt=""></div>
                        <h6 style="height:36px;"><?php echo mb_substr($vo['content_title'],0,15);?></h6>
                        <p>活动时间：{$vo['act_time']}</p>
                        <p>活动地点：{$vo['act_address']}</p>
                       <a  href="{:U('Pubservice/Active/show',array('id'=>$vo['id']))}" style="display: block; width: 90px; height: 26px; text-align: center;line-height: 26px;margin: 10px auto;background: #93262B;color: #fff;">预约</a>
                    </div>                    
                </li>
                </volist>
                <!--<li>
                    <div cla class="signUp">预约</a>s="li">
                        <div class="img"><img src="{$Config_siteurl}statics/cu/images/index/aaa.png" alt=""></div>
                        <h6>山西校园首届“赶集网杯”大 学生模特...</h6>
                        <p>活动时间：2016-7-20 17:31</p>
                        <p>活动地点：徐行镇文化体育服务中 心三楼多功能厅</p>
                        <input type="button" value="预定">
                    </div>                    
                </li>
                <li>
                    <div class="li">
                        <div class="img"><img src="{$Config_siteurl}statics/cu/images/index/aaa.png" alt=""></div>
                        <h6>山西校园首届“赶集网杯”大 学生模特...</h6>
                        <p>活动时间：2016-7-20 17:31</p>
                        <p>活动地点：徐行镇文化体育服务中 心三楼多功能厅</p>
                        <input type="button" value="预定">
                    </div>                    
                </li>-->
                <!--<li>
                    <div class="li">
                        <div class="img"><img src="{$Config_siteurl}statics/cu/images/index/aaa.png" alt=""></div>
                        <h6>山西校园首届“赶集网杯”大 学生模特...</h6>
                        <p>活动时间：2016-7-20 17:31</p>
                        <p>活动地点：徐行镇文化体育服务中 心三楼多功能厅</p>
                        <input type="button" value="预定">
                    </div>                    
                </li>-->
            </ul>
        </div>
        <!-- <form class="J_ajaxForm" action="{:U('bespeak')}" method="post">
            <input type="hidden" style="opacity: 0; width: 0px;" name="areaid" class="area" value="{$data.area}"/>
            <h5>参观预约</h5>
            <p class="tips"><span>个人信息 </span>参观预约信息[<i>*</i>]为必填&nbsp;&nbsp;&nbsp;&nbsp;
                <if condition="$account eq 0">
                    <span style="color:red">预约已满，无法报名</span>
                    <else/>
                    <span style="color:red">还能预约:{$account}人</span>
                </if>
            </p>
            <div class="table">
                <table>
                    <tr>
                        <td>
                            <span>预约人姓名</span><input type="text" name="permanent_name"><i>*</i>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>户籍</span><input type="text" name="permanent_address"><i>*</i>
                            <if condition="$id neq ''  ">
                                <input type="hidden" name="userid" value="{$id}">
                                <else/>
                                <input type="hidden" name="userid" value="{$userInfo['id']}">
                            </if>
                            <Iinput type="hidden" value="{$_GET['tab_cid']}" name="id">
                        </td>
                    </tr> 

                    <tr name="selectshow"  >
                    
                    <td><span>户&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;籍:</span><select id="area" class="select_area1" name="areaid"></select></td>
                    <td><span>详细地址:</span><input type="text" name="permanent_address" value="{$data.permanent_address}"></td>
                     <if condition="$id neq ''  ">
                                <input type="hidden" name="userid" value="{$id}">
                                <else/>
                                <input type="hidden" name="userid" value="{$userInfo['id']}">
                            </if>
                </tr>
                 <tr  >
                    
                    
                    <td><span>详细地址:</span><input type="text" name="permanent_address" value="{$data.permanent_address}"></td>
                </tr>
                    <tr>
                        <td>
                            <span>证件类型</span>
                            <select name="document_type">
                                <option value="身份证">身份证</option>
                                <option value="军人证">军人证</option>
                                <option value="护照">护照</option>
                            </select><i>*</i>
                            <span>证件号</span><label><input class="IDcard-check" type="text" name="credential_no"><i>*</i></label>
                            <span>所属单位</span><input type="text" name="institute"><i>*</i>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>联系电话</span><input type="text" name="tel" id="tel"><i>*</i><span id="mtel"></span>
                            <span>电子邮箱</span><input  type="text" name="email" id="email"><i>*</i><div id="memail"></div>
                        </td>
                    </tr>

                    <tr class="small">
                        <input type="hidden" name="tablename" value="{$_GET['tablename']}">
                        <input type="hidden" name="tab_cid" value="{$_GET['tab_cid']}">
                        <input type="hidden" name="area" value="{$_GET['area']}">

                        <td>
                            <span>预约参观人数</span><label for=""><input type="text" name="attendance_num"><i>*</i></label>
                            <span>成人</span><label for=""><input type="text" name="adult_num">人</label>
                            <span>学生</span><label for=""><input type="text" name="student_num">人</label>
                            <span>老人</span><label for=""><input type="text" name="elder_num">人</label>
                            <span>小孩</span><label for=""><input type="text" name="child_num">人</label>
                        </td>
                    </tr>
                    <tr>
                        <td style="color:red;">注：未成年人和残障人士需在监护人陪同下参观本馆</td>
                    </tr>
                    <tr>
                        <td>
                            <hr style="height:1px;border:none;border-top:1px dashed #555555;"/>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <span>预约参观日期</span><input type="text" class="J_date" name="appointment_time"><i>*</i>
                            <span>时段</span>
                            <select name="time_interval">
                                <option value="9:00-11:00">9:00-11:00</option>
                                <option value="14:00-16:00">14:00-16:00</option>
                            </select><i>*</i>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>开放时间</span>9:00--17:00(16:00停止入馆)每周一、农历腊月三十、正月初一闭馆
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <hr style="height:1px;border:none;border-top:1px dashed #555555;"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span style="vertical-align: top;">预约人姓名</span><textarea name="permanent_persons" cols="40"
                                                                                     rows="10"></textarea>
                        </td>
                    </tr>
                    <tr style="color:red">
                        <td><span>注：</span>1、网上预约请提前三天预约,每个又要证件,每次只能预约20人,当日有效</td>
                    </tr>
                    <tr style="color:red">
                        <td><span></span>2、请持有效证件在山西博物馆东门领票处领取预约门票入馆参观</td>
                    </tr>
                    <tr style="color:red">
                        <td><span></span>3、20人以上团队需电话预约,0351-8789555</td>
                    </tr>
                </table>

                <div class="submit">
                    <div class="btn_wrap_pd">
                        <if condition="$account eq '0'">
                            <input class="btn btn_submit mr10 J_ajax_submit_btn" type="submit" value="提交预约单"
                                   disabled="true">
                    </div>
                    <else/>
                    <input class="btn btn_submit mr10 J_ajax_submit_btn" type="submit" value="提交预约单"></div>
                </if>
            </div>
    </div>

    </form> -->
</div>
<template file="Pubservice/Common/_foot"/>
</div>
<template file="Pubservice/Common/_date"/>
<script type="text/javascript" src="{$config_siteurl}statics/cu/js/Comm/check.js"></script>

<script src="{$config_siteurl}statics/js/jquery.js"></script>
<script src="{$config_siteurl}statics/js/validate.js"></script>
<script src="{$config_siteurl}statics/js/ajaxForm.js"></script>

<script type="text/javascript" src="{$config_siteurl}statics/js/linkagesel/linkagesel-min.js"></script>
<script>
$(function(){
    var opts = {
        ajax: '/Api/Address/getArea',
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
        $(".LinkageSel").eq(0) ? $(".LinkageSel").eq(0).after("<span>省</span>") : '';
        $(".LinkageSel").eq(1) ? $(".LinkageSel").eq(1).after("<span>市</span>") : '';
        $(".LinkageSel").eq(2) ? $(".LinkageSel").eq(2).after("<span>县(区)</span>") : '';
        
        $(".LinkageSel").on("change",function(){
            $(".LinkageSel:hidden").next("span").remove();
        });
    });

    // tab切换
    $(".bespeak_tab li").find("a").on("click",function(){
        var index = $(this).parent().index();
        $(this).parent().addClass('on').siblings('li').removeClass('on');
        $(".bespeak_form").eq(index).show().siblings('.bespeak_form').hide();
		
    });


});
//邮箱


var $memail=$('#email');
var $mtel=$("#tel");
  $("#email").focus(function () {
            $(this).addClass('input_focus');
            $memail.html('<div class="err_message"><span class="icon">请输入您常用的Email电子邮箱。</span></div>');
        }).blur(function () {
            $(this).removeClass('input_focus');
            $(this).triggerHandler('keyup');
        }).keyup(function () {
            var search_str = /^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/;
            if ($(this).val() == '') {
                $memail.html('<div class="err_message error"><span class="icon">请输入您的Email电子邮箱。</span></div>');
                return false;
            } else if (!search_str.test($(this).val())) {
                $memail.html('<div class="err_message error"><span class="icon">输入的电子邮箱格式不正确。</span></div>');
                return false;
            } else {
                $memail.html('<div class="err_message right"><span class="rightIcon"></span></div>');
            }
            
        });
        //电话
        $("#tel").focus(function () {
            $(this).addClass('input_focus');
            $("#mtel").html('<div class="err_message"><span class="icon">请输入您常用的联系电话。</span></div>');
        }).blur(function () {
            $(this).removeClass('input_focus');
            $(this).triggerHandler('keyup');
        }).keyup(function () {
            var search_str = /^1[3|4|5|8][0-9]\d{4,8}$/;
            if ($(this).val() == '') {
                $("#mtel").html('<div class="err_message error"><span class="icon">请输入您的联系电话。</span></div>');
                return false;
            } else if (!search_str.test($(this).val())) {
               
                $("#mtel").html('<span class="icon" style="color:red;">输入的联系电话格式不正确。</span>');
               
                return false;
            } else {
               
                $("#mtel").html('<div class="err_message right"><span class="rightIcon"></span></div>');
            }
            
        });
              $(".attendance_num").change(
                   
           function(){
                  $('.telnumr').remove();
                  $('.credential_no_numr').remove();
                  $('.teli').remove();
              var num=$(".attendance_num").val();
              if(num == 1){
                  return;
              }else{
                for(i=1;i<=num-1;i++){
                    $("#InputsWrapper").append('<input type="text" name="tel[]" value="" id="tel" class="telnumr"><i class="teli">*</i>');    
                    $("#credential").append('<input type="text" name="credential_no[]" value="" class="credential_no_numr"><i class="teli">*</i>');
                }  
              }

           }

        );

// $(document).ready(function(){
  
//   if( $(".stylenum").val()==1){
// 	  $(".bespeak_tab li :first").addClass("on");
// 	   $(".bespeak_tab li :last").removeClass('on');

// 	$('.num1').show();
// 	$('.num2').hide();
	
//   }else{
// 	   $(".bespeak_tab li :last").addClass("on");
// 	    $(".bespeak_tab li :first").removeClass('on');
// 	  $('.num2').show();
// 	$('.num1').hide();  
	
//   }
// });		
</script>
</body>
</html>