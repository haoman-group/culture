<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />
<!-- 产业服务平台页面 -->
<block name="content">
<!-- 顶部菜单导航 -->

<table class="am-table am-table-bordered am-table-centered">
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
</block>