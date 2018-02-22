<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="{:U('index')}">基本服务项目信息</a></li>
            <li><a class="lib_add" href="{:U('addedit')}">添加</a></li>
        </ul>
    </div>
    <div class="table_list">

        <table width="100%" cellspacing="0">
            <thead>
            <tr>
                <!--<td align="center" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>-->
                <td align="center">序号</td>
                <td align="center">项目名称</td>
                <td align="center">类型</td>
                <td align="center">所在城市</td>
                <td align="center">所在区县</td>
                <td align="center">营业时间</td>
                <td align="center">更新时间</td>
                <td align="center">状态</td>
                <td align="center">操作</td>
            </tr>
            </thead>
            <tbody>
            <volist name="pageinfo.data" id="vo">
                <tr>
                    <!--<td align="center" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>-->
                    <td align="center">{$vo.id}</td>
                    <td align="center">{$vo.project_title}</td>
                    <td align="center">{$vo.type}</td>
                    <td align="center">{$vo.city}</td>
                    <td align="center">{$vo.county}</td>
                    <td align="center">{$vo.business_hours}</td>
                    <td align="center">{$vo.updatetime}</td>
                    <td align="center"><?php echo $vo['status'] == '0' ? '正常' : '其他'; ?></td>
                    <td align="center"><a href="{:U('addedit', array('id'=>$vo['id']) )}">[修改]</a>&nbsp;|&nbsp;<a
                            href="{:U('delete', array('id'=>$vo['id']) )}">[删除]</a></td>
                </tr>
            </volist>
            </tbody>
        </table>
        <div class="p10">
            <div class="pages"> {$pageinfo.page}</div>
        </div>
    </div>
</div>
</body>
</html>