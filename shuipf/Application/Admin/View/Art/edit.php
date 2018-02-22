<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <Admintemplate file="Common/Audittable"/>
    <div class="nav">
        <ul class="cc">
            <li><a href="{:U('index')}">文化艺术</a></li>
            <li class="current" ><a href="###">修改</a></li>
        </ul>
    </div>
    <div class="table_list table_art">
        <div class="table_full">
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr  name="selectshowhidden" style="display:none;">
                    <th width="147">所属地区：</th>                             
                    <td ><select id="area"  class="select_area" ></select></td>
                </tr>
            </table>
        
        <form class="J_ajaxForm" action="{:U('Art/edit')}" method="post" data-cid="7" <if condition="$data.parent_artcid neq 7"> style="display:none"</if>>
            <input type="hidden" name="form_cid" value="7">
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                    <th width="147">流布区域：</th>
                    <td>
                        
                        <input type="hidden" name="art_cid" value="{$data.art_cid}">
                        <input type="hidden" name="author_id" value="{$data.author_id}">
                        <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                        <textarea type="text" class="input_txt" name="region" >{$data.region}</textarea>
                    </td>
                </tr>
                 <tr>
                        <th width="147">剧种：</th>
                        <td>
                         <select name="drama" class="drama">
                        <if condition="$data['categoryname'] neq ''">
                         <volist name="data['categoryname']" id="vo">
                              <option value="{$vo.cid}" <if condition="$data['drama'] eq $vo['cid']">selected = "selected"</if>>{$vo.name}</option>
                         </volist><else/>
                         <option value="-1">无</option></if>
                       </select>
                    </td>
                    </tr>
                <tr>
                    <th width="147">剧团：</th>
                    <td>
                        <input type="hidden" value="{$data.id}" name="id">
                        <textarea type="text" class="input_txt" name="troupe" >{$data.troupe}</textarea>
                    </td>
                </tr>
                 <tr>
                        <th>标题：</th>
                        <td><textarea type="text" class="input_txt" name="title">{$data.title}</textarea></td>
                    </tr>
                <tr>
                    <th width="147">图片：</th>
                    <td>
                        <ul class="explain">
                            <li>文件上传:</li>
                            <li>
                                <a href="javascript:upfile('drama_picture')" class="seller_upload_image">上传图片</a>
                                <p class="tips">提示：1、图片上传大小不得超过4M</p>
                                <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张图片</p>
                            </li>
                        </ul>
                        <ul class="img jsaddimgul" id="drama_picture">
                            <for start="0" end="$maxPicNum">
                                <if condition="$picture_urls[$i] neq ''">
                                    <li class=''>
                                        <input type="hidden" name="drama_picture_url[]" value="{$picture_urls[$i]}">
                                        <img src="{$picture_urls[$i]}">
                                        <div class="operate"><span class="sl"></span><span class="sr"></span><a href="javascript:void(0)" class="tupian"></a></div>
                                    </li>
                                    <else/>
                                    <li class="noimg"></li>
                                </if>
                            </for>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th width="147">视频：</th>
                    <td>
                        <ul class="explain">
                            <li>文件上传:</li>
                            <li>
                                <a href="javascript:upvideo('drama_video')" class="seller_upload_image">上传视频</a>
                                <p class="tips">本类目下您最多可以上传{$maxVideoNum}部视频</p>
                            </li>
                        </ul>
                        <ul id="drama_video">
                            <for start="0" end="$maxVideoNum">
                                <if condition="$video_ids[$i] neq ''">
                                    <li><input type="text" class="input" name="drama_video[]" size="20" value="{$video_ids[$i]}" hidden /></li>
                                    <li><input type="text" class="input input-video" name="drama_video_title[]" size="60" value="{$video_titles[$i]}" readonly='readonly' /><span>审核中...</span></li>
                                </if>
                            </for>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th width="147">获奖情况：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="awards" >{$data.awards}</textarea>
                    </td>
                </tr>                        
                <tr>
                    <th width="147">代表作：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="example">{$data.example}</textarea>
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

        <!--music  -->
        <form class="J_ajaxForm" action="{:U('Art/edit')}" method="post" data-cid="8" <if condition="$data.parent_artcid neq 8"> style="display:none"</if>  >
            <input type="hidden" name="form_cid" value="8">
            <input type="hidden" name="art_cid" value="{$data.art_cid}">                           
            <input type="hidden" name="author_id" value="{$data.author_id}">
            <input type="hidden" name="area" class="area" value="{$data.area}"/>
            <input type="hidden" value="{$data.id}" name="id">
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                        <th width="147">种类/作品：</th>
                        <td><input type="text" class="input" name="title" value="{$data.title}"><span>*作为标题</span></td>
                </tr>
                <tr>
                        <th width="147">流传区域：</th>
                        <td>
                            <input type="text" class="input" name="region" value="{$data.region}">
                        </td>
                </tr>
                <!-- <tr> -->
                    <!-- <th width="147">机构：</th> -->
                    <!-- <td> -->
                        <!-- <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/> -->
                        
                        <!-- <textarea type="text" class="input_txt" name="agency" >{$data.agency}</textarea> -->
                    <!-- </td> -->
                <!-- </tr> -->
                <tr>
                        <th width="147">代表人物：</th>
                        <td>
                            <textarea type="text" class="input_txt" name="figures">{$data.figures} </textarea>
                        </td>
                    </tr>
                <!-- <tr>
                    <th width="147">剧团：</th>
                    <td>
                       <input type="text" class="input" name="th_troupe" id="name" size="20" value={$vo.th_troupe}></input>  
                    </td>
                </tr> -->

                  <tr>
                        <th width="147">乐种分类：</th>
                        <td>                              
                        <select name="drama" class="drama">
                        <if condition="$data['categoryname'] neq ''">
                         <volist name="data['categoryname']" id="vo">
                              <option value="{$vo.cid}" <if condition="$data['drama'] eq $vo['cid']">selected = "selected"</if>>{$vo.name}</option>
                         </volist><else/>
                         <option value="-1">无</option></if>
                       </select>
                        </td> 
                    </tr>
                    <tr>
                        <th>简介：</th>
                        <td>
                            <textarea type="text" class="input_txt" name="introduction">{$data.introduction}</textarea>
                        </td>
                    </tr>
                <tr>
                    <th width="147">图片：</th>
                    <td>
                        <ul class="explain">
                            <li>文件上传:</li>
                            <li>
                                <a href="javascript:upfile('music_picture')" class="seller_upload_image">上传图片</a>
                                <p class="tips">提示：1、图片上传大小不得超过4M</p>
                                <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张图片</p>
                            </li>
                        </ul>
                        <ul class="img jsaddimgul" id="music_picture">
                            <for start="0" end="$maxPicNum">
                                <if condition="$picture_urls[$i] neq ''">
                                    <li class=''>
                                        <input type="hidden" name="music_picture_url[]" value="{$picture_urls[$i]}">
                                        <img src="{$picture_urls[$i]}">
                                        <div class="operate"><span class="sl"></span><span class="sr"></span><a href="javascript:void(0)" class="tupian"></a></div>
                                    </li>
                                    <else/>
                                    <li class="noimg"></li>
                                </if>
                            </for>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th width="147">视频：</th>
                    <td>
                        <ul class="explain">
                            <li>文件上传:</li>
                            <li>
                                <a href="javascript:upvideo('music_video')" class="seller_upload_image">上传视频</a>
                                <p class="tips">本类目下您最多可以上传{$maxVideoNum}部视频</p>
                            </li>
                        </ul>
                        <ul id="music_video">
                            <for start="0" end="$maxVideoNum">
                                <if condition="$video_ids[$i] neq ''">
                                    <li><input type="text" class="input" name="music_video[]" size="20" value="{$video_ids[$i]}" hidden /></li>
                                    <li><input type="text" class="input input-video" name="music_video_title[]" size="60" value="{$video_titles[$i]}" readonly='readonly' /><span>审核中...</span></li>
                                </if>
                            </for>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th width="147">音频：</th>
                    <td>
                        <ul class="explain">
                            <li>文件上传:</li>
                            <li>
                                <a href="javascript:upaudio('dance_audio')" class="seller_upload_image">上传音频</a>
                                <p class="tips">本类目下您最多可以上传{$maxAudioNum}部音频</p>
                            </li>
                        </ul>
                        <ul id="dance_audio">
                            <for start="0" end="$maxAudioNum">
                                <if condition="$audio_ids[$i] neq ''">
                                    <li><input type="text" class="input" name="folk_audio[]" size="20" value="{$audio_ids[$i]}" hidden /></li>
                                    <li><input type="text" class="input input-video" name="folk_audio_title[]" size="60" value="{$audio_titles[$i]}" readonly='readonly' /><span>审核中...</span></li>
                                </if>
                            </for>
                        </ul>
                    </td>
                </tr>
                <tr>
                        <th>主演：</th>
                        <td>
                            <textarea type="text" class="input_txt" name="stars">{$data.stars} </textarea>
                        </td>
                    </tr>
                <tr>
                    <th width="147">获奖情况：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="awards"> {$data.awards}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">乐团：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="band" >{$data.band}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">代表作：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="example"  >{$data.example}</textarea>
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
        <!-- 舞蹈 -->
        <form class="J_ajaxForm"  action="{:U('Art/edit')}" method="post" <if condition="$data.parent_artcid neq 9"> style="display:none"</if> data-cid="9" >
        <input type="hidden" name="form_cid" value="9">
        <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                        <th  width="147">舞种/作品：</th>
                        <td>
                            <input type="text" class="input" name="title" id="title" size="60">{$data.title}</textarea><span>*作为标题</span>
                        </td>
                    </tr>
                <tr>
                    <th width="147">表演者：</th>
                    <td>
                        <!-- <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/> -->
                        <input type="hidden" name="author_id" value="{$data.author_id}">
                        <input type="hidden" name="art_cid" value="{$data.art_cid}">
                         <input type="hidden" value="{$data.id}" name="id">
                        <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>                     
                        <input type="text" class="input" name="performer" id="name" size="60" value="{$data.performer}" />
                    </td>
                </tr>
                <tr>
                    <th>代表人物：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="figures">{$data.figures} </textarea>
                    </td>
                </tr>
                <tr>
                    <th>流传区域：</th>
                    <td>
                        <input type="text" class="input" name="region" value="{$data.region}">
                    </td>
                </tr>
                <tr>
                    <th width="147">简介：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="introduction" >{$data.introduction}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">图片：</th>
                    <td>
                        <ul class="explain">
                            <li>文件上传:</li>
                            <li>
                                <a href="javascript:upfile('dance_picture')" class="seller_upload_image">上传图片</a>
                                <p class="tips">提示：1、图片上传大小不得超过4M</p>
                                <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张图片</p>
                            </li>
                        </ul>
                        <ul class="img jsaddimgul" id="dance_picture">
                            <for start="0" end="$maxPicNum">
                                <if condition="$picture_urls[$i] neq ''">
                                    <li class=''>
                                        <input type="hidden" name="dance_picture_url[]" value="{$picture_urls[$i]}">
                                        <img src="{$picture_urls[$i]}">
                                        <div class="operate"><span class="sl"></span><span class="sr"></span><a href="javascript:void(0)" class="tupian"></a></div>
                                    </li>
                                    <else/>
                                    <li class="noimg"></li>
                                </if>
                            </for>
                        </ul>
                    </td>
                </tr>
                <!--<tr>
                    <th width="147">音频：</th>
                    <td>
                        <ul class="explain">
                            <li>文件上传:</li>
                            <li>
                                <a href="javascript:upaudio('dance_audio')" class="seller_upload_image">上传音频</a>
                                <p class="tips">本类目下您最多可以上传{$maxAudioNum}部音频</p>
                            </li>
                        </ul>
                        <ul id="dance_audio">
                            <for start="0" end="$maxAudioNum">
                                <if condition="$audio_ids[$i] neq ''">
                                    <li><input type="text" class="input" name="dance_audio[]" size="20" value="{$audio_ids[$i]}" hidden /></li>
                                    <li><input type="text" class="input input-video" name="dance_audio_title[]" size="60" value="{$audio_titles[$i]}" readonly='readonly' /><span>审核中...</span></li>
                                </if>
                            </for>
                        </ul>
                    </td>
                </tr>-->
                <tr>
                    <th width="147">视频：</th>
                    <td>
                        <ul class="explain">
                            <li>文件上传:</li>
                            <li>
                                <a href="javascript:upvideo('dance_video')" class="seller_upload_image">上传视频</a>
                                <p class="tips">本类目下您最多可以上传{$maxVideoNum}部视频</p>
                            </li>
                        </ul>
                        <ul id="dance_video">
                            <for start="0" end="$maxVideoNum">
                                <if condition="$video_ids[$i] neq ''">
                                    <li><input type="text" class="input" name="dance_video[]" size="20" value="{$video_ids[$i]}" hidden /></li>
                                    <li><input type="text" class="input input-video" name="dance_video_title[]" size="60" value="{$video_titles[$i]}" readonly='readonly' /><span>审核中...</span></li>
                                </if>
                            </for>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th width="147">获奖情况：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="awards" >{$data.awards}</textarea>
                    </td>
                </tr> 
                <tr>
                        <th>是否推荐至公共服务平台(数字资源)：</th>
                        <td>
                            <input type="checkbox" name="if_resources" value="1" <if condition="$data['if_resources'] eq 1 "> checked ="checked" </if>>是
                        </td>
                    </tr>
             
                <!-- <tr>
                    <th width="147">代表作：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="example" >{$data.example}</textarea>
                    </td>
                </tr>                -->
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
        <!-- 美术 -->
        <form class="J_ajaxForm" action="{:U('Art/edit')}" method="post" <if condition="$data.parent_artcid neq 10"> style="display:none"</if> data-cid="10" >
            <input type="hidden" name="form_cid" value="10">
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
            <tr>
                    <th width="147">类目：</th>
                    <td>
                        <div id="category" style="display:inline-block;">
                            <select id="parentItems" name="art_cid" onchange="getchildlist(this)">
                                <option value='0'>--请选择--</option>
                                <volist name="result" id="ca">
                                    <option value="{$ca['cid']}">{$ca['name']}</option>
                                </volist>
                            </select>
                            <div id="childItems" style="display:inline-block;"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th width="147">作者：</th>
                    <td>
                        <!-- <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/> -->
                        <input type="hidden" name="author_id" value="{$data.author_id}">
                        <input type="hidden" name="art_cid" value="{$data.art_cid}">
                        <input type="hidden" value="{$data.id}" name="id">  
                        <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>                
                        <input type="text" class="input" name="authorname" size="60" value="{$data.authorname}" />
                    </td>
                </tr>
                <!--<tr>
                    <th width="147">题材：</th>
                    <td>
                        <input type="text" class="input" name="theme" size="60" value="{$data.theme}" />
                    </td>
                </tr>
                <tr>
                    <th width="147">技法：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="technique" >{$data.technique}</textarea>
                    </td>
                </tr>-->
                <tr>
                    <th width="147">作者简介：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="introduction" >{$data.introduction}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">图片：</th>
                    <td>
                        <ul class="explain">
                            <li>文件上传:</li>
                            <li>
                                <a href="javascript:upfile('art_picture')" class="seller_upload_image">上传图片</a>
                                <p class="tips">提示：1、图片上传大小不得超过4M</p>
                                <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张图片</p>
                            </li>
                        </ul>
                        <ul class="img jsaddimgul" id="art_picture">
                            <for start="0" end="$maxPicNum">
                                <if condition="$picture_urls[$i] neq ''">
                                    <li class=''>
                                        <input type="hidden" name="art_picture_url[]" value="{$picture_urls[$i]}">
                                        <img src="{$picture_urls[$i]}">
                                        <div class="operate"><span class="sl"></span><span class="sr"></span><a href="javascript:void(0)" class="tupian"></a></div>
                                    </li>
                                    <else/>
                                    <li class="noimg"></li>
                                </if>
                            </for>
                        </ul>
                    </td>

                </tr>
                
                
                <tr>
                    <th width="147">获奖情况：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="awards" >{$data.awards}</textarea>
                    </td>
                </tr>            
                <!--<tr>
                    <th width="147">类别：</th>
                    <td>
                        <select name="drama" class="drama">
                        <if condition="$data['categoryname'] neq ''">
                         <volist name="data['categoryname']" id="vo">
                              <option value="{$vo.cid}" <if condition="$data['drama'] eq $vo['cid']">selected = "selected"</if>>{$vo.name}</option>
                         </volist><else/>
                         <option>无</option></if>
                       </select>
                    </td>
                </tr>-->
                <!--<tr>
                    <th width="147">艺术家：</th>
                    <td>
                        <input type="text" class="input" name="artist" size="60" value="{$data.artist}">
                    </td>
                </tr>-->
                <tr>
                    <th width="147">代表作：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="example" >{$data.example}</textarea>
                    </td>
                </tr> 
                <tr>
                        <th>是否推荐至公共服务平台(数字资源)：</th>
                        <td>
                            <input type="checkbox" name="if_resources" value="1" <if condition="$data['if_resources'] eq 1 "> checked ="checked" </if>>是
                        </td>
                    </tr>
           
                <tr>
                    <th>是否推荐至艺术档案馆页面：</th>
                    <td>
                        <input type="checkbox" name="if_position" value="1" <eq name="data['if_position']" value="1">checked</eq>>是
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
        <!-- 曲艺 -->
        <form class="J_ajaxForm" action="{:U('Art/edit')}" method="post" <if condition="$data.parent_artcid neq 11"> style="display:none"</if> data-cid="11" >
        <input type="hidden" name="form_cid" value="11">
        <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <!-- <tr>
                    <th width="147">曲种：</th>
                    <td>
                    <input type="hidden" name="author_id" value="{$userInfo.id}">
                    <input type="hidden" name="id" value="{$data.id}">
                  
                    <input type="text" class="input" name="th_drama" id="name" size="20" value={$vo.th_drama}></input>
                    </td> 
                </tr>-->
                <tr>
                    <th width="147">曲种：</th>
                        <td><textarea type="text" class="input_txt" name="title">{$data.title}</textarea></td>
                    </tr>
                <!-- <tr>
                        <th width="147">曲种：</th>
                        <td>                              
                        <input type="text" class="input" name="drama" value="{$data['drama']}">
                        </td> 
                    </tr> -->
                <tr>
                    <th width="147">流传区域：</th>
                    <td>
                        <!-- <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/> -->
                        <input type="hidden" name="author_id" value="{$data.author_id}">
                        <input type="hidden" name="art_cid" value="{$data.art_cid}">
                        <input type="hidden" value="{$data.id}" name="id">
                        <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                        <input  type="text" class="input" name="region" value="{$data.region}" />
                    </td>
                </tr>
                <!--<tr>
                    <th width="147">机构：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="agency" >{$data.agency}</textarea>
                    </td>
                </tr>            -->
                <tr>
                    <th width="147">图片：</th>
                    <td>
                        <ul class="explain">
                            <li>文件上传:</li>
                            <li>
                                <a href="javascript:upfile('folk_picture')" class="seller_upload_image">上传图片</a>
                                <p class="tips">提示：1、图片上传大小不得超过4M</p>
                                <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张图片</p>
                            </li>
                        </ul>
                        <ul class="img jsaddimgul" id="folk_picture">
                            <for start="0" end="$maxPicNum">
                                <if condition="$picture_urls[$i] neq ''">
                                    <li class=''>
                                        <input type="hidden" name="folk_picture_url[]" value="{$picture_urls[$i]}">
                                        <img src="{$picture_urls[$i]}">
                                        <div class="operate"><span class="sl"></span><span class="sr"></span><a href="javascript:void(0)" class="tupian"></a></div>
                                    </li>
                                    <else/>
                                    <li class="noimg"></li>
                                </if>
                            </for>
                        </ul>
                    </td>
                </tr>
              
                
                <tr>
                    <th width="147">视频：</th>
                    <td>
                        <ul class="explain">
                            <li>文件上传:</li>
                            <li>
                                <a href="javascript:upvideo('folk_video')" class="seller_upload_image">上传视频</a>
                                <p class="tips">本类目下您最多可以上传{$maxVideoNum}部视频</p>
                            </li>
                        </ul>
                        <ul id="folk_video">
                            <for start="0" end="$maxVideoNum">
                                <if condition="$video_ids[$i] neq ''">
                                    <li><input type="text" class="input" name="folk_video[]" size="20" value="{$video_ids[$i]}" hidden /></li>
                                    <li><input type="text" class="input input-video" name="folk_video_title[]" size="60" value="{$video_titles[$i]}" readonly='readonly' /><span>审核中...</span></li>
                                </if>
                            </for>
                        </ul>
                    </td>
                </tr>
                  <tr>
                    <th width="147">音频：</th>
                    <td>
                        <ul class="explain">
                            <li>文件上传:</li>
                            <li>
                                <a href="javascript:upaudio('folk_audio')" class="seller_upload_image">上传音频</a>
                                <p class="tips">本类目下您最多可以上传{$maxAudioNum}部音频</p>
                            </li>
                        </ul>
                        <ul id="folk_audio">
                            <for start="0" end="$maxAudioNum">
                                <if condition="$audio_ids[$i] neq ''">
                                    <li><input type="text" class="input" name="folk_audio[]" size="20" value="{$audio_ids[$i]}" hidden /></li>
                                    <li><input type="text" class="input input-video" name="folk_audio_title[]" size="60" value="{$audio_titles[$i]}" readonly='readonly' /><span>审核中...</span></li>
                                </if>
                            </for>
                        </ul>
                    </td>
                </tr>
                <!--<tr>
                    <th width="147">获奖情况：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="awards" >{$data.awards}</textarea>
                    </td>
                </tr>-->
                <tr>
                    <th width="147">代表人物：</th>
                    <td>
                        <input type="text" class="input" name="figures" size="60" value="{$data.figures}" />
                    </td>
                </tr>
                <tr>
                    <th width="147">曲目：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="example">{$data.example}</textarea>
                    </td>
                </tr>
                  <tr>
                        <th>简介：</th>
                        <td>
                            <textarea type="text" class="input_txt" name="introduction">{$data.introduction}</textarea>
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
        <!-- 杂技 -->
        <form class="J_ajaxForm" action="{:U('Art/edit')}" method="post" <if condition="$data.parent_artcid neq 12"> style="display:none"</if> data-cid="12" >
        <input type="hidden" name="form_cid" value="12">
        <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                    <th width="147">机构：</th>
                    <td>
                        <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                        <input type="hidden" name="author_id" value="{$data.author_id}">
                        <input type="hidden" name="art_cid" value="{$data.art_cid}">
                        <input type="hidden" value="{$data.id}" name="id">
                        <textarea type="text" class="input_txt" name="agency">{$data.agency}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">代表人物：</th>
                    <td>
                        <input type="text" class="input" name="figures" id="name" size="60" value="{$data.figures}" />
                    </td>
                </tr>
                <tr>
                    <th width="147">代表作：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="example" >{$data.example}</textarea>
                    </td>
                </tr>                        
                <tr>
                    <th width="147">图片：</th>
                    <td>
                        <ul class="explain">
                            <li>文件上传:</li>
                            <li>
                                <a href="javascript:upfile('acrobatics_picture')" class="seller_upload_image">上传图片</a>
                                <p class="tips">提示：1、图片上传大小不得超过4M</p>
                                <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张图片</p>
                            </li>
                        </ul>
                        <ul class="img jsaddimgul" id="acrobatics_picture">
                            <for start="0" end="$maxPicNum">
                                <if condition="$picture_urls[$i] neq ''">
                                    <li class=''>
                                        <input type="hidden" name="acrobatics_picture_url[]" value="{$picture_urls[$i]}">
                                        <img src="{$picture_urls[$i]}">
                                        <div class="operate"><span class="sl"></span><span class="sr"></span><a href="javascript:void(0)" class="tupian"></a></div>
                                    </li>
                                    <else/>
                                    <li class="noimg"></li>
                                </if>
                            </for>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th width="147">视频：</th>
                    <td>
                        <ul class="explain">
                            <li>文件上传:</li>
                            <li>
                                <a href="javascript:upvideo('acrobatics_video')" class="seller_upload_image">上传视频</a>
                                <p class="tips">本类目下您最多可以上传{$maxVideoNum}部视频</p>
                            </li>
                        </ul>
                        <ul id="acrobatics_video">
                            <for start="0" end="$maxVideoNum">
                                <if condition="$video_ids[$i] neq ''">
                                    <li><input type="text" class="input" name="acrobatics_video[]" size="20" value="{$video_ids[$i]}" hidden /></li>
                                    <li><input type="text" class="input input-video" name="acrobatics_video_title[]" size="60" value="{$video_titles[$i]}" /><span>审核中...</span></li>
                                </if>
                            </for>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th width="147">获奖情况：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="awards" >{$data.awards}</textarea>
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
        <!-- 书法 -->
        <form class="J_ajaxForm" action="{:U('Art/edit')}" method="post" <if condition="$data.parent_artcid neq 13"> style="display:none"</if> data-cid="13" >
        <input type="hidden" name="form_cid" value="13">
        <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                    <th width="147">作者：</th>
                    <td>
                        <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                        <input type="hidden" name="author_id" value="{$data.author_id}">
                        <input type="hidden" name="art_cid" value="{$data.art_cid}">
                        <input type="hidden" value="{$data.id}" name="id">
                        <input type="text" class="input" name="authorname" id="name" size="60" value="{$data.authorname}" />
                    </td>
                </tr>
                 <tr>
                        <th>标题:</th>
                        <td><textarea type="text" class="input_txt" name="title">{$data.title}</textarea></td>
                    </tr>
                <tr>
                    <th width="147">题材：</th>
                    <td>
                        <input type="text" class="input" name="theme" id="name" size="60" value="{$data.theme}" />
                    </td>
                </tr>
                <tr>
                    <th width="147">技法：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="technique">{$data.technique}</textarea>
                    </td>
                </tr>                        
                <tr>
                    <th width="147">简介：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="introduction" >{$data.introduction}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">图片：</th>
                    <td>
                        <ul class="explain">
                            <li>文件上传:</li>
                            <li>
                                <a href="javascript:upfile('handwriting_picture')" class="seller_upload_image">上传图片</a>
                                <p class="tips">提示：1、图片上传大小不得超过4M</p>
                                <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张图片</p>
                            </li>
                        </ul>
                        <ul class="img jsaddimgul" id="handwriting_picture">
                            <for start="0" end="$maxPicNum">
                                <if condition="$picture_urls[$i] neq ''">
                                    <li class=''>
                                        <input type="hidden" name="handwriting_picture_url[]" value="{$picture_urls[$i]}">
                                        <img src="{$picture_urls[$i]}">
                                        <div class="operate"><span class="sl"></span><span class="sr"></span><a href="javascript:void(0)" class="tupian"></a></div>
                                    </li>
                                    <else/>
                                    <li class="noimg"></li>
                                </if>
                            </for>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th width="147">获奖情况：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="awards" >{$data.awards}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">艺术家：</th>
                    <td>
                        <input type="text" class="input" name="artist" id="name" size="60" value="{$data.artist}" />
                    </td>
                </tr>
                <tr>
                    <th width="147">代表作：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="example" >{$data.example}</textarea>
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
</body>
<script type="text/javascript">
    <?php
    $alowexts = "jpg|jpeg|gif|bmp|png";
    $thumb_ext = ",";
    $watermark_setting = 1;
    $module = "Content";
    $catid = "0";
    $allowexts_audio = "mp3|wav";
    $authkey = upload_key("$maxPicNum,$alowexts,1,$thumb_ext,$watermark_setting");
    $video_authkey =upload_key("$maxVideoNum,$alowexts,1,$thumb_ext,$watermark_setting");
    $authkey_audio = upload_key("$maxAudioNum,$allowexts_audio,1,$thumb_ext,$watermark_setting");
    ?>
    function upfile(id){
        flashupload(id+'_images', '图片上传',id,submit_pic,'{$maxPicNum},{$alowexts},1,{$thumb_ext},{$watermark_setting}','{$module}','{$catid}','{$authkey}');
    }

    function submit_pic(uploadid,returnid){
        var d = uploadid.iframe.contentWindow;
        var in_content = d.$("#att-status").html().substring(1);
        var in_filename = d.$("#att-name").html().substring(1);
        var contents = in_content.split('|');
        var filenames = in_filename.split('|');
        if (contents == '') return true;
        $.each(contents, function (i, n) {
            var ids = parseInt(Math.random() * 10000 + 10 * i);
            var filename = filenames[i].substr(0, filenames[i].indexOf('.'));
            var str = "<input type='hidden' name='"+returnid+"_url[]' value='" + n +
                "'><img src='"+n+"'><div class='operate'><span class='sl'></span>" +
                "<span class='sr'></span><a href=\"javascript:void(0)\" class='tupian' ></a></div>";
            $('#' + returnid).find(".noimg:first").html(str);
            $('#' + returnid).find(".noimg:first").removeClass("noimg");
        });
    }

    /*图片移动*/
    $(".jsaddimgul").on("click","li span",function(){
        var $ul1=$(this).parent().parent();
        if($(this).hasClass("sl")){
            var $ul2=$(this).parent().parent().prev("li");
        }
        else {
            var $ul2=$(this).parent().parent().next("li");
        }
        var ulhtml1=$ul1.html();
        var ulhtml2=$ul2.html();
        $ul1.html(ulhtml2);
        $ul2.html(ulhtml1);
        if($ul2.hasClass("noimg")){
            $ul2.removeClass("noimg");
            $ul1.addClass("noimg");
        }
    })
    $(".jsaddimgul").on("click","li a",function(){
        var $li=$(this).parent().parent();
        $li.addClass("noimg");
        $li.empty();
    })

    function upvideo(id) {
        videoupload(id+'_upload', '视频上传',id,submit_video, '{$maxVideoNum},{$alowexts},1,{$thumb_ext},{$watermark_setting}','{$module}','{$catid}','{$video_authkey}')
    }

    function submit_video(uploadid, returnid) {
        var d = uploadid.iframe.contentWindow;
        var video_id = d.$("#video-id").html();
        var video_title = d.$("#video-title").html();
        video_html = '<li><input type="text" class="input" name="' + returnid + '[]" size="20" value="'+video_id+'" hidden /></li>';
        video_html += '<li><input type="text" class="input input-video" name="' + returnid + '_title[]" size="20" value="'+video_title+'" readonly="readonly" /><span>审核中...</span></li>';
        $('#' + returnid).html(video_html);
    }

    function upaudio(id) {
        audioupload(id+'_upload', '音频上传', id, submit_audio, '{$maxAudioNum},{$allowexts_audio},1,{$thumb_ext},{$watermark_setting}','{$module}','{$catid}','{$authkey_audio}')
    }

    function submit_audio(uploadid, returnid) {
        var d = uploadid.iframe.contentWindow;
        var audio_id = d.$("#audio-id").html();
        var audio_title = d.$("#audio-title").html();
        // console.log(video_id);
        audio_html = '<li><input type="text" class="input" name="' + returnid + '[]" size="20" value="'+audio_id+'" hidden /></li>';
        audio_html += '<li><input type="text" class="input input-video" name="' + returnid + '_title[]" size="20" value="'+audio_title+'" readonly="readonly" /><span>审核中...</span></li>';
        //只能上传一个视频,如果需要改变上传限制,所有视频的show页面都必须进行修改
        $('#' + returnid).html(audio_html);
    }
</script>
<script src="{$config_siteurl}statics/js/uploadfile.js?v"></script>
</html>