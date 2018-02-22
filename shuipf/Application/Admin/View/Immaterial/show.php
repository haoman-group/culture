<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head" />

<body>
    <div class="wrap">
        <!-- <Admintemplate file="Common/Nav"/> -->
        
        <if condition="$_GET['showtype'] neq '' || $_GET['type'] neq ''">
            <Admintemplate file="Common/actionNav"/>
            <else/>
            <div class="nav">
                <ul class="cc">
                    <li><a href="{:U('search')}">非物质文化遗产处分类</a></li>
                    <li class="current"><a href="###">查看</a></li>
                </ul>
            </div>
        </if>

        <div class="table_list table_art">
            <div class="table_full">
                   
                    <!--代表性项目及代表性传承人  -->
                    <!-- 代表性传承人 -->
                     <form class="J_ajaxForm"   method="post">
                        <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                         <tr>
                                <th width="147">类目:</th>
                                <td>
                                    <input type="text" class="input" name="categoryname" id="name" size="20" value="{$data.categoryname}" disabled="disabled"></input>
                                </td>
                            </tr>
                            <notempty name="data['level']">
                           <tr>
                                <th width="147">省级批次：</th>
                                <td>
                                    {$data.level}
                                </td>
                            </tr>
                            </notempty>
                            <notempty name="data['level']">
                           <tr>
                                <th width="147">国家级批次：</th>
                                <td>
                                    {$data.national_level}
                                </td>
                            </tr>
                            </notempty>
                            <neq name="data['re_represen']" value="0">
                            <tr>
                                <th width="147">代表性:</th>
                                <td>
                                     <select name="re_represen" class="relation" disabled="disabled">
                                        <option value="1" <if condition=" $data['re_represen'] eq '1' "> selected</if> >代表性项目</option>
                                        <option value="2" <if condition=" $data['re_represen'] eq '2' "> selected</if> >代表性传承人</option>
                                        
                                </select>
                                </td>
                            </tr>
                            </neq>
                            <tr>
                                <th width="147">项目名称:</th>
                                <td>
                                     <input type="hidden" name="id" value="{$data.id}">
                                    <input type="text" class="input" name="re_projectname" id="name" size="20" value="{$data.re_projectname}" disabled="disabled"></input>
                                </td>
                            </tr>
                            <tr>
                                <th width="147">内容:</th>
                                <td>{$data.content}
                                </td>
                            </tr>
                            
                        </table>
                    </form>
                    <!-- 审核状态显示 -->
                    <if condition="$_GET['type'] neq ''">
                        <form method="post" class="tq-check-form">
                            <input type="hidden" name="g" value="admin">
                            <input type="hidden" name="m" value="audit">
                            <input type="hidden" name="a" value="add">   
                            <h5>审核状态</h5>
                            <div class="select-box">
                                <span class="select-span">请选择</span>
                                 <select name="auditstatus" id="" class="audit" dir="center">
                                   <option value="请选择">请选择</option>
                                   <option value="40">驳回</option>
                                   <option value="35">审核通过</option>
                        
                                </select>
                            </div>        
                            
                            <div class="reason" hidden>
                                <h6>驳回原因</h6>
                                <input type="hidden" name="category" value="<?php echo $_GET['type'] ?>">
                                <input type="hidden" name="cid" value="{$data.id}">
                                <input type="hidden" name="type" value="<?php echo $_GET['type'] ?>">
                                <textarea name="reason" placeholder="请输入驳回原因"></textarea>
                            </div>
                            
                            <input type="submit" class="btn btn_submit mr10 J_ajax_submit_btn" value="提交" />
                            
                        </form>
                        
                    </if>
            </div>
        </div>
        <Admintemplate file="Common/Audittable"/>
    </div>
</body>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript">
    // 审核状态显示
    $(".audit").on("change",function(){
        var getSelectVal = $(".select-box option:selected").text();
        $(".select-box .select-span").text(getSelectVal);
        var audit = $(this).val();
        if(audit ==40){
            $(".reason").show();
        }else{
            $(".reason").hide();
        }
    });
</script>
</html>