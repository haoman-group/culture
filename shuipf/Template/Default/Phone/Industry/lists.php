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
            <a href="{:U('show',['id'=>$vo['id']])}" class="">
              <img src="{$vo.pthumb|default='/statics/images/nopic.jpg'}"  alt="{$vo.name}{$vo.cac_name}{$vo.title}"/>
                <h3 class="am-gallery-title">项目名称：{$vo.pname}</h3>
                <div class="am-gallery-desc">行业：{$vo.categoryname}<br>地区：山西省 <br>投资总额：{$vo.plimit}万</div>
            </a>
        </div>
      </li>  
    </volist>
</ul>
<ul data-am-widget="pagination" class="am-pagination am-pagination-default">
        {$pageinfo.page}
</ul>
</block>