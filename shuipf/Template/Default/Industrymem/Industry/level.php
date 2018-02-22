<extend name="./shuipf/Template/Default/Industrymem/common/_layout.php" />


<block name="content">

    <div class="col-md-9" >
        <div class="urt">
            <div class="urtnav">
               <div class="as">
                   <a href="" class="on">信用评级</a>
                  
               </div>
            </div>
           
            <table class="tburt">
                <tr>
                    <td>序号</td>
                    <td>企业名称</td>
                    <td>等级</td>
                    <td>状态</td>
                    <td>申请时间</td>
                    <td>操作</td>
                </tr>
                <volist name='data' id = 'vo'>
                <tr>
                    <td>{$i}</td>
                    <td>{$vo.company_name}</td>
                    <td>{$vo.level}</td>
                    <td>
                        <if condition="$vo['audit'] eq 0">
                            待审核
                        <elseif condition="$vo['audit'] eq 1"/>
                            通过
                        <else />
                            信息不合格
                        </if>
                    </td>
                    <td>{$vo.inputtime|date="Y-m-d",###}</td>
                    <td><a href="{:U('Industrymem/Industry/edit',array('id'=>$vo['id']))}">编辑</a></td>
                </tr>
                </volist>
            </table>

            

           
        </div>

    </div>

</block>
<block name="after_scripts">
<script type="text/javascript" src="{$Config_siteurl}statics/js/layer/layer.js">
</script>
<script>
        var uid = {$uid};
        checked_login(uid);
    </script>
</block>