<extend name="./shuipf/Template/Default/Industrymem/common/_layout.php" />
<block name="after_styles">
    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/adress.css">

</block>

<block name="content">

    <div class="col-md-9" >
        <div class="address_top">
            <a href="">收货地址</a>
        </div>
        <div class="address_main">
            <if condition=" $num lt 10 "> <div class="new_address"><a href="#" data-addrid="" class="btnaddaddr addbtn"  >新增收货地址</a></div></if>

            <p class="address_num">已保存<font color="#FF0000"><?php echo $num ?></font>条地址信息，还能保存<font color="#FF0000"><?php echo 10 -$num ?></font>条</p>
            <volist name="info" id="vo">
                <if condition="$vo.default == '1'">
                    <dl class="address_list ">
                        <else/>
                        <dl class="address_list ">
                </if>

                <dt>收货人:</dt><dd>{$vo.name}</dd>
                <dt>所在地区:</dt><dd>{$vo.area}</dd>
                <dt>详细地址:</dt><dd>{$vo.address}</dd>
                <dt>邮政编码:</dt><dd>{$vo.postcode}</dd>
                <dt>联系电话:</dt><dd>{$vo.phone}</dd>
                <dd class="address_edit"> <if condition="$vo.default === '1'"><a class="btndefault">默认地址</a><else/><a href="{:U('setDefault',array('id'=>$vo['id']))}" id="nobtndef" class="setdefault" data-addrid="{$vo['id']}">设置默认</a></if>
                    <a href="{:U('editAddr',array('id'=>$vo['id']))}" data-addrid="{$vo['id']}" class="btnaddredit addbtn">编辑</a>
                    <a href="#" class="btndelete" data-id="{$vo['id']}">删除</a></dd>
                </dl>
            </volist>
            <if condition=" $num lt 10 "> <div><a href="#"  data-addrid="" class="add_address_btn btnaddaddr addbtn" ><img src="{$config_siteurl}statics/ci/images/addr/add_address.png" alt=""></a></div></if>
        </div>

    </div>

</block>

<block name="after_scripts">
    <script type="text/javascript" src="{$config_siteurl}statics/ci/js/jquery.min.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/ci/js/layer/layer.js"></script>
    <script>
        $(".addbtn").click(function() {
            var addrid= $(this).attr("data-addrid");

            layer.open({
                type:2,
                title: false,
                closeBtn: 0,
                scrollbar: false,
                area: ['700px','460px'],
                shadeClose: true,
                content: "/index.php?g=Industrymem&m=Buyerservice&a=addAddr&id="+addrid,
            });
            return false;
        });

        $(".setdefault").click(function(){
            var dataid= $(this).attr("data-addrid");
            $.ajax({
                type : "POST",
                url: '/Api/Buyeraddr/setDefault',
                async : false,
                dataType : "json",
                timeout : 5000,
                data : {"id": dataid },
                success : function(result) {
                    console.log("zheshitishiyu"+result.msg);
                    if(result.status===1){
                        window.location.reload();
                    }
                },
                error : function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest.status + "|"
                        + XMLHttpRequest.readyState + "|" + textStatus);
                }
            });

            return false;
        });

        $(".btndelete").click(function(){
            var dataid= $(this).attr("data-id");
            $.ajax({
                type : "POST",
                url : '{:U("Api/Buyeraddr/delete")} ',
                async : false,
                dataType : "json",
                timeout : 5000,
                data : {"id": dataid },
                success : function(result) {
                    if(result.status===1){
                        console.log("zheshitishiyu"+result.msg);
                        $("[data-id='"+dataid+"']").parents(".address_list").remove();
                    }
                    else{
                        alert(result.msg);
                    }

                },
                error : function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest.status + "|"
                        + XMLHttpRequest.readyState + "|" + textStatus);
                }
            });

            return false;
        });
    </script>
</block>