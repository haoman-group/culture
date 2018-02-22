<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap jj">
 <!--  <Admintemplate file="Common/Nav"/> -->
 <div class="nav">
    <ul class="cc">
        <li ><a href="{:U('index')}">文化政策</a></li>
        <li class="current"><a href="###">添加</a></li>
         <!--<li ><a  class='  btn_add1' onclick="tel()"  />文本扫描</a></li>
            <li ><a  class='  btn_add1'  onclick="tel()" />语音录入</a></li>
        <li ><a  class='btn_add' data-type="web"  />网络采集</a></li>-->
  </ul>
</div>
  <div class="common-form table_full">

    <form  class="J_ajaxForm" method="post"  action="{:U('add')}">
      <!-- <div class="h_a">文化政策</div> -->
      <div class="table_list">
        <table cellpadding="0" cellspacing="0" class="table_form" width="100%">
          <tbody>
            <tr>
              <!-- <td width="140">上级:</td> -->
              <!-- <td><select name="parentid">
                  <option value="0">作为一级菜单</option>
                     {$select_categorys}
                </select></td> -->
                <th width="147">一级分类:</th>
                <td>
                        <select id="parentItems" name="art_cid" onchange="getchildlist(this)">
                              <option value='0'>--请选择--</option>
                                <volist name="category" id="ca">
                                    <option value="{$ca['cid']}">{$ca['name']}</option>
                                </volist>
                            </select>
                            <div id="childItems" style="display:inline-block;"></div>
                </td>
            </tr>
             <tr name="selectshow" >
                <!-- <th width="147">所属地区：</th>                              -->
                <td style="display:none"><select id="area" name="area"  class="select_area" ></select></td>
            </tr> 
            <tr>
              <th width="147">发布机构:</th>
              <td>
                <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                <input type="text" class="input" name="publish_agency" value=""></td>
            </tr>
            <tr>
              <th width="147">发布日期:</th>
              <td> <input type="text" name="publish_date" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;"></td>
            </tr>
            <tr>
              <th width="147">名称:</th>
              <td><input type="text" class="input" name=" publish_name" id="controller" value=""></td>
            </tr>
            <tr>
              <th width="147">文号:</th>
              <td><input type="text" class="input" name="publish_order" id="action" value=""></td>
            </tr>
            <tr>
              <th width="147">主题字:</th>
              <td><input type="text" class="input length_5" name="publish_topword" value=""></td>
            </tr>
            <tr>
              <th width="147">内容:</th>
              <!--<td><textarea name="publish_content" rows="5" cols="57">{$remark}</textarea></td>-->
              <td><script type="text/plain" id="publish_content" name="publish_content"></script>
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
                    <input type="checkbox" name="if_resources" value="1">是
                </td>
            </tr>
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
          <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">添加</button>
        </div>
      </div>
      <input type="hidden" name="art_cid" value="">
    </form>
  </div>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/cu/layer/layer.js"></script>
</body>
<script>
function tel(){
        alert("正在研发，敬请期待");
    }
     $('a.btn_add').on('click',function(){
        var type = $(this).data('type');
        
       
        var index = layer.open({
            type: 2,
            title: '添加',
            shadeClose: true,
            shade: 0.8,
            area: ['40%', '40%'],
            content: '/Admin/Art/'+type
        });
    });
</script>
</html>