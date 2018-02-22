<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="">志愿者列表</a></li>
        </ul>
    </div>
    <div class="table_list">

        <table width="100%" cellspacing="0">
            <thead>
            <tr>
                <td align="center">序号</td>
                <td align="center">姓名</td>
                <td align="center">性别</td>
                <td align="center">政治面貌</td>
                <td align="center">单位性质</td>
                <td align="center">学校</td>
                <td align="center">专业</td>
                <td align="center">学历</td>
                <td align="center">联系方式</td>
                <td align="center">发布时间</td>
                <td align="center">操作</td>
            </tr>
            </thead>
            <tbody>
            <volist name="data" id="vo">
                <tr>
                    <td align="center">{$vo.id}</td>
                    <td align="center">{$vo.name}</td>
                    <td align="center">{$vo.gender}</td>
                    <td align="center">{$political_status_array[$vo[political_status]]}</td>
                    <td align="center">{$unit_type_array[$vo[unit_type]]}</td>
                    <td align="center">{$vo.university}</td>
                    <td align="center">{$vo.major}</td>
                    <td align="center">{$vo.degree}</td>
                    <td align="center"></td>
                    <td align="center">{$vo.update_time|date="Y-m-d H:i:s",###}</td>
                    <td align="center"><a href="{:U('show', array('id'=>$vo['id']))}">[详情]</a>
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