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
<form action="{:U('Admin/ComArtCenter/addTrainact')}" method="post"  class="J_ajaxForm">
    <dl class="logdata">
        <dt>目录</dt><dd><Form function="select" parameter="option('train_type'),$data['ta_traintype'],class='' name='ta_traintype',"/></dd>
        <dt>培训名称</dt><dd><input type="text" name='ta_name' value="{$data.ta_name}" /></dd>
        <dt>主要内容</dt><dd><input type="text" name='ta_content' value="{$data.ta_content}" /></dd>
        <dt>培训时间</dt><dd><input type="text" name='ta_time' value="{$data.ta_time}" class="J_date" /></dd>
        <dt>活动地点</dt><dd><input type="text" name='ta_addr' value="{$data.ta_addr}" /></dd>
        <dt>收益人数</dt><dd><input type="text" name='ta_profitnum' value="{$data.ta_profitnum}" /></dd>
        <dt>活动开展频率</dt><dd><Form function="select" parameter="option('frequency_type'),$data['ta_frequency'],class='' name='ta_frequency',"/></dd>
    </dl>
    <div class="btn_wrap_pd">
        <input type="submit" value="提交" class="btn btn_submit mr10 J_ajax_submit_btn" />
    </div>
    <input type="hidden" value="{$Think.get.idcac}" name="id_cac" />
    <input type="hidden" value="{$data.id_cac_ta}" name="id_cac_ta" />
</form>
<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.cu.css"/>
<Admintemplate file="Common/submit"/>
<Admintemplate file="Common/_date"/>