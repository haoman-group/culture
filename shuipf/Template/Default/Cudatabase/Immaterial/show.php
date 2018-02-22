<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<template file="Cudatabase/Common/_cssjs"/>
</head>

<body>
<template file="Cudatabase/Common/_head"/>
<div class="all">
 	 <div class="ht1"> <a href="javascript:history.go(-1)">{$data.dramaname}</a></div>    
    <div class="search-content" style="background: none;position: relative;">
		<table>
<notempty name="data.level"><th>级别</th><td>{$data.level}</td></tr></notempty>	 	     		 	     	           
<notempty name="data.re_represen" 	><th>代表性项目或代表性传承人</th><td><if condition="$data.re_represen eq '1' ">代表性项目<else/>代表性传承人</if></td></tr></notempty>	 		 	 	           
<notempty name="data.re_projectname"><th>项目名称</th><td>{$data.re_projectname}</td></tr></notempty>	 		 	           
<notempty name="data.re_itemnum"><th>项目编号</th><td>{$data.re_itemnum}</td></tr></notempty>		 			 	           
<notempty name="data.re_introduction" 	><th>项目简介</th><td>{$data.re_introduction}</td></tr></notempty>		 	           
<notempty name="data.re_unit" 	><th>申报地区或单位</th><td>{$data.re_unit}</td></tr></notempty>	     		     	 	           
<notempty name="data.re_batch"><th>入选本级名录批次</th><td>{$data.re_batch}</td></tr></notempty>		 			 	           
<notempty name="data.re_protectunit"><th>项目保护单位</th><td>{$data.re_protectunit}</td></tr></notempty>				           
<notempty name="data.re_name"    ><th>姓名</th><td>{$data.re_name}</td></tr></notempty>		 			 	               
<notempty name="data.re_sex"><th>性别</th><td><if condition="$data.re_sex eq 1">男<else/>女</if></td></tr></notempty>	 	 	    	 	 	               
<notempty name="data.re_nation"><th>民族</th><td>{$data.re_nation}</td></tr></notempty>	 	 		 	 	           
<if condition="$data['re_birth'] neq '0000-00-00' "><th>出身日期</th><td>{$data.re_birth}</td></tr></if>	    		    	           
<notempty name="data.re_belongunit"><th>所在单位</th><td>{$data.re_belongunit}</td></tr></notempty> 	 	 	 	           
<notempty name="data.prot_zone"><th>保护实验区</th><td>{$data.prot_zone}</td></tr></notempty>	 	 		 	 	           
<notempty name="data.prot_survey" 	><th>国家级文化生态保护区总体概况</th><td>{$data.prot_survey}</td></tr></notempty>	  		  	 	           
<notempty name="data.prot_introduction"><th>晋中文化生态保护区简介</th><td>{$data.prot_introduction}</td></tr></notempty> 	 	           
<notempty name="data.prot_rule"><th>总体规划及实施细则</th><td>{$data.prot_rule}</td></tr></notempty>	  	 		  	 	           
<notempty name="data.prot_method" 	><th>相关制度办法</th><td>{$data.prot_method}</td></tr></notempty>	  		  	 	           
<notempty name="data.prot_topic"><th>课题研究</th><td>{$data.prot_topic}</td></tr></notempty>	  	 		  	 	           
<notempty name="data.prot_projects"><th>保护区内国家级非遗代表性项目</th><td>{$data.prot_projects}</td></tr></notempty>	  		  	           
<notempty name="data.prot_center" 	><th>综合传习中心</th><td>{$data.prot_center}</td></tr></notempty>	  		  	 	           
<notempty name="data.ba_name" 	><th>基地名称</th><td>{$data.ba_name}</td></tr></notempty>	     		     	 	           
<notempty name="data.ba_introduction"  	><th>基地简介</th><td>{$data.ba_introduction}</td></tr></notempty>		  	           
<notempty name="data.ba_creattime"><th>成立时间</th><td>{$data.ba_creattime}</td></tr></notempty>	  		  	           
<notempty name="data.me_plan"    ><th>工作方案</th><td>{$data.me_plan}</td></tr></notempty>	  	 		  	 	               
<notempty name="data.me_manual"><th>工作手册</th><td>{$data.me_manual}</td></tr></notempty>	  	 		  	 	           
<notempty name="data.me_list"    ><th>试点乡镇名单</th><td>{$data.me_list}</td></tr></notempty>	  	 		  	 	               
<notempty name="data.me_more"    ><th>其他</th><td>{$data.me_more}</td></tr></notempty>	  	 		  	 	               
<notempty name="data.me_typical"><th>典型乡镇</th><td>{$data.me_typical}</td></tr></notempty>	        	                   
<notempty name="data.me_exchange" 	><th>经验交流</th><td>{$data.me_exchange}</td></tr></notempty>	  		  	 	           
<notempty name="data.me_media"><th>媒体报道</th><td>{$data.me_media}</td></tr></notempty>	  	 		  	 	           
<notempty name="data.sh_name"    ><th>名称</th><td>{$data.sh_name}</td></tr></notempty>	 	 		 	 	               
<notempty name="data.sh_building"    ><th>解设年代</th><td>{$data.sh_building}</td></tr></notempty>	    	                   
<notempty name="data.sh_situation"><th>基本情况</th><td>{$data.sh_situation}</td></tr></notempty>	  		  	           
<notempty name="data.sh_content"><th>展示内容</th><td>{$data.sh_content}</td></tr></notempty>	  	 		  	 	           
<notempty name="data.sh_key"><th>重点非遗项目</th><td>{$data.sh_key}</td></tr></notempty>	  	 	    	  	 	               
<notempty name="data.sh_actcontent"><th>活动内容</th><td>{$data.sh_actcontent}</td></tr></notempty>	  		  	           
<!-- <notempty name="data.area"><th>所属地区</th><td>{$data.area}</td></tr></notempty>	        		        	            -->
<notempty name="data.area_display"><th>详细地址</th><td>{$data.area_display}</td></tr></notempty>	 

	</table>
	<br>
	{$data.content}		 	           
    </div>
<div class="clr"></div>
</div>
<div class="clr"></div>
<template file="Cudatabase/Common/_foot"/>

</body>
</html>
