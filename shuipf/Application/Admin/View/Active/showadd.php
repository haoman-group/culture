<?php if (!defined('SHUIPF_VERSION')) exit(); ?>

<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <div class="nav">
        <ul class="cc">
            <li><a href="{:U('showlists')}">展览展演</a></li>
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
                                <volist name="result" id="ca">
                                    <option value="{$ca['cid']}">{$ca['name']}</option>
                                </volist>
                            </select>
                            <div id="childItems" style="display:inline-block;"></div>
                        </div>
                    </td>
                </tr>
                <tr name="selectshow" style="display:none">
                    <th width="147">所属地区：</th>
                    <td><select id="area" class="select_area1"></select></td>
                </tr>
                <tr>
                    <th width="147">位置：</th>
                    <td>
                        <div class="pignose-tab-container">
                            <div class="text-center" id="baiduMap"
                                 style="width:599px;height:450px;padding: 20px 0px;"></div>


                    </td>
                </tr>
                
            </table>
            <!-- 图书馆->展览预告 -->
            <form class="J_ajaxForm" action="{:U('showadd')}" method="post" data-cid="199" hidden>
                <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                <input type="hidden" name="art_cid" value="">
                <input type="hidden" name="form_cid" value="199">
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">主标题：</th>
                        <td>
                            <input type="text" class="input" name="content_title" size="50"
                                   value="{$data.content_title}"/>
                        </td>
                    </tr>
                    <tr>
                        <th width="147">位置:</th>
                        <td>
                            <dl class="logdata">
                                <dt>经度坐标位置：</dt>
                                <dd><input type="text" name="point_lng" class="input point_lng" value=""
                                           data-lng="{$data.point_lng}"/><span></span></dd>
                                <dt>纬度坐标位置：</dt>
                                <dd><input type="text" name="point_lat" class="input point_lat" value=""
                                           data-lat="{$data.point_lat}"/><span></span></dd>
                            </dl>
                        </td>
                    </tr>
                    <tr>
                        <th width="147">主办单位：</th>
                        <td>

                            <input type="text" name="host_unit" class="input" size="50" value="{$data.host_unit}">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">咨询电话：</th>
                        <td>
                            <input type="text" class="input" name="contacts_tel" size="20" value="{$data.contacts_tel}">
                        </td>
                    </tr>
                    <th width="147">简介：</th>
                    <td>
                        <textarea name="abstract" class="input_txt">{$data.abstract}</textarea>
                    </td>
                    <tr>
                        <th width="147">封面：</th>
                        <td>
                            <ul class="explain">
                                <li>文件上传:</li>
                                <li>
                                    <a href="javascript:upfile('acrobatics_picture')"
                                       class="seller_upload_image">上传封面</a>
                                    <p class="tips">提示：1、封面上传大小不得超过4M</p>
                                    <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张封面</p>
                                </li>
                            </ul>
                            <ul class="img jsaddimgul" id="acrobatics_picture">
                                <for start="0" end="$maxPicNum">
                                    <if condition="$picture_urls[$i] neq ''">
                                        <li class=''>
                                            <input type="hidden" name="acrobatics_picture_url[]"
                                                   value="{$picture_urls[$i]}">
                                            <img src="{$picture_urls[$i]}">
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
                        <th width="147">活动地点：</th>
                        <td>
                            <input type="text" class="input" name="act_address" value="{$data.act_address}">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">活动时间：</th>
                        <td>
                            <input type="text" class="input J_date" name="act_time" size="20" value="{$data.act_time}">
                        </td>
                    </tr>
                    <tr>
                        <th>详情:</th>
                        <td>
                            <script type="text/plain" id="publish_content" name="publish_content"></script>
                            <?php echo Form::editor('publish_content', 'basic', 'Cudatabase'); ?>
                        </td>
                    </tr>
                     <!--<tr>
                        <th width="147">创建频道：</th>
                        <td>
                            <input type="radio" class="channel" name="channel"  value="1">是
                            <input type="radio" class="channel" name="channel"  value="2" >否
                        </td>
                    </tr>
                     <tr class="channelname" style="display:none">
                        <th width="147">频道名称：</th>
                        <td>
                            <input type="text"  name="channelname"  value="" >
                             
                        </td>
                    </tr>-->
                    <tr>
                        <th width="147">是否开启预约：</th>
                        <td>
                            <input type="radio" class="if_bespeak" name="if_bespeak"  value="1">是
                            <input type="radio" class="if_bespeak" name="if_bespeak"  value="2" >否
                        </td>
                    </tr>
                </table>
                <div class="">
                    <div class="btn_wrap_pd">
                        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">添加</button>
                    </div>
                </div>
            </form>


            <!-- 文化馆->展览预告 -->
            <form class="J_ajaxForm" action="{:U('showadd')}" method="post" data-cid="200" hidden>
                <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                <input type="hidden" name="art_cid" value="">
                <input type="hidden" name="form_cid" value="200">
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">主标题：</th>
                        <td>
                            <input type="text" class="input" name="content_title" size="50"
                                   value="{$data.content_title}"/>
                        </td>
                    </tr>
                    <tr>
                        <th width="147">位置:</th>
                        <td>
                            <dl class="logdata">
                                <dt>经度坐标位置：</dt>
                                <dd><input type="text" name="point_lng" class="input point_lng" value=""
                                           data-lng="{$data.point_lng}"/><span></span></dd>
                                <dt>纬度坐标位置：</dt>
                                <dd><input type="text" name="point_lat" class="input point_lat" value=""
                                           data-lat="{$data.point_lat}"/><span></span></dd>
                            </dl>
                        </td>
                    </tr>
                    <tr>
                        <th width="147">主办单位：</th>
                        <td>
                            <input type="text" name="host_unit" class="input" size="50" value="{$data.host_unit}">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">咨询电话：</th>
                        <td>
                            <input type="text" class="input" name="contacts_tel" size="20" value="{$data.contacts_tel}">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">封面：</th>
                        <td>
                            <ul class="explain">
                                <li>文件上传:</li>
                                <li>
                                    <a href="javascript:upfile('handwriting_picture')"
                                       class="seller_upload_image">上传封面</a>
                                    <p class="tips">提示：1、封面上传大小不得超过4M</p>
                                    <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张封面</p>
                                </li>
                            </ul>
                            <ul class="img jsaddimgul" id="handwriting_picture">
                                <for start="0" end="$maxPicNum">
                                    <if condition="$picture_urls[$i] neq ''">
                                        <li class=''>
                                            <input type="hidden" name="handwriting_picture_url[]"
                                                   value="{$picture_urls[$i]}">
                                            <img src="{$picture_urls[$i]}">
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
                        <th width="147">活动地点：</th>
                        <td>
                            <input type="text" class="input" name="act_address" value="{$data.act_address}">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">活动时间：</th>
                        <td>
                            <input type="text" class="input J_date" name="act_time" size="20" value="{$data.act_time}">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">活动简介：</th>
                        <td>
                            <script type="text/plain" id="publish_content1" name="publish_content"></script>
                            <?php echo Form::editor('publish_content1', 'basic', 'Cudatabase'); ?>
                        </td>
                    </tr>
                   <!--<tr>
                        <th width="147">创建频道：</th>
                        <td>
                            <input type="radio" class="channel" name="channel"  value="1">是
                            <input type="radio" class="channel" name="channel"  value="2" >否
                        </td>
                    </tr>
                     <tr class="channelname" style="display:none">
                        <th width="147">频道名称：</th>
                        <td>
                            <input type="text"  name="channelname"  value="" >
                             
                        </td>
                    </tr>-->
                    <tr>
                        <th width="147">是否开启预约：</th>
                        <td>
                            <input type="radio" class="if_bespeak" name="if_bespeak"  value="1">是
                            <input type="radio" class="if_bespeak" name="if_bespeak"  value="2" >否
                        </td>
                    </tr>
                </table>
                <div class="">
                    <div class="btn_wrap_pd">
                        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">添加</button>
                    </div>
                </div>
            </form>

            <!--文化馆->展览现场-->
            <form class="J_ajaxForm" action="{:U('showadd')}" method="post" data-cid="201" hidden>
                <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                <input type="hidden" name="art_cid" value="">
                <input type="hidden" name="form_cid" value="201">
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">主标题：</th>
                        <td>
                            <input type="text" class="input" name="content_title" size="50"
                                   value="{$data.content_title}"/>
                        </td>
                    </tr>
                    <tr>
                        <th width="147">位置:</th>
                        <td>
                            <dl class="logdata">
                                <dt>经度坐标位置：</dt>
                                <dd><input type="text" name="point_lng" class="input point_lng"
                                           value="{$data.point_lng}" data-lng="{$data.point_lng}"/><span></span></dd>
                                <dt>纬度坐标位置：</dt>
                                <dd><input type="text" name="point_lat" class="input point_lat"
                                           value="{$data.point_lat}" data-lat="{$data.point_lat}"/><span></span></dd>
                            </dl>
                        </td>
                    </tr>
                    <tr>
                        <th width="147">主讲人：</th>
                        <td>
                            <input type="text" class="input" name="lecturer" size="50" value="{$data.lecturer}"/>
                        </td>
                    </tr>

                    <tr>
                        <th width="147">封面：</th>
                        <td>
                            <ul class="explain">
                                <li>文件上传:</li>
                                <li>
                                    <a href="javascript:upfile('exhibition_picture')"
                                       class="seller_upload_image">上传封面</a>
                                    <p class="tips">提示：1、封面上传大小不得超过4M</p>
                                    <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张封面</p>
                                </li>
                            </ul>
                            <ul class="img jsaddimgul" id="exhibition_picture">
                                <for start="0" end="$maxPicNum">
                                    <if condition="$picture_urls[$i] neq ''">
                                        <li class=''>
                                            <input type="hidden" name="exhibition_picture_url[]"
                                                   value="{$picture_urls[$i]}">
                                            <img src="{$picture_urls[$i]}">
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
                        <th width="147">活动地点：</th>
                        <td>
                            <input type="text" class="input" name="act_address" value="{$data.act_address}">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">活动时间：</th>
                        <td>
                            <input type="text" class="input J_date" name="act_time" size="20" value="{$data.act_time}">
                        </td>
                    </tr>
                    <tr>
                        <th>详情:</th>
                        <td>
                            <script type="text/plain" id="publish_content2" name="publish_content"></script>
                            <?php echo Form::editor('publish_content2', 'basic', 'Cudatabase'); ?>
                        </td>
                    </tr>
                    <!--<tr>
                        <th width="147">创建频道：</th>
                        <td>
                            <input type="radio" class="channel" name="channel"  value="1">是
                            <input type="radio" class="channel" name="channel"  value="2" >否
                        </td>
                    </tr>
                     <tr class="channelname" style="display:none">
                        <th width="147">频道名称：</th>
                        <td>
                            <input type="text"  name="channelname"  value="" >
                             
                        </td>
                    </tr>-->
                    <tr>
                        <th width="147">是否开启预约：</th>
                        <td>
                            <input type="radio" class="if_bespeak" name="if_bespeak"  value="1">是
                            <input type="radio" class="if_bespeak" name="if_bespeak"  value="2" >否
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

