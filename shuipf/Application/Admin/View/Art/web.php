<style>
    body{margin: 20px 0;}
    .logdata dd input[type="text"] {box-sizing: content-box;}
    select{width: 33%;
    height: 20px;
    font-size: 14px;
    color: rgb(85, 85, 85);
    line-height: 34px;
    padding: 6px 12px;
    border-width: 1px;
    border-style: solid;
    border-color: rgb(204, 204, 204);
    border-image: initial;
    border-radius: 4px;box-sizing: content-box;}
    .logdata dt{width: 25%;min-width: 270px;font-family: 'Microsoft YaHei';}
    .btn_wrap_pd{text-align: right;border-top: 1px solid #eee;padding: 10px 20px 0 0;margin: 30px 0 0 0;}
    .btn_wrap_pd .btn_submit{padding: 6px 14px;border-radius: 6px;min-width: 0;cursor: pointer;font-weight: 600;}
    .logdata dd input[type="text"].error{border-color: red;outline-color: transparent;}
    label.error{color: red;}
</style>
<form action="" method="post" class="J_ajaxForm">
    <span style="margin-left:40px;">望楼采集的数据来源(网址):</span><input type="text">
    <div class="btn_wrap_pd">
        <input type="submit" value="提交" class="btn btn_submit mr10 J_ajax_submit_btn" />
    </div>
    <!-- <label for="">财政拨款总额</label> <input type="text" name='fund_totle' value="{$data.fund_totle}"> <label for="">（万元）</label>
    <Form function="select" parameter="option('fund_source'),$data['fund_source'],class='' name='fund_source',"/>
    <label for="">新增藏量购置费</label> <input type="text" name='fund_new' value="{$data.fund_new}"> <label for="">（万元）</label>
    <label for="">免费开放本地经费</label> <input type="text" name='fund_free' value="{$data.fund_free}"> <label for="">（万元）</label>
    <label for="">电子资源购置费</label> <input type="text" name='fund_ele' value="{$data.fund_ele}"> <label for="">（万元）</label>
    <input type="submit" value="提交"> -->
    <input type="hidden" value="{$Think.get.idlib}" name="library_id_lib">
    <input type="hidden" value="{$data.id_lib_fund}" name="id_lib_fund">
</form>
<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.cu.css"/>
<Admintemplate file="Common/submit"/>