<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap jj">
  <!-- <Admintemplate file="Common/Nav"/> -->
  <Admintemplate file="Common/Audittable"/>
  <div class="nav">
      <ul class="cc">
          <li><a href="{:U('index')}">文化政策</a></li>
          <li class="current"><a href="###">修改</a></li>
      </ul>
  </div>
  <div class="common-form table_full">
   
    <form method="post" class="J_ajaxForm" action="{:U('edit')}">
      <div class="table_list">
        <table cellpadding="0" cellspacing="0" class="table_form" width="100%">
          <tbody>
            <!-- <tr  name="selectshow" style="" >
             <th width="147">所属地区：</th>
             
            <td ><select id="area"  class="select_area" ></select></td>
            </tr> -->
            <tr>
              <th width="147">发布机构:</th>
              <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
              <td><input type="text" class="input" name="publish_agency" value="{$data.publish_agency}">
               <input type="hidden" value="{$data.id}" name="id">
              </td>
            </tr>
            <tr>
              <th width="147">发布日期:</th>
              <td><input type="text" class="input J_date"  name="publish_date" id="app" value="{$data.publish_date}"></td>
            </tr>
            <tr>
              <th width="147">名称:</th>
              <td><input type="text" class="input" name=" publish_name" id="controller" value="{$data.publish_name}"></td>
            </tr>
            <tr>
              <th width="147">文号:</th>
              <td><input type="text" class="input" name="publish_order" id="action" value="{$data.publish_order}"></td>
            </tr>
            <tr>
              <th width="147">主题字:</th>
              <td><input type="text" class="input length_5" name="publish_topword" value="{$data.publish_topword}"></td>
            </tr>
            <tr>
              <th width="147">内容:</th>
              <td><script type="text/plain" id="publish_content" name="publish_content">{$data.publish_content}</script>
              <?php echo Form::editor('publish_content','full','Cudatabase'); ?>
              </td>
            </tr>
            <tr>
             <!--  <td>内容:</td>
              <td>
                <textarea name="publish_content"></textarea> -->
            </tr>
             <tr>
                        <th>是否推荐至公共服务平台(数字资源)：</th>
                        <td>
                            <input type="checkbox" name="if_resources" value="1" <if condition="$data['if_resources'] eq 1 "> checked ="checked" </if>>是
                        </td>
                    </tr>
            <notempty name="data['reason']">
                <tr>
                    <th width="147">驳回原因：</th>
                    <td>
                        {$data.reason}
                    </td>
                </tr>
                </notempty>
            <!-- <tr>
              <td>类型:</td>
              <td><select name="type">
                  <option value="1" selected>权限认证+菜单</option>
                  <option value="0" >只作为菜单</option>
                </select>
                注意：“权限认证+菜单”表示加入后台权限管理，纯粹是菜单项请不要选择此项。</td>
            </tr> -->
          </tbody>
        </table>
      </div>
      <div class="">
          <div class="btn_wrap_pd">
              <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
          </div>
      </div>
    </form>
  </div>
  
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
</body>
</html>