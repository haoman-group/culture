<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="">山西非遗影像志列表</a></li>
            <li><a class="lib_add" href="{:U('add')}">添加</a></li>
        </ul>
    </div>
    <div class="table_list">

        <table width="100%" cellspacing="0">
            <thead>
            <tr>
                <td align="center">批次</td>
                <td align="left">名称</td>
                <td align="center">非遗批次</td>
                <td align="center">简介</td>
                <td align="center">视频标题</td>
                <td align="center">上传人</td>
                <td align="center">更新时间</td>
            <td align="center">操作</td>
            </tr>
            </thead>
            <tbody>
            <volist name="data" id="vo">
                <tr>
                    <td align="center">{$vo.id}</td>
                    <td align="left">
                        <if condition="$vo['position'] eq 'yes'">
                        <span style="color:red">[置顶]</span>
                        </if>
                        &nbsp;&nbsp;&nbsp;&nbsp;{$vo.title}</td>
                    <td align="center">{$vo.level}</td>
                    <td align="center">{$vo.intro|mb_strcut=###,0,40}...</td>
                    <td align="center">{$vo.video_title}</td>
                    <td align="center">{$vo.author}</td>
                    <td align="center">{$vo.updatetime|date="Y-m-d H:i:s",###}</td>
                        <td align="center">
                            <a href="{:U('Admin/Heritage/edit', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;
                            <a href="{:U('Admin/Heritage/delete', array('id'=>$vo['id']))}" class="J_ajax_del">[删除]</a>
                        </td>
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