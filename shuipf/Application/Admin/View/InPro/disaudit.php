<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <div class="h_a">产业项目列表</div>


    <div class="table_list">
        <table width="100%">
            <colgroup>
                <col width="50">
                <col width="400">
                <col width="200">
                <col width="300">
                <col width="300">

            </colgroup>
            <thead>
            <tr>
                <td align='left'>ID</td>
                <td align='center'>项目名称</td>
                <td align="center">项目负责人</td>
                <td align="center">申请时间</td>

                <td align='center'>操作</td>
            </tr>
            </thead>
            <tbody>
            <content action="declarey" catid="$catid" order="id DESC" num="6" page='$page'>
                <volist name="data" id="vo">
                    <tr>
                        <td align='left'>{$vo.id}</td>
                        <td align='center'>{$vo.pname}</td>
                        <td align="center">{$vo.pleader}</td>
                        <td align="center">{$vo.create_time|date="Y-m-d H:i:s",###}</td>

                        <td align='center'>

                            <a href="{:U('Admin/InPro/show',array('id'=>$vo['id']))}">请审核</a>
                            &nbsp;&nbsp;

                            <a href="{:U('Admin/InPro/delete',array('id'=>$vo['id']))}">删除</a>
                            	
                        </td>
                    </tr>


                </volist>
            </content>

            </tbody>

        </table>


</div>


