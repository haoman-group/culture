<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />
<!-- 产业服务平台页面 -->
<block name="content">
<!-- 顶部菜单导航 -->
<ul class="my-am-nav am-nav am-nav-tabs am-nav-justify">
  <li class="<?= ($_GET['type'] == 'supply' || empty($_GET['type']))?'am-active':''?>"><a href="{:U('Industry/supply',['type'=>'supply'])}">供应方</a></li>
  <li class="<?=$_GET['type'] == 'demand'?'am-active':''?>"><a href="{:U('Industry/supply',['type'=>'demand'])}">需求方</a></li>
  
</ul>
<table class="am-table am-table-bordered am-table-striped am-table-compact">
  <thead>
  <tr>
    <th>公司名称</th>
    <th>大类</th>
    <th>主营品种</th>
    <th>资源单说明</th>
    <th>上传时间</th>
    <th>下载次数</th>
    
  </tr>
  </thead>
  <tbody>
  <volist name="data"  id="vo">
  <tr>
    <td>{$vo['name']}</td>
    <td>{$vo['categoryname']}</td>
    <td>{$vo['sub_category']}</td>
      <td>{$vo['intro']}</td>
    <td>{$vo['addtime']}</td>
    <td>{$vo['download']}</td>
  </tr>
  </volist>
 
  </tbody>
</table>
<ul data-am-widget="pagination" class="am-pagination am-pagination-default">
        {$pageinfo.page}
</ul>
</block>