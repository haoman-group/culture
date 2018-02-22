<extend name="./shuipf/Template/Default/Industrymem/common/_layout.php" />


<block name="content">

    <div class="col-md-9" >
        <div class="urt">
            <div class="urtnav">
                <div class="as">
                    <a href="" class="on">我的收藏</a>
<!--                    <a href="">我的订单</a>-->
                </div>
            </div>
       

            <table class="tburt" >
                <tr>
                    <td width="150">商品图片</td>
                    <td>商品名称</td>
                    
                    <td width="100">价格</td>
                    <td width="150">操作</td>
                </tr>
                <volist name='data' id='vo'>
                    <tr>
                        <td> <a href="{:U('Industry/Consume/shopping',array('id'=>$vo['id']))}"><img src="{:thumb($vo['thumb'],80,80)}" alt=""> </a></td>
                        <td><a href="{:U('Industry/Consume/shopping',array('id'=>$vo['id']))}">{$vo.title}</a></td>
                        
                        <td>{$vo.price}</td>
                        <td><input type="hidden" name="good_id" value="{$vo.id}"><a href="javascript:;" class="cancle">取消收藏</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">购买</a></td>
                    </tr>
                </volist>
            </table>

            <div class="pagebox">
                {$page}

            </div>


        </div>

    </div>

</block>
<block name="after_scripts">
    <script type="text/javascript" src="{$Config_siteurl}statics/js/layer/layer.js"></script>
    <script>
        var uid = {$uid};
        checked_login(uid);
    </script>
    <script>
        $(function(){
            $('.cancle').click(function(event) {
                var good_id = $(this).parent('td').find('input[name=good_id]').val();
                var obj = $(this);
                $.post('{:U("Industrymem/Buyerservice/cancle_follow")}', {'good_id': good_id}, function(data) {
                    /*optional stuff to do after success */

                    layer.msg(data.message,{
                        end: function(){
                           // var str ='<tr><td width="150">商品图片</td><td>商品名称</td<td width="100">价格</td><td width="150">操作</td></tr>';
                           // $.each(data.info,function(i, v) {
                           //    str+= '<tr><td> <img src="" alt=""> </td><td>'+v.title+'</td><td>' +v.price+ '</td><td><input type="hidden" name="good_id" value="'+v.id+'"><a href="javascript:;" class="cancle">取消收藏</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">购买</a></td></tr>' 
                           // });
                           // $('.tburt').html(str) 
                           window.location.reload();
                        }
                    });
                },'json');
            });
        })
    </script>
</block>