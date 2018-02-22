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
            <li><a href="#" style="color: #2058c2;">{$data.pname}</a></li>
        </ul>
    </div>
</div>
<div id="search">
    <div class="container clearfix">
        <p class="tips">欢迎关注山西文化产业微信公众号：2356982455</p>
        <form action="">
            <input type="text" placeholder="输入你要搜索的关键字" />
            <input type="submit" value="搜索" />
        </form>
    </div>
</div>
<div id="content">
    <div class="container clearfix">
        <table style="width: 100%;">
            <tr >
                <td class="td-center" style="width:15%"> 企业名称 </td>
                <td colspan="4"> <h5>{$data.name}</h5> </td>
            </tr>
            <tr >
                <td class="td-center"> 公司地址 </td>
                <td colspan="4"> {$data.adress} </td>
            </tr>
            <tr>
                <td  class="td-center" > 产品简介</td>
                <td colspan="4" class="td-text"> {$data.introduce} </td>
            </tr>
            <tr>
                <td  class="td-center" > 公司简介</td>
                <td colspan="4" class="td-text"> {$data.company_content} </td>
            </tr>
           
            <tr >
                <td class="td-center" > 项目企业<br />资金情况 </td>
                <td class="td-center">注册金额<br />（万元）</td>
                <td>{$data.registered}</td>
                <td>年营业额（万元）</td>
                <td>{$data. turnover}</td>
            </tr>
            
            <tr>
                <td class="td-center" rowspan="3"> 项目企业<br />基本情况 </td>
                <td class="td-center" > 所属行业 </td>
                <td> {$data.linkman} </td>
                <td> 法人 </td>
                <td> {$data.legal_person} </td>
            </tr>
            <tr>
                <td class="td-center" > 公司注册类型</td>
                <td> {$data.company_type}</td>
                <td> 联系人</td>
                <td> {$data.industry} </td>
            </tr>
            <tr>
                <td class="td-center" > 邮箱 </td>
                <td> {$data.email}</td>
                <td> 联系电话</td>
                <td> {$data.telephone} </td>
            </tr>
            <tr >
                <td  class="td-center" > 经营范围</td>
                <td colspan="4"> {$data.range} </td>
            </tr>
           
        </table>
<!--        <div><img src="../images/aaa.jpg" alt="" style="position: relative;left: -5px;"></div>-->
    </div>
</div>
</block>

