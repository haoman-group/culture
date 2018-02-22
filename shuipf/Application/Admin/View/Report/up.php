<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  	<ul class="cc">
  		<li class="current">
  			<a href="javascript:;">相关文档上传</a>
  		</li>
  	</ul>
  </div>	
  <form action="{:U('Admin/Report/up')}" method="post" enctype="multipart/form-data">
  	<input type="file" name="file_path" id="" value="" />
  	<input type="hidden" name="type" id="type" value="产业申报文档" />
  	<input type="submit" value="上传"/>
  </form>
 
</div>

</body>
</html>