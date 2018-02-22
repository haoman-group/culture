<?php
/**
 * Created by PhpStorm.
 * User: zsun
 * Date: 1/26/17
 * Time: 11:07
 */
if (!defined( 'SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head" />
<style>
    .jsaddimgul .operate span{display: none;}
</style>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav" />
    <div class="h_a">内容</div>
    <form action="{:U('CustomizedFilter/edit')}" method="post">
        <div class="table_full table_art">
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <volist name="data" id="vo">

                    <tr>
                        <th width="147">ID：</th>
                        <td>
                            <input type="text" class="input" name="id" id="id" size="20" value={$vo.id} readonly="readonly" />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">过滤名称：</th>
                        <td>
                            <input type="text" class="input" name="filter_name" id="filter_name" size="20" value={$vo.filter_name} />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">过滤项名称：</th>
                        <td>
                            <input type="text" class="input" name="item_name" id="item_name" size="20" value={$vo.item_name} />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">状态：</th>
                        <td>
                            <input type="text" class="input" name="status" id="status" size="20" value={$vo.status}>
                        </td>
                    </tr>
                </volist>
            </table>
        </div>
        <div class="">
            <div class="btn_wrap_pd">
                <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
            </div>
        </div>
    </form>
</div>
</body>
<script src="{$config_siteurl}statics/js/uploadfile.js?v"></script>
</html>