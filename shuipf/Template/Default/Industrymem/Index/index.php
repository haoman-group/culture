<extend name="./shuipf/Template/Default/Industrymem/common/_layout.php" />


<block name="content">

    <div class="col-md-9" >
        <div class="urt">
            <div class="urtnav">
               <div class="as">
                   <a href="" class="on">订单列表</a>
                   <a href="">订单列表</a>
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
                <span>共几页</span>
                <a>1</a>
                <span>2</span>

            </div>

            <form>
            <dl class="dluform">
                <dt>企业名称</dt>
                <dd><input type="text" name="name" value=""></dd>
                <dt>手机号码</dt>
                <dd><input type="text" name="phone" value=""></dd>
                <dt>电子邮箱</dt>
                <dd><input type="text" name="email" value=""></dd>

                <dd class="ddbtns">
                    <input type="submit" value="保存" class="preservation">
                    <input type="button" class="btncancel" value="取消">
                </dd>
            </dl>
            </form>
        </div>

    </div>

</block>