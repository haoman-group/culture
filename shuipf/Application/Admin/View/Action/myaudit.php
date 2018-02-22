<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head" />

<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/actionNav" />
    <div class="h_a"></div>
    <div class="table_list">
        <table width="100%" cellspacing="0">
            <thead>
                <tr>
                
                    <td align="center">ID_AU</td>
                    <td align="center">审核人员</td>
                    <td align="center">驳回原因</td>
                    <td align="center">审核时间</td>
                    <td align="center">地区</td>
                    <!-- <td align="center">审核操作</td> -->
                    <td align="center">当前状态</td>
                    <td align="center">操作</td>
                </tr>
            </thead>
            <tbody>
                <volist name="data" id="vo">
                    <tr>
                        
                        
                        <td align="center">{$vo.id_au}</td>
                        <td align="center">{$vo.username}</td>
                        <td align="center">{$vo.reason}</td>
                        <td align="center">{$vo.addtime}</td>
                        <td align="center">{$vo.areaname}</td>
                        <!-- <td align="center">{$auditStatus[$vo[ca_status]]}</td> -->
                        <td align="center">{$auditStatus[$vo[auditstatus]]}</td>
                        <td align="center"><a href="{:U('Audit/show',array('id_au'=>$vo['id_au'],'showtype'=>$_GET['type'],'audit_fail'=>'1','id'=>$vo['cid']))}">查看</a></td>
                    </tr>
                </volist>
            </tbody>
        </table>
        <div class="p10">
            <div class="pages">{$Page} </div>
        </div>
    </div>



<!--<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js"></script>-->
</body>
</html>