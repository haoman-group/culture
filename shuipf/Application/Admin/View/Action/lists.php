<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head" />

<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">

    <Admintemplate file="Common/actionNav" />
    <div class="h_a"><?php switch ($_GET['type']) {
    	case '1':
    		echo "代办事项->文化艺术";
    		break;
    	case '2':
    		echo "代办事项->公共文化->图书馆";
    		break;
    	case '3':
    		echo "代办事项->公共文化->文化馆";
    		break;
    	case '4':
    		echo "代办事项->非遗项目";
    		break;
    	case '5':
    		echo "代办事项->文化产业";
    		break;
    	case '6':
    		echo "代办事项->文化政策";
    		break;
    	default:
    		# code...
    		break;
    } ?></div>
    <div class="table_list" <if condition="$data['0']['parent_artcid'] eq '' ">style="display:block"<else/>style="display:none"</if>>
        <table width="100%" cellspacing="0">
            <thead>
                <tr>
                    <td align="center" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
                    <td align="center">ID</td>
                    <td align="center">上传者</td>
                    <td align="center">标题</td>
                    <td align="center">类别</td>
                    <td align="center"><if condition="$_GET['audit_fail'] neq ''">状态</if></td>
                    <td align="center">操作</td>
                </tr>
            </thead>
            <tbody>
                <volist name="data" id="vo">
                    <tr>
                        <td align="center"><input type="checkbox"></td>
                        <td align="center">{$vo.id}</td>
                        <td align="center">{$vo.author}</td>
                        <td align="center">
                        <?php
                            if(isset($vo['title']) &&!empty($vo['title'])){
                                echo $vo['title'];
                            }
                            if(isset($vo['re_projectname']) && !empty($vo['re_projectname'])){
                                echo $vo['re_projectname'];
                            }
                            if(isset($vo['publish_name']) && !empty($vo['publish_name'])){
                                echo $vo['publish_name'];
                            }
                            if(isset($vo['name']) && !empty($vo['name'])){
                                echo $vo['name'];
                            }
                        ?>
                        </td>
                        <td align="center">
                            <if condition="$_GET['type'] eq 'Comartcenter' ">文化馆</if>
                            <if condition="$_GET['type'] eq 'Library' ">图书馆</if>
                            <if condition="($_GET['type'] neq 'Library') and ($_GET['type'] neq 'Comartcenter') ">{$vo.name}</if>
                        </td>
                        <td align="center"><if condition="$_GET['audit_fail'] neq ''">审核未通过</if></td>
                        <td align="center"><if condition="$_GET['audit_fail'] neq ''"><a href="{:U('Audit/edit',array('id'=>$vo['id'],'type'=>$_GET['type'],'audit_fail'=>true))}">修改</a><else/><a href="{:U('Audit/show',array('id'=>$vo['id'],'type'=>$_GET['type']))}">审核</a></if></td>
                    </tr>
                </volist>
            </tbody>
        </table>
        <div class="p10">
            <div class="pages">{$Page} </div>
        </div>
    </div>



<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js"></script>

</body>
</html>