<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="">活动列表</a></li>
            <li><a class="lib_add" href="{:U('exadd')}">添加</a></li>
        </ul>
    </div>
    <div class="table_list">

        <table width="100%" cellspacing="0">
            <thead>
            <tr>
                <td align="center">序号</td>
                <td align="center">类型</td>
                <td align="center">标题</td>
                <td align="center">时间</td>
                <td align="center">地点</td>
                <td align="center">是否需要预约</td>
                <td align="center">已预约人数</td>
                <td align="center">总人数</td>
                <td align="center">联系方式</td>
                <td align="center">上传</td>
                <td align="center">操作</td>
            </tr>
            </thead>
            <tbody>
            <volist name="data" id="vo">
                <tr>
                    <td align="center">{$vo.id}</td>
                    <td align="center"><?=empty($vo['type'])?'':($vo['type']==1?'馆办':'社会');?>{$vo.art_cid.name}</td>
                    <td align="center">{$vo.content_title}</td>
                    <td align="center">{$vo.act_time}</td>
                    <td align="center">{$vo.act_address}</td>
                    <td align="center">{$vo['if_bespeak']=='1'?'是':'否'}</td>
                    <td align="center">{$vo.bespeak_num}</td>
                    <td align="center">{$vo.acceptance}</td>
                    <td align="center">{$vo.contacts}:{$vo.contacts_tel}</td>
                    <td align="center">{$vo.addtime}</td>
                    <td align="center"><a href="{:U('exedit', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;<a
                            href="{:U('exdelete', array('id'=>$vo['id']))}">[删除]</a></td>
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