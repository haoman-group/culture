<?php if (!defined('SHUIPF_VERSION')) exit(); ?>

<Admintemplate file="Common/Head" />
<body>
<div class="wrap">
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="{:U('Admin/FestivalCalendar/index')}">艺术节日常安排列表</a></li>
            
        </ul>
    </div>
    <div class="table_list table_art">
        <div class="table_full">
            <form class="J_ajaxForm" action="{:U('edit')}" method="post"  >
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    
                <tr>
                    <th width="147">活动标题</th>
                    <td>
                        <input type="text" maxlength="145" class="input" name="title" value="{$data.title}" >
                    </td>
                </tr>
                <tr>
                    <th width="147">场馆</th>
                    <td>
                        <select name="site" id="">
                            <volist name="site_array" id="sa">
                                <option value="{$sa}" <if condition="$sa eq $data['site']">selected</if>>{$sa}</option>
                            </volist>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th width="147">开始时间</th>
                    <td>
                    <input type="text" class="input J_date date" name="start" value="{$data.start|date='Y-m-d',###}" >
                    </td>
                </tr>
                <tr>
                    <th width="147">结束时间</th>
                    <td>
                    <input type="text" class="input J_date date" name="end" value="{$data.end|date='Y-m-d',###}" >
                    </td>
                </tr>
                <tr>
                    <th width="147">颜色类型</th>
                    <td>
                        <select name="class" id="">
                            <volist name="class_array" id="ca">
                                <option value="{$key}" <if condition="$key eq $data['class']">selected</if>>{$ca}</option>
                            </volist>
                        </select>
                    </td>
                </tr>
                </table>
                <div class="">
                    <div class="btn_wrap_pd">
                        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">更新</button>
                    </div>
                </div>
                <input type="hidden" name="id" value="{$data.id}">
            </form>
        </div>
    </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>