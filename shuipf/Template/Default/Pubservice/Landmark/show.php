<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>文化地标</title>
		<template file="Pubservice/Common/_cssjs"/>
	</head>

	<body>
		<div class="wrap">
			<template file="Pubservice/Common/_head"/>
			<div class="stepBar">
				<div class="ggwh_Content">
					<div class="stepBarMain">
						<a href="{$config_siteurl}" class="link">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;
						<a class="link2" href="ggwh_Whdb.html">文化地标</a>
						&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;
						<a class="link2" href="ggwh_Whdb.html">山西省文化保税区</a>
					</div>
				</div>
			</div>
			<div class="ggwh_Content text-center ggwh_show">
				<!--<img src="img/whdbDetail1.jpg" />-->
				<h1>{$data.title}</h1>
				<p>{$data.content}</p>
				
			</div>
			<hr />
			<template file="Pubservice/Common/_foot"/>
		</div>
	</body>

</html>
