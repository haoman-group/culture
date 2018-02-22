<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>添加新文章 - 系统后台 - {$Config.sitename} - by LvyeCMS</title>
<Admintemplate file="Admin/Common/Cssjs"/>
<style type="text/css">
.col-auto {
	overflow: hidden;
	_zoom: 1;
	_float: left;
	border: 1px solid #c2d1d8;
}
.col-right {
	float: right;
	width: 210px;
	overflow: hidden;
	margin-left: 6px;
	border: 1px solid #c2d1d8;
}

body fieldset {
	border: 1px solid #D8D8D8;
	padding: 10px;
	background-color: #FFF;
}
body fieldset legend {
    background-color: #F9F9F9;
    border: 1px solid #D8D8D8;
    font-weight: 700;
    padding: 3px 8px;
}
.list-dot{ padding-bottom:10px}
.list-dot li,.list-dot-othors li{padding:5px 0; border-bottom:1px dotted #c6dde0; font-family:"宋体"; color:#bbb; position:relative;_height:22px}
.list-dot li span,.list-dot-othors li span{color:#004499}
.list-dot li a.close span,.list-dot-othors li a.close span{display:none}
.list-dot li a.close,.list-dot-othors li a.close{ background: url("{$config_siteurl}statics/images/cross.png") no-repeat left 3px; display:block; width:16px; height:16px;position: absolute;outline:none;right:5px; bottom:5px}
.list-dot li a.close:hover,.list-dot-othors li a.close:hover{background-position: left -46px}
.list-dot-othors li{float:left;width:24%;overflow:hidden;}
</style>
</head>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
 
  <div class="col-right">
    <div class="table_full">
      <table width="100%">
      	
	    </table>
	  </div>
	
	
  </div>
	<div class="col-auto">
    <div class="h_a">信息编辑</div>
    <div class="table_full">
      <table width="100%">
      	<tr><td>名称</td><td>{$data.active_name}</td></tr>
      	<tr>
        <td>图片</td>
        <td>
        <img src="{$data['active_thumb']}" style='width:200px;height:150px' alt="">
        </td>
        </tr>

        <tr>
        <td>活动简介</td>
        <td>
           {$data.description}   
        </td>
        </tr>

        <tr>
        <td>活动详情</td>
        <td>
           
              {$data.content}
            
        </td>
        </tr>
      </table>

    </div>

  </div>
  <div class="btn_wrap" style="z-index:999;text-align: center;position: relative;" >
    
  </div>

</div>

<script type="text/javascript" src="{$config_siteurl}statics/js/common.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>
<script type="text/javascript"> 
$(function(){
  $(".J_ajax_close_btn").on('click', function (e) {
      e.preventDefault();
      Wind.use("artDialog", function () {
          art.dialog({
              id: "question",
              icon: "question",
              fixed: true,
              lock: true,
              background: "#CCCCCC",
              opacity: 0,
              content: "您确定需要关闭当前页面嘛？",
              ok:function(){
                window.close();
                return true;
              }
          });
      });
  });

  Wind.use('validate', 'ajaxForm', 'artDialog', function () {
    //javascript
        {$formJavascript}
        var form = $('form.J_ajaxForms');
        //ie处理placeholder提交问题
        if ($.browser.msie) {
            form.find('[placeholder]').each(function () {
                var input = $(this);
                if (input.val() == input.attr('placeholder')) {
                    input.val('');
                }
            });
        }
        //表单验证开始
        form.validate({
      //是否在获取焦点时验证
      onfocusout:false,
      //是否在敲击键盘时验证
      onkeyup:false,
      //当鼠标掉级时验证
      onclick: false,
            //验证错误
            showErrors: function (errorMap, errorArr) {
        //errorMap {'name':'错误信息'}
        //errorArr [{'message':'错误信息',element:({})}]
        try{
          $(errorArr[0].element).focus();
          art.dialog({
            id:'error',
            icon: 'error',
            lock: true,
            fixed: true,
            background:"#CCCCCC",
            opacity:0,
            content: errorArr[0].message,
            cancelVal: '确定',
            cancel: function(){
              $(errorArr[0].element).focus();
            }
          });
        }catch(err){
        }
            },
            //验证规则
            // rules: {$formValidateRules},
            //验证未通过提示消息
            // messages: {$formValidateMessages},
            //给未通过验证的元素加效果,闪烁等
            highlight: false,
            //是否在获取焦点时验证
            onfocusout: false,
            //验证通过，提交表单
            submitHandler: function (forms) {
        var dialog = art.dialog({
                  id: 'loading',
                  fixed: true,
                  lock: true,
                  background: "#CCCCCC",
                  opacity: 0,
                  esc:false,
                  title: false
                });
                $(forms).ajaxSubmit({
                    url: form.attr('action'), //按钮上是否自定义提交地址(多按钮情况)
                    dataType: 'json',
                    beforeSubmit: function (arr, $form, options) {
                        
                    },
                    success: function (data, statusText, xhr, $form) {
            dialog.close();
                        if(data.status){
              setCookie("refersh_time",1);
              //添加成功
              Wind.use("artDialog", function () {
                  art.dialog({
                      id: "succeed",
                      icon: "succeed",
                      fixed: true,
                      lock: true,
                      background: "#CCCCCC",
                      opacity: 0,
                      content: data.info,
                  button:[
                    {
                      name: '继续添加？',
                      callback:function(){
                        window.location.href = "{:U('Admin/Product/union_active_add')}";
                        return true;
                      },
                      focus: true
                    },{
                      name: '返回活动列表',
                      callback:function(){
                        window.location.href = "{:U('Admin/Product/union_active')}";
                        return true;
                      }
                    }
                  ]
                  });
              });
            }else{
              isalert(data.info);
            }
                    }
                });
            }
        });
    });
})
</script>
</body>
</html>
