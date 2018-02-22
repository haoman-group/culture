<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />
<!-- 产业服务平台页面 -->
<block name="content">
<!-- 顶部菜单导航 -->

<table class="am-table am-table-bordered am-table-centered">
   <tr >
                <td class="td-center" style="width:15%"> 企业名称 </td>
                <td colspan="4"> <h5>{$data.name}</h5> </td>
            </tr>
            <tr >
                <td class="td-center"> 公司地址 </td>
                <td colspan="4"> {$data.adress} </td>
            </tr>
            <tr>
                <td  class="td-center" > 项目简介</td>
                <td colspan="4" class="td-text">{$data.introduce} </td>
            </tr>
            <tr>
                <td  class="td-center" >公司简介</td>
                <td colspan="4" class="td-text"> </td>
            </tr>
            <tr>
                <td class="td-center" rowspan="1"> 项目企业资金情况</td>
                <td class="td-center" > 注册金额 <br>（万元）</td>
                <td> {$data.registered} </td>
                <td class="td-center" > 年营业额</td>
                <td> <if condition='$data["pfinancing"] eq 1'>{$data.turnover}<else />——</if>  </td>
            </tr>
            <!--<tr >
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
            </tr>-->
            <tr>
                <td class="td-center" rowspan="4"> 项目企业基本情况</td>
                <td class="td-center" > 所属行业</td>
                <td> {$data.industry} </td>
                <td class="td-center" > 法人</td>
                <td>{$data.legal_person}  </td>
            </tr>
            <tr >
                <td class="td-center" > 公司注册类型</td>
                <td> {$data.company_type} </td>
                <td class="td-center" > 联系人</td>
                <td>{$data.linkman}  </td>
            </tr>
             <!--<tr >
                <td class="td-center" > 邮箱</td>
                <td> {$data.email} </td>
                <td class="td-center" > 联系电话</td>
                <td>{$data.telephone}  </td>
            </tr>-->
            <tr >
                <td  class="td-center" > 邮箱</td>
                <td colspan="4"> {$data.email}  </td>
            </tr>
            <tr >
                <td  class="td-center" > 联系电话</td>
                <td colspan="4"> {$data.telephone}  </td>
            </tr>
            <tr>
                <td  class="td-center"> 经营范围	 </td>
                <td colspan="4" class="td-text"> {$data.range} </td>
            </tr>   
</table>
</block>