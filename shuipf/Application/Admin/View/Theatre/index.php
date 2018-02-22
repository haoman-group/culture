<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <!-- <Admintemplate file="Common/Nav"/> -->
 <div class="nav">
    <ul class="cc" style="width:100%">
        <li class="current"><a href="{:U('index')}">展馆</a></li>

        <li class="adminbtnbox">
            <input type="button" value="网络API数据导入" class='btn  btnlistlan btnlistgrey'  data-type="importapi" />
            <input type="button" value="硬件设备数据导入" class='btn  btnlistlan btnlistgrey'  />
            <input type="button" value="语音录入" class='btn  btnlistlan btnlistgrey'   />
            <input type="button" value="Excel数据导入" class='btn btnlistlan btnlistgrey' data-type="import"  style="margin-right: 20px;"  />
            <a class="lib_add" href="{:U('add')}">添加</a></li>
  </ul>
</div>
  
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td  align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            
            <td align="left">发布ID</td>
            <td align="left">发布机构</td>
            <td align="left">发布时间</td>
            <td align="left">剧院名称</td>
            <td align="left">上传者</td>
            <td align="left">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
              <td align="left"><input type="checkbox"></td>
             <td align="left" style="text-align:center">{$vo.id}</td>
             <td align="left" style="text-align:center">{$vo.unit}</td>
             <td align="left" style="text-align:center">{$vo.addtime}</td>
             <td align="left" style="text-align:center">{$vo.title}</td>
            
             <td align="left" style="text-align:center">{$vo.author_name}</td> 
             <td style="text-align:center"><a href="{:U('edit',array('id'=>$vo['id']))}">[修改]</a> | <a href="{:U('delete',array('id'=>$vo['id']))}">[删除]</a></td>
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
<script type="text/javascript" src="{$config_siteurl}statics/cu/layer/layer.js"></script>
<script>
    $('input.btnlistlan').on('click',function(){
        var type = $(this).data('type');

        if($(this).hasClass("btnlistgrey")){
            layer.msg("功能暂未开放")
        }
        else{
            var index = layer.open({
                type: 2,
                title: '添加',
                shadeClose: true,
                shade: 0.8,
                area: ['40%', '40%'],
                content: '/Admin/Art/'+type
            });
        }


    });
</script>
</body>
</html>