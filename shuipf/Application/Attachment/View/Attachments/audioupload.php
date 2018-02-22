<?php if (!defined('SHUIPF_VERSION')) exit();
/**
 * Created by PhpStorm.
 * User: zsun
 * Date: 12/10/16
 * Time: 00:23
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>YOUKU OPENAPI File Upload Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
        .uploadfile {
            width: 150px;
            height: 14px;
            vertical-align: top;
        }
    </style>
</head>
<body>
<div id="audio-upload">
    <div class="container">
        <form class="well form-horizontal" name="audio-upload" enctype="multipart/form-data" onsubmit="return uploadFile();" >
            <input type="file" name="file" value=""/>
            <br/>
            <input type="submit" value="提交">
        </form>
        <div id="complete"></div>
        <br>
        <div class="well"><h3>说明</h3>
            <ul>
                <li>最大支持上传<strong>20 MB</strong> 音频文件</li>
                <li>允许上传的视频格式为：mp3。不符合格式的视频将会被丢弃，请确保视频格式的正确性，避免上传失败</li>
            </ul>
        </div>
    </div>
    <div id="audio-id" style="display:none"></div>
    <div id="audio-title" style="display:none"></div>
    <script src="{$config_siteurl}statics/js/jquery.js"></script>
    <script src="{$config_siteurl}statics/js/common.js"></script>
    <script>
        function uploadFile(){
            var formData = new FormData();
            formData.append("file", $(".form-horizontal input[name='file']")[0].files[0]);
            $.ajax({
                url:"{:U('Admin/Art/audioUpload')}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    if(data.status == 1) {
                        //console.log(data.data);
                        $('#complete').html('上传成功');
                        $('#audio-id').html(data.data.file.savepath + data.data.file.savename);
                        $('#audio-title').html(data.data.file.name);
                        return true;
                    } else {
                        alert("上传失败");
                    }
                }
            });
            return false;
        }
    </script>
</body>
</html>
