<style>
    body{margin: 20px 0;}
    .logdata dd input[type="text"] {box-sizing: content-box;}
    select{width: 33%;height: 20px;font-size: 14px;color: rgb(85, 85, 85);line-height: 34px;padding: 6px 12px;  border-width: 1px;border-style: solid;border-color: rgb(204, 204, 204);border-image: initial;border-radius: 4px;box-sizing: content-box;}
    .logdata dt{width: 25%;min-width: 270px;font-family: 'Microsoft YaHei';}
    .btn_wrap_pd{text-align: right;border-top: 1px solid #eee;padding: 10px 20px 0 0;margin: 30px 0 0 0;}
    .btn_wrap_pd .btn_submit{padding: 6px 14px;border-radius: 6px;min-width: 0;cursor: pointer;font-weight: 600;}
    .logdata dd input[type="text"].error{border-color: red;outline-color: transparent;}
    label.error{color: red;}
</style>
<form action="{:U('Admin/ComArtCenter/addFund')}" method="post"  class="J_ajaxForm">
	<dl class="logdata">
	    <dt>财政拨款总额</dt><dd><input type="text" name='fund_totle' value="{$data.fund_totle}" /><span>（万元）</span><Form function="select" parameter="option('fund_source'),'dada',class='' name='fund_source',"/></dd>
	    <dt>财政拨款是否列入预算</dt><dd><input type="radio" name="isbudget"  value=1 <eq name="data.isbudget" value="1">checked</eq> /><label for="">是</label> <input type="radio" name="isbudget"  value=2 <eq name="data.isbudget" value="2">checked</eq> /><label for="">否</label></dd>
	    <dt>免费开放经费补助金额</dt><dd><input type="text" name='fund_free' value="{$data.fund_free}" /><span>（万元）</span></dd>
	    <dt>专项业务活动经费</dt><dd><input type="text" name='fund_major' value="{$data.fund_major}" /><span>（万元）</span></dd>
	</dl>
	<div class="btn_wrap_pd">
	    <input type="submit" value="提交" class="btn btn_submit mr10 J_ajax_submit_btn" />
	</div>
    <input type="hidden" value="{$Think.get.idcac}" name="id_cac">
    <input type="hidden" value="{$data.id_cac_fun}" name="id_cac_fun">
</form>
<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.cu.css"/>
<Admintemplate file="Common/submit"/>