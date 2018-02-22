<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap jj">
 <!--  <Admintemplate file="Common/Nav"/> -->
 <div class="nav">
    <ul class="cc">
        <li ><a href="{:U('exlist')}">活动管理</a></li>
        <li class="current"><a href="###">添加</a></li>
  </ul>
</div>
  <div class="common-form table_full">
    <form  class="J_ajaxForm" method="post"  action="{:U('exadd')}">
      <div class="table_list table_art">
        <table cellpadding="0" cellspacing="0" class="table_form" width="100%">
          <tbody>
            <tr>
              <th width="147">活动类型:</th>
              <td>
                <select name="art_cid" id="active_type">
                    <volist name="active_type" id="vo">
                        <option value="{$vo.cid}">{$vo.name}</option>
                    </volist>
                </select>
              </td>
            </tr>
             <tr  name="selectshow">
                        <th width="147">所属地区：</th>
                         
                      <td><input type="text" name="areaname" value="{$areaname}" disabled="disabled"></td>
                    </tr>
            <tr id="term_type" hidden>
              <th width="147">团体类型:</th>
              <td>
                <select name="type" id="" disabled>
                    <option value="1">官办团体</option>
                    <option value="2">社会团体</option>
                </select>
              </td>
            </tr>
            <tr>
              <th width="147">活动标题:</th>
              <td>
               
                <input type="text"  name="content_title" class="input" value="{$data.content_title}" placeholder="请输入标题" required>
                </td>
            </tr>
            <tr>
                    <th width="147">图片：</th>
                        <td>
                            <ul class="explain">
                                <li>文件上传:</li>
                                <li>
                                    <a href="javascript:upfile('image')" class="seller_upload_image">上传封面</a>
                                    <p class="tips">提示：1、封面上传大小不得超过4M</p>
                                    <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张封面</p>
                                </li>
                            </ul>
                            <ul class="img jsaddimgul" id="image">
                                <for start="0" end="$maxPicNum">
                                    <if condition="$picture_urls[$i] neq ''">
                                        <li class=''>
                                            <input type="hidden" name="image" value="{$data.image}">
                                            <img src="{$picture_urls[$i]}">
                                            <div class="operate">
                                                <span class="sl"></span>
                                                <span class="sr"></span>
                                                <a href="javascript:void(0)" class="tupian"></a>
                                            </div>
                                        </li>
                                        <else/>
                                        <li class="noimg"></li>
                                    </if>
                                </for>
                            </ul>
                        </td>
                    </tr>
            <tr>
              <th width="147">简介:</th>
              
              <td>
              <script type="text/plain" id="publish_content" name="abstract"></script>
              <?php echo Form::editor('publish_content','full','Cudatabase'); ?>
              <!-- <textarea name="abstract" rows="5" cols="57">{$data.abstract}</textarea> -->
              </td>
            </tr>
            <tr>
              <th width="147">时间:</th>
              <td><input type="date" class="input length_2 J_date date" name="act_time" id="controller" value="{$data.act_time}" placeholder="" required="required"></td>
            </tr>
            <tr>
              <th width="147">地点:</th>
              <td><input type="text" class="input" name="act_address" id="action" value="{$data.act_address}" required="required"></td>
            </tr>
            <tr>
              <th width="147">总人数上线:</th>
              <td><input type="number" class="input" name="acceptance" value="{$data.acceptance}"></td>
            </tr>
            <tr>
              <th width="147">联系人:</th>
              <td><input type="text" class="input" name="contacts" value="{$data.contacts}"></td>
            </tr>
            <tr>
              <th width="147">联系方式:</th>
              <td><input type="text" class="input" name="contacts_tel" value="{$data.contacts_tel}" required="required"></td>
            </tr>
            <tr>
            <th>馆站位置</th>
            <td>
                <div class="pignose-tab-container">
                   
                        <div class="text-center" id="baiduMap" style="width:1199px;height:450px;padding: 20px 0px;margin-bottom: 20px;"> </div>
                        <dl class="logdata">      
                            
                            <dt>经度坐标位置：</dt><dd><input type="text" name="point_lng" id="point_lng" value="{$data.point_lng}" /><span></span></dd> 
                            <dt>纬度坐标位置：</dt><dd><input type="text" name="point_lat" id="point_lat" value="{$data.point_lat}" /><span></span></dd>
                        </dl>
                    
                </div>
                </td>
            </tr>
            <tr>
              <th width="147">是否开启预约：</th>
              <td>
                  <input type="radio" class="if_bespeak" name="if_bespeak"  value="1">是
                  <input type="radio" class="if_bespeak" name="if_bespeak"  value="2" checked="checked">否
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="">
        <div class="btn_wrap_pd">
          <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">添加</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
<script src="{$config_siteurl}statics/js/uploadfile.js?v"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=YUYIzLKGEcKdyyat23Aw4H9LByDx4voy"></script>  
<!--百度地图API  地区边界用-->
<script type="text/javascript" src="http://api.map.baidu.com/library/AreaRestriction/1.2/src/AreaRestriction_min.js"></script>
</body>
<script>
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
            var str = "<input type='hidden' name='" + returnid + "' value='" + n +
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
    $("#active_type").change(function(){
        var cid = $(this).val();
        if(cid == '228'){
            $("#term_type select").prop("disabled", false);
            $("#term_type").show();
        }else{
            $("#term_type select").prop("disabled", true);
            $("#term_type").hide();
        }
    })

     $(function() {
	    //百度地图
	    var map = new BMap.Map("baiduMap"); // 创建Map实例
	    //根据IP 显示当前城市
	    function displayLocalCity(result){
	    	var cityName = result.name;
	    	// if(cityName == 'undefined' || cityName=='null' || cityName ==''){
	    	// 	cityName= '太原';  //默认为太原
	    	// }
	    	map.setCenter("{$addressname}");
	    	map.centerAndZoom("{$addressname}", 12);
	    }
	    var myCity = new BMap.LocalCity();
	    myCity.get(displayLocalCity);
        //设置显示范围 为山西省内  坐标移出省外自动跳回  
        var b = new BMap.Bounds(new BMap.Point(109.884727,34.424947),new BMap.Point(115.210744,41.144106)); //创建一个包含所有给定点坐标的矩形区域,原型Bounds(minX:Number, minY:Number, maxX:Number, maxY:Number)
	    try {	
		    BMapLib.AreaRestriction.setBounds(map, b);
        } catch (e) {
            alert(e);
        }
        var point_lng = {$data.point_lng|default=0};
        var point_lat = {$data.point_lat|default=0};
        if(point_lng != 0 && point_lat != 0){
            var point = new BMap.Point(point_lng,point_lat); //创建一个地理坐标点。
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
        function showInfo(e){
            //清楚所有覆盖物
            map.clearOverlays();
            //生成当前坐标
            var marker = new BMap.Marker(new BMap.Point(e.point.lng,e.point.lat));    
            // 将标注添加到地图中
            map.addOverlay(marker);
            //填充form表单
            $("#point_lng").val(e.point.lng);
            $("#point_lat").val(e.point.lat);
        }
	});
</script>
</html>