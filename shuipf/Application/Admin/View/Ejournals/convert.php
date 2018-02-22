<!doctype html>
<head>
    <title>上传并转化pdf</title>
    <script src="{$config_siteurl}statics/js/jquery.js" type="text/javascript"></script>
    <style>
     li {list-style-type:none;float:left;margin:15px;border:1px solid black}
    </style>
</head>
<body>
<input id="pdf" type="file" size="45" name="pdf"  >
<input type="button" id="buttonUpload"  class="btn" value="上传并转化"/>
<div class="container" id="images_lists">
    <ul></ul>
</div>
<script type="text/javascript">
    $("#buttonUpload").click(function () {
        $.ajaxFileUpload ({
            url:"{:U('convert')}", //你处理上传文件的服务端
            secureuri:false, //与页面处理代码中file相对应的ID值
            fileElementId:'pdf',
            //dataType: 'json', //返回数据类型:text，xml，json，html,scritp,jsonp五种
            success: function(data) {
                if(data.status == 1){
                    var images = data.data;
                    images.forEach(function(element) {
                        $('#images_lists ul').append("<li><img style='width:90px;height:90px;' src='"+element+"'></li>");
                    }, this);
                    $("#buttonUpload").val('成功!').attr('disabled','disabled');
                }else{
                    alert('发生错误:'+data.msg);
                }
            },
            error:function(data,xhr, status, e){
                console.log(data);
                console.log(xhr);
                console.log(status);
                console.log(e);
                alert('发生错误:'+data.msg);
            }
        })
    });
</script>
<script src="{$config_siteurl}statics/js/ajaxfileupload.js" type="text/javascript"></script>
</body>
