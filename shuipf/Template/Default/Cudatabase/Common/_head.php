<div class="userinfo">
	<div class="user-c" style="width: 1190px;margin: 0 auto">欢迎 <span class="style01">{$username}</span> 登录文化大数据库！  <a href="{:U('Cudatabase/Public/doLogout',array('type'=>'database-register'))}">[退出]</a>{$admin_url}
  </div>
</div>
<div class="top" style="margin-top:10px;">
	<div class="top1" style="width: 1190px;margin: 0 auto">
    <div class="logo" ><a href="{$config_siteurl}"><img src="{$config_siteurl}statics/cu/images/images/sjk/resourselog (1).png" width="227" height="65" /></a></div>
    
    <form action="{:U('Cudatabase/Search/search')}" method="get">
   	  <div class="searchs" style="margin-top:10px;">
       	<div class="searchs-text"> <input type="text" name="textfield" id="textfield" class="text02" value="{$Think.get.textfield}" style="border-radius: 0px;border: #8c232a 1px solid;"/></div>
        <!-- <div class="searchs-btn" style="width:56px;">  --><input type="submit" name="button" id="button" value="搜索"  class="btn01" style="color:#FFF;font-size:16px;"/></div>
      </div>
        <input type="hidden" name="g" value="Cudatabase">
        <input type="hidden" name="m" value="Search">
        <input type="hidden" name="a" value="search">
    </form>
    <div style="background:#8c232a;height:1px;margin-top:-30px;"></div>  
  </div>
</div>