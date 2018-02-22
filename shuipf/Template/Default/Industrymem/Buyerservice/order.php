<extend name="./shuipf/Template/Default/Industrymem/common/_layout.php" />


<block name="content">

    <div class="col-md-9" >
        <div class="urt">
            <div class="urtnav">
                <div class="as">
                    <a href="" class="on">订单列表</a>
<!--                    <a href="">订单列表</a>-->
                </div>
            </div>
            <dl class="dlurtsear">
                <dt>订单状态:</dt>
                <dd>
                    <select>
                        <option>已付款</option>
                    </select>
                </dd>
                <dd><input type="button" value="搜索" class="btnsear"> </dd>
            </dl>
            <table class="tburt">
                <tr>
                    <td>订单编号</td>
                    <td>下单时间</td>
                    <td>操作</td>
                </tr>
                <tr>
                    <td>订单编号</td>
                    <td>下单时间</td>
                    <td>操作</td>
                </tr>
            </table>

            <div class="pagebox">
                <span>共?页</span>
                <a>1</a>
                <span>2</span>

            </div>


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