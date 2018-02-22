<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
   <Admintemplate file="Common/Nav"/>
   <div class="h_a">搜索</div>
    <div class="table_list">
        <div class="table_full">
            <form class="J_ajaxForm"  method="get" >
                <input type="hidden" name="g" value="Admin">
                <input type="hidden" name="m" value="Management">
                <input type="hidden" name="a" value="manager">
                <input type="hidden" name="search" value="1">
                
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">用户名：</th>
                        <td><input type="text" name="username" class="input" value="{$Think.get.username}"></td>
                        
                    </tr>
                     <tr>
                        <th width="147">所属角色：</th>
                        <td><select name="role_id">
                        <option value="">请选择</option>
                        <volist name="role" id="vo">
                        <option value="{$vo['id']}">{$vo['name']}</option>
                        </volist>
                        </select></td>
                        
                    </tr>
                   
                </table>
                <div style="margin: 10px 0 0;">
                    <button class="btn">搜索</button>
                    <a style="margin-left:4px;" href="{:U('Admin/Management/manager')}" class="btn">清除条件</a>
                </div>
            </form>
        </div>
    </div>
   <div class="table_list">
   <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td width="">序号</td>
            <td width="" align="center" >用户名</td>
            <td width="" align="center" >所属角色</td>
            <td width=""  align="center" >最后登录IP</td>
            <td width=""  align="center" >最后登录时间</td>
            <td width=""  align="center" >E-mail</td>
            <td width=""  align="center" >地址</td>
            <td width="" align="center">备注</td>
            <td width="" align="center">状态</td>
            <td width="" align="center">管理操作</td>
          </tr>
        </thead>
        <tbody>
        <foreach name="Userlist" item="vo">
          <tr>
            <td width="5%" align="center">{$vo.id}</td>
            <td width="" >{$vo.username}</td>
            <td width="" ><?php echo D('Admin/Role')->getRoleIdName($vo['role_id'])?></td>
            <td width="" >{$vo.last_login_ip}</td>
            <td width=""  >
            <if condition="$vo['last_login_time'] eq 0">
            该用户还没登陆过
            <else />
            {$vo.last_login_time|date="Y-m-d H:i:s",###}
            </if>
            </td>
            <td width="">{$vo.email}</td>
            <td width="">{$vo.area_display}</td>
            <td width="">{$vo.remark}</td>
            <td width="">{$vo[status] =='1'?'正常':'禁止'}</td>
            <td width=""  align="center">
            <if condition="$User['username'] eq $vo['username']">
            <font color="#cccccc">修改</font> | 
            <font color="#cccccc">删除</font>
            <else />
            <a href="{:U("Management/edit",array("id"=>$vo[id]))}">修改</a> | 
            <a class="J_ajax_del" href="{:U('Management/delete',array('id'=>$vo['id']))}">删除</a>
            </if>
            </td>
          </tr>
         </foreach>
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
   </div>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
</body>
</html>