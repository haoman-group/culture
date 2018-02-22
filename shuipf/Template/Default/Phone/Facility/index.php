<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />
<block name="style">
    <style>
        .my-am-nav{margin-top:0px;}
        .am-active {font-weight:bold;}
    </style>
</block>

<block name="content">
<ul class="my-am-nav am-nav am-nav-tabs am-nav-justify">
  <li class="<?= ($_GET['type'] == 'library' || empty($_GET['type']))?'am-active':''?>"><a href="{:U('index',['type'=>'library'])}">图书馆</a></li>
  <li class="<?=$_GET['type'] == 'cac'?'am-active':''?>"><a href="{:U('index',['type'=>'cac'])}">文化馆</a></li>
  <li class="<?=$_GET['type'] == 'theatre'?'am-active':''?>"><a href="{:U('index',['type'=>'theatre'])}">大剧院</a></li>
</ul>

    <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2 am-avg-md-3 am-avg-lg-4 am-gallery-default" >
    <volist name="data" id="vo">
      <li>
        <div class="am-gallery-item">
            <a href="{:U('detail',['type'=>$_GET['type'],'id'=>$vo['id']])}" class="">
              <img src="{$vo.picture|default='/statics/images/nopic.jpg'}"  alt="{$vo.name}{$vo.cac_name}{$vo.title}"/>
                <h3 class="am-gallery-title">{$vo.name}{$vo.cac_name}{$vo.title}</h3>
                <div class="am-gallery-desc">{$vo.addr}{$vo.cac_addr}{$vo.display_area}</div>
            </a>
        </div>
      </li>  
    </volist>
    </ul>
</block>