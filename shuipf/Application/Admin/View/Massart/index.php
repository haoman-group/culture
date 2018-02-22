<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <div class="nav">
        <ul class="cc"  style="width:100%">
            <li class="current"><a href="{:U('index')}">群众文艺列表</a></li>
            <li class="adminbtnbox">
                <a href="{:U('export')}"  class='btn btn-export'>导出到Excel</a>
            <!-- </li>
            <li> -->
            <a class="lib_add" href="{:U('add')}">添加</a></li>
        </ul>
    </div>
    <div class="table_list">

        <table width="100%" cellspacing="0">
            <thead>
            <tr>
                <td align="center">id</td>
                <td align="center">标题</td>
                <td align="center">副标题</td>
                <td align="center">关键词</td>
                <td align="center">分类</td>  
                <td align="center">第几届</td>
                <td align="center">点击量</td>
                <td align="center">作者</td>
                <td align="center">新增时间</td>
                <td align="center">地址</td>
               <td align="center">操作</td>
            </tr>
            </thead>
            <tbody>
            <volist name="data" id="vo">
                <tr>
                    <td align="center">{$vo.id}</td>
                    <td align="center">{$vo.title}</td>
                    <td align="center">{$vo.deputy_title}</td>
                    <td align="center">{$vo.keywords}</td>
                    <td align="center">{$category[$vo['category']]}</td>
                    <td align="center">第{$vo.session}届</td>
                    <td align="center">{$vo.hits}</td>
                    <td align="center">{$vo.username}</td>
                    <td align="center">{$vo.addtime|date="Y-m-d H:i:s",###}</td>
                    <td align="center">{$vo.address}</td>
            <td align="center"><a href="{:U('Admin/Massart/edit', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;<a
                            href="{:U('Admin/Massart/delete', array('id'=>$vo['id']))}" class="J_ajax_del">[删除]</a></td>
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