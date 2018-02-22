<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head" />

<body>
    <div class="wrap">
        <Admintemplate file="Common/Audittable"/>
        <!-- <Admintemplate file="Common/Nav"/> -->
        <div class="nav">
            <ul class="cc">
                <li><a href="{:U('lists')}">我的创意</a></li>
                <li class="current"><a href="###">设置</a></li>
            </ul>
        </div>

        <div class="table_list table_art">
            <div class="table_full">
                   
                   
                    
                    <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                        <tr>
                            <th width="147">标题:</th>
                            <td>                                   
                                <input type="text" class="input" name="title" id="name" size="30" value="{$data.title}"  disabled="disabled" />
                            </td>
                        </tr>
                        <tr>
                            <th width="147">发帖人:</th>
                            <td>                                   
                                <input type="text" class="input" name="username" id="name" size="30" value="{$data.username}"  disabled="disabled" />
                            </td>
                        </tr>
                        <tr>
                            <th width="147">上传时间:</th>
                            <td>                                   
                                <input type="text" class="input" name="addtime" id="name" size="30" value="{$data.addtime}"  disabled="disabled" />
                            </td>
                        </tr>
                        <tr>
                            <th width="147">内容:</th>
                            <td>
                                <script type="text/plain" id="content" name="content">{$data.content}</script>
                                <?php echo Form::editor('content','basic','Cudatabase'); ?> 
                            </td>
                        </tr>
                    </table>
                    <form  class="J_ajaxForm" action="{:U('show')}" method="post">
                     <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                        <tr>
                            <th width="147">审核状态:</th>
                            <td>    
                                                         
                                <select name="pass">
                                <option value=""  <if condition="$data['pass'] eq '' ">selected="selected"   </if>>请选择</option>
                                <option value="1" <if condition="$data['pass'] eq  1 ">selected="selected"</if>>审核通过</option>
                                <option value="2" <if condition="$data['pass'] eq  2 ">selected="selected"</if>>审核未通过</option>
                                </select>
                            </td>
                        </tr>
                         <tr>
                            <th width="147">贴子设置:</th>
                            <td>                                   
                                <select name="type">
                                <option value=""  <if condition="$data['type'] eq '' ">selected="selected" </if>>请选择</option>
                                <option value="1" <if condition="$data['type'] eq   1 ">selected="selected" </if>>热帖</option>
                                <option value="2" <if condition="$data['type'] eq   2 ">selected="selected" </if>>精华贴</option>
                                </select>
                                <input type="hidden" name="id" value="{$data['id']}">
                            </td>
                        </tr>
                        
                    </table>
                    <div class="">
                        <div class="btn_wrap_pd">
                            <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">设置</button>
                        </div>
                    </div>
                    </form>
                     
                    
                
            </div>
        </div>
        
    </div>

</body>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<Admintemplate file="Common/submit"/>
</html>