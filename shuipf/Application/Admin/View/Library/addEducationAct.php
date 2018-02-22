<style>
    body{margin: 20px 0;}
    .logdata dd input[type="text"] {box-sizing: content-box;}
    select,input[type="date"]{width: 33%;height: 20px;font-size: 14px;color: rgb(85, 85, 85);line-height: 34px;padding: 6px 12px;  border-width: 1px;border-style: solid;border-color: rgb(204, 204, 204);border-image: initial;border-radius: 4px;box-sizing: content-box;}
    .logdata dt{width: 25%;min-width: 270px;font-family: 'Microsoft YaHei';}
    .btn_wrap_pd{text-align: right;border-top: 1px solid #eee;padding: 10px 20px 0 0;margin: 30px 0 0 0;}
    .btn_wrap_pd .btn_submit{padding: 6px 14px;border-radius: 6px;min-width: 0;cursor: pointer;font-weight: 600;}
    .logdata dd input[type="text"].error{border-color: red;outline-color: transparent;}
    label.error{color: red;}
</style>
<form action="{:U('Admin/Library/addEducationAct')}" method="post"  class="J_ajaxForm">
    <dl class="logdata">
        <dt>目录</dt><dd><Form function="select" parameter="option('edu_act_catalog'),$data['edu_act_catalog'],class='' name='eact_catelog',"/></dd>
        <dt>活动名称</dt><dd><input type="text" name='eact_title' value="{$data.eact_title}" /></dd>
        <dt>参加人数</dt><dd><input type="text" name='eact_join_num' value="{$data.eact_join_num}" /></dd>
        <dt>活动时间</dt><dd><input type="text" name='eact_date' value="{$data.eact_date}" class="J_date" /></dd>
        <dt>活动地点</dt><dd><input type="text" name='eact_location' value="{$data.eact_location}" /></dd>
        <dt>主要内容</dt><dd><input type="text" name='eact_content' value="{$data.eact_content}" /></dd>
    </dl>
    <div class="btn_wrap_pd">
        <input type="submit" value="提交" class="btn btn_submit mr10 J_ajax_submit_btn" />
    </div>
    <input type="hidden" value="{$Think.get.idlib}" name="library_id_lib">
    <input type="hidden" value="{$data.id_lib_comm}" name="id_lib_comm">
</form>
<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.cu.css"/>
<Admintemplate file="Common/submit"/>
<Admintemplate file="Common/_date"/>