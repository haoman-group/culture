<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
     <meta name= "viewport" content= "width=device-width" initial-scale="1" minimum-scale="1" maximum-scale="1">
    <block name="title">
        <title>文化产业服务平台</title>
    </block>
    <block name="before_styles"></block>

    <block name="styles">
        <link rel="stylesheet" href="{$config_siteurl}statics/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/swiper.css" />
        <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/style.css" />
        <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/base.css" />
        <link rel="stylesheet" href="{$config_siteurl}statics/cu/webuploader/xb-webuploader.css" />
        <link rel="stylesheet" href="{$config_siteurl}statics/cu/font/font-awesome.css" />
        <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">


    </block>

    <block name="after_styles"></block>
</head>
<body>

    <block name="top">
        <template file="Industry/common/_top.php"/>
    </block>

    <block name="header">
        <template file="Industry/common/_header.php"/>
    </block>
    <block name="content">

    </block>
     <block name="footer">
        <template file="Industry/common/_footer.php"/>
    </block>

    <block name="before_scripts"></block>

    <block name="scripts">
       
        <script type="text/javascript" src="{$config_siteurl}statics/ci/js/jquery.min.js"></script>
         <script type="text/javascript" src="{$config_siteurl}statics/cu/bootstrap/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{$config_siteurl}statics/ci/js/swiper.min.js"></script>
        <script type="text/javascript" src="{$config_siteurl}statics/ci/js/topMenu.js" ></script>
        <script type="text/javascript" src="{$config_siteurl}statics/ci/js/common.js" ></script>
         <script type="text/javascript">
        //全局变量
        var GV = {
            DIMAUB: "{$config_siteurl}",
            JS_ROOT: "{$config_siteurl}statics/js/"
        };
    </script>
        <script src="{$config_siteurl}statics/cu/layer/layer.js"></script>
        <script src="{$config_siteurl}statics/js/wind.js"></script>
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
          <script>

  $(".supp").click(function(){
      var type=$(this).attr("data-type");
     if(type == 1){
        $(".table1").show();
        $(this).addClass('supp on');
        $('.type').children("span:last-child").removeClass('on');

        $(".table2").hide();
     }else{
          $(this).addClass('supp on');
        $(".table1").hide();
          $('.type').children("span:first-child").removeClass('on');
        $(".table2").show(); 
     }
  });
    $(".button").click(function(){
    $(".addcontent").fadeIn();
   
    
  });
</script>
<script>
  function file(){
      
       var index = layer.open({
            type: 2,
            title: '添加',
            shadeClose: true,
            shade: 0.8,
            area: ['40%', '40%'],
            content: 'Industry/Supply/file'
        });
   
  } 

</script>
<script type="text/javascript" src="{$config_siteurl}statics/ci/js/linkagesel/comm.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/ci/js/linkagesel/linkagesel.js"></script>
    <script>

        var opts = {
            ajax: "/index.php?g=Api&m=Area&a=ajax",
            selStyle: 'margin-left: 6px;',
            select:  '#area',
            head: '请选择',
            defVal: [1,25000000,],
            selName:'area[]',
            level: 3,
        };
        var linkageSel = new LinkageSel(opts);

        linkageSel.onChange(function() {
            var selected = linkageSel.getSelectedArr();
            $(".area").val(selected.toString());
        });
    </script>
     <script type="text/javascript">
        //全局变量
        var GV = {
            DIMAUB: "{$config_siteurl}",
            JS_ROOT: "{$config_siteurl}statics/js/"
        };
    </script>
   
<!--  
    <script type="text/javascript" src="{$config_siteurl}statics/ci/js/layer/layer.js"></script>
    <script>
        var uid = {$uid};
        checked_login(uid);
    </script>-->

    	<script type="text/javascript">

			$(function(){
				$(".btn .submit").click(function(){
					
					var data = $('form').serialize();
					$.post("{:U('Industry/Finance/industry_agent')}",data,function(data){
						
							alert('添加成功');

							window.location.href='{:U("Industry/industry/detail")}&id='+data.id;
						
					},"json")
				})
			})

		</script>
         <script type="text/javascript">
        $(function(){
            $('.inpage_r').click(function(event) {
                /* Act on the event */
                history.go(-1);
            });
            $('#agree').click(function(event){
                // if($(this).checked==true){
                //     
                if($('#agree').is(':checked')) {
                   $('.inpage_sub').click(function(event) {
                      $('#inpage_prompt').css({'display':'none'})
                   });  
                }
            })
        })
    </script>
      <script type="text/javascript">
        $(function(){
            // $('input[name=id]').val(111);
            $(".btn .true").click(function(){
                var datas = $("form").serialize();
                $.post("{:U('Industry/Finance/credit_apply')}",datas,function(data){
                    if(data.status==0){
                        alert(data.message)
                    }else{
                        $("#prompt").css({display:'block'});
                        $('input[name=id]').val(data.id);
                        $("#prompt .prompt_content h3 span").text(data.message)
                        $("#prompt button.no").click(function(){
                        	window.location.href = "{:U('Industry/Finance/credit_result')}";
                        })
                        $("#prompt button.yes").click(function(){
                            $("#prompt").css({display:'none'});

                        })
                    }
                },"json")
            })
        })
    </script>
    <script>
        $(function(){
            $('#tax').attr('placeholder','点击上传图片')
            $('#licence').attr('placeholder','点击上传图片')
            
        })
    </script>




    
    <script src="{$config_siteurl}statics/ci/js/jquery.validate.js"></script>
    <script src="{$config_siteurl}statics/ci/js/vali.js"></script>
	 <script type="text/javascript">
        //全局变量
        var GV = {
            DIMAUB: "{$config_siteurl}",
            JS_ROOT: "{$config_siteurl}statics/js/"
        };
    </script>
    <script src="{$config_siteurl}statics/js/wind.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>
    
    <script>
        $(function(){
        	//点击弹上传附件页面
            $(".linkupintro").click(function(){
            	
                $(".upintro").modal({
                });
               
                var time = setInterval(function(){
    				var path  = $("#licence").val();
    				$("#yingye").attr('src',path); 
   				},100);
    			var thumb = setInterval(function(){
    				var img = $("#sw").val();
    				$('#shuiwu').attr('src',img);
    			},100);
            });
            
            //点击图标关闭窗口
            $(".upintro .aclose").click(function(){
                $(".upintro").modal("hide");
            })
            
        })
    </script>
    <script type="text/javascript">
        $('#btn_send_sms').click(function () {
            var mobile = $('#mobile').val();
            send_reg_sms(mobile);
        });
		
		
    </script>
    <script type="text/javascript">
		//点击取消隐藏窗口并清空value值
             $(".register_off").click(function(){
             	$("#licence").attr('value','');
				$("#sw").attr('value','');
             	$(".upintro").modal("hide");
             })
        //点击确定隐藏窗口
            $(".register_close").click(function(){
//          	var path  = $("#licence").val();
//          	alert(path);
            	$(".upintro").modal("hide");
            	
            })
    </script>

</block>

  
</body>

</html>
