<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!--* Created by PhpStorm.-->
<!--* User: zsun-->
<!--* Date: 1/26/17-->
<!--* Time: 10:11-->

<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <form name="myform" class="J_ajaxForm" action="{:U('ArtCategory/back')}" method="post">
        <div class="table_list">
            <table width="100%" cellspacing="0">
                <thead>
                <tr>
                    <td align="center" width="50">ID</td>
                    <td align="center" width="50">过滤名称</td>
                    <td align="center" width="50">过滤项名称</td>
                    <td align="center" width="50">状态</td>
                    <td align="center" width="80">添加时间</td>
                    <td align="center" width="80">操作</td>
                </tr>
                </thead>
                <tbody>
                <volist name="data" id="vo">
                    <tr>
                        <td align="center" width="50">{$vo.id}</td>
                        <td align="center">{$vo.filter_name}</td>
                        <td align="center">{$vo.item_name}</td>
                        <td align="center">{$vo.status}</td>
                        <td align="center">{$vo.addtime}</td>
                        <td align="center">
                            <?php
                            $op = array();

                            $op[] = '<a href="' . U('CustomizedFilter/edit', array('id' => $vo['id'])) . '">修改</a>';
                            $op[] = '<a class="J_ajax_del" href="' . U('CustomizedFilter/delete', array('id' => $vo['id'])) . '">删除</a>';
                            echo implode(" | ", $op);
                            ?>
                        </td>
                    </tr>
                </volist>
                </tbody>
            </table>
        </div>
        <div class="btn_wrap">

        </div>
    </form>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>