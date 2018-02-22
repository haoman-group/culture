<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<script>

//全局变量
var GV = {
    DIMAUB: "http://localhost/",
    JS_ROOT: "http://localhost/statics/js/"
};
</script>
<style type="text/css">
    input[type="text"]{box-sizing: content-box;}
</style>
<form action="{:U('Admin/Baseservices/content')}" method="post" class="J_ajaxForm">
    <dl class="logdata" style="padding-top: 40px;">
        <dt style="width: 150px;min-width: auto;">目录标题:</dt><dd style="margin-left: 150px;padding: 0 40px;"> <input type="text" name="content_title" value="{$data.content_title}" ></dd>
        <dt style="width: 150px;min-width: auto;">正文内容:</dt><dd style="margin-left: 150px;padding: 0 40px;"><script type="text/plain" id="content" name="content">{$data.content}</script>
             <?php echo Form::editor('content','basic','Cudatabase'); ?></dd>
    </dl>
    <div class="btn_wrap_pd" style="padding-left: 0;text-align: center;">
        <input type="submit" value="提交" class="btn btn_submit mr10 J_ajax_submit_btn" style="cursor: pointer;margin-top: 20px;" />
    </div>
    <input type="hidden" value="{$Think.get.id_content}" name="id_content">
    <input type="hidden" value="{$Think.get.id_project}" name="id_project">
</form>
<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.cu.css"/>
<Admintemplate file="Common/submit"/>