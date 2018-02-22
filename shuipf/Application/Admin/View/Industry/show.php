<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>

<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <!-- <div class="nav">
        <ul class="cc">
            <li><a href="{:U('search')}">文化产业</a></li>
            <li class="current"><a href="">查看</a></li>
        </ul>
    </div> -->
    <if condition="$_GET['showtype'] neq '' || $_GET['type'] neq ''">
        <Admintemplate file="Common/actionNav"/>
        <else/>
        <div class="nav">
            <ul class="cc">
                <li><a href="{:U('search')}">文化产业</a></li>
                <li class="current"><a href="###">查看</a></li>
            </ul>
        </div>
    </if>

    <div class="table_list table_art">
        <div class="table_full">
            <form method="get" data-cid="119"
            <neq name="data['parent_artcid']" value="119">hidden</neq>
            >
            <input type="hidden" name="art_cid" value="{$data.art_cid}">
            <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
            <input type="hidden" name="id" value="{$data['id']}">
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                    <th width="147">所属地区：</th>
                    <td><input type="text" class="input" name="area_display" id="name" size="20"
                               value="{$data.area_display}" disabled="disabled"></td>
                </tr>
                 <tr>
                        <th width="147">单位名称：</th>
                        <td>
                            <input type="text" class="input" name="com_name" size="20"
                                   value=“{$data.com_name}” disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">加入企业注册时间：</th>
                        <td>
                            <input type="date" class="input" name="join_date" size="20"
                                   value=“{$data.join_date}” disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">人数：</th>
                        <td>
                            <input type="text" class="input" name="person_num" size="20"
                                   value=“{$data.person_num}” disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">规模：</th>
                        <td>
                            <input type="text" class="input" name="scale" size="20"
                                   value=“{$data.scale}” disabled="disabled">
                        </td>
                    </tr>
                     <tr>
                        <th width="147">年产值（统计）：</th>
                        <td>
                            <input type="text" class="input" name="output_value" size="20"
                                   value="{$data.output_value}" disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">单位性质:</th>
                        <td>
                            <input type="text" class="input" name="com_property" size="20"
                                   value=“{$data.com_property}” disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">负责人:</th>
                        <td>
                            <input type="text" class="input" name="com_leader" size="20"
                                   value=“{$data.com_leader}” disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">联系方式:</th>
                        <td>
                            <input type="text" class="input" name="com_phone" size="20"
                                   value="{$data.com_phone}" disabled="disabled" />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">通讯地址：</th>
                        <td>
                            <input type="text" class="input" name="com_addr" size="20"
                                   value=“{$data.com_addr}” disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">经营范围：</th>
                        <td>
                            <input type="text" class="input" name="com_product" size="20"
                                   value=“{$data.com_product}” disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">经营模式：</th>
                        <td>
                            <input type="text" class="input" name="com_mode" size="20"
                                   value=“{$data.com_mode}” disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">简介：</th>
                        <td>
                            <!-- <input type="text" class="input" name="intro" size="20"
                                   value=“{$data.intro}> -->
                            <textarea name="intro" class="input_txt" disabled="disabled">{$data.intro}</textarea>
                        </td>
                    </tr>
                  
            </table>
            </form>
            <form method="get" data-cid="120"
            <neq name="data['parent_artcid']" value="120">hidden</neq>
            >
            <input type="hidden" name="art_cid" value="{$data.art_cid}">
            <input type="hidden" name="id" value="{$data['id']}">
            <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                    <th width="147">所属地区：</th>
                    <td><input type="text" class="input" name="area_display" id="name" size="20"
                               value="{$data.area_display}" disabled="disabled"></td>
                </tr>
                 <tr>
                        <th width="147">名称：</th>
                        <td>
                            <input type="text" class="input" name="title" size="20"
                                   value=“{$data.title}” disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">简介:</th>
                        <td>
                            <input type="text" class="input" name="intro" size="20"
                                   value=“{$data.intro}” disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">配套:</th>
                        <td>
                            <input type="text" class="input" name="support" size="20"
                                   value=“{$data.support}” disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">实施单位名称:</th>
                        <td>
                            <input type="text" class="input" name="com_name" size="20"
                                   value=“{$data.com_name}” disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">实施单位性质：</th>
                        <td>
                            <input type="text" class="input" name="com_property" size="20"
                                   value=“{$data.com_property}” disabled="disabled">
                        </td>
                    </tr>
                   
                    <tr>
                        <th width="147">联系电话：</th>
                        <td>
                            <input type="text" class="input" name="com_phone" size="20"
                                   value=“{$data.com_phone}” disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">联系地址：</th>
                        <td>
                            <input type="text" class="input" name="com_addr" size="20"
                                   value=“{$data.com_addr}” disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">投资总额：</th>
                        <td>
                            <input type="text" class="input" name="inv_totlemoney" size="20"
                                   value=“{$data.inv_totlemoney}” disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">融资总额：</th>
                        <td>
                            <input type="text" class="input" name="inv_financing" size="20"
                                   value=“{$data.inv_financing}” disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">投资年限：</th>
                        <td>
                            <input type="text" class="input" name="inv_years" size="20"
                                   value=“{$data.inv_years}” disabled="disabled">
                        </td>
                    </tr>
                     <tr>
                        <th width="147">负责人：</th>
                        <td>
                            <input type="text" class="input" name="com_leader" size="20"
                                   value=“{$data.com_leader}” disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">合作方式：</th>
                        <td>
                            <input type="text" class="input" name="inv_type" size="20"
                                   value=“{$data.inv_type}” disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">资金用途：</th>
                        <td>
                            <input type="text" class="input" name="inv_use" size="20"
                                   value=“{$data.inv_use}” disabled="disabled">
                        </td>
                    </tr>
                      <tr>
                    <th width="147">项目概况：</th>
                    <td>
                        <textarea name="survey" class="input_txt" disabled="disabled">{$data.survey}</textarea>
                    </td>
                </tr>
                 
            </table>
            </form>
            <form method="get" data-cid="121"
            <neq name="data['parent_artcid']" value="121">hidden</neq>
            >
            <input type="hidden" name="art_cid" value="{$data.art_cid}">
            <input type="hidden" name="id" value="{$data['id']}">
            <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                    <th width="147">所属地区：</th>
                    <td><input type="text" class="input" name="area_display" id="name" size="20"
                               value="{$data.area_display}" disabled="disabled"></td>
                </tr>
                 <tr>
                        <th width="147">产品名称：</th>
                        <td>
                            <input type="text" class="input" name="title" size="20"
                                   value=“{$data.title}” disabled="disabled">
                        </td>
                    </tr>
                     <tr>
                        <th>图片：</th>

                        <td>
                            <ul class="explain">
                                <li>文件上传:</li>
                                <li>
                                    <a href="javascript:upfile('acrobatics_picture')"
                                       class="seller_upload_image">上传图片</a>
                                    <p class="tips">提示：1、图片上传大小不得超过4M</p>
                                    <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张图片</p>
                                </li>
                            </ul>
                            <ul class="img jsaddimgul" id="acrobatics_picture">
                                <for start="0" end="$maxPicNum">
                                    <if condition="$acrobatics_picture_url[$i] neq ''">
                                        <li class=''>
                                            <input type="hidden" name="acrobatics_picture_url[]"
                                                   value="{$acrobatics_picture_url[$i]}">
                                            <img src="{$acrobatics_picture_url[$i]}" disabled="disabled">
                                            <div class="operate"><span class="sl"></span><span class="sr"></span><a
                                                    href="javascript:void(0)" class="tupian"></a></div>
                                        </li>
                                        <else/>
                                        <li class="noimg" ></li>
                                    </if>
                                </for>
                            </ul>
                        </td>
                    </tr>
                  
                    <tr>
                        <th width="147">规格:</th>
                        <td>
                            <input type="text" class="input" name="specification" size="20"
                                   value=“{$data.specification}” disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">生产企业:</th>
                        <td>
                            <input type="text" class="input" name="com_name" size="20"
                                   value=“{$data.com_name}” disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">联系方式:</th>
                        <td>
                            <input type="text" class="input" name="com_phone" size="20"
                                   value="{$data.com_phone}" disabled="disabled" />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">产品详情：</th>
                        <td>
                            <input type="text" class="input" name="com_product" size="20"
                                   value=“{$data.com_product}” disabled="disabled">
                        </td>
                    </tr>
            </table>
            </form>

             <form method="get" data-cid="122"
            <neq name="data['parent_artcid']" value="122">hidden</neq>
            >
            <input type="hidden" name="art_cid" value="{$data.art_cid}">
            <input type="hidden" name="id" value="{$data['id']}">
            <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                    <th width="147">所属地区：</th>
                    <td><input type="text" class="input" name="area_display" id="name" size="20"
                               value="{$data.area_display}" disabled="disabled"></td>
                </tr>
                 <tr>
                        <th width="147">名称：</th>
                        <td>
                            <input type="text" class="input" name="title" size="20"
                                   value=“{$data.title}” disabled="disabled">
                        </td>
                    </tr>
                     <tr>
                        <th>图片：</th>
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
                                    <if condition="$music_picture_urls[$i] neq ''">
                                        <li class=''>
                                            <input type="hidden" name="music_picture_url[]" value="{$music_picture_urls[$i]}">
                                            <img src="{$music_picture_urls[$i]}" disabled="disabled">
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
                        <th width="147">联系人：</th>
                        <td>
                            <input type="text" class="input" name="com_leader" size="20"
                                   value=“{$data.com_leader}” disabled="disabled">
                        </td>
                    </tr>
                     <tr>
                        <th width="147">地址：</th>
                        <td>
                            <input type="text" class="input" name="com_addr" size="20"
                                   value=“{$data.com_addr}” disabled="disabled">
                        </td>
                    </tr>
                     <tr>
                        <th width="147">联系方式：</th>
                        <td>
                            <input type="text" class="input" name="com_phone" size="20"
                                   value="{$data.com_phone}" disabled="disabled" />
                        </td>
                    </tr>
                    <tr>
                        <th width="147">级别:</th>
                        <td>
                            <input type="text" class="input" name="level" size="20" value=“{$data.level}” disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">基本概况:</th>
                        <td>
                             <textarea name="intro" class="input_txt" disabled="disabled">{$data.intro}</textarea>
                        </td>
                    </tr>
            </table>
            </form>
            <form method="get" data-cid="123"
            <neq name="data['parent_artcid']" value="123">hidden</neq>
            >
            </form>
            <form method="get" data-cid="164"
            <neq name="data['parent_artcid']" value="164">hidden</neq>
            >
            <input type="hidden" name="art_cid" value="{$data.art_cid}">
            <input type="hidden" name="id" value="{$data['id']}">
            <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}" />
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                    <th width="147">所属地区：</th>
                    <td><input type="text" class="input" name="area_display" id="name" size="20"
                               value="{$data.area_display}" disabled="disabled"></td>
                </tr>
                <tr>
                    <th width="147">活动名称：</th>
                    <td>
                        <input type="text" class="input" name="title" id="name" size="20" value="{$data.title}" disabled="disabled" />
                    </td>
                </tr>
                <tr>
                    <th width="147">主办者:</th>
                    <td>
                        <input type="text" class="input" name="sponsor" id="name" size="20"
                               value="{$data.sponsor}" disabled="disabled" />
                    </td>
                </tr>
                <tr>
                    <th width="147">承办者:</th>
                    <td>
                        <input type="text" class="input" name="undertaker" id="name" size="20"
                               value="{$data.undertaker}" disabled="disabled"/>
                    </td>
                </tr>
                <tr>
                    <th width="147">参展展馆:</th>
                    <td>
                        <input type="text" class="input" name="pavilion" id="name" size="20"
                               value="{$data.pavilion}" disabled="disabled"/></input>
                    </td>
                </tr>
                <tr>
                    <th width="147">展会时间:</th>
                    <td>
                        <input type="text" class="input" name="opentime" id="name" size="20"
                               value="{$data.opentime}" disabled="disabled"/></input>
                    </td>
                </tr>
                <tr>
                    <th width="147">地点:</th>
                    <td>
                        <input type="text" class="input" name="addr" id="name" size="20" value="{$data.addr}" disabled="disabled"></input>
                    </td>
                </tr>
                <tr>
                    <th width="147">简介:</th>
                    <td>
                        <input type="text" class="input" name="intro" id="name" size="20" value="{$data.intro}" disabled="disabled"></input>
                    </td>
                </tr>
                  
            </table>
            </form>
            <form method="get" data-cid="165"
            <neq name="data['parent_artcid']" value="165">hidden</neq>
            >
            <input type="hidden" name="art_cid" value="{$data.art_cid}">
            <input type="hidden" name="id" value="{$data['id']}">
            <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                    <th width="147">所属地区：</th>
                    <td><input type="text" class="input" name="area_display" id="name" size="20"
                               value="{$data.area_display}" disabled="disabled"></td>
                </tr>
                <tr>
                    <th width="147">单位名称：</th>
                    <td>
                        <input type="text" class="input" name="com_name" id="name" size="20"
                               value="{$data.com_name}" disabled="disabled"></input>
                    </td>
                </tr>
                <tr>
                    <th width="147">单位性质:</th>
                    <td>
                        <input type="text" class="input" name="com_property" id="name" size="20"
                               value="{$data.com_property}" disabled="disabled"></input>
                    </td>
                </tr>
                <tr>
                    <th width="147">负责人:</th>
                    <td>
                        <input type="text" class="input" name="com_leader" id="name" size="20"
                               value="{$data.com_leader}" disabled="disabled"></input>
                    </td>
                </tr>
                <tr>
                    <th width="147">联系方式:</th>
                    <td>
                        <input type="text" class="input" name="com_phone" id="name" size="20"
                               value="{$data.com_phone}" disabled="disabled"></input>
                    </td>
                </tr>
                <tr>
                    <th width="147">通讯地址：</th>
                    <td>
                        <input type="text" class="input" name="com_addr" id="name" size="20"
                               value="{$data.com_addr}" disabled="disabled"></input>
                    </td>
                </tr>
                <tr>
                    <th width="147">经营产品：</th>
                    <td>
                        <input type="text" class="input" name="com_product" id="name" size="20"
                               value="{$data.com_product}" disabled="disabled"></input>
                    </td>
                </tr>
                <tr>
                    <th width="147">经营模式：</th>
                    <td>
                        <input type="text" class="input" name="com_mode" id="name" size="20"
                               value="{$data.com_mode}" disabled="disabled"/>
                    </td>
                </tr>
                <tr>
                    <th width="147">简介：</th>
                    <td>
                        <!-- <input type="text" class="input" name="intro" id="name" size="20" value="{$data.intro}" disabled="disabled"/> -->
                        <textarea name="intro" id="" cols="30" rows="10" disabled="disabled">{$data.intro}</textarea>
                    </td>
                </tr>
                  
            </table>
            </form>
            <form method="get" data-cid="166"
            <neq name="data['parent_artcid']" value="166">hidden</neq>
            >
            <input type="hidden" name="art_cid" value="{$data.art_cid}">
            <input type="hidden" name="id" value="{$data['id']}">
            <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                    <th width="147">所属地区：</th>
                    <td><input type="text" class="input" name="area_display" id="name" size="20"
                               value="{$data.area_display}" disabled="disabled"></td>
                </tr>
                <tr>
                    <th width="147">名称：</th>
                    <td>
                        <input type="text" class="input" name="title" id="name" size="20" value="{$data.title}" disabled="disabled"/>
                    </td>
                </tr>
                <tr>
                    <th width="147">地点:</th>
                    <td>
                        <input type="text" class="input" name="addr" id="name" size="20" value="{$data.addr}" disabled="disabled" />
                    </td>
                </tr>
                <tr>
                    <th width="147">竣工时间:</th>
                    <td>
                        <input type="text" class="input" name="completetime" id="name" size="20"
                               value="{$data.completetime}" disabled="disabled" />
                    </td>
                </tr>
                <tr>
                    <th width="147">开放时间:</th>
                    <td>
                        <input type="text" class="input" name="opentime" id="name" size="20"
                               value="{$data.opentime}" disabled="disabled" />
                    </td>
                </tr>
                <tr>
                    <th width="147">馆藏精品：</th>
                    <td>
                        <input type="text" class="input" name="boutique" id="name" size="20"
                               value="{$data.boutique}" disabled="disabled" />
                    </td>
                </tr>
                <tr>
                    <th width="147">总建筑面积：</th>
                    <td>
                        <input type="text" class="input" name="total_area" id="name" size="20"
                               value="{$data.total_area}" disabled="disabled"/>
                    </td>
                </tr>
                <tr>
                    <th width="147">简介：</th>
                    <td>
                        <!-- <input type="text" class="input" name="intro" id="name" size="20" value="{$data.intro}" disabled="disabled" /> -->
                        <textarea name="intro" id="" cols="30" rows="10" disabled="disabled">{$data.intro}</textarea>
                    </td>
                </tr>
                 
            </table>
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
                    
                    <input type="submit" class="btn btn_submit mr10 J_ajax_submit_btn" value="提交" />
                    
                </form>
                
            </if>
        </div>
    </div>
</div>
</div>
<Admintemplate file="Common/Audittable"/>
</body>
<script src="{$config_siteurl}statics/js/common.js"></script>
<script type="text/javascript">
    // 审核状态显示
    $(".audit").on("change",function(){
        var getSelectVal = $(".select-box option:selected").text();
        $(".select-box .select-span").text(getSelectVal);
        var audit = $(this).val();
        if(audit == 40){
            $(".reason").show();
        }else{
            $(".reason").hide();
        }
    });
</script>
</html>