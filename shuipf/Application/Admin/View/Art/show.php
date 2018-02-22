<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap jj">
    <if condition="$_GET['showtype'] neq '' || $_GET['type'] neq ''">
        <Admintemplate file="Common/actionNav"/>
        <else/>
        <div class="nav">
        <ul class="cc">
            <li><a href="{:U('search')}">文化艺术</a></li>
            <li class="current"><a href="###">查看</a></li>
            <!--<li ><a value="手机扫描" class='  btn_add1' onclick="tel()"  />文本扫描</a></li>
            <li ><a value="手机扫描" class='  btn_add1'  onclick="tel()" />语音录入</a></li>
            <li ><a value="手机扫描" class='  btn_add' data-type="web"  />网络采集</a></li>-->
        </ul>
    </div>
    </if>
    <div class="common-form table_full">
        <form class="J_ajaxForm" data-cid="7"
        <neq name="data.data-cid" value="7">hidden</neq>
        >
        <input type="hidden" name="art_cid" value="">
        <div class="table_list table_art">
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                    <th width="147">流布区域：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="region"
                                  disabled="disabled">{$data.region}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">剧种：</th>
                    <td>
                        <input type="text" class="input" name="drama" size="60"
                               value="{$data.categoryname.name|default=无}" disabled="disabled"/>
                    </td>
                </tr>
                <tr>
                    <th width="147">剧团：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="troupe"
                                  disabled="disabled">{$data.troupe} </textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">图片：</th>
                    <td>
                        <ul class="img jsaddimgul" id="drama_picture">
                            <for start="0" end="$maxPicNum">
                                <if condition="$picture_urls[$i] neq ''">
                                    <li class=''>
                                        <input type="hidden" name="art_picture_url[]" value="{$picture_urls[$i]}">
                                        <img src="{$picture_urls[$i]}">
                                        <div class="operate" hidden><span class="sl"></span><span class="sr"></span><a
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
                    <th width="147">视频：</th>
                    <td>
                        <if condition="$data.video neq '' ">
                            <p class="video-title">{$data.video_title}<span>（点击查看视频）</span></p>
                            <div id="drama_player" style="width:580px;height:500px" hidden></div>
                            <else/>
                            <div>没有上传任何视频</div>
                        </if>
                    </td>
                </tr>
                <tr>
                    <th width="147">获奖情况：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="awards"
                                  disabled="disabled">{$data.awards}</textarea>
                    </td>
                </tr>
                <!--<tr>
                    <th width="147">所属地区：</th>
                    <td>
                        <input type="text" class="input" name="area_display" size="20" value="{$data.area_display}"
                               disabled="disabled"/>
                    </td>
                </tr>-->
                <tr>
                    <th width="147">代表作：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="example"
                                  disabled="disabled">{$data.example}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">状态：</th>
                    <td>
                        <!--<input type="text" class="input" name="status" id="status" size="20" value={$vo.status}>-->
                        <select name="status" disabled>
                            <option value="0">显示</option>
                            <option value="1">不显示</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        </form>
        <!--music  -->
        <form class="J_ajaxForm" data-cid="8"
        <neq name="data.data-cid" value="8">hidden</neq>
        >
        <input type="hidden" name="art_cid" value="">
        <div class="table_list">
            <table cellpadding="2" cellspacing="1" class="table_form  table_art" width="100%">
                <tr>
                    <th width="147">机构：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="agency"
                                  disabled="disabled">{$data.agency}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">代表人物：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="figures" id="name" size="50" disabled="disabled">{$data.figures}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">乐种：</th>
                    <td>

                        <input type="text" class="input" name="drama" size="60"
                               value="{$data.categoryname.name|default=无}" disabled="disabled"/>
                    </td>
                </tr>
                <!-- <tr>
                    <th width="147">剧团：</th>
                    <td>
                       <input type="text" class="input" name="th_troupe" id="name" size="20" value={$vo.th_troupe}></input>
                    </td>
                </tr> -->
                <tr>
                    <th width="147">图片：</th>
                    <td>
                        <ul class="img jsaddimgul" id="music_picture">
                            <for start="0" end="$maxPicNum">
                                <if condition="$picture_urls[$i] neq ''">
                                    <li class=''>
                                        <input type="hidden" name="art_picture_url[]" value="{$picture_urls[$i]}">
                                        <img src="{$picture_urls[$i]}">
                                        <div class="operate" hidden><span class="sl"></span><span class="sr"></span><a
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
                    <th width="147">视频：</th>
                    <td>
                        <if condition="$data.video neq '' ">
                            <p class="video-title">{$data.video_title}<span>（点击查看视频）</span></p>
                            <div id="music_player" style="width:580px;height:500px" hidden></div>
                            <else/>
                            <div>没有上传任何视频</div>
                        </if>
                    </td>
                </tr>
                <tr>
                    <th width="147">获奖情况：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="awards"
                                  disabled="disabled">{$data.awards}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">乐团：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="band" disabled="disabled">{$data.band}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">代表作：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="example"
                                  disabled="disabled">{$data.example}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">状态：</th>
                    <td>
                        <!--<input type="text" class="input" name="status" id="status" size="20" value={$vo.status}>-->
                        <select name="status" disabled>
                            <option value="0">显示</option>
                            <option value="1">不显示</option>
                        </select>
                    </td>
                </tr>

            </table>
        </div>
        </form>
        <!-- 舞蹈 -->
        <form class="J_ajaxForm" data-cid="9"
        <neq name="data.data-cid" value="9">hidden</neq>
        >
        <input type="hidden" name="art_cid" value="">
        <div class="table_list">
            <table cellpadding="2" cellspacing="1" class="table_form table_art" width="100%">
                <tr>
                    <th width="147">表演者：</th>
                    <td>
                        <input type="text" class="input" name="performer" size="60" value="{$data.performer}"
                               disabled="disabled"/>
                    </td>
                </tr>
                <!--<tr>
                    <th width="147">表演单位：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="unit" ddisable="disabled">{$data.unit}</textarea>
                    </td>
                </tr>-->
                <!--<tr>
                    <th width="147">机构：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="agency"
                                  disabled="disabled">{$data.agency}</textarea>
                    </td>
                </tr>-->
                <tr>
                    <th width="147">舞蹈简介：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="introduction"
                                  disabled="disabled">{$data.introduction}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">图片：</th>
                    <td>
                        <ul class="img jsaddimgul" id="dance_picture">
                            <for start="0" end="$maxPicNum">
                                <if condition="$picture_urls[$i] neq ''">
                                    <li class=''>
                                        <input type="hidden" name="art_picture_url[]" value="{$picture_urls[$i]}">
                                        <img src="{$picture_urls[$i]}">
                                        <div class="operate" hidden><span class="sl"></span><span class="sr"></span><a
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
                    <th width="147">视频：</th>
                    <td>
                        <if condition="$data.video neq '' ">
                            <p class="video-title">{$data.video_title}<span>（点击查看视频）</span></p>
                            <div id="dance_player" style="width:580px;height:500px" hidden></div>
                            <else/>
                            <div>没有上传任何视频</div>
                        </if>
                    </td>
                </tr>
                <tr>
                    <th width="147">获奖情况：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="awards"
                                  disabled="disabled">{$data.awards}</textarea>
                    </td>
                </tr>
                <!--<tr>
                    <th width="147">所属地区：</th>
                    <td>
                        <input type="text" class="input" name="area_display" size="20" value="{$data.area_display}"
                               disabled="disabled"/>
                    </td>
                </tr>-->
                <tr>
                    <th width="147">代表作：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="example"
                                  disabled="disabled">{$data.example}</textarea>
                    </td>
                </tr>
                <!--<tr>
                    <th width="147">状态：</th>
                    <td>
                        <!--<input type="text" class="input" name="status" id="status" size="20" value={$vo.status}>-->
                        <!--<select name="status" disabled>
                            <option value="0">显示</option>
                            <option value="1">不显示</option>
                        </select>
                    </td>
                </tr>-->

            </table>
        </div>
        </form>
        <!-- 美术 -->
        <form class="J_ajaxForm" data-cid="10"
        <neq name="data.data-cid" value="10">hidden</neq>
        >
        <input type="hidden" name="art_cid" value="">
        <div class="table_list">
            <table cellpadding="2" cellspacing="1" class="table_form table_art" width="100%">
                <tr>
                    <th width="147">作者：</th>
                    <td>
                        <input type="text" class="input" name="authorname" size="60" value="{$data.authorname}"
                               disabled="disabled"/>
                    </td>
                </tr>
                <!--<tr>
                    <th width="147">题材：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="theme"
                                  disabled="disabled">{$data.theme}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">技法：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="technique"
                                  disabled="disabled">{$data.technique}</textarea>
                    </td>
                </tr>-->
                <tr>
                    <th width="147">作者简介：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="introduction" disabled="disabled">{$data.introduction}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">图片：</th>
                    <td>
                        <ul class="img jsaddimgul" id="art_picture">
                            <for start="0" end="$maxPicNum">
                                <if condition="$picture_urls[$i] neq ''">
                                    <li class=''>
                                        <input type="hidden" name="art_picture_url[]" value="{$picture_urls[$i]}">
                                        <img src="{$picture_urls[$i]}">
                                        <div class="operate" hidden><span class="sl"></span><span class="sr"></span><a
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
                    <th width="147">获奖情况：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="awards"
                                  disabled="disabled">{$data.awards}</textarea>
                    </td>
                </tr>
                <!--<tr>
                    <th width="147">所属地区：</th>
                    <td>
                        <input type="text" class="input" name="area_display" size="20" value="{$data.area_display}"
                               disabled="disabled"/>
                    </td>
                </tr>-->
                <!--<tr>
                    <th width="147">类别：</th>
                    <td>
                        <input type="text" class="input" name="drama" size="60"
                               value="{$data.categoryname.name|default=无}" disabled="disabled"/>
                    </td>
                </tr>
                <tr>
                    <th width="147">艺术家：</th>
                    <td>
                        <input type="text" class="input" name="artist" id="name" size="60" value="{$data.artist}"
                               disabled="disabled"/>
                    </td>
                </tr>-->
                <tr>
                    <th width="147">代表作：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="example"
                                  disabled="disabled">{$data.example}</textarea>
                    </td>
                </tr>
                <!--<tr>
                    <th width="147">状态：</th>
                    <td>
                        <!--<input type="text" class="input" name="status" id="status" size="20" value={$vo.status}>-->
                        <!--<select name="status" disabled>
                            <option value="0">显示</option>
                            <option value="1">不显示</option>
                        </select>
                    </td>
                </tr>-->

            </table>
        </div>
        </form>
        <!-- 曲艺 -->
        <form class="J_ajaxForm" data-cid="11"
        <neq name="data.data-cid" value="11">hidden</neq>
        >
        <input type="hidden" name="art_cid" value="">
        <div class="table_list">
            <table cellpadding="2" cellspacing="1" class="table_form table_art" width="100%">
                <tr>
                    <th width="147">曲种：</th>
                    <td>
                        <input type="text" class="input" name="drama" size="60"
                               value="{$data.categoryname.name|default=无}" disabled="disabled"/>
                    </td>
                </tr>
                <tr>
                    <th width="147">区域：</th>
                    <td>
                        <input  type="text" class="input_txt" name="region"
                                  disabled="disabled" value="{$data.region}">
                    </td>
                </tr>
                <!--<tr>
                    <th width="147">机构：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="agency"
                                  disabled="disabled">{$data.agency}</textarea>
                    </td>
                </tr>-->
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
                        <textarea type="text" class="input_txt" name="awards"
                                  disabled="disabled">{$data.awards}</textarea>
                    </td>
                </tr>-->
                <tr>
                    <th width="147">代表人物：</th>
                    <td>
                        <input type="text" class="input" name="figures" size="60" value="{$data.figures}"
                               ddisable="disabled"/>
                    </td>
                </tr>
                <tr>
                    <th width="147">代表曲目：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="example"
                                  disabled="disabled">{$data.example}</textarea>
                    </td>
                </tr>
                <tr>
                        <th>简介：</th>
                        <td>
                            <textarea type="text" class="input_txt" name="introduction">{$data.introduction}</textarea>
                        </td>
                    </tr>

            </table>
        </div>
        </form>
        <!-- 杂技 -->
        <form class="J_ajaxForm" data-cid="12"
        <neq name="data.data-cid" value="12">hidden</neq>
        >
        <input type="hidden" name="art_cid" value="">
        <div class="table_list">
            <table cellpadding="2" cellspacing="1" class="table_form table_art" width="100%">
                <tr>
                    <th width="147">机构：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="agency"
                                  disabled="disabled">{$vo.agency}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">代表人物：</th>
                    <td>
                        <input type="text" class="input" name="figures" size="60" value="{$vo.figures}"
                               disabled="disabled"/>
                    </td>
                </tr>
                <tr>
                    <th width="147">代表作：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="example"
                                  disabled="disabled">{$vo.example}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">图片：</th>
                    <td>
                        <ul class="img jsaddimgul" id="acrobatics_picture">
                            <for start="0" end="$maxPicNum">
                                <if condition="$picture_urls[$i] neq ''">
                                    <li class=''>
                                        <input type="hidden" name="art_picture_url[]" value="{$picture_urls[$i]}">
                                        <img src="{$picture_urls[$i]}">
                                        <div class="operate" hidden><span class="sl"></span><span class="sr"></span><a
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
                    <th width="147">视频：</th>
                    <td>
                        <if condition="$data.video neq '' ">
                            <p class="video-title">{$data.video_title}<span>（点击查看视频）</span></p>
                            <div id="acrobatics_player" style="width:580px;height:500px" hidden></div>
                            <else/>
                            <div>没有上传任何视频</div>
                        </if>
                    </td>
                </tr>
                <tr>
                    <th width="147">获奖情况：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="awards"
                                  disabled="disabled">{$data.awards}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">状态：</th>
                    <td>
                        <select name="status" disabled>
                            <option value="0">显示</option>
                            <option value="1">不显示</option>
                        </select>
                    </td>
                </tr>

            </table>
        </div>
        </form>
        <!-- 书法 -->
        <form class="J_ajaxForm" data-cid="13"
        <neq name="data.data-cid" value="13">hidden</neq>
        >
        <input type="hidden" name="art_cid" value="">
        <div class="table_list">
            <table cellpadding="2" cellspacing="1" class="table_form table_art" width="100%">
                <tr>
                    <th width="147">作者：</th>
                    <td>
                        <input type="text" class="input" name="authorname" size="60" value="{$data.authorname}"
                               disabled="disabled"/>
                    </td>
                </tr>
                <tr>
                    <th width="147">题材：</th>
                    <td>
                        <input type="text" class="input" name="theme" size="60" value="{$data.theme}"
                               disabled="disabled"/>
                    </td>
                </tr>
                <tr>
                    <th width="147">技法：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="technique"
                                  disabled="disabled">{$data.technique}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">简介：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="introduction" disabled="disabled">{$data.introduction}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">图片：</th>
                    <td>
                        <ul class="img jsaddimgul" id="handwriting_picture">
                            <for start="0" end="$maxPicNum">
                                <if condition="$picture_urls[$i] neq ''">
                                    <li class=''>
                                        <input type="hidden" name="art_picture_url[]" value="{$picture_urls[$i]}">
                                        <img src="{$picture_urls[$i]}">
                                        <div class="operate" hidden><span class="sl"></span><span class="sr"></span><a
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
                    <th width="147">获奖情况：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="awards"
                                  disabled="disabled">{$data.awards}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">艺术家：</th>
                    <td>
                        <input type="text" class="input" name="artist" size="60" value="{$data.artist}"
                               disabled="disabled"/>
                    </td>
                </tr>
                <tr>
                    <th width="147">代表作：</th>
                    <td>
                        <textarea type="text" class="input_txt" name="example"
                                  disabled="disabled">{$data.example}</textarea>
                    </td>
                </tr>
                <tr>
                    <th width="147">状态：</th>
                    <td>
                        <select name="status" disabled>
                            <option value="0">显示</option>
                            <option value="1">不显示</option>
                        </select>
                    </td>
                </tr>

            </table>

        </div>
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

                <input type="submit" class="btn btn_submit mr10 J_ajax_submit_btn" value="提交"/>

            </form>

        </if>
    </div>
    <Admintemplate file="Common/Audittable"/>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
