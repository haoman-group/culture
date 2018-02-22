<block name="style">
    <style>
        .my-am-nav{margin-top:0px;}
        .am-active {font-weight:bold;}
        .am-breadcrumb{margin:0 0 0 0;}
        .am-list{margin-top:0px;}
    </style>
</block>
<ul class="my-am-nav am-nav am-nav-tabs am-nav-justify">
    <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">文化艺术<span class="am-icon-caret-down"></span></a>
        <ul class="am-dropdown-content">
            <volist name="artcategory[6]" id='vo'>
                <li class="<?=$_GET['cid'] == $vo['cid']?'am-active':'';?>"><a href="{:U('lists',['cid'=>$vo['cid']])}">{$i}. {$vo.name}</a></li>
            </volist>
        </ul>
    </li>
    <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">公共文化<span class="am-icon-caret-down"></span></a>
        <ul class="am-dropdown-content">
            <volist name="artcategory[2]" id='vo'>
                <li class="<?=$_GET['cid'] == $vo['cid']?'am-active':'';?>"><a href="{:U('lists',['cid'=>$vo['cid']])}">{$i}. {$vo.name}</a></li>
            </volist>
        </ul>
    </li>
    <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">非遗展示<span class="am-icon-caret-down"></span></a>
        <ul class="am-dropdown-content">
            <volist name="artcategory[3]" id='vo'>
                <li class="<?=$_GET['cid'] == $vo['cid']?'am-active':'';?>"><a href="{:U('lists',['cid'=>$vo['cid']])}">{$i}. {$vo.name}</a></li>
            </volist>
        </ul>
    </li>
    <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">文化产业<span class="am-icon-caret-down"></span></a>
        <ul class="am-dropdown-content">
            <volist name="artcategory[4]" id='vo'>
                <li class="<?=$_GET['cid'] == $vo['cid']?'am-active':'';?>"><a href="{:U('lists',['cid'=>$vo['cid']])}">{$i}. {$vo.name}</a></li>
            </volist>
        </ul>
    </li>
    <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">文化政策<span class="am-icon-caret-down"></span></a>
        <ul class="am-dropdown-content">
            <volist name="artcategory[5]" id='vo'>
                <li class="<?=$_GET['cid'] == $vo['cid']?'am-active':'';?>"><a href="{:U('lists',['cid'=>$vo['cid']])}">{$i}. {$vo.name}</a></li>
            </volist>
        </ul>
    </li>
</ul>
<ol class="am-breadcrumb">
  <li><a href="/Phone" class="am-icon-home">首页</a></li>
  <li><a href="/Phone/Resource/lists">资源展馆</a></li>
  <!-- <li class="am-active">内容</li> -->
  <volist name="breadcrumb" id="bd">
        <li class="am-active">{$bd.name}</li>
  </volist>
</ol>