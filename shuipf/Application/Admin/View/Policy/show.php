<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<style>
  .table_full tr span{
      display:inline !important;
  }
</style>
<body class="J_scroll_fixed">
<div class="wrap jj">
  
 <if condition="$_GET['showtype'] neq '' || $_GET['type'] neq ''">
      <Admintemplate file="Common/actionNav"/>
      <else/>
      <div class="nav">
    <ul class="cc">
        <li class="current"><a href="{:U('search')}" >查看</a></li>
        
  </ul>
</div>
      <!--<Admintemplate file="Common/Nav"/>-->
  </if>
  <div class="common-form table_full">
   
    <form method="post" class="J_ajaxForm" action="{:U('edit')}">
      <!-- <div class="h_a">文化政策</div> -->
      <div class="table_list">
        <table cellpadding="0" cellspacing="0" class="table_form" width="100%">
          <tbody>
            <tr>
              <th width="147">发布机构:</th>
              <td><input type="text" class="input" name="publish_agency" value="{$data.publish_agency}" disabled="disabled" >
               <input type="hidden" value="{$data.id_publish}" name="id" disabled="disabled">
              </td>
            </tr>
             <tr>
              <th width="147">类目:</th>
              <td><input type="text" class="input" name="categoryname" id="app" value="{$data.categoryname}" disabled="disabled"></td>
            </tr>
            <!--<tr>
              <th width="147">所属地区:</th>
              <td><input type="text" class="input" name="area_display" id="app" value="{$data.area_display}" disabled="disabled"></td>
            </tr>-->
            <tr>
              <th width="147">发布日期:</th>
              <td><input type="text" class="input" name="publish_data" id="app" value="{$data.publish_date}" disabled="disabled"></td>
            </tr>
            <tr>
              <th width="147">名称:</th>
              <td><input type="text" class="input" name=" publish_name" id="controller" value="{$data.publish_name}" disabled="disabled"></td>
            </tr>
            <tr>
              <th width="147">文号:</th>
              <td><input type="text" class="input" name="publish_order" id="action" value="{$data.publish_order}" disabled="disabled"></td>
            </tr>
            <tr>
              <th width="147">主题字:</th>
              <td><input type="text" class="input length_5" name="publish_topword" value="{$data.publish_topword}" disabled="disabled"></td>
            </tr>
            <tr>
              <th width="147">内容:</th>
              <!-- <td><textarea name="publish_content" rows="5" cols="57" disabled="disabled">{$data.publish_content}</textarea></td> -->
               <td>{$data.publish_content}</td> 
            </tr>
          </tbody>
        </table>
      </div>
    </form>
    <!-- 审核状态显示 -->
    <if condition="$_GET['type'] neq ''">
        <form method="post" class="tq-check-form">
            <input type="hidden" name="g" value="admin">
            <input type="hidden" name="m" value="audit">
            <input type="hidden" name="a" value="add">   
            <h5>审核状态</h5>
            <div class="select-box">
                <span class="select-span">请选择</span>
                 <select name="auditstatus" id="" class="audit" dir="center">
                                   <option value="请选择">请选择</option>
                                   <option value="40">驳回</option>
                                   <option value="35">审核通过</option>
                        
                                </select>
            </div>        
            
            <div class="reason" hidden>
                <h6>驳回原因</h6>
                <input type="hidden" name="category" value="<?php echo $_GET['type'] ?>">
                <input type="hidden" name="cid" value="{$data.id}">
                <input type="hidden" name="type" value="<?php echo $_GET['type'] ?>">
                <textarea name="reason" placeholder="请输入驳回原因"></textarea>
            </div>
            
            <input type="submit" class="btn btn_submit mr10 J_ajax_submit_btn" value="提交" />
            
        </form>
        
    </if>
  </div>
   <Admintemplate file="Common/Audittable"/>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
<script type="text/javascript">
    // 审核状态显示
    $(".audit").on("change",function(){
        var getSelectVal = $(".select-box option:selected").text();
        $(".select-box .select-span").text(getSelectVal);
        var audit = $(this).val();
        if(audit == 40){
            $(".reason").show();
        }else{
            $(".reason").hide();
        }
    });
</script>
</body>
</html>