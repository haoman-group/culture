<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head" />
<style type="text/css">
    .table_list tr,.table_list th,.table_list td{padding: 0;}
    .table_list th,.table_list td{padding: 3px 10px;}
    .table_list td{padding-left: 5px;}
    select.cid{margin-left: 10px;}    
</style>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
   <div class="nav">
        <ul class="cc">
            <li><a href="{:U('search')}">文化艺术</a></li>
            <li class="current"><a href="###">搜索</a></li>
            <!--<li ><a value="手机扫描" class='  btn_add1' onclick="tel()"  />文本扫描</a></li>
            <li ><a value="手机扫描" class='  btn_add1'  onclick="tel()" />语音录入</a></li>
            <li ><a value="手机扫描" class='  btn_add' data-type="web"  />网络采集</a></li>-->
        </ul>
    </div>
    <div class="h_a">搜索</div>
    <div class="table_list">
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
                <tr name="selectshow">
                    <th width="147">所属地区：</th>
                    <td>
                        <select id="area" class="select_area" ></select>
                    </td>
                </tr>
            </table>
            <!-- 戏剧 -->
            <form class="J_ajaxForm" action="{:U('search')}" method="get" data-cid="7" hidden>
                <input type="hidden" name="g" value="Admin">
                <input type="hidden" name="m" value="Art">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="search" value="1">
                <input type="hidden" name="art_cid" value="">
                <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">发布时间：</th>
                        <td>
                            <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;">
                            -
                            <input type="text" class="input length_2 J_date" name="end_time" value="{$Think.get.end_time}" style="width:80px;">
                        </td>
                    </tr>
                     <tr>
                        <th width="147">剧种：</th>
                        <td>                              
                            <select name="drama" class="drama">

                         
                        </select>
                        </td> 
                    </tr>
                    <tr>
                        <th width="147">剧团：</th>
                        <td>
                            
                            <input type="hidden" name="parent_cid" value="7">
                            <input class="input" type="text" name="troupe" value="{$Think.get.troupe}" />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">代表作：</th>
                        <td>
                            <input class="input" type="text" name="example" value="{$Think.get.example}" />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">获奖情况：</th>
                        <td>
                            <input class="input" type="text" name="awards" value="{$Think.get.awards}" />
                        </td>
                    </tr>
                </table>
                <div style="margin: 10px 0 0;">
                    <button class="btn">搜索</button>
                    <a style="margin-left:4px;" href="{:U('search')}" class="btn">清除条件</a>
                </div>
            </form>
            <!-- 音乐 -->
            <form class="J_ajaxForm" action="{:U('search')}" method="get" data-cid="8" hidden>
                <input type="hidden" name="g" value="Admin">
                <input type="hidden" name="m" value="Art">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="search" value="1">
                <input type="hidden" name="parent_cid" value="8">
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">发布时间：</th>
                        <td>
                            <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;">
                            -
                            <input type="text" class="input length_2 J_date" name="end_time" value="{$Think.get.end_time}" style="width:80px;">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">乐种：</th>
                        <td>                              
                            <select name="drama" class="drama">
                         
                        </select>
                        </td> 
                    </tr>
                    <tr>
                        <th width="147">乐团：</th>
                        <td>
                            <input type="hidden" name="art_cid" value="">
                            <input class="input" type="text" name="band" value="{$Think.get.band}" />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">代表人物：</th>
                        <td>
                            <input class="input" type="text" name="figures" value="{$Think.get.figures}" />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">代表作：</th>
                        <td>
                            <input class="input" type="text" name="example" value="{$Think.get.example}" />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">获奖情况：</th>
                        <td>
                            <input class="input" type="text" name="awards" value="{$Think.get.awards}" />
                        </td>
                    </tr>
                </table>
                <div style="margin: 10px 0 0;">
                    <button class="btn">搜索</button>
                    <a style="margin-left:4px;" href="{:U('search')}" class="btn">清除条件</a>

                </div>           
            </form>
            <!-- 舞蹈 -->
            <form class="J_ajaxForm" action="{:U('search')}" method="get" data-cid="9" hidden>
                <input type="hidden" name="g" value="Admin">
                <input type="hidden" name="m" value="Art">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="search" value="1">
                <input type="hidden" name="parent_cid" value="9">
                <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">发布时间：</th>
                        <td>
                            <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;">
                            -
                            <input type="text" class="input length_2 J_date" name="end_time" value="{$Think.get.end_time}" style="width:80px;">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">表演者：</th>
                        <td>
                            <input type="hidden" name="art_cid" value="">
                            <input class="input" type="text" name="performer" value="{$Think.get.performer}" />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">代表作：</th>
                        <td>
                            <input class="input" type="text" name="example" value="{$Think.get.example}" />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">获奖情况：</th>
                        <td>
                            <input class="input" type="text" name="awards" value="{$Think.get.awards}" />
                        </td>
                    </tr>

                </table>
                <div style="margin: 10px 0 0;">
                    <button class="btn">搜索</button>
                    <a style="margin-left:4px;" href="{:U('search')}" class="btn">清除条件</a>
                </div>
            </form>
            <!-- 美术 -->
            <form class="J_ajaxForm" action="{:U('search')}" method="get" data-cid="10" hidden>
                <input type="hidden" name="g" value="Admin">
                <input type="hidden" name="m" value="Art">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="search" value="1">
                <input type="hidden" name="parent_cid" value="10">
                <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">发布时间：</th>
                        <td>
                            <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;">
                            -
                            <input type="text" class="input length_2 J_date" name="end_time" value="{$Think.get.end_time}" style="width:80px;">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">艺术家：</th>
                        <td>
                            <input type="hidden" name="art_cid" value="">
                            <input class="input" type="text" name="artist" value="{$Think.get.artist}" />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">代表作：</th>
                        <td>
                            <input class="input" type="text" name="example" value="{$Think.get.example}" />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">获奖情况：</th>
                        <td>
                            <input class="input" type="text" name="awards" value="{$Think.get.awards}" />
                        </td>
                    </tr>
                </table>
                <div style="margin: 10px 0 0;">
                    <button class="btn">搜索</button>
                    <a style="margin-left:4px;" href="{:U('search')}" class="btn">清除条件</a>
                </div>
            </form>
            <!-- 曲艺 -->
            <form class="J_ajaxForm" action="{:U('search')}" method="get" data-cid="11" hidden>
                <input type="hidden" name="g" value="Admin">
                <input type="hidden" name="m" value="Art">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="search" value="1">
                <input type="hidden" name="parent_cid" value="11">
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">发布时间：</th>
                        <td>
                            <input type="hidden" name="art_cid" value="">
                            <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;">
                            -
                            <input type="text" class="input length_2 J_date" name="end_time" value="{$Think.get.end_time}" style="width:80px;">
                        </td>
                    </tr>
                     <tr>
                        <th width="147">曲种：</th>
                        <td>                              
                            <select name="drama" class="drama">
                         
                        </select>
                        </td> 
                    </tr>
                    <tr>
                        <th width="147">机构：</th>
                        <td>
                            <input class="input" type="text" name="agency" value="{$Think.get.agency}" />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">代表人物：</th>
                        <td>
                            <input class="input" type="text" name="figures" value="{$Think.get.figures}" />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">代表作：</th>
                        <td>
                            <input class="input" type="text" name="example" value="{$Think.get.example}" />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">获奖情况：</th>
                        <td>
                            <input class="input" type="text" name="awards" value="{$Think.get.awards}" />
                        </td>
                    </tr>
                </table>
                <div style="margin: 10px 0 0;">
                    <button class="btn">搜索</button>
                    <a style="margin-left:4px;" href="{:U('search')}" class="btn">清除条件</a>
                </div>
            </form>
            <!-- 杂技 -->
            <form class="J_ajaxForm" action="{:U('search')}" method="get" data-cid="12" hidden>
                <input type="hidden" name="g" value="Admin">
                <input type="hidden" name="m" value="Art">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="search" value="1">
                <input type="hidden" name="parent_cid" value="11">
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">发布时间：</th>
                        <td>
                            <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;">
                            -
                            <input type="text" class="input length_2 J_date" name="end_time" value="{$Think.get.end_time}" style="width:80px;">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">代表人物：</th>
                        <td>
                            <input class="input" type="text" name="figures" value="{$Think.get.figures}" />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">代表作：</th>
                        <td>
                            <input type="hidden" name="art_cid" value="">
                            <input class="input" type="text" name="example" value="{$Think.get.example}" />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">获奖情况：</th>
                        <td>
                            <input class="input" type="text" name="awards" value="{$Think.get.awards}" />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">机构：</th>
                        <td>
                            <input class="input" type="text" name="agency" value="{$Think.get.agency}" />
                        </td>
                    </tr>
                </table>
                <div style="margin: 10px 0 0;">
                    <button class="btn">搜索</button>
                    <a style="margin-left:4px;" href="{:U('search')}" class="btn">清除条件</a>
                </div>
            </form>
            <!-- 书法 -->
            <form class="J_ajaxForm" action="{:U('search')}" method="get" data-cid="13" hidden>
                <input type="hidden" name="g" value="Admin">
                <input type="hidden" name="m" value="Art">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="search" value="1">
                <input type="hidden" name="parent_cid" value="13">
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">发布时间：</th>
                        <td>
                            <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;">
                            -
                            <input type="text" class="input length_2 J_date" name="end_time" value="{$Think.get.end_time}" style="width:80px;">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">艺术家：</th>
                        <td>
                            <input type="hidden" name="art_cid" value="">
                            <input class="input" type="text" name="artist" value="{$Think.get.artist}" />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">代表作：</th>
                        <td>
                            <input class="input" type="text" name="example" value="{$Think.get.example}" />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">获奖情况：</th>
                        <td>
                            <input class="input" type="text" name="awards" value="{$Think.get.awards}" />
                        </td>
                    </tr>
                </table>
                <div style="margin: 10px 0 0;">
                    <button class="btn">搜索</button>
                    <a style="margin-left:4px;" href="{:U('search')}" class="btn">清除条件</a>
                </div>
            </form>
        </div>
    </div>
    
    <div class="table_lists table_list">
        <table width="100%" cellspacing="0">
           <thead>
          <tr>
            
            <td align="center">序号</td>
            <td align="center" >标题</td>
            <td align="center">分类</td> 
            <td align="center">地址</td>
            
            <td align="center">作者</td>
            <td align="center">时间</td>
            <td align="center">审核</td>
            <td align="center">是否属于艺术档案馆</td>
            <td align="center">是否推荐至公共服务平台</td>
            <td align="center">操作</td>
          </tr>
        </thead>
            <tbody>
                <volist name="data['list']" id="vo">
                    <tr>
              <td align="center">{$vo.id}</td>
              <td align="center">{$vo.title}</td>
              <td align="center">{$vo.categoryname}</td>
              <td align="center">{$vo.area_display}</td> 
              <td align="center">{$vo.author}</td>
              <td align="center">{$vo.updatetime}</td>
              <td align="center">{$AuditStatus[$vo[auditstatus]]}<notempty name="vo['reason']">({$vo.reason})</notempty></td>
              <td align="center"><?=$vo['if_position']=='1'?'是':'否'?></td>
               <td align="center"><?=$vo['if_resources']=='1'?'是':'否'?></td>
                        <td><a href="{:U('show',array('id'=>$vo['id']))}">查看</a></td>
                    </tr>
                </volist>
            </tbody>
        </table>
        <div class="p10 page">
            <div class="pages"> {$pageinfo.page} </div>
        </div>
    </div>

   <!-- 戏剧 -->
    <div class="table_list" <if condition="$data['0']['parent_artcid'] eq 7  ">style="display:block"<else/>style="display:none"</if>>
        <table width="100%" cellspacing="0">
            <thead>
                <tr>
                    <td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
                    <td align="left">类别</td>
                    <td align="left">剧种</td>
                    <td align="left">流布区域</td>
                    <td align="left">剧团</td>
                    <td align="left">图片</td>
                    <td align="left">视频</td>
                    <td align="left">获奖情况</td>
                    <td align="left">操作</td>
                </tr>
            </thead>
            <tbody>
                <volist name="list" id="vo">
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>{$vo.categoryname}</td>
                        <td>{$vo.drama}</td>
                        <td>{$vo.region}</td>
                        <td>{$vo.troupe}</td>
                        <td><input type="hidden" value="{$vo.image}"><img src="" class="search-img" /></td>
                        <td>{$vo.video_title}</td>
                        <td>{$vo.awards}</td>
                        <td><a href="{:U('show',array('id'=>$vo['id']))}">查看</a></td>
                    </tr>
                </volist>
            </tbody>
        </table>
        <div class="p10">
            <div class="pages">{$pageinfo.page} </div>
        </div>
    </div> 

    <!-- 音乐 -->
    <!-- <div class="table_list" <if condition="$data['0']['parent_artcid'] eq 8">style="display:block"<else/>style="display:none"</if>>
        <table width="100%" cellspacing="0" class="search-table">
            <thead>
                <tr>
                    <td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
                    <td align="left">类别</td>
                    <td align="left">机构</td>
                    <td align="left">代表人物</td>
                    <td align="left">图片</td>
                    <td align="left">音频</td>
                    <td align="left">视频</td>
                    <td align="left">获奖情况</td>
                    <td align="left">操作</td>
                </tr>
            </thead>
            <tbody>
                <volist name="list" id="vo">
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>{$vo.categoryname}</td>
                        <td>{$vo.agency}</td>
                        <td>{$vo.figures}</td>
                        <td><input type="hidden" value="{$vo.image}"><img src="" class="search-img" /></td>                        
                        <td>{$vo.audio}</td>
                        <td>{$vo.video_title}</td>
                        <td>{$vo.awards}</td>
                        <td><a href="{:U('show',array('id'=>$vo['id']))}">查看</a></td>
                    </tr>
                </volist>
            </tbody>
        </table>
        <div class="p10">
            <div class="pages"> {$Page} </div>
        </div>
    </div> -->

    <!-- 舞蹈 -->
    <!-- <div class="table_list" <if condition="$data['0']['parent_artcid'] eq 9 ">style="display:block"<else/>style="display:none"</if>>
        <table width="100%" cellspacing="0" class="search-table">
            <thead>
                <tr>
                    <td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
                    <td align="left">类别</td>
                    <td align="left">表演者</td>
                    <td align="left">表演单位</td>
                    <td align="left">机构</td>
                    <td align="left">图片</td>
                    <td align="left">简介</td>
                    <td align="left">视频</td>
                    <td align="left">获奖情况</td>
                    <td align="left">操作</td>
                </tr>
            </thead>
            <tbody>
                <volist name="list" id="vo">
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>{$vo.categoryname}</td>
                        <td>{$vo.performer}</td>
                        <td>{$vo.unit}</td>
                        <td>{$vo.agency}</td>
                        <td><input type="hidden" value="{$vo.image}"><img src="" class="search-img" /></td>
                        <td>{$vo.introduction}</td>
                        <td>{$vo.video_title}</td>
                        <td>{$vo.awards}</td>
                        <td><a href="{:U('show',array('id'=>$vo['id']))}">查看</a></td>
                    </tr>
                </volist>
            </tbody>
        </table>
        <div class="p10">
            <div class="pages"> {$Page} </div>
        </div>
    </div> -->
    <!-- 美术 -->
    <!-- <div class="table_list">
        <table width="100%" cellspacing="0" class="search-table" <if condition="$data['0']['parent_artcid'] eq 10  ">style="display:block"<else/>style="display:none"</if>>
            <thead>
                <tr>
                    <td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
                    <td align="left">类别</td>
                    <td align="left">作者</td>
                    <td align="left">题材</td>
                    <td align="left">技法</td>
                    <td align="left">图片</td>
                    <td align="left">简介</td>
                    <td align="left">获奖情况</td>
                    <td align="left">操作</td>
                </tr>
            </thead>
            <tbody>
                <volist name="list" id="vo">
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>{$vo.categoryname}</td>
                        <td>{$vo.authorname}</td>
                        <td>{$vo.theme}</td>
                        <td>{$vo.technique}</td>
                        <td><input type="hidden" value="{$vo.image}"><img src="" class="search-img" /></td>
                        <td>{$vo.introduction}</td>
                        <td>{$vo.awards}</td>
                        <td><a href="{:U('show',array('id'=>$vo['id']))}">查看</a></td>
                    </tr>
                </volist>
            </tbody>
        </table>
        <div class="p10">
            <div class="pages"> {$Page} </div>
        </div>
    </div> -->
    <!--曲艺  -->
    <!-- <div class="table_list" <if condition="$data['0']['parent_artcid'] eq 11">style="display:block"<else/>style="display:none"</if>>
        <table width="100%" cellspacing="0" class="search-table">
            <thead>
                <tr>
                    <td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
                    <td align="left">类别</td>
                    <td align="left">曲种</td>
                    <td align="left">流布区域</td>
                    <td align="left">机构</td>
                    <td align="left">图片</td>
                    <td align="left">视频</td>
                    <td align="left">获奖情况</td>
                    <td align="left">操作</td>
                </tr>
            </thead>
            <tbody>
                <volist name="list" id="vo">
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>{$vo.categoryname}</td>
                        <td>{$vo.drama}</td>
                        <td>{$vo.region}</td>
                        <td>{$vo.agency}</td>
                        <td><input type="hidden" value="{$vo.image}"><img src="" class="search-img" /></td>
                        <td>{$vo.video_title}</td>
                        <td>{$vo.awards}</td>
                        <td><a href="{:U('show',array('id'=>$vo['id']))}">查看</a></td>
                    </tr>
                </volist>
            </tbody>
        </table>
        <div class="p10">
            <div class="pages"> {$Page} </div>
        </div>
    </div> -->

    <!-- 杂技 -->
    <!-- <div class="table_list" <if condition="$data['0']['parent_artcid'] eq 12 ">style="display:block"<else/>style="display:none"</if>>
        <table width="100%" cellspacing="0" class="search-table">
            <thead>
                <tr>
                    <td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
                    <td align="left">类别</td>
                    <td align="left">机构</td>
                    <td align="left">代表人物</td>
                    <td align="left">代表作</td>
                    <td align="left">图片</td>
                    <td align="left">视频</td>
                    <td align="left">获奖情况</td>
                    <td align="left">操作</td>
                </tr>
            </thead>
            <tbody>
                <volist name="list" id="vo">
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>{$vo.categoryname}</td>
                         <td>{$vo.agency}</td>
                        <td>{$vo.figures}</td>
                        <td>{$vo.example}</td>
                        <td><input type="hidden" value="{$vo.image}"><img src="" class="search-img" /></td>
                        <td>{$vo.video_title}</td>
                        <td>{$vo.awards}</td>
                        <td><a href="{:U('show',array('id'=>$vo['id']))}">查看</a></td>
                    </tr>
                </volist>
            </tbody>
        </table>
        <div class="p10">
            <div class="pages"> {$Page} </div>
        </div>
    </div> -->
    <!-- 书法 -->
    <!-- <div class="table_list" <if condition="$data['0']['parent_artcid'] eq 13">style="display:block"<else/>style="display:none"</if>>
        <table width="100%" cellspacing="0" class="search-table">
            <thead>
                <tr>
                    <td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
                    <td align="left">类别</td>
                    <td align="left">作者</td>
                    <td align="left">题材</td>
                    <td align="left">技法</td>
                    <td align="left">简介</td>
                    <td align="left">图片</td>
                    
                    <td align="left">获奖情况</td>
                    <td align="left">操作</td>
                </tr>
            </thead>
            <tbody>
                <volist name="list" id="vo">
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>{$vo.categoryname}</td>
                        <td>{$vo.authorname}</td>
                        <td>{$vo.theme}</td>
                        <td>{$vo.technique}</td>
                        <td>{$vo.introduction}</td>
                        <td><input type="hidden" value="{$vo.image}"><img src="" class="search-img" /></td>
                        <td>{$vo.awards}</td>
                        <td><a href="{:U('show',array('id'=>$vo['id']))}">查看</a></td>
                    </tr>
                </volist>
            </tbody>
        </table>
        <div class="p10">
            <div class="pages"> {$Page} </div>
        </div>
    </div> -->
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js"></script>
<script type="text/javascript">
    $(function(){
        // var search_img = $(".search-img").siblings("input").val().split(",");
        // console.log(search_img);
        // $(".search-img").attr("src",search_img[0]).css({"width":"40px"});
    });

    // $(function(){
    //     $("form").find("button.btn").on("click",function(){
    //         var _this = $(this).parents("form");
    //         $.ajax({
    //             type: 'GET',
    //             url: "{:U('search')}",
    //             dataType: 'json',
    //             data: _this.serialize(),
    //             success: function(result){
    //                 if(result.status == 1){
    //                     var list = '',title='';
    //                     if(!!result.data.list){
    //                         $.each(result.data.list,function(i,v){
    //                             // console.log(v.parent_artcid);
    //                             // var cid = v.art_cid;
    //                             if(v.parent_artcid == '7'){
    //                                 title = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">类别</td>'+
    //                                             '<td align="left">剧种</td>'+
    //                                             '<td align="left">流布区域</td>'+
    //                                             '<td align="left">剧团</td>'+
    //                                             '<td align="left">图片</td>'+
    //                                             '<td align="left">视频</td>'+
    //                                             '<td align="left">获奖情况</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                               
    //                                 list += '<tr>'+
    //                                             '<td><input type="checkbox"></td>'+
    //                                             '<td>'+v.categoryname+'</td>'+
    //                                             '<td>'+v.dramaname+'</td>'+
    //                                             '<td>'+v.region+'</td>'+
    //                                             '<td>'+v.troupe+'</td>'+
    //                                             '<td><img src="'+v.image.split(",")[0]+'" class="search-img" style="width:40px" /></td>'+
    //                                             '<td>'+v.video_title+'</td>'+
    //                                             '<td>'+v.awards+'</td>'+
    //                                             '<td><a href="/index.php?g=Admin&m=Art&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }else if(v.parent_artcid == '8'){
    //                                 title = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">类别</td>'+
    //                                             '<td align="left">机构</td>'+
    //                                             '<td align="left">代表人物</td>'+
    //                                             '<td align="left">图片</td>'+
    //                                             '<td align="left">音频</td>'+
    //                                             '<td align="left">视频</td>'+
    //                                             '<td align="left">获奖情况</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td><input type="checkbox"></td>'+
    //                                             '<td>'+v.categoryname+'</td>'+
    //                                             '<td>'+v.agency+'</td>'+
    //                                             '<td>'+v.figures+'</td>'+
    //                                             '<td><img src="'+v.image.split(",")[0]+'" class="search-img" style="width:40px" /></td>'+
    //                                             '<td>'+v.audio+'</td>'+
    //                                             '<td>'+v.video_title+'</td>'+
    //                                             '<td>'+v.awards+'</td>'+
    //                                             '<td><a href="/index.php?g=Admin&m=Art&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }else if(v.parent_artcid == '9'){
    //                                 title = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">类别</td>'+
    //                                             '<td align="left">表演者</td>'+
    //                                             '<td align="left">表演单位</td>'+
    //                                             '<td align="left">机构</td>'+
    //                                             '<td align="left">图片</td>'+
    //                                             '<td align="left">简介</td>'+
    //                                             '<td align="left">音频</td>'+
    //                                             '<td align="left">视频</td>'+
    //                                             '<td align="left">获奖情况</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td><input type="checkbox"></td>'+
    //                                             '<td>'+v.categoryname+'</td>'+
    //                                             '<td>'+v.performer+'</td>'+
    //                                             '<td>'+v.unit+'</td>'+
    //                                             '<td>'+v.agency+'</td>'+
    //                                             '<td><img src="'+v.image.split(",")[0]+'" class="search-img" style="width:40px" /></td>'+
    //                                             '<td>'+v.introduction+'</td>'+
    //                                             '<td>'+v.audio_title+'</td>'+
    //                                             '<td>'+v.video_title+'</td>'+
    //                                             '<td>'+v.awards+'</td>'+
    //                                             '<td><a href="/index.php?g=Admin&m=Art&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }else if(v.parent_artcid == '10'){
    //                                 title = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">类别</td>'+
    //                                             '<td align="left">作者</td>'+
    //                                             '<td align="left">题材</td>'+
    //                                             '<td align="left">技法</td>'+
    //                                             '<td align="left">图片</td>'+
    //                                             '<td align="left">简介</td>'+
    //                                             '<td align="left">获奖情况</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td><input type="checkbox"></td>'+
    //                                             '<td>'+v.categoryname+'</td>'+
    //                                             '<td>'+v.authorname+'</td>'+
    //                                             '<td>'+v.theme+'</td>'+
    //                                             '<td>'+v.technique+'</td>'+
    //                                             '<td><img src="'+v.image.split(",")[0]+'" class="search-img" style="width:40px" /></td>'+
    //                                             '<td>'+v.introduction+'</td>'+
    //                                             '<td>'+v.awards+'</td>'+
    //                                             '<td><a href="/index.php?g=Admin&m=Art&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }else if(v.parent_artcid == '11'){
    //                                 title = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">类别</td>'+
    //                                             '<td align="left">曲种</td>'+
    //                                             '<td align="left">流布区域</td>'+
    //                                             '<td align="left">机构</td>'+
    //                                             '<td align="left">图片</td>'+
    //                                             '<td align="left">视频</td>'+
    //                                             '<td align="left">获奖情况</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td><input type="checkbox"></td>'+
    //                                             '<td>'+v.categoryname+'</td>'+
    //                                             '<td>'+v.drama+'</td>'+
    //                                             '<td>'+v.region+'</td>'+
    //                                             '<td>'+v.agency+'</td>'+
    //                                             '<td><img src="'+v.image.split(",")[0]+'" class="search-img" style="width:40px" /></td>'+
    //                                             '<td>'+v.video_title+'</td>'+
    //                                             '<td>'+v.awards+'</td>'+
    //                                             '<td><a href="/index.php?g=Admin&m=Art&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }else if(v.parent_artcid == '12'){
    //                                 title = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">类别</td>'+
    //                                             '<td align="left">机构</td>'+
    //                                             '<td align="left">代表人物</td>'+
    //                                             '<td align="left">代表作</td>'+
    //                                             '<td align="left">图片</td>'+
    //                                             '<td align="left">视频</td>'+
    //                                             '<td align="left">获奖情况</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td><input type="checkbox"></td>'+
    //                                             '<td>'+v.categoryname+'</td>'+
    //                                             '<td>'+v.agency+'</td>'+
    //                                             '<td>'+v.figures+'</td>'+
    //                                             '<td>'+v.example+'</td>'+
    //                                             '<td><img src="'+v.image.split(",")[0]+'" class="search-img" style="width:40px" /></td>'+
    //                                             '<td>'+v.video_title+'</td>'+
    //                                             '<td>'+v.awards+'</td>'+
    //                                             '<td><a href="/index.php?g=Admin&m=Art&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }else if(v.parent_artcid == '13'){
    //                                 title = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">类别</td>'+
    //                                             '<td align="left">作者</td>'+
    //                                             '<td align="left">题材</td>'+
    //                                             '<td align="left">技法</td>'+
    //                                             '<td align="left">简介</td>'+
    //                                             '<td align="left">图片</td>'+
    //                                             '<td align="left">获奖情况</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td><input type="checkbox"></td>'+
    //                                             '<td>'+v.categoryname+'</td>'+
    //                                             '<td>'+v.authorname+'</td>'+
    //                                             '<td>'+v.theme+'</td>'+
    //                                             '<td>'+v.technique+'</td>'+
    //                                             '<td>'+v.introduction+'</td>'+
    //                                             '<td><img src="'+v.image.split(",")[0]+'" class="search-img" style="width:40px" /></td>'+
    //                                             '<td>'+v.awards+'</td>'+
    //                                             '<td><a href="/index.php?g=Admin&m=Art&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }

    //                         })
    //                     }else{

    //                                list += '<span style="color:red">'+
                                               
    //                                             '没有相关数据'+
                                                
                                                
    //                                         '</span>'; 
                                
    //                     }
                        
    //                     $(".table_lists").find("thead").html(title);
    //                     $(".table_lists").find("tbody").html(list);
    //                     $(".page").find(".pages").html(result.data.pageinfo.page);
    //                 }
                    
    //             }
    //         })
    //         return false;
    //     })
    //     // $("form:first").find("button.btn").trigger("click");
    // })
    
</script>
</body>
</html>