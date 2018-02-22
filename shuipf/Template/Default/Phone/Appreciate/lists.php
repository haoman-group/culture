<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />
<block name="style">
    <style>
        .my-am-nav{margin-top:0px;}
        .am-active {font-weight:bold;}
    </style>
</block>

<block name="content">
    <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2 am-avg-md-3 am-avg-lg-4 am-gallery-default" >
    <volist name="data" id="vo">
      <li>
        <div class="am-gallery-item">
            <a href="{:U('detail',['id'=>$vo['id']])}" class="">
              <img src="<?= empty($vo['image'])?'/statics/images/nopic.jpg':thumb($vo['image'],173,100,1);?>"  alt="{$vo.title}"/>
                <h3 class="am-gallery-title">{$vo.title}</h3>
                <div class="am-gallery-desc"><?php echo mb_substr($vo['introduction'],0,30); ?></div>
            </a>
        </div>
      </li>  
    </volist>
    </ul>
    <ul data-am-widget="pagination" class="am-pagination am-pagination-default">
        {$pageinfo.page}
</ul>
</block>