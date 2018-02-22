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
                    <td>项目名称</td>
                    <td>发布时间</td>
                    <td>审核状态</td>
                    <td>操作</td>
                </tr>
                <volist name='data' id='vo'>
                    <tr>
                        <td>{$i}</td>
                        <td>{$vo.pname}</td>
                        <td>{$vo.create_time|date='Y-m-d H:i:s',###}</td>
                        <td>
                            <switch name="vo.status">
                                <case value="0">未审核</case>
                                <case value="1">审核通过</case>
                                <case value="2">审核失败</case>
                                <default>未知</default>
                            </switch>
                        </td>
                        <input type="hidden" name="id" value="{$vo['id']}">
                        <td><a href="{:U('Industrymem/Industry/obj_edit',array('id'=>$vo['id']))}" >编辑</a>&nbsp;&nbsp;<a href="javascript:;" class="del">删除</a></td>
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
                                    $.post("{:U('Industrymem/Industry/delete_obj')}",{id:id},function(data){
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
                                                            window.location.href = "{:U('Industrymem/Industry/index')}";
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