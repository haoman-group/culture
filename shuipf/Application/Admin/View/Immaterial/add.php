<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head" />
<style>
#specail {display:none;}
</style>
<body>
    <div class="wrap">
        <!-- <Admintemplate file="Common/Nav"/> -->
        <div class="nav">
            <ul class="cc">
                <li><a href="{:U('index')}">非物质文化遗产处分类</a></li>
                <li class="current"><a href="###">添加</a></li>
                <!--<li ><a value="手机扫描" class='  btn_add1' onclick="tel()"  />文本扫描</a></li>
            <li ><a value="手机扫描" class='  btn_add1'  onclick="tel()" />语音录入</a></li>
                <li ><a value="手机扫描" class='  btn_add' data-type="web"  />网络采集</a></li>-->
            </ul>
        </div>
        <div class="table_list table_art">
            <div class="table_full">
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">类目：</th>
                        <td>
                            <div id="category" style="display:inline-block;">
                                <select id="parentItems" name="art_cid" onchange="getchildlist(this)">
                                    <option value='0'>--请选择--</option>
                                    <volist name="category" id="ca">
                                        <option value="{$ca['cid']}">{$ca['name']}</option>
                                    </volist>
                                </select>
                                <div id="childItems" style="display:inline-block;"></div>
                                <div id="specail">
                                    <select name="re_represen" class="pid" onchange="getchange(this)">
                                        <option value="1">代表性项目</option>
                                        <option value="2">代表性传承人</option>                                        
                                    </select>
                                     <!-- <select name="level"  onchange="getchangelevel(this)">
                                        <optgroup label="国家级">
                                            <option value="国家级第一批" <if condition=" $data['level'] eq '国家级第一批' "> selected</if> >国家级第一批</option>
                                            <option value="国家级第二批" <if condition=" $data['level'] eq '国家级第二批' "> selected</if> >国家级第二批</option>
                                            <option value="国家级第三批" <if condition=" $data['level'] eq '国家级第三批' "> selected</if> >国家级第三批</option>
                                            <option value="国家级第四批" <if condition=" $data['level'] eq '国家级第四批' "> selected</if> >国家级第四批</option>
                                        </optgroup>
                                        <option value="省级" <if condition=" $data['level'] eq '省级' "> selected</if> >省级</option>
                                        <option value="市级" <if condition=" $data['level'] eq '2' "> selected</if> >市级</option>
                                        <option value="县级" <if condition=" $data['level'] eq '3' "> selected</if> >县级</option>
                                    </select>  -->
                                </div>
                            </div>
                        </td>
                    </tr>
                    
                    <tr  name="selectshow">
                        <th width="147">所属地区：</th>
                         
                      <td ><select id="area"  class="select_area" ></select></td>
                    </tr>
                </table>
                <form class="J_ajaxForm" action="{:U('add')}" method="post">
                    <input type="hidden" name="art_cid" value="">
                    <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                    <input type="hidden" class="re-represen-input" name="re_represen" value="1">
                    <input type="hidden" class="level-input" name="level" value="国家级">
                    <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                        <tr>
                            <th width="147">项目名称:</th>
                            <td>                                   
                                <input type="text" class="input" name="re_projectname" id="name" size="30" value="{$data.re_projectname}"/>
                            </td>
                        </tr>
                        <tr id="provincelevelselect" style="display:none">
                            <th width="147">省级批次:</th>
                            <td>                                   
                                <select name="level" id="provincelevelselect">
                                    <option value="省级第一批">第一批</option>
                                    <option value="省级第二批">第二批</option>
                                    <option value="省级第三批">第三批</option>
                                    <option value="省级第四批">第四批</option>
                                    <option value="省级第五批">第五批</option>
                                </select>
                            </td>
                        </tr>  
                        <tr id="nationallevelselect" style="display:none">
                            <th width="147">国家级批次:</th>
                            <td>                                   
                                <select name="national_level" id="nationallevelselect">
                                    <option value="">--无--</option>
                                    <option value="国家级第一批">第一批</option>
                                    <option value="国家级第二批">第二批</option>
                                    <option value="国家级第三批">第三批</option>
                                    <option value="国家级第四批">第四批</option>
                                </select>
                            </td>
                        </tr>   
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
                                <input type="checkbox" name="if_resources" value="1">是
                            </td>
                        </tr>
                    </table>
                    <div class="">
                        <div class="btn_wrap_pd">
                            <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">添加</button>
                        </div>
                    </div>
                </form>
                
            </div> 
        </div>
    </div>
    <script src="{$config_siteurl}statics/js/common.js?v"></script> 
    <script>
        // var level ={
        //     "第一批":{name:"第一批"},
        //     "第二批":{name:"第二批"},
        //     "第三批":{name:"第三批"},
        //     "第四批":{name:"第四批"}
        // };
        // var level_opt = {
        //     data: level,
        //     select: '#nationallevelselect',
        //     selClass:'levellinkageSel',
        //     loaderImg:'/statics/js/linkagesel/ui-anim_basic_16x16.gif'
        // };
        // var levelselect= new LinkageSel(level_opt);
    </script>
</body>
</html>