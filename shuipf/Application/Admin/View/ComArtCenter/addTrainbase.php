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
<form action="{:U('Admin/ComArtCenter/addTrainbase')}" method="post"  class="J_ajaxForm">
    <dl class="logdata">
        <dt>地点</dt><dd><input type="text" name='tb_addr' value="{$data.tb_addr}" /></dd>
        <dt>基地面积</dt><dd><input type="text" name='tb_area' value="{$data.tb_area}" /></dd>
        <dt>可容纳培训人数</dt><dd><input type="text" name='tb_includenum' value="{$data.tb_includenum}" /></dd>
        <dt>年举办培训次数</dt><dd><input type="text" name='tb_yearnum' value="{$data.tb_yearnum}" /></dd>
    </dl>
    <div class="btn_wrap_pd">
        <input type="submit" value="提交" class="btn btn_submit mr10 J_ajax_submit_btn" />
    </div>
    <input type="hidden" value="{$Think.get.idcac}" name="id_cac" />
    <input type="hidden" value="{$data.id_cac_tb}" name="id_cac_tb" />
</form>
<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.cu.css"/>
<Admintemplate file="Common/submit"/>