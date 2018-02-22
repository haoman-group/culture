
<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<style type="text/css">
    .cu,.cu-li li,.cu-span span {cursor: hand;!important;cursor: pointer}
    .line_ff9966,.line_ff9966:hover td{
        background-color:#FF9966;
    }
    .line_fbffe4,.line_fbffe4:hover td {
        background-color:#fbffe4;
    }

</style>
<div class="wrap">
    <div class="h_a">&nbsp;产业项目发布&nbsp; >&nbsp;审核</div>
    <div class="table_list">
        <table width="100%">
            <colgroup>
                <col width="70">
                <col width="140">
            </colgroup>
            <thead>
            <tr>
                <td>栏目</td>
                <td>内容</td>
            </tr>
            </thead>
            <tr>
                <td>企业名称</td>
                <td>{$data.cname}</td>
            </tr>
            <tr>
                <td>项目名称</td>
                <td>{$data.pname}</td>
            </tr>
            <tr>
                <td>项目类别</td>
                <td>{$data.categoryname}</td>
            </tr>
            <tr>
                <td>项目投资总额</td>
                <td>{$data.plimit}</td>
            </tr>
            <tr>
                <td>项目负责人</td>
                <td>{$data.pleader}</td>
            </tr>
            <tr>
                <td>联系电话</td>
                <td>{$data.contactnum}</td>
            </tr>
            <tr>
                <td>项目所在地</td>
                <td>{$data.areaname}{$data.plocation}</td>
            </tr>
            <tr>
                <td>项目简介</td>
                <td>{$data.pbriefing}</td>
            </tr>
            <tr>
                <td>项目阶段</td>
                <td>{$data.stagename}</td>
            </tr>
            <tr>
                <td>项目前景</td>
                <td>{$data.prospect}</td>
            </tr>
            <tr>
                <td>项目图片</td>
                <td><img src="{:thumb($data['pthumb'],150,120)}" alt="" style="width: 150px;height: 120px"> </td>
            </tr>
            <tr>
                <td>是否进去投融资库</td>
                <td><if condition="$data['pfinancing'] eq 1">是<else/>否</if></td>
            </tr>
            <tr>
                <if condition="$data[status] eq 0">
                    <td style="text-align: right;"><a href="{:U('InPro/pass',array('id'=>$data['id']))}">通过</a></td>
                    <td><a href="{:U('InPro/failed',array('id'=>$data['id']))}">不合格</a></td>
                <else />
                    <td>审核结果</td>
                    <td>
                   
                        <eq name='data.status' value='1'> 审核通过</eq>
                        <eq name='data.status' value='2'> 审核未通过</eq>
                       
                    </td>
                </if>

            </tr>

        </table>

    </div>
</div>
<script type="text/javascript" src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>
<script>
    $(function(){

        $('.audit').click(function(){

            var val = $(this).val();
            $.post("{:U('Content/Industry/audit')}",{id:"{$data.id}",val:val},function(data){
                if(data.status == 1 ){
                    Wind.use("artDialog", function () {
                        art.dialog({
                            id: "succeed",
                            icon: "succeed",
                            fixed: true,
                            lock: true,
                            background: "#CCCCCC",
                            opacity: 0,
                            content: "成功",
                            button:[
                                {
                                    name: '确定',
                                    callback:function(){
                                        window.location.href = "{:U('Content/Industry/declarey')}";
                                        return true;
                                    },
                                    focus: true
                                }
                            ]
                        });
                    });
                }
            },"json")
        })

    })

</script>