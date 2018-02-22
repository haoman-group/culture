<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name = "after_styles">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/finance.css">

</block>
<block name='content'>
<div id="nav">
    <div class="container">
        <ul>
            <li><a href="{:U('Industry/Index/index')}" class="home_src" style="color:#900;">首页</a></li>
            <li><span>></span></li>
            <li><a href="{:U('Industry/Index/lists',array('catid'=>21))}">产业项目</a></li>
            <li><span>></span></li>
            <li><a href="javascript:;" class="href_tail" style="color:#900;">企业项目详情内容</a></li>
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
                <td class="td-center" style="width:15%"> 项目名称 </td>
                <td colspan="4"> <h5>{$data.pname}</h5> </td>
            </tr>
            <tr >
                <td class="td-center"> 项目类别 </td>
                <td colspan="4"> {$data.pcategory} </td>
            </tr>
            <tr>
                <td  class="td-center" > 项目简介</td>
                <td colspan="4" class="td-text"> {$data.pbriefing} </td>
            </tr>
            <tr >
                <td class="td-center" rowspan="4"> 招商内容 </td>
                <td class="td-center">投资总额<br />（万元）</td>
                <td>{$data.plimit}</td>
                <td>投资年限</td>
                <td>2</td>
            </tr>
            <tr >
                <td class="td-center">融资总额<br />（万元）</td>
                <td>{$data.money}</td>
                <td>合作方式</td>
                <td>{$data.method}</td>
            </tr>
            <tr >
                <td class="td-center">资金用途</td>
                <td colspan="3">{$data.purpose}</td>
            </tr>
            <tr >
                <td class="td-center">收益预测</td>
                <td colspan="3">{$data.profit}</td>
            </tr>
            <tr >
                <td class="td-center" rowspan="2"> 项目企业<br />资金情况 </td>
                <td class="td-center">投资总额<br />（万元）</td>
                <td>1000</td>
                <td>可抵押物资产总额（万元）</td>
                <td>1000万</td>
            </tr>
            <tr >
                <td class="td-center">净值产收益率</td>
                <td>1000万</td>
                <td>资产负债率</td>
                <td>1.2%</td>
            </tr>
            <tr>
                <td class="td-center" rowspan="3"> 项目企业<br />基本情况 </td>
                <td class="td-center" > 单位名称 </td>
                <td> 深圳波西房地产开发公司 </td>
                <td> 项目负责人 </td>
                <td> 王俊 </td>
            </tr>
            <tr>
                <td class="td-center" > 单位性质</td>
                <td> 有限责任公司</td>
                <td> 联系电话</td>
                <td> {$data.contactnum} </td>
            </tr>
            <tr>
                <td class="td-center" > 项目所在地</td>
                <td colspan="3"> {$data.plocation}</td>
            </tr>
            <tr >
                <td  class="td-center" > 项目阶段</td>
                <td colspan="4"> {$data.pstage} </td>
            </tr>
            <tr>
                <td  class="td-center"> 项目前景 </td>
                <td colspan="4" class="td-text">{$data.prospect} </td>
            </tr>
        </table>
    </div>
</div>

</block>