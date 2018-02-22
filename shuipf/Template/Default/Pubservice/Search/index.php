<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>文化活动</title>
    <template file="Pubservice/Common/_cssjs"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-volunteer.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-active.css" />
    <script type="text/javascript" src="{$config_siteurl}statics/cu/js/category_select.js"></script>
</head>
<body>
<div class="wrap">
    <template file="Pubservice/Common/_head"/>
    <div class="stepBar">
        <div class="ggwh_Content">
            <div class="stepBarMain">
                <a href="{$config_siteurl}" class="link">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;文化活动

                <div class="col-md-4 pull-right">
                    <form action="" method="get" target="_blank">
								<input type="hidden" name="m" value="search"/>
								<input type="hidden" name="g" value="Pubservice"/>
								<input type="hidden" name="a" value="index"/>
                        <div class="searbox">
                            <input type="text" placeholder="" value="" name="kw"/>
                            <input type="submit" id="button" value="" class="ggwh_SearchBtn" style="border: none;float:right;width:40px;right:0px !important"><i style="color:#962626" class="fa fa-search"></i>
                        </div>

                    </form>
                </div>
                <div class="col-md-4  pull-right  mhSearch" style="margin-top: 10px;">
                    <div class="col-md-4">
                        <select class="form-control">
                            <option>搜索类别</option>
                        </select>
                    </div>
                    <div class="col-md-8" style="position: relative;">
                        <input class="form-control ggwh_Search" placeholder="输入您要搜索的关键词" />
                        <a href="#" class="ggwh_SearchBtn"></a>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <div class="ggwh_Content">

        <div class="whhdCategory2">
            <div class="pull-left ggwh_SelectName">排序：</div>
            <ul class="pull-left ggwh_SelectUl">
                <li class="choose">
                    <a href="#"><span>全部</span></a>
                </li>
                <li>
                    <a href="#"><span>好评</span><span class="icon-arrow-down"></span></a>
                </li>
                <li>
                    <a href="#"><span>发布时间</span><span class="icon-arrow-down"></span></a>
                </li>
                <li>
                    <a href="#"><span>参与方式</span></a>
                </li>
            </ul>
            <span class="pull-right"><a href="#">申请培训</a></span>
            <div class="clearfix"></div>
        </div>
        <div class="row whhd_PxList">
            <volist name="data" id="vo">
                <div class="col-md-3">
                    <div class="whhd_PxListItem">
                        <if condition="($vo['art_cid'] eq 191) or ($vo['art_cid'] eq 192)">
                            <if condition="$vo['art_cid'] eq 191">
                                <div class="train">培训</div>
                                <else/>
                                <div class="chair">讲座</div>
                            </if>
                            <a href="{:U('Pubservice/Active/show', array('id'=>$vo['id'],'tablename'=>active))}"><img src="{$vo.image}" /></a>
                            <h5>{$vo.content_title}</h5>
                            <p>主办单位：{$vo.host_unit}</p>
                            <p>活动地点：{$vo.act_address}</p>
                            <p>活动时间：{$vo.act_time}</p>
                            <a href="{:U('Pubservice/Active/show', array('id'=>$vo['id'],'tablename'=>active))}" class="signUp">报&nbsp;&nbsp;名</a>
                        </if>
                        <if condition="($vo['art_cid'] eq 199) or ($vo['art_cid'] eq 200) or ($vo['art_cid'] eq 201)">
                            <if condition="$vo['art_cid'] eq 201">
                                <div class="live">现场</div>
                                <else/>
                                <div class="notice">预告</div>
                            </if>
                            <a href="{:U('Pubservice/Active/show', array('id'=>$vo['id'],'tablename'=>active))}"><img src="{$vo.image}" /></a>
                            <h5>{$vo.content_title}</h5>
                            <p>活动地点：{$vo.act_address}</p>
                            <p>活动时间：{$vo.act_time}</p>
                            <a href="{:U('Pubservice/Active/show', array('id'=>$vo['id']))}" class="signUp">免&nbsp;&nbsp;票</a>
                        </if>
                        <if condition="($vo['art_cid'] eq 193) or ($vo['art_cid'] eq 194) or ($vo['art_cid'] eq 195 ) or ($vo['art_cid'] eq 196 ) or ($vo['art_cid'] eq 202 )
                        or ($vo['art_cid'] eq 205 ) or ($vo['art_cid'] eq 206 ) or ($vo['art_cid'] eq 207 ) or ($vo['art_cid'] eq 208 )  or ($vo['art_cid'] eq 211 ) or ($vo['art_cid'] eq 212 ) or ($vo['art_cid'] eq 213 ) or ($vo['art_cid'] eq 210 )
						">
                            <if condition="$vo['art_cid'] eq 193">
                                <div class="old">老年大学</div>
                                <elseif condition="$vo['art_cid'] eq 194" />
                                <div class="children">少儿培训</div>
                                <elseif condition="$vo['art_cid'] eq 195" />
                                <div class="basic">基层辅导</div>
                                <elseif condition="$vo['art_cid'] eq 202" />
                                <div class="basic">文化惠民</div>
                                <elseif condition="$vo['art_cid'] eq 205" />
                                <div class="star">群星奖</div>
                                <elseif condition="$vo['art_cid'] eq 206" />
                                <div class="other">其他赛事</div>
                                <elseif condition="$vo['art_cid'] eq 207" />
                                <div class="province">省级</div>
                                <elseif condition="$vo['art_cid'] eq 208" />
                                <div class="town">市级</div>
                                <elseif condition="$vo['art_cid'] eq 210" />
                                <div class="town">社会团体</div>
                                <elseif condition="$vo['art_cid'] eq 211" />
                                <div class="province">省级</div>
                                <elseif condition="$vo['art_cid'] eq 212" />
                                <div class="town">市级</div>
                                <elseif condition="$vo['art_cid'] eq 213" />
                                <div class="county">县级</div>
                                <else />
                                <div class="flock">群文讲座</div>
                            </if>
                            <a href="{:U('Pubservice/Active/show', array('id'=>$vo['id'],'tablename'=>active))}"><img src="{$vo.image}" /></a>
                            <h5>{$vo.content_title}</h5>
                            <dl>
                                <dt>简介：</dt><dd class="intro">{$vo.abstract}</dd>
                            </dl>
                            <a href="{:U('Pubservice/Active/show', array('id'=>$vo['id']))}" class="lookAt">查看详情>></a>
                        </if>
                    </div>
                </div>
            </volist>
        </div>
        <div class="page">
            {$pageinfo.page}
        </div>

        <!-- <div class="ggwh_page">每页10条 共32页
            <a>上一页</a>
            <a>1</a>
            <a class="choose">2</a>
            <a>3</a>
            <a>4</a>
            <a>下一页</a>
        </div> -->
        <hr />
    </div>
    <template file="Pubservice/Common/_foot"/>
</div>
<script type="text/javascript">
    $('.sx').sx({
        nuv:".zj",//筛选结果
        zi:"sx_child",//所有筛选范围内的子类
        qingchu:'.qcqb',//清除全部
        over:'on'//选中状态样式名称
    });


    $(document).ready(function(){
        console.log($(".intro"));
        $.each($(".intro"),function(i,v){
            console.log($(v));
            str = $(v).text().length > 40 ? $(v).text().substr(0,40) + '...' : $(v).text();
            $(v).text(str);
        })
        // str = $(".intro").text().length > 40 ? $(".intro").text().substr(0,40) + '...' : $(".intro").text();
        // $(".intro").text(str);


        $(".filtertogglebtn").click(function(){
            $(this).toggleClass("filtertogglebtnon");
            $(".filterparas").toggleClass("filterfold");
        })
    })
</script>
</body>
</html>