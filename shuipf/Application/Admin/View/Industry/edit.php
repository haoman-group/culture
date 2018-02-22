<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>

<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <Admintemplate file="Common/Audittable"/>
    <div class="nav">
        <ul class="cc">
            <li><a href="{:U('index')}">文化产业</a></li>
            <li class="current"><a href="###">修改</a></li>
        </ul>
    </div>

    <div class="table_list  table_art">
        <div class="table_full">
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr name="selectshow">
                    <th width="147">所属地区：</th>
                    <td><select id="area" class="select_area"></select></td>
                </tr>
            </table>
            <form class="J_ajaxForm" action="{:U('edit')}" method="post" data-cid="119"
            <neq name="data['parent_artcid']" value="119">hidden</neq>
            >
            <input type="hidden" name="art_cid" value="{$data.art_cid}">
            <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
            <input type="hidden" name="id" value="{$data['id']}">
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                    <th width="147">二级分类：</th>
                    <td>
                        <select name="art_cid" id="">
                            <?php 
                                if($data['parent_artcid'] == '119'){
                                    $category_array = D('Admin/ArtCategory')->scope('normal')->where(['parent_cid'=>'119'])->select();
                                    foreach($category_array as $cate){
                                        echo "<option value=".$cate['cid']." ".($cate['cid'] == $data['art_cid']?'selected':'')." >".$cate['name']."</option>";
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th width="147">单位名称：</th>
                    <td>

                        <input type="text" class="input" name="com_name" size="20"
                               value="{$data.com_name}">
                    </td>
                </tr>
                  <tr>
                        <th width="147">加入企业注册时间：</th>
                        <td>
                            <input type="date" class="input" name="join_date" size="20"
                                   value={$data.join_date}>
                        </td>
                    </tr>
                    <tr>
                        <th width="147">人数：</th>
                        <td>
                            <input type="text" class="input" name="person_num" size="20"
                                   value={$data.person_num}>
                        </td>
                    </tr>
                    <tr>
                        <th width="147">规模：</th>
                        <td>
                            <select name="scale">
                                   <option value="大型"  <if condition="$data['scale'] eq '大型' "> selected="selected" </if>>大型</option>
                                   <option value="中型"  <if condition="$data['scale'] eq '中型' "> selected="selected" </if>>中型</option>
                                   <option value="小型"  <if condition="$data['scale'] eq '小型' "> selected="selected" </if>>小型</option>
                                   <option value="微小型"  <if condition="$data['scale'] eq '微小型' "> selected="selected" </if>>微小型</option>
                                   </select>
                        </td>
                    </tr>
                     <tr>
                        <th width="147">年产值（统计）：</th>
                        <td>
                            <input type="text" class="input" name="output_value" size="20"
                                   value={$data.output_value}>
                        </td>
                    </tr>
                <tr>
                    <th width="147">单位性质:</th>
                    <td>
                        <input type="text" class="input" name="com_property" size="20"
                               value="{$data.com_property}">
                    </td>
                </tr>
                <tr>
                    <th width="147">负责人:</th>
                    <td>
                        <input type="text" class="input" name="com_leader" size="20"
                               value="{$data.com_leader}">
                    </td>
                </tr>
                <tr>
                    <th width="147">联系方式:</th>
                    <td>
                        <input type="text" class="input" name="com_phone" size="20"
                               value="{$data.com_phone}" />
                    </td>
                </tr>
                <tr>
                    <th width="147">通讯地址：</th>
                    <td>
                        <input type="text" class="input" name="com_addr" size="20"
                               value="{$data.com_addr}">
                    </td>
                </tr>
                <tr>
                    <th width="147">经营产品：</th>
                    <td>
                        <input type="text" class="input" name="com_product" size="20"
                               value="{$data.com_product}">
                    </td>
                </tr>
                <tr>
                    <th width="147">经营模式：</th>
                    <td>
                        <input type="text" class="input" name="com_mode" size="20"
                               value="{$data.com_mode}">
                    </td>
                </tr>
                <tr>
                    <th width="147">简介：</th>
                    <td>
                        <!-- <input type="text" class="input" name="intro" size="20" value="{$data.intro}"> -->
                        <textarea name="intro" class="input_txt">{$data.intro}</textarea>
                    </td>
                </tr>
                <tr>
                        <th>图片：</th>

                        <td>
                            <ul class="explain">
                                <li>文件上传:</li>
                                <li>
                                    <a href="javascript:upfile('acrobatics_picture')"
                                       class="seller_upload_image">上传图片</a>
                                    <p class="tips">提示：1、图片上传大小不得超过4M</p>
                                    <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张图片</p>
                                </li>
                            </ul>
                            <ul class="img jsaddimgul" id="acrobatics_picture">
                                <for start="0" end="$maxPicNum">
                                    <if condition="acrobatics_picture_urls[$i] neq ''">
                                        <li class=''>
                                            <input type="hidden" name="acrobatics_picture_url[]"
                                                   value="{$acrobatics_picture_urls[$i]}">
                                            <img src="{$acrobatics_picture_urls[$i]}" style="width:100px;height:100px;">
                                            <div class="operate"><span class="sl"></span><span class="sr"></span><a
                                                    href="javascript:void(0)" class="tupian"></a></div>
                                        </li>
                                        <else/>
                                        <li class="noimg"></li>
                                    </if>
                                </for>
                            </ul>
                        </td>
                    </tr>
                 <tr>
                        <th>是否推荐至公共服务平台(数字资源)：</th>
                        <td>
                            <input type="checkbox" name="if_resources" value="1" <if condition="$data['if_resources'] eq 1 "> checked ="checked" </if>>是
                        </td>
                    </tr>
                <notempty name="data['reason']">
                <tr>
                    <th width="147">驳回原因：</th>
                    <td>
                        {$data.reason}
                    </td>
                </tr>
                </notempty>
            </table>
            <div class="">
                <div class="btn_wrap_pd">
                    <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
                </div>
            </div>
            </form>
            <form class="J_ajaxForm" action="{:U('edit')}" method="post" data-cid="120"
            <neq name="data['parent_artcid']" value="120">hidden</neq>
            >
            <input type="hidden" name="art_cid" value="{$data.art_cid}">
            <input type="hidden" name="id" value="{$data['id']}">
            <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                    <th width="147">名称：</th>
                    <td>
                        <input type="text" class="input" name="title" size="20" value="{$data.title}">
                    </td>
                </tr>
                <tr>
                    <th width="147">简介:</th>
                    <td>
                        <input type="text" class="input" name="intro" size="20" value="{$data.intro}">
                    </td>
                </tr>
                <tr>
                    <th width="147">配套:</th>
                    <td>
                        <input type="text" class="input" name="support" size="20"
                               value="{$data.support}">
                    </td>
                </tr>
                <tr>
                    <th width="147">实施单位名称:</th>
                    <td>
                        <input type="text" class="input" name="com_name" size="20"
                               value="{$data.com_name}">
                    </td>
                </tr>
                <tr>
                    <th width="147">实施单位性质：</th>
                    <td>
                        <input type="text" class="input" name="com_property" size="20"
                               value="{$data.com_property}">
                    </td>
                </tr>
               
                <tr>
                    <th width="147">联系电话：</th>
                    <td>
                        <input type="text" class="input" name="com_phone" size="20"
                               value="{$data.com_phone}">
                    </td>
                </tr>
                <tr>
                    <th width="147">联系地址：</th>
                    <td>
                        <input type="text" class="input" name="com_addr" size="20"
                               value="{$data.com_addr}">
                    </td>
                </tr>
                <tr>
                        <th width="147">投资总额：</th>
                        <td>
                            <!--<input type="text" class="input" name="inv_totle" size="20"
                                   value={$data.inv_totle}>-->
                        <select name="inv_totlemoney">
                        <option value="{$data['inv_totlemoney']}"  <if condition="$data['inv_totlemoney'] eq '100万以下'">selected="selected"</if>>100万以下</option>
                        <option  value="{$data['inv_totlemoney']}" <if condition="$data['inv_totlemoney'] eq '100万-1000万'">selected="selected"</if>>100万-1000万</option>
                        <option  value="{$data['inv_totlemoney']}" <if condition="$data['inv_totlemoney'] eq '1000万-5000万'">selected="selected"</if>>1000万-5000万</option>
                        <option  value="{$data['inv_totlemoney']}" <if condition="$data['inv_totlemoney'] eq '5000万-1亿'">selected="selected"</if>>5000万-1亿</option>
                        <option  value="{$data['inv_totlemoney']}" <if condition="$data['inv_totlemoney'] eq '1亿-10亿'">selected="selected"</if>>1亿-10亿</option>
                        <option  value="{$data['inv_totlemoney']}" <if condition="$data['inv_totlemoney'] eq '10亿以上'">selected="selected"</if>>10亿以上</option>
                        </select>
                        </td>
                    </tr>
                <tr>
                    <th width="147">融资总额：</th>
                    <td>
                        <input type="text" class="input" name="inv_financing" size="20"
                               value="{$data.inv_financing}">
                    </td>
                </tr>
                <tr>
                    <th width="147">投资年限：</th>
                    <td>
                        <input type="text" class="input" name="inv_years" size="20"
                               value="{$data.inv_years}">
                    </td>
                </tr>
                 <tr>
                    <th width="147">负责人：</th>
                    <td>
                        <input type="text" class="input" name="com_leader" size="20"
                               value="{$data.com_leader}">
                    </td>
                </tr>
                <tr>
                    <th width="147">合作方式：</th>
                    <td>
                        <input type="text" class="input" name="inv_type" size="20"
                               value="{$data.inv_type}">
                    </td>
                </tr>
                <tr>
                    <th width="147">资金用途：</th>
                    <td>
                        <input type="text" class="input" name="inv_use" size="20"
                               value="{$data.inv_use}">
                    </td>
                </tr>
                 <tr>
                    <th width="147">项目概况：</th>
                    <td>
                        <textarea name="survey" class="input_txt">{$data.survey}</textarea>
                    </td>
                </tr>
                <tr>
                        <th>图片：</th>

                        <td>
                            <ul class="explain">
                                <li>文件上传:</li>
                                <li>
                                    <a href="javascript:upfile('music_picture')"
                                       class="seller_upload_image">上传图片</a>
                                    <p class="tips">提示：1、图片上传大小不得超过4M</p>
                                    <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张图片</p>
                                </li>
                            </ul>
                            <ul class="img jsaddimgul" id="music_picture">
                                <for start="0" end="$maxPicNum">
                                    <if condition="$acrobatics_picture_urls[$i] neq ''">
                                        <li class=''>
                                            <input type="hidden" name="music_picture_url[]"
                                                   value="{$acrobatics_picture_urls[$i]}">
                                            <img src="{$acrobatics_picture_urls[$i]}" style="width:100px;height:100px;">
                                            <div class="operate"><span class="sl"></span><span class="sr"></span><a
                                                    href="javascript:void(0)" class="tupian"></a></div>
                                        </li>
                                        <else/>
                                        <li class="noimg"></li>
                                    </if>
                                </for>
                            </ul>
                        </td>
                    </tr>
                 <tr>
                        <th>是否推荐至公共服务平台(数字资源)：</th>
                        <td>
                            <input type="checkbox" name="if_resources" value="1" <if condition="$data['if_resources'] eq 1 "> checked ="checked" </if>>是
                        </td>
                    </tr>
                <notempty name="data['reason']">
                <tr>
                    <th width="147">驳回原因：</th>
                    <td>
                        {$data.reason}
                    </td>
                </tr>
                </notempty>
            </table>
            <div class="">
                <div class="btn_wrap_pd">
                    <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
                </div>
            </div>
            </form>
            <form class="J_ajaxForm" action="{:U('edit')}" method="post" data-cid="121"
            <neq name="data['parent_artcid']" value="121">hidden</neq>
            >
            <input type="hidden" name="art_cid" value="{$data.art_cid}">
            <input type="hidden" name="id" value="{$data['id']}">
            <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                    <th width="147">产品名称：</th>
                    <td>
                        <input type="text" class="input" name="title" size="20" value="{$data.title}">
                    </td>
                </tr>
                 <tr>
                        <th>图片：</th>

                        <td>
                            <ul class="explain">
                                <li>文件上传:</li>
                                <li>
                                    <a href="javascript:upfile('acrobatics_picture_119')"
                                       class="seller_upload_image">上传图片</a>
                                    <p class="tips">提示：1、图片上传大小不得超过4M</p>
                                    <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张图片</p>
                                </li>
                            </ul>
                            <ul class="img jsaddimgul" id="acrobatics_picture_119">
                                <for start="0" end="$maxPicNum">
                                    <if condition="$acrobatics_picture_urls[$i] neq ''">
                                        <li class=''>
                                            <input type="hidden" name="acrobatics_picture_119_url[]"
                                                   value="{$acrobatics_picture_urls[$i]}">
                                            <img src="{$acrobatics_picture_urls[$i]}" style="width:100px;height:100px;">
                                            <div class="operate"><span class="sl"></span><span class="sr"></span><a
                                                    href="javascript:void(0)" class="tupian"></a></div>
                                        </li>
                                        <else/>
                                        <li class="noimg"></li>
                                    </if>
                                </for>
                            </ul>
                        </td>
                    </tr>
                <!--<tr>
                    <th width="147">类别:</th>
                    <td>
                        <input type="text" class="input" name="com_property" size="20"
                               value="{$data.com_property}">
                    </td>
                </tr>-->
                <tr>
                    <th width="147">规格:</th>
                    <td>
                        <input type="text" class="input" name="specification" size="20"
                               value="{$data.specification}">
                    </td>
                </tr>
                <tr>
                    <th width="147">生产企业:</th>
                    <td>
                        <input type="text" class="input" name="com_name" size="20"
                               value="{$data.com_name}">
                    </td>
                </tr>
                <tr>
                    <th width="147">联系方式:</th>
                    <td>
                        <input type="text" class="input" name="com_phone" size="20"
                               value="{$data.com_phone}" />
                    </td>
                </tr>
                <tr>
                    <th width="147">产品详情：</th>
                    <td>
                        <textarea name="com_product" class="input_txt">{$data.com_product}</textarea>
                    </td>
                </tr>
                 <tr>
                        <th>是否推荐至公共服务平台(数字资源)：</th>
                        <td>
                            <input type="checkbox" name="if_resources" value="1" <if condition="$data['if_resources'] eq 1 "> checked ="checked" </if>>是
                        </td>
                    </tr>
                <notempty name="data['reason']">
                <tr>
                    <th width="147">驳回原因：</th>
                    <td>
                        {$data.reason}
                    </td>
                </tr>
                </notempty>
                <!--<tr>
                    <th width="147">所属地区：</th>
                    <td>
                        <input type="text" class="input" name="area" size="20" value="{$data.area}">
                    </td>
                </tr>-->
            </table>
            <div class="">
                <div class="btn_wrap_pd">
                    <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
                </div>
            </div>
            </form>
            <form class="J_ajaxForm" action="{:U('edit')}" method="post" data-cid="122"
            <neq name="data['parent_artcid']" value="122">hidden</neq>
            >
            <input type="hidden" name="art_cid" value="{$data.art_cid}">
            <input type="hidden" name="id" value="{$data['id']}">
            <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                  <tr>
                        <th width="147">名称：</th>
                        <td>
                            <input type="text" class="input" name="title" size="20"
                                   value={$data.title}>
                        </td>
                   <tr>
                        <th>图片：</th>

                        <td>
                            <ul class="explain">
                                <li>文件上传:</li>
                                <li>
                                    <a href="javascript:upfile('acrobatics_picture_120')"
                                       class="seller_upload_image">上传图片</a>
                                    <p class="tips">提示：1、图片上传大小不得超过4M</p>
                                    <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张图片</p>
                                </li>
                            </ul>
                            <ul class="img jsaddimgul" id="acrobatics_picture_120">
                                <for start="0" end="$maxPicNum">
                                    <if condition="$acrobatics_picture_urls[$i] neq ''">
                                        <li class=''>
                                            <input type="hidden" name="acrobatics_picture_120_url[]"
                                                   value="{$acrobatics_picture_urls[$i]}">
                                            <img src="{$acrobatics_picture_urls[$i]}" style="width:100px;height:100px;">
                                            <div class="operate"><span class="sl"></span><span class="sr"></span><a
                                                    href="javascript:void(0)" class="tupian"></a></div>
                                        </li>
                                        <else/>
                                        <li class="noimg"></li>
                                    </if>
                                </for>
                            </ul>
                        </td>
                    </tr>
                     <tr>
                        <th width="147">联系人：</th>
                        <td>
                            <input type="text" class="input" name="com_leader" size="20"
                                   value={$data.com_leader}>
                        </td>
                    </tr>
                     <tr>
                        <th width="147">地址：</th>
                        <td>
                            <input type="text" class="input" name="com_addr" size="20"
                                   value={$data.com_addr}>
                        </td>
                    </tr>
                     <tr>
                        <th width="147">联系方式：</th>
                        <td>
                            <input type="text" class="input" name="com_phone" size="20"
                                   value={$data.com_phone}>
                        </td>
                    </tr>
                    <tr>
                        <th width="147">级别:</th>
                        <td>
                            <input type="text" class="input" name="level" size="20" value={$data.level}>
                        </td>
                    </tr>
                    <tr>
                        <th width="147">基本概况:</th>
                        <td>
                             <textarea name="intro" class="input_txt">{$data.intro}</textarea>
                        </td>
                    </tr>
                     <tr>
                        <th>是否推荐至公共服务平台(数字资源)：</th>
                        <td>
                            <input type="checkbox" name="if_resources" value="1" <if condition="$data['if_resources'] eq 1 "> checked ="checked" </if>>是
                        </td>
                    </tr>
                    <notempty name="data['reason']">
                <tr>
                    <th width="147">驳回原因：</th>
                    <td>
                        {$data.reason}
                    </td>
                </tr>
                </notempty>
            </table>
            <div class="">
                <div class="btn_wrap_pd">
                    <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
                </div>
            </div>
            </form>
            <form class="J_ajaxForm" action="{:U('edit')}" method="post" data-cid="123"
            <neq name="data['parent_artcid']" value="123">hidden</neq>
            >
            </form>
            <form action="{:U('edit')}" method="post" data-cid="164"
            <neq name="data['parent_artcid']" value="164">hidden</neq>
            >
            <input type="hidden" name="art_cid" value="{$data.art_cid}">
            <input type="hidden" name="id" value="{$data['id']}">
            <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                    <th width="147">活动名称：</th>
                    <td>
                        <input type="text" class="input" name="title" size="20" value="{$data.title}">
                    </td>
                </tr>
                <tr>
                    <th width="147">主办者:</th>
                    <td>
                        <input type="text" class="input" name="sponsor" size="20"
                               value="{$data.sponsor}">
                    </td>
                </tr>
                <tr>
                    <th width="147">承办者:</th>
                    <td>
                        <input type="text" class="input" name="undertaker" size="20"
                               value="{$data.undertaker}">
                    </td>
                </tr>
                <tr>
                    <th width="147">参展展馆:</th>
                    <td>
                        <input type="text" class="input" name="pavilion" size="20"
                               value="{$data.pavilion}">
                    </td>
                </tr>
                <tr>
                    <th width="147">展会时间:</th>
                    <td>
                        <input type="text" class="input" name="opentime" size="20"
                               value="{$data.opentime}">
                    </td>
                </tr>
                <tr>
                    <th width="147">地点:</th>
                    <td>
                        <input type="text" class="input" name="addr" size="20" value="{$data.addr}">
                    </td>
                </tr>
                <tr>
                    <th width="147">简介:</th>
                    <td>
                        <!-- <input type="text" class="input" name="intro" size="20" value="{$data.intro}"> -->
                        <textarea name="intro" class="input_txt">{$data.intro}</textarea>
                    </td>
                </tr>
                 <tr>
                        <th>是否推荐至公共服务平台(数字资源)：</th>
                        <td>
                            <input type="checkbox" name="if_resources" value="1" <if condition="$data['if_resources'] eq 1 "> checked ="checked" </if>>是
                        </td>
                    </tr>
                <notempty name="data['reason']">
                <tr>
                    <th width="147">驳回原因：</th>
                    <td>
                        {$data.reason}
                    </td>
                </tr>
                </notempty>
            </table>
            <div class="">
                <div class="btn_wrap_pd">
                    <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
                </div>
            </div>
            </form>
            <form class="J_ajaxForm" action="{:U('edit')}" method="post" data-cid="165"
            <neq name="data['parent_artcid']" value="165">hidden</neq>
            >
            <input type="hidden" name="art_cid" value="{$data.art_cid}">
            <input type="hidden" name="id" value="{$data['id']}">
            <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                    <th width="147">单位名称：</th>
                    <td>
                        <input type="text" class="input" name="com_name" size="20"
                               value="{$data.com_name}">
                    </td>
                </tr>
                <tr>
                    <th width="147">单位性质:</th>
                    <td>
                        <input type="text" class="input" name="com_property" size="20"
                               value="{$data.com_property}">
                    </td>
                </tr>
                <tr>
                    <th width="147">负责人:</th>
                    <td>
                        <input type="text" class="input" name="com_leader" size="20"
                               value="{$data.com_leader}">
                    </td>
                </tr>
                <tr>
                    <th width="147">联系方式:</th>
                    <td>
                        <input type="text" class="input" name="com_phone" size="20"
                               value="{$data.com_phone}" />
                    </td>
                </tr>
                <tr>
                    <th width="147">通讯地址：</th>
                    <td>
                        <input type="text" class="input" name="com_addr" size="20"
                               value="{$data.com_addr}">
                    </td>
                </tr>
                <tr>
                    <th width="147">经营产品：</th>
                    <td>
                        <input type="text" class="input" name="com_product" size="20"
                               value="{$data.com_product}">
                    </td>
                </tr>
                <tr>
                    <th width="147">经营模式：</th>
                    <td>
                        <input type="text" class="input" name="com_mode" size="20"
                               value="{$data.com_mode}">
                    </td>
                </tr>
                <tr>
                    <th width="147">简介：</th>
                    <td>
                        <!-- <input type="text" class="input" name="intro" size="20" value="{$data.intro}"> -->
                        <textarea name="intro" class="input_txt">{$data.intro}</textarea>
                    </td>
                </tr>
                 <tr>
                        <th>是否推荐至公共服务平台(数字资源)：</th>
                        <td>
                            <input type="checkbox" name="if_resources" value="1" <if condition="$data['if_resources'] eq 1 "> checked ="checked" </if>>是
                        </td>
                    </tr>
                <notempty name="data['reason']">
                <tr>
                    <th width="147">驳回原因：</th>
                    <td>
                        {$data.reason}
                    </td>
                </tr>
                </notempty>
            </table>
            <div class="">
                <div class="btn_wrap_pd">
                    <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
                </div>
            </div>
            </form>
            <form class="J_ajaxForm" action="{:U('edit')}" method="post" data-cid="166"
            <neq name="data['parent_artcid']" value="166">hidden</neq>
            >
            <input type="hidden" name="art_cid" value="{$data.art_cid}">
            <input type="hidden" name="id" value="{$data['id']}">
            <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                    <th width="147">名称：</th>
                    <td>
                        <input type="text" class="input" name="title" size="20" value="{$data.title}">
                    </td>
                </tr>
                <tr>
                    <th width="147">地点:</th>
                    <td>
                        <input type="text" class="input" name="addr" size="20" value="{$data.addr}">
                    </td>
                </tr>
                <tr>
                    <th width="147">竣工时间:</th>
                    <td>
                        <input type="text" class="input" name="completetime" size="20"
                               value="{$data.completetime}">
                    </td>
                </tr>
                <tr>
                    <th width="147">开放时间:</th>
                    <td>
                        <input type="text" class="input" name="opentime" size="20"
                               value="{$data.opentime}">
                    </td>
                </tr>
                <tr>
                    <th width="147">馆藏精品：</th>
                    <td>
                        <input type="text" class="input" name="boutique" size="20"
                               value="{$data.boutique}">
                    </td>
                </tr>
                <tr>
                    <th width="147">总建筑面积：</th>
                    <td>
                        <input type="text" class="input" name="total_area" size="20"
                               value="{$data.total_area}">
                    </td>
                </tr>
                <tr>
                    <th width="147">简介：</th>
                    <td>
                        <!-- <input type="text" class="input" name="intro" size="20" value="{$data.intro}"> -->
                        <textarea name="intro" class="input_txt">{$data.intro}</textarea>
                    </td>
                </tr>
                 <tr>
                        <th>是否推荐至公共服务平台(数字资源)：</th>
                        <td>
                            <input type="checkbox" name="if_resources" value="1" <if condition="$data['if_resources'] eq 1 "> checked ="checked" </if>>是
                        </td>
                    </tr>
                <notempty name="data['reason']">
                <tr>
                    <th width="147">驳回原因：</th>
                    <td>
                        {$data.reason}
                    </td>
                </tr>
                </notempty>
            </table>
            <div class="">
                <div class="btn_wrap_pd">
                    <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

</div>

<script src="{$config_siteurl}statics/js/common.js?v"></script>
<Admintemplate file="Common/submit"/>
<script type="text/javascript" src="{$config_siteurl}statics/cu/layer/layer.js"></script>
<Admintemplate file="Common/submit"/>
<script>
function tel(){
        alert("正在研发，敬请期待");
    }
     $('a.btn_add').on('click',function(){
        var type = $(this).data('type');
        
       
        var index = layer.open({
            type: 2,
            title: '添加',
            shadeClose: true,
            shade: 0.8,
            area: ['40%', '40%'],
            content: '/Admin/Art/'+type
        });
    });
</script>
<script type="text/javascript">
    <?php
    $alowexts = "jpg|jpeg|gif|bmp|png";
    $thumb_ext = ",";
    $watermark_setting = 1;
    $module = "Content";
    $catid = "0";
    $authkey = upload_key("$maxPicNum,$alowexts,1,$thumb_ext,$watermark_setting");
    ?>
    function upfile(id) {
        flashupload(id + '_images', '图片上传', id, submit_pic, '{$maxPicNum},{$alowexts},1,{$thumb_ext},{$watermark_setting}', '{$module}', '{$catid}', '{$authkey}');
    }

    function submit_pic(uploadid, returnid) {
        var d = uploadid.iframe.contentWindow;
        var in_content = d.$("#att-status").html().substring(1);
        var contents = in_content.split('|');
        if (contents == '') return true;
        $.each(contents, function (i, n) {
            var str = "<input type='hidden' name='" + returnid + "_url[]' value='" + n +
                "'><img src='" + n + "'><div class='operate'><span class='sl'></span>" +
                "<span class='sr'></span><a href=\"javascript:void(0)\" class='tupian' ></a></div>";
            $('#' + returnid).find(".noimg:first").html(str);
            $('#' + returnid).find(".noimg:first").removeClass("noimg");
        });
    }

    /*图片移动*/
    $(".jsaddimgul").on("click", "li span", function () {
        var $ul1 = $(this).parent().parent();
        if ($(this).hasClass("sl")) {
            var $ul2 = $(this).parent().parent().prev("li");
        }
        else {
            var $ul2 = $(this).parent().parent().next("li");
        }
        var ulhtml1 = $ul1.html();
        var ulhtml2 = $ul2.html();
        $ul1.html(ulhtml2);
        $ul2.html(ulhtml1);
        if ($ul2.hasClass("noimg")) {
            $ul2.removeClass("noimg");
            $ul1.addClass("noimg");
        }
    })
    $(".jsaddimgul").on("click", "li a", function () {
        var $li = $(this).parent().parent();
        $li.addClass("noimg");
        $li.empty();
    })
    <?php
    $authkey_video = upload_key("$maxVideoNum,$alowexts,1,$thumb_ext,$watermark_setting");
    $allowexts_audio = "mp3|wav";
    $authkey_audio = upload_key("$maxAudioNum,$allowexts_audio,1,$thumb_ext,$watermark_setting");
    ?>
    function upvideo(id) {
        videoupload(id + '_upload', '视频上传', id, submit_video, '{$maxVideoNum},{$alowexts},1,{$thumb_ext},{$watermark_setting}', '{$module}', '{$catid}', '{$authkey_video}');
    }

    function upaudio(id) {
        audioupload(id + '_upload', '音频上传', id, submit_audio, '{$maxAudioNum},{$allowexts_audio},1,{$thumb_ext},{$watermark_setting}', '{$module}', '{$catid}', '{$authkey_audio}');
    }

    function submit_video(uploadid, returnid) {
        var d = uploadid.iframe.contentWindow;
        var video_id = d.$("#video-id").html();
        var video_title = d.$("#video-title").html();
        // console.log(video_id);
        video_html = '<li><input type="text" class="input" name="' + returnid + '[]" size="20" value="' + video_id + '" hidden /></li>';
        video_html += '<li><input type="text" class="input input-video" name="' + returnid + '_title[]" size="20" value="' + video_title + '" readonly="readonly" /><span>审核中...</span></li>';
        //只能上传一个视频,如果需要改变上传限制,所有视频的show页面都必须进行修改
        $('#' + returnid).html(video_html);

    }

    function submit_audio(uploadid, returnid) {
        var d = uploadid.iframe.contentWindow;
        var audio_id = d.$("#audio-id").html();
        var audio_title = d.$("#audio-title").html();
        audio_html = '<li><input type="text" class="input" name="' + returnid + '[]" size="20" value="' + audio_id + '" hidden /></li>';
        audio_html += '<li><input type="text" class="input input-video" name="' + returnid + '_title[]" size="20" value="' + audio_title + '" readonly="readonly" /><span>审核中...</span></li>';
        //只能上传一个音频,如果需要改变上传限制,所有音频的show页面都必须进行修改
        $('#' + returnid).html(audio_html);
    }


</script>
<script src="{$config_siteurl}statics/js/uploadfile.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/cu/layer/layer.js"></script>
</body>
</html>