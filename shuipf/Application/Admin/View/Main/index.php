<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
  <div id="home_toptip"></div>
  <!--<h2 class="h_a">文化云首页</h2>-->
  <div class="home_info">
    <h2>欢迎使用文化云后台管理系统！</h2>
    <ul>
      <volist name="server_info" id="vo">
        <li> <em>{$key}</em> <span>{$vo}</span> </li>
      </volist>
    </ul>
  </div>
  <?php
    if(\Libs\System\RBAC::authenticate("Admin/Action/index")){     
      redirect("Admin/Action/index");
    }
  ?>
  <!--<h2 class="h_a">开发团队</h2>
  <div class="home_info" id="home_devteam">
    <ul>
      <li> <em>负责人</em> <span>李博凯</span> </li>
      <li> <em>邮箱</em> <span>lbk747@163.com</span> </li>
      <li> <em>手机</em> <span>18610675202</span> </li>
      <li> <em>微信</em> <span>lbk747</span> </li>
    </ul>
  </div>-->

</div>

</body>
</html>