<script src="{$config_siteurl}statics/cu/js/Comm/Audit.js"></script>
<script src="{$config_siteurl}statics/cu/layer/layer.js"></script>
<if condition="$data.video neq '' ">
    <script type="text/javascript" src="http://player.youku.com/jsapi"></script>
    <script type="text/javascript">
        drama_player = new YKU.Player('drama_player', {
            styleid: '0',
            client_id: '{:C('YOUKU_CLIENT_ID')}',
            vid: '{$data.video}',
            newPlayer: true
        });

        music_player = new YKU.Player('music_player', {
            styleid: '0',
            client_id: '{:C('YOUKU_CLIENT_ID')}',
            vid: '{$data.video}',
            newPlayer: true
        });

        dance_player = new YKU.Player('dance_player', {
            styleid: '0',
            client_id: '{:C('YOUKU_CLIENT_ID')}',
            vid: '{$data.video}',
            newPlayer: true
        });

        folk_player = new YKU.Player('folk_player', {
            styleid: '0',
            client_id: '{:C('YOUKU_CLIENT_ID')}',
            vid: '{$data.video}',
            newPlayer: true
        });

        acrobatics_player = new YKU.Player('acrobatics_player', {
            styleid: '0',
            client_id: '{:C('YOUKU_CLIENT_ID')}',
            vid: '{$data.video}',
            newPlayer: true
        });

    </script>
</if>

<script type="text/javascript">
    $(function () {
        $(".img li").find("img").on("click", function () {
            // console.log('{$data.video_title}');
            var _this = $(this);
            layer.open({
                type: 1,
                title: false,
                closeBtn: 0,
                area: '516px',
                skin: 'layui-layer-nobg',
                shadeClose: true,
                content: $(this),
                end: function () {
                    _this.css('display', 'block');
                }
            });
        });

        $(".video-title").on("click", function () {
            var youku = $(this).siblings("div");
            layer.open({
                type: 1,
                title: false,
                closeBtn: 0,
                area: '580px 500px',
                skin: 'layui-layer-nobg',
                shadeClose: true,
                content: youku
            });
        });

        // 审核状态显示
        $(".audit").on("change", function () {
            var getSelectVal = $(".select-box option:selected").text();
            $(".select-box .select-span").text(getSelectVal);
            var audit = $(this).val();
            if (audit == 40) {
                $(".reason").show();
            } else {
                $(".reason").hide();
            }
        });
    });

</script>
<script src="{$config_siteurl}statics/js/uploadfile.js?v"></script>
</body>
</html>