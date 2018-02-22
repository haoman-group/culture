<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <div class="nav">
        <ul class="cc" style="width:100%" >
          <li class="current"><a href="{:U('index')}">图书馆</a></li>

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
            <td align="left">序号</td>
            <td align="left">名称</td>
            <td align="left">地区</td>
            <td align="left">地址</td>
            <td align="left">占地面积(平方米)</td>
            <td align="left">总藏量(万册、件)</td>
            <td align="left">官方网站</td>
            <td align="left">联系电话</td>
            <td align="left">审核</td>
            <td align="left">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
             <td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
              <td align="left" style="text-align:center">{$vo.id}</td>
              <td align="left" style="text-align:center">{$vo.name}</td>
              <td align="left" style="text-align:center">{$vo.area_display}</td>
              <td align="left" style="text-align:center">{$vo.addr}</td>
              <td align="left" style="text-align:center">{$vo.covered_area}</td>
              <td align="left" style="text-align:center">{$vo.num_totle}</td>
              <td align="left" style="text-align:center">{$vo.dig_website}</td>
              <td align="left" style="text-align:center">{$vo.telephone}</td>
              <td align="left" style="text-align:center">{$AuditStatus[$vo[auditstatus]]}</td>
              <td align="left" style="text-align:center"><a href="{:U('Admin/Library/add', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;<a href="{:U('Admin/Library/del', array('id'=>$vo['id']) )}">[删除]</a></td>
            </tr>
          </volist>
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
    </div>
</div>
</body>
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
</html>