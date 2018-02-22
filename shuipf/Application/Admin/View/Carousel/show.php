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
            <li class="current"><a href="###">轮播展示</a></li>
            <!-- <li><a class="lib_add" href="{:U('add')}">添加</a></li> -->
        </ul>
    </div>
   
    <div class="position-container">
        <a   href="{:U('edit',array('title'=>1,'id'=>$data[0]['id'],'area'=>$_GET['area']))}" ><div class="position position_1"><img src="{$data['pub_slide'][0]['pub_slide']}"><P>'位置1-点击添加'</p></div></a>
        <a  href="{:U('edit',array('title'=>2,'id'=>$data[1]['id'],'area'=>$_GET['area']))}"><div class="position position_2"><img src="{$data['pub_slide'][1]['pub_slide']}"><P>'位置2-点击添加'</p></div></a>
        <a  href="{:U('edit',array('title'=>3,'id'=>$data[2]['id'],'area'=>$_GET['area']))}"><div class="position position_3"><img src="{$data['pub_slide'][2]['pub_slide']}"><P>'位置3-点击添加'</p></div></a>
        <a  href="{:U('edit',array('title'=>4,'id'=>$data[3]['id'],'area'=>$_GET['area']))}"><div class="position position_4"><img src="{$data['pub_slide'][3]['pub_slide']}"><P>'位置4-点击添加'</p></div></a>
        <a  href="{:U('edit',array('title'=>5,'id'=>$data[4]['id'],'area'=>$_GET['area']))}"><div class="position position_5"><img src="{$data['pub_slide'][4]['pub_slide']}"><P>'位置5-点击添加'</p></div></a>
        <a  class="btn btn_big btn_submit" href="{:U('Areadata/edit',array('area_id'=>$_GET['area']))}" style="font-size:18px;">返回</a>
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