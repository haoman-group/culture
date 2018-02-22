<extend name="./shuipf/Template/Default/Industrymem/common/_layout.php" />


<block name="content">

    <div class="col-md-9" >
        <div class="urt">
            <div class="urtnav">
                <div class="as">
                    <a href="" class="on">我的评论</a>
<!--                    <a href="">订单列表</a>-->
                </div>
            </div>
<!--            <dl class="dlurtsear">-->
<!--                <dt>订单状态:</dt>-->
<!--                <dd>-->
<!--                    <select>-->
<!--                        <option>已付款</option>-->
<!--                    </select>-->
<!--                </dd>-->
<!--                <dd><input type="button" value="搜索" class="btnsear"> </dd>-->
<!--            </dl>-->
            <table class="tburt">
                <tr>
                    <td>评论对象</td>
                    <td>评论内容</td>
                    <td>评价时间</td>
                </tr>
                <tr>
                    <td>评论对象</td>
                    <td>评论内容</td>
                    <td>评价时间</td>
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