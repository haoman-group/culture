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
<form action="{:U('Admin/Library/addTalent')}" method="post"  class="J_ajaxForm">
    <dl class="logdata">
        <dt>姓名</dt><dd><input type="text" name='tal_name' value="{$data.tal_name}" /></dd>
        <dt>性别</dt><dd><input type="radio" name="tal_sex"  value=1 <eq name="data.tal_sex" value="1">checked</eq> /> <label for="">男</label><input type="radio" name="tal_sex"  value=2 <eq name="data.tal_sex" value="2">checked</eq> /><label for="">女</label></dd>
        <dt>民族</dt><dd><input type="text" name='tal_nation' value="{$data.tal_nation}" /></dd>
        <dt>出生日期</dt><dd><input type="text" name='tal_birthday' value="{$data.tal_birthday}" class="J_date" /></dd>
        <dt>政治面貌</dt><dd><input type="text" name='tal_pol_status' value="{$data.tal_pol_status}" /></dd>
        <dt>入党时间</dt><dd><input type="text" name='tal_join_date' value="{$data.tal_join_date}" class="J_date" /></dd>
        <dt>毕业院校</dt><dd><input type="text" name='tal_schooltag' value="{$data.tal_schooltag}" /></dd>
        <dt>毕业时间</dt><dd><input type="text" name='tal_graduate_date' value="{$data.tal_graduate_date}" class="J_date" /></dd>
        <dt>所学专业</dt><dd><input type="text" name='tal_major' value="{$data.tal_major}" /></dd>
        <dt>学历</dt><dd><input type="text" name='tal_edu_bg' value="{$data.tal_edu_bg}" /></dd>
        <dt>学位</dt><dd><input type="text" name='tal_edu_degree' value="{$data.tal_edu_degree}" /></dd>
        <dt>职称</dt><dd><input type="radio" name="tal_position"  value=1 <eq name="data.tal_position" value="1">checked</eq> /> <label for="">中级</label><input type="radio" name="tal_position"  value=2 <eq name="data.tal_position" value="2">checked</eq> /><label for="">高级</label></dd>
        <dt>岗位培训学时</dt><dd><input type="text" name='tal_train_hours' value="{$data.tal_train_hours}" /></dd>
        <dt>获奖情况</dt><dd><input type="text" name='tal_rewards' value="{$data.tal_rewards}" /></dd>
        <dt>是否业务人员</dt><dd><input type="radio" name="tal_if_business"  value=1 <eq name="data.tal_if_business" value="1">checked</eq> /> <label for="">是</label><input type="radio" name="tal_if_business"  value=2 <eq name="data.tal_if_business" value="2">checked</eq> /><label for="">否</label></dd>
        <dt>人员身份</dt><dd><input type="text" name='tal_identity' value="{$data.tal_identity}" /></dd>
    </dl>
    <div class="btn_wrap_pd">
        <input type="submit" value="提交" class="btn btn_submit mr10 J_ajax_submit_btn" />
    </div>
    <input type="hidden" value="{$Think.get.idlib}" name="library_id_lib">
    <input type="hidden" value="{$data.id_lib_tal}" name="id_lib_tal">
</form>
<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.cu.css"/>
<Admintemplate file="Common/submit"/>
<Admintemplate file="Common/_date"/>