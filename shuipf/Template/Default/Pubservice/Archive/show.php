<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="{$data.subtitle}">
    <title>文化活动</title>
    <template file="Pubservice/Common/_cssjs"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/css/public-service.css">
    <script type="text/javascript" src="{$config_siteurl}statics/cu/js/category_select.js"></script>
</head>
<body>

    <div class="wrap">
        <template file="Pubservice/Common/_head"/>
        <div class="stepBar">
            <div class="ggwh_Content">
                <div class="stepBarMain">
                    <a href="{$config_siteurl}" class="link">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{:U('Archive/lists')}">艺术档案馆</a>                    
                </div>
            </div>
        </div>
        

    <div class="ggwh_Content">
        <div class="zlTsgDetailMain">
            <div class="left zlNews">
                <h2 style="text-align:center">{$data.title}</h2>
               
              <volist name="data['image']" id="vo">
             <p  style="text-align:center"> <img src="{$vo}" style="width:500px;height:350px;margin-top:10px;"></p>
              </volist>
               
               <if condition="$data['video'] neq '' ">
               	<div id="youkuplayer" style="width:500px;height:350px;margin-top:30px;margin-left:18%;" data-type="{$data.video}"></div>
               </if>
                
               <p style="word-wrap:break-word;margin-top:20px;">{$data.intro}</p>
                  <eq name="data['if_bespeak']" value="1">
                <div style="margin: 40px 0px;">
                    <if condition="($data['acceptance'] - $data['num']) gt '0' ">
                        <if condition="($username eq '') and ($userInfo['username'] eq '')">
                            <a class="applyBtn" href="javascript:volid(0);" data-toggle="modal" data-target="#login">预约</a>
                        <elseif condition="($username eq '') and $userInfo['username'] neq ''" />
                            <a class="applyBtn"  onclick="checkname()">预约</a>
                        <else/>
                            <a class="applyBtn"  href="{:U('Pubservice/Facility/bespeak',array('tab_cid'=>$data['id'],'area'=>$data['area'],'tablename'=>'active'))}">预约</a>
                        </if>
                    <else/>
                        <a class="applyBtn"  disabled="disabled">预约已满</a>
                    </if>
                    <!--<a href="{:U('live',array('id'=>$vo['id']))}" class="livebtn" target="_blank">观看直播</a>-->
                </div>
                </eq>
                 <template file="Pubservice/Common/_bshare"/>   
            </div>
            <div class="right">
                <div class="tj">
                    <h3 class="pull-left">为您推荐</h3>
                    
                </div>
                <volist name="review" id="vo">
                <div class="tjDiv">
                   <a href="{:U('show',array('id'=>$vo['id']))}">
                    <img src="{:thumb($vo['image'][0],60,60,1)}"  style="width:60px;height:60px;">
                    <span style="font-size:18px;margin-left:15px;color:black;"><?php echo mb_strcut($vo['title'],0,50);?></span>
                   
                  </a>
                </div>
               </volist>
            </div>
        </div>
    
    </div>
    <div class="ggwh_Content" style="padding: 30px 0px">
    <!--  <span>{$data.subtitle}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$data.acceptance}</span></br> -->
    <!-- {$data.publish_content} -->
      <template file="Pubservice/Common/checklogin"/>
    </div>
   <script>
        var swiper = new Swiper('.applyBanner .swiper-container', {
            nextButton: '.applyBanner .swiper-button-next',
            prevButton: '.applyBanner .swiper-button-prev',
            slidesPerView: 5,
            paginationClickable: true,
            spaceBetween: 10
        });
        $(function() {
            $("#catid_10").parent().addClass("active");
            // 绑定表情
            $('#smile').SinaEmotion($('#text'));
        });
        function checkname(){
            alert('后台用户无法预约注册');
        }
    </script>
    <if condition="$data['video'] neq '' ">
    <script type="text/javascript" src="http://player.youku.com/jsapi"></script>

	<script type="text/javascript">
		player = new YKU.Player('youkuplayer',{
			styleid: '0',
			client_id: '{:C('YOUKU_CLIENT_ID')}',
			vid: '{$data.video}',
			newPlayer: true
		});
	</script>


<script>
   window.onload = function(){

        var h = window.innerHeight
                || document.documentElement.innerHeight
                || document.body.innerHeight;;

        var h1 = $('html').height();

        var fh = $('#wh-footer').height();

        // console.log(h +' '+h1+' '+fh);

        if(h1 > h){

            $('#wh-footer').css('top',h1+'px');

        }else{

            $('#wh-footer').css('top',h-(fh+20)+'px');

        }

    }
</script>

<script type="text/javascript">
	$(function(){
		var img = "{$data.image}".split(',');
		// console.log(img);
		$.each(img,function(i,v){
			// console.log(i);
			$(".row-img").append('<div class="col-md-2">'+
					'<div class="thumbnail">'+
						'<img src="'+v+'" class="img-responsive" alt="剧照1">'+
					'</div>'+
				'</div>	');
		});
	});
</script>
<script>
	$(document).ready(function(){
	var youkuplayer=$("#youkuplayer").attr("data-type");
	if(youkuplayer == undefined){
		$(".col-md-12").css("width","100%");
	}else{
		
	$(".col-md-12").css("width","40%");	
	}
});
	
</script>
</if>