<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=YUYIzLKGEcKdyyat23Aw4H9LByDx4voy"></script>
<!--百度地图API  地区边界用-->
<script type="text/javascript"
        src="http://api.map.baidu.com/library/AreaRestriction/1.2/src/AreaRestriction_min.js"></script>
<script type="text/javascript">
    <?php

    $alowexts = "jpg|jpeg|gif|bmp|png";
    $thumb_ext = ",";
    $watermark_setting = 0;
    $module = "Content";
    $catid = "0";
    $authkey = upload_key("$maxPicNum,$alowexts,1,$thumb_ext,$watermark_setting");
    ?>
    function upfile(id) {
        flashupload(id + '_images', '封面上传', id, submit_pic, '{$maxPicNum},{$alowexts},1,{$thumb_ext},{$watermark_setting}', '{$module}', '{$catid}', '{$authkey}');
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

    /*封面移动*/
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
    ?>
    function upvideo(id) {
        videoupload(id + '_upload', '视频上传', id, submit_video, '{$maxVideoNum},{$alowexts},1,{$thumb_ext},{$watermark_setting}', '{$module}', '{$catid}', '{$authkey_video}')
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
    //地图
    $(function () {
        //百度地图
        var map = new BMap.Map("baiduMap"); // 创建Map实例
        //根据IP 显示当前城市
        function displayLocalCity(result) {
            var cityName = result.name;
            if (cityName == 'undefined' || cityName == 'null' || cityName == '') {
                cityName = '太原';  //默认为太原
            }
            map.setCenter(cityName);
            map.centerAndZoom(cityName, 12);
        }

        var myCity = new BMap.LocalCity();
        myCity.get(displayLocalCity);
        //设置显示范围 为山西省内  坐标移出省外自动跳回  
        var b = new BMap.Bounds(new BMap.Point(109.884727, 34.424947), new BMap.Point(115.210744, 41.144106)); //创建一个包含所有给定点坐标的矩形区域,原型Bounds(minX:Number, minY:Number, maxX:Number, maxY:Number)
        try {
            BMapLib.AreaRestriction.setBounds(map, b);
        } catch (e) {
            alert(e);
        }
        var point_lng = {$data.point_lng |
        default
        = 0
    }
        ;
        var point_lat = {$data.point_lat |
        default
        = 0
    }
        ;
        if (point_lng != 0 && point_lat != 0) {
            var point = new BMap.Point(point_lng, point_lat); //创建一个地理坐标点。
            //创建地图上一个图像标注。
            var marker = new BMap.Marker(point);
            //给图像标注添加点击事件 
            // marker.addEventListener("click",attribute);    
            // 将标注添加到地图中
            map.addOverlay(marker);
        }

        //开启鼠标滚轮
        map.enableScrollWheelZoom(true);
        map.addEventListener("click", showInfo); //添加地图点击事件

        //点击事件回调函数，填充经纬度
        function showInfo(e) {
            //清楚所有覆盖物
            map.clearOverlays();
            //生成当前坐标
            var marker = new BMap.Marker(new BMap.Point(e.point.lng, e.point.lat));
            // 将标注添加到地图中
            map.addOverlay(marker);
            //填充form表单
            $(".point_lng").val(e.point.lng);
            $(".point_lat").val(e.point.lat);
        }
    });
</script>

<Admintemplate file="Common/submit"/>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/uploadfile.js?v"></script>
<script>
   $(function(){
         $(".channel").click(function(){
            var val=$('input:radio[name="channel"]:checked').val();
           if(val == 1){
               $(".channelname").show();

           }else{
               $(".channelname").hide(); 
           }
         })
   })
</script>
</body>
</html>