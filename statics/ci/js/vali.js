    $(function(){
        if($(".btncomregfrom_verify").length>0){
                var thisbtn=$(".btncomregfrom_verify");
//                nowvercount=60;
//                //nowvercount=6;
//                vercodetime(thisbtn);

                thisbtn.click(function(){		
                    var $btngetcode=$(this);
                    $btngetcode.attr("disabled","disabled");
                    var mobile=$("[name='mobile']").val().replace(/\s+/g,"");
                    sendsms(mobile,$btngetcode);

                });
            }



        $("#form_reg").validate({
            errorElement : "i",
            onkeyup : false,
            submitHandler : function(form){
                form.submit();
            },
            rules : {
                username:{
                    required : true,
                    chkusername : true
                    //,chkusernameed : true
                },
                mobile:{
                    required : true,
                    chkmobile : true
                    //,chkmobileed : true
                },
                chkuregagree:{
                    required : true
                },
                password :{
                    required : true,
                    chkpassword : true,
                    minlength : 6,
                    maxlength : 30
                },
                repassword :{
                    equalTo : "#password"
                },
                mobile_code :{
                    required : true,
                    chkvcode : true
                }
            },
            messages : {
                username:{
                    required : "请填写用户名/企业名称",
                    chkusername : "请填写字母、数字或中文，长度4到30个字"
                    //,chkusernameed : true
                },
                mobile:{
                    required : "请填写手机号",
                    chkmobile : "手机号码不正确"
                    //,chkmobileed : "手机号已注册"
                },
                chkuregagree:{
                    required : "需要同意协议"
                },
                password :{
                    required : "请输入密码",
                    chkpassword : "密码不能包含空格",
                    minlength : "密码不少于6位数",
                    maxlength : "密码不大于30位数"
                },
                repassword :{
                    equalTo : "两次输入的密码不相同"
                },
                mobile_code :{
                    required : "请填写验证码",
                    chkvcode : "验证码错误"
                }
            }
        })
    })
   
    
    function sendsms(mobile,btn){
    	$.ajax({
    		type:"GET",
    		url: "/?mobile="+mobile,
    		dataType:"json",
    		timeout:5000,
    		success: function(data,status){
    			if(data!=null ){
    				var ostatus=data["status"];
    				var msg=data["msg"];
    				if(ostatus==1 ){
    					vercodetime(btn);
    					}
    				else{
    					btn.removeAttr("disabled");
    					}
    				
    				}
    			}
    		,error:function(XHR, textStatus, errorThrown){
    			   console.log(textStatus+"\n"+errorThrown);
    			   btn.removeAttr("disabled");
    			}	
    	})	
    		
    }
        
    function vercodetime(btn){
    	if(typeof(nowvercount)!="undefined" && nowvercount==1){
    		btn.removeAttr("disabled").val("获取验证码").removeClass("btndis");
    		nowvercount=60;
    		//nowvercount=6;
    		return;
    	}
    	
    	if(btn.val()=="获取验证码"){
    		btn.attr("disabled","disabled").addClass("btndis");
    		nowvercount=60;
    		//nowvercount=6;
    	}
    	else{
    		nowvercount--;
    	}
    	
    	btn.val(nowvercount+"秒后可重新发送");
    	setTimeout(_vercodetime(btn),1000);
    	
    }

    function _vercodetime(btn){
    	return function(){
    		vercodetime(btn);
    	}	
    }  




    function hasspace(v){
        return v.indexOf(" ")>0;
    }

    jQuery.validator.addMethod("chkusername", function(value, element) {
            return /^[a-zA-Z0-9\u4e00-\u9fa5]{4,30}$/.test(value);  
    });
    jQuery.validator.addMethod("chkvcode", function(value, element) {
            return /^[a-zA-Z0-9]{4}$/.test(value);  
    });
    jQuery.validator.addMethod("chksmscode", function(value, element) {
        return /^[a-zA-Z0-9]{6}$/.test(value);  
    });
    jQuery.validator.addMethod("chkpassword", function(value, element) {
        return !hasspace(element.value);
    });

    jQuery.validator.addMethod("chkmobile", function(value, element) {
        return /^1[3|4|5|8|7|9][0-9]\d{8}$/.test(value);    
    });
    jQuery.validator.addMethod("postcode", function(value, element){
        return /^[1-9]\d{5}(?!\d)$/.test(value);
    });
    jQuery.validator.addMethod("chkemails",function(value,element){
        return /^[\w!#$%&'*+/=?^_`{|}~-]+(?:\.[\w!#$%&'*+/=?^_`{|}~-]+)*@(?:[\w](?:[\w-]*[\w])?\.)+[\w](?:[\w-]*[\w])?$/.test(value);
    });

    jQuery.validator.addMethod("chkmobileed", function(value, element) {
        var flag = false;
        $.ajax({
            type : "GET",
            url : ajaxdomain + 'Api/User/checkMobile?mobile=' + value,
            dataType:"json",
            async : false,
            timeout : 5000,
            success : function(result) {
                flag = result.status=="1";
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest.status + "|"
                        + XMLHttpRequest.readyState + "|" + textStatus);
            }
        });
        return flag;
    })

    jQuery.validator.addMethod("chkmobileis", function(value, element) {
        var flag = false;
        $.ajax({
            type : "GET",
            url : ajaxdomain + 'index.php/Member/Public/checkLoginMobile?mobile=' + value,
            dataType:"json",
            async : false,
            timeout : 5000,
            success : function(result) {
                flag = result.status=="1";
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest.status + "|"
                        + XMLHttpRequest.readyState + "|" + textStatus);
            }
        });
        return flag;
    })

