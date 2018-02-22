<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head" />

<body>
    <div class="wrap">
        <Admintemplate file="Common/Audittable"/>
        <!-- <Admintemplate file="Common/Nav"/> -->
        <div class="nav">
            <ul class="cc">
                <li><a href="{:U('index')}">非物质文化遗产处分类</a></li>
                <li class="current"><a href="###">修改</a></li>
            </ul>
        </div>

        <div class="table_list table_art">
            <div class="table_full">
                    <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                        <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                        <tr  name="selectshow" >
                            <th width="147">所属地区：</th>                             
                            <td ><select id="area"  class="select_area" ></select></td>
                        </tr>
                    </table>
                    <form class="J_ajaxForm" action="{:U('edit')}" method="post">
                    <input type="hidden" name="id" value="{$data.id}">
                    <input type="hidden" name="art_cid" value="{$data.art_cid}">
                    <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                    <input type="hidden" class="re-represen-input" name="re_represen" value="{$data.re_represen}">
                    <input type="hidden" class="level-input" name="level" value="{$data.level}">
                    <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                        <tr>
                            <th width="147">项目名称:</th>
                            <td>                                   
                                <input type="text" class="input" name="re_projectname" id="name" size="30" value="{$data.re_projectname}"/>
                            </td>
                        </tr>
                        <if condition="$data['art_cid'] eq '75' || ($data['art_cid'] gt 84 && $data['art_cid'] lt 95)">
                        <tr id="nationallevelselect">
                            <th width="147">分类:</th>
                            <td>                                   
                                <select name="re_represen" id="nationallevelselect">
                                    <option value="1" <if condition=" $data['re_represen'] eq 1 "> selected</if>>代表性项目</option>
                                    <option value="2" <if condition=" $data['re_represen'] eq 2 "> selected</if>>代表性传承人</option>
                                </select>
                            </td>
                        </tr> 
                        
                        <tr id="provincelevelselect" >
                            <th width="147">省级批次:</th>
                            <td>                                   
                                <select name="level" id="provincelevelselect">
                                    <option value="省级第一批" <if condition=" $data['level'] eq '省级第一批' "> selected</if>>第一批</option>
                                    <option value="省级第二批" <if condition=" $data['level'] eq '省级第二批' "> selected</if>>第二批</option>
                                    <option value="省级第三批" <if condition=" $data['level'] eq '省级第三批' "> selected</if>>第三批</option>
                                    <option value="省级第四批" <if condition=" $data['level'] eq '省级第四批' "> selected</if>>第四批</option>
                                    <option value="省级第五批" <if condition=" $data['level'] eq '省级第五批' "> selected</if>>第五批</option>
                                </select>
                            </td>
                        </tr>  
                        <tr id="nationallevelselect">
                            <th width="147">国家级批次:</th>
                            <td>                                   
                                <select name="national_level" id="nationallevelselect">
                                    <option value="">--无--</option>
                                    <option value="国家级第一批" <if condition=" $data['national_level'] eq '国家级第一批' "> selected</if>>第一批</option>
                                    <option value="国家级第二批" <if condition=" $data['national_level'] eq '国家级第二批' "> selected</if>>第二批</option>
                                    <option value="国家级第三批" <if condition=" $data['national_level'] eq '国家级第三批' "> selected</if>>第三批</option>
                                    <option value="国家级第四批" <if condition=" $data['national_level'] eq '国家级第四批' "> selected</if>>第四批</option>
                                </select>
                            </td>
                        </tr> 

                        </if>
                        <tr>
                            <th width="147">内容:</th>
                            <td>
                                <script type="text/plain" id="content" name="content">{$data.content}</script>
                                <?php echo Form::editor('content','full','Cudatabase'); ?> 
                            </td>
                        </tr>
                        <tr>
                        <th>是否推荐至公共服务平台(数字资源)：</th>
                        <td>
                            <input type="checkbox" name="if_resources" value="1" <if condition="$data['if_resources'] eq 1 "> checked ="checked" </if>>是
                        </td>
                    </tr>
                    </table>
                    <div class="">
                        <div class="btn_wrap_pd">
                            <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">更新</button>
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