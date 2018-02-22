<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <!-- <Admintemplate file="Common/Nav"/> -->
 <div class="nav">
    <ul class="cc">
        <li class="current"><a href="{:U('index')}">评论管理</a></li>
        
  </ul>
</div>
  
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
           
            
            <td align="left">发布ID</td>
            <td align="left">评论者</td>
            <td align="left">评论时间</td>
            <td align="left">被评论标题</td>
            <td align="left">被评论序号</td>
            <td align="left">状态</td>

            <td align="left">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
             <td align="left" style="text-align:center">{$vo.id}</td>
             <td align="left" style="text-align:center">{$vo.commentname}</td>
             <td align="left" style="text-align:center">{$vo.addtime}</td>
             <td align="left" style="text-align:center">{$vo.title}</td>
             <td align="left" style="text-align:center">{$vo.show_id}</td>
             <td align="left" style="text-align:center"><if condition="$vo['status'] eq '0' ">正常<else/>被举报</if></td>
             <!--<td align="left" style="text-align:center">{$vo.publish_content}</td>-->
             <td style="text-align:center"><a href="{:U('commentedit',array('id'=>$vo['id']))}">[修改]</a> | <a href="{:U('commentdelete',array('id'=>$vo['id']))}">[删除]</a></td>
            </tr>
          </volist>
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
    </div>
   
  <div class="pages">
                <if condition="$pageinfo.page !=''">{$pageinfo.page}<a href="###" class="jump">确定</a></if>
            </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js"></script>
<script>
//会员信息查看
function member_infomation(userid, modelid, name) {
	omnipotent("member_infomation", GV.DIMAUB+'index.php?g=Member&m=Member&a=memberinfo&userid='+userid+'', "个人信息",1)
}
</script>
</body>
</html>