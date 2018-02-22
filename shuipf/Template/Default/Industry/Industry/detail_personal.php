<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<link rel="stylesheet" href="../css/base.css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/topMenu.js"></script>
<style>
    #content table tr .td-center{width: 150px;}
</style>
<block name='content'>
<div id="nav">
    <div class="container">
        <ul>
            <li><a href="{:U('Industry/Index/index')}" class="home_src">首页</a></li>
            <li><span>></span></li>
            <li><a href="index.html">产业项目</a></li>
            <li><span>></span></li>
            <li><a href="#" style="color: #2058c2;">个人项目详情内容</a></li>
        </ul>
    </div>
</div>
<!--<div id="search">
    <div class="container clearfix">
        <p class="tips">欢迎关注山西文化产业微信公众号：2356982455</p>
        <form action="">
            <input type="text" placeholder="输入你要搜索的关键字" />
            <input type="submit" value="搜索" />
        </form>
    </div>
</div>-->
<div id="content">
    <div class="container clearfix">
        <table style="width: 100%;">
            <tr >
                <td class="td-center" style="width:15%"> 项目名称 </td>
                <td colspan="4"> <h5>{$data.pname}</h5> </td>
            </tr>
            <tr >
                <td class="td-center"> 项目类别 </td>
                <td colspan="4"> {$data.categoryname} </td>
            </tr>
            <tr>
                <td  class="td-center" > 项目简介</td>
                <td colspan="4" class="td-text">{$data.pbriefing} </td>
            </tr>
            <tr>
                <td class="td-center" rowspan="4"> 招商内容 </td>
                <td class="td-center" > 投资总额 <br>（万元）</td>
                <td> {$data.plimit} </td>
                <td class="td-center" > 投资年限</td>
                <td> <if condition='$data["pfinancing"] eq 1'>{$data.agent.term}<else />——</if>  </td>
            </tr>
            <tr >
                <td class="td-center" > 融资总额 <br>（万元）</td>
                <td> <if condition='$data["pfinancing"] eq 1'>{$data.agent.money} <else />——</if></td>
                <td class="td-center" > 合作方式</td>
                <td> <if condition='$data["pfinancing"] eq 1'>{$data.agent.imethod}<else />——</if></td>
            </tr>
            <tr >
                <td class="td-center" > 资金用途</td>
                <td colspan="3"> <if condition='$data["pfinancing"] eq 1'>{$data.agent.purpose} <else />——</if></td>
            </tr>
            <tr >
                <td class="td-center" > 收益预测</td>
                <td colspan="3"> <if condition='$data["pfinancing"] eq 1'>{$data.agent.profit} <else />——</if></td>
            </tr>
            <tr>
                <td class="td-center" rowspan="2"> 个人项目<br>基本情况 </td>
                <td class="td-center" > 项目负责人</td>
                <td> {$data.pleader} </td>
                <td class="td-center" > 联系电话</td>
                <td>{$data.contactnum}  </td>
            </tr>
            <tr >
                <td class="td-center" > 联系地址</td>
                <td colspan="3">{$data.areaname}{$data.plocation}  </td>
            </tr>
            <tr >
                <td  class="td-center" > 项目阶段</td>
                <td colspan="4"> {$data.stagename} </td>
            </tr>
            <tr>
                <td  class="td-center"> 项目前景 </td>
                <td colspan="4" class="td-text"> {$data.prospect} </td>
            </tr>
        </table>
    </div>
</div>

</block>>
<script>
  $(function(){
      $(".top_menuItem").eq(3).addClass("choose");

      $(".publish").on("click",function(){
            layer.msg('请先登录',{
                end: function(){
                    window.location.href = '../reg_login/login-personal-pub.html';
                }
            });
            return false;
        });
  });
</script>

