<extend name="./shuipf/Template/Default/Industrymem/common/_layout.php" />
<block name="after_styles">
<link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
</block>
<block name="content">

    <div class="col-md-9" >
        <div class="urt">
            <div class="urtnav">
               <div class="as">
                   <a href="" class="on">项目列表</a>
                  
               </div>
            </div>
           
            <table class="tburt">
                <tr>
                    <td>序号</td>
                    <td>产品名称</td>
                    <td style="text-align: center;">产品状态</td>
                    <td style="text-align: center;">发布时间</td>
                    <td style="text-align: center;">操作</td>
                </tr>
                <volist name='data' id='vo'>
                    <tr>
                        <td>{$i}</td>
                        <td>{$vo.p_name}</td>
                        <td style="text-align: center;">
                            <if condition=" $vo['status'] eq 1 "> 已上架
                            <elseif condition=" $vo['status'] eq 2 "/>未通过审核
                            <else /> 未审核
                            </if>
                        </td>
                        <td style="text-align: center;">{$vo.inputtime|date="Y-m-d",###}</td>
                        <input type="hidden" name="id" value='{$vo.id}'>
                        <td style="text-align: center;">
                            <a href="#">查看</a>&nbsp;&nbsp;
                            <a href="{:U('Industrymem/Product/edit',array('id'=>$vo['id']))}">编辑</a>&nbsp;&nbsp;
                            <a href="javascript:;" class="del">删除</a>
                        </td>
                    </tr>
                </volist>
            </table>

           
        </div>

    </div>

</block>
<block name="after_scripts">
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "{$config_siteurl}",
    JS_ROOT: "{$config_siteurl}statics/js/"
};
</script>
<script type="text/javascript" src="{$config_siteurl}statics/ci/js/layer/layer.js"></script>
    <script>
        var uid = {$uid};
        checked_login(uid);
    </script>
    <script src="{$config_siteurl}statics/js/wind.js"></script> 
    <script src="{$config_siteurl}statics/js/common.js?v"></script>
    <script>
        $('.del').click(function(){
            var id = $(this).parents('tr').find('input[name=id]').val();
            
            Wind.use("artDialog", function () {
                    art.dialog({
                        
                        icon: "warning",
                        fixed: true,
                        lock: true,
                        background: "#CCCCCC",
                        opacity: 0,
                        content: "您确定要删除吗？",
                        button:[
                            {
                                id:"yes",
                                name: '确定',
                                callback:function(){
                                    $.post("{:U('Industrymem/Product/delete')}",{id:id},function(data){
                                        if(data.status==1){
                                            art.dialog({
                                                id: "succeed",
                                                icon: "succeed",
                                                fixed: true,
                                                lock: true,
                                                background: "#CCCCCC",
                                                opacity: 0,
                                                content: data.message,
                                                button:[
                                                    {
                                                        name: '确定',
                                                        callback:function(){
                                                            window.location.href = "{:U('Industrymem/Product/index')}";
                                                            return true;
                                                        },
                                                        focus: true
                                                    }
                                                ]
                                            });
                                        }
                                    },"json")
                                    return true;
                                },
                                focus: true
                            },{
                                id:"no",
                                name: '取消',
                                callback:function(){
                                },
                                focus: true
                             
                        }
                        ]

                        
                    });
                });
        })
    </script>
    
</block>