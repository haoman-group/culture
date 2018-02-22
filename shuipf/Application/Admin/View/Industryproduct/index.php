<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<style>
    .position-container{}
    .position {width:200px;height:200px;border:thin solid black;display:inline-block;margin:5px;text-align:center;line-height:200px;}
    .position_1 {width:500px;height:410px;border:thin solid black}
    .position_2 {position:absolute; top:90px;}
    .position_3 {position:absolute; top:90px;left:750px;}
    .position_4 {position:absolute; top:300px;margin-left:5px;}
    .position_5 {position:absolute; top:300px;left:750px;}
    .position img{width:100%;height:100%;}
    .position p {position: relative;top: -120px;z-index: 10;opacity: 0.9;background:#676767;line-height:25px;text-align:center;color:white;}
</style>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="">文化产品展示馆列表</a></li>
            <!-- <li><a class="lib_add" href="{:U('add')}">添加</a></li> -->
        </ul>
    </div>
    <div class="position-container">
        <a href="{:U('edit',['id'=>'1'])}"><div class="position position_1"><img src="{$data['1']['image']}"><P>{$data['1']['title']?$data['1']['title']:'位置1-点击添加'}</p></div></a>
        <a href="{:U('edit',['id'=>'2'])}"><div class="position position_2"><img src="{$data['2']['image']}"><P>{$data['2']['title']?$data['2']['title']:'位置2-点击添加'}</p></div></a>
        <a href="{:U('edit',['id'=>'3'])}"><div class="position position_3"><img src="{$data['3']['image']}"><P>{$data['3']['title']?$data['3']['title']:'位置3-点击添加'}</p></div></a>
        <a href="{:U('edit',['id'=>'4'])}"><div class="position position_4"><img src="{$data['4']['image']}"><P>{$data['4']['title']?$data['4']['title']:'位置4-点击添加'}</p></div></a>
        <a href="{:U('edit',['id'=>'5'])}"><div class="position position_5"><img src="{$data['5']['image']}"><P>{$data['5']['title']?$data['5']['title']:'位置5-点击添加'}</p></div></a>
    </div>
<!-- 
        <table width="100%" cellspacing="0">
            <thead>
            <tr>
                <td align="center">id</td>
                <td align="center">标题</td>
                <td align="center">关键字</td>
                <td align="center">封面图片</td>
                <td align="center">产品展示地址</td>
                <td align="center">addtime</td>
                <td align="center">updatetime</td>
                <td align="center">是否删除</td>
                <td align="center">位置</td>
            <td align="center">操作</td>
            </tr>
            </thead>
            <tbody>
            <volist name="data" id="vo">
                <tr>
                    <td align="center">{$vo.id}</td>
                    <td align="center">{$vo.title}</td>
                    <td align="center">{$vo.keyword}</td>
                    <td align="center">{$vo.image}</td>
                    <td align="center">{$vo.url}</td>
                    <td align="center">{$vo.addtime|date="Y-m-d H:i:s",###}</td>
                    <td align="center">{$vo.updatetime|date="Y-m-d H:i:s",###}</td>
                    <td align="center">{$vo.isdelete}</td>
                    <td align="center">{$vo.category}</td>
            <td align="center"><a href="{:U('Admin/Industry_product/edit', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;<a
                            href="{:U('Admin/Industry_product/delete', array('id'=>$vo['id']))}" class="J_ajax_del">[删除]</a></td>
                </tr>
            </volist>
            </tbody>
        </table> -->
        <!-- <div class="p10">
            <div class="pages"> {$pageinfo.page}</div>
        </div> -->
</div>
</body>
</html>