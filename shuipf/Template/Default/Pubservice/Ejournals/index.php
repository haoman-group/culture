<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
		<meta name= "viewport" content= "width=device-width" initial-scale="1" minimum-scale="1" maximum-scale="1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>文化电子期刊</title>
		<template file="Pubservice/Common/_cssjs"/>
        <link rel="stylesheet" href="{$config_siteurl}statics/cu/css/base.css" />
		
        <link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-volunteer.css" />
		<!--分类选择插件-->
		<script type="text/javascript" src="{$config_siteurl}statics/cu/js/category_select.js"></script>
        <style>
        .whhd_PxList .whhd_PxListItem{
            min-height:270px;
        }
        .whhd_PxList .whhd_PxListItem .firstPage{
            height:160px;
            min-height:160px;
        }
        .whhd_PxList .whhd_PxListItem button{
            margin:0 auto;display:block;width:150px;
        }
        </style>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	</head>

	<body>
		<div class="wrap">
			<template file="Pubservice/Common/_head"/>
            <div id="nav">
                <div class="container">
                    <ul>
                        <li>
                            <a href="{$config_siteurl}" class="home_src">首页</a>
                        </li>
                        <li>
                            <span>></span>
                        </li>
                        <li>
                            <a href="">文化电子期刊</a>
                        </li>
                    </ul>
                    <!-- <form action="" method="get" target="_blank">
								<input type="hidden" name="m" value="search"/>
								<input type="hidden" name="g" value="Pubservice"/>
								<input type="hidden" name="a" value="index"/>
                        <div class="searbox">
                            <input type="text" placeholder="输入您要搜索的关键词" value=""  name="kw"/>
                            <input type="submit" id="button" value="" class="ggwh_SearchBtn" style="border: none;float:right;width:40px;right:0px !important"><i style="color:#962626" class="fa fa-search"></i>
                        </div>

                    </form> -->
                </div>
            </div>
			<div class="ggwh_Content">
			
				<div class="row whhd_PxList">
					<volist name="data" id="vo">
					<div class="col-md-3 col-xs-6">
						<div class="whhd_PxListItem">
							<a class="img" href="#">
                                <img src="<?= $vo['content']['1']?$vo['content']['1']:$config_siteurl.'statics/cu/images/public-service/whzyz_img01.jpg'?>" alt="" />
							</a>
							<!-- <h5><label for="" title='{$vo.title}'>{$vo.title}</label><span>（15/{$vo.totle}人）</span></h5> -->
							<div>
								<label for="">标题：</label>
								<p>
								<span class="substr">{$vo.title}</span>
								</p>
								<label for="">简介：</label>
								<p style="height:300px;"><if condition="$vo['intro'] neq '' "><?php echo mb_strcut($vo['intro'],0,80);?>...<else/>暂无简介</if></p>
                                <button onclick="show(this)" data-id="{$vo.id}">开始阅读</button>
							</div>							
						</div>
					</div>
					</volist>
				</div>

				<div class="page">
				{$page}
				</div>
				<hr />
			</div>
			<template file="Pubservice/Common/_foot"/>
		</div>
		<script type="text/javascript">
        function show(obj){
            var id = $(obj).data('id');
            layer.open({
                type:2,
                title:false,
                area: ['922px','600px'],
                content:'/Pubservice/Ejournals/show?id='+id,
            });
        }
		$('.sx').sx({
			nuv:".zj",//筛选结果
			zi:"sx_child",//所有筛选范围内的子类
			qingchu:'.qcqb',//清除全部
			over:'on'//选中状态样式名称
		});

		$(document).ready(function(){
			$(".substr").each(function(){
				var str = $(this).text().substr(0,22) + '...';
				$(this).text(str);
			})


			$(".filtertogglebtn").click(function(){
				$(this).toggleClass("filtertogglebtnon");
				$(".filterparas").toggleClass("filterfold");
			})
		})
		</script>
	</body>

</html>