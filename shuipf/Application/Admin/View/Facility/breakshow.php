<?php if (!defined('SHUIPF_VERSION')) exit(); ?>

<Admintemplate file="Common/Head" />
<body>
<div class="wrap">
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="{:U('lists')}">参加预约->查看</a></li>
            
        </ul>
    </div>
    <div class="table_list table_art">
        <div class="table_full">
            
           <if condition="$data['style'] eq '1'">
    
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">预约人数：</th>
                        <td>
                        <input type="text" class="input" name="attendance_num" value="{$data.attendance_num}" disabled="disabled">
                        </td>
                    </tr>
                    <!--<tr>
                     <th width="147">户籍：</th>
                    <td>
                   
                    <input type="text" class="input" name="permanent_address" size="20" value="{$data.permanent_address}" disabled="disabled">
                    </td>
                    </tr>-->
                    <!--<tr>
                     <th width="147">证件类型：</th>
                    <td>
                    <input type="text" class="input" name="document_type" size="20" value="{$data.document_type}" disabled="disabled">
                    </td>
                    </tr>-->
                     <tr>
                    <td>身份证号:</td>
                    <td>
                    <volist name="data['credential_no']" id="vo">
                        <input type="text" class="input" name="credential_no" size="20" value="{$vo}" disabled="disabled">
                        </volist>
                   </td>
                   </tr>
                    <!--<tr>
                        <th width="147">所属单位：</th>
                        <td>
                            <input type="text" class="input" name="institute" size="20" value="{$data.institute}" disabled="disabled">
                        </td>
                    </tr>    -->
                     <tr>
                        <th width="147">联系电话：</th>
                        <td>
                        <volist name="data['tel']" id="wo">
                            <input type="text" class="input" name="tel" size="20" value="{$wo}" disabled="disabled">
                            </volist>
                        </td>
                    <!--</tr> 
                     <tr>
                        <th width="147">电子邮箱：</th>
                        <td>
                            <input type="text" class="input" name="email" size="20" value="{$data.email}" disabled="disabled">
                        </td>
                    </tr>  -->
                     <!--<tr>
                        <th style="width:80px">预约参观人数：</th>
                        <td>
                            <input type="text" class="input" name="attendance_num" size="20" value="{$data.attendance_num}" disabled="disabled">
                            成人： <input type="text" class="input" name="adult_num" size="20" value="{$data.adult_num}" disabled="disabled">
                            学生： <input type="text" class="input" name="student_num" size="20" value="{$data.student_num}" disabled="disabled">
                           老人: <input type="text" class="input" name="elder_num" size="20" value="{$data.elder_num}" disabled="disabled">
                           小孩:  <input type="text" class="input" name="child_num" size="20" value="{$data.child_num}" disabled="disabled">
                        </td>
                    </tr>   -->
                    <!--<tr>
                        <th style="width:80px">预约参观时间：</th>
                        <td>
                            <input type="text" class="input" name="appointment_time" size="20" value="{$data.appointment_time}" disabled="disabled">
                            时段: <input type="text" class="input" name="time_interval" size="20" value="{$data.time_interval}" disabled="disabled">
                        </td>
                    </tr>  -->
                    <tr>
                        <th style="width:80px">预约备注：</th>
                        <td>
                            <textarea name="notice" cols="40" rows="10" class="valid" disabled="disabled">{$data['notice']}</textarea>
                        </td>
                    </tr>            
                </table>
                <else/>
                 <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">团体名称：</th>
                        <td>
                        <input type="text" class="input" name="permanent_name" value="{$data.permanent_name}" disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                     <th width="147">预约参观人数：</th>
                    <td>
                   
                    <input type="text" class="input" name="attendance_num" size="20" value="{$data.attendance_num}" disabled="disabled">
                    </td>
                    </tr>
                    <!--<tr>
                     <th width="147">证件类型：</th>
                    <td>
                    <input type="text" class="input" name="document_type" size="20" value="{$data.document_type}" disabled="disabled">
                    </td>
                    </tr>-->
                     <tr>
                    <td>身份证:</td>
                    <td>
                        <input type="text" class="input" name="credential_no" size="20" value="{$data['credential_no']['0']}" disabled="disabled">
                   </td>
                   </tr>
                    <!--<tr>
                        <th width="147">所属单位：</th>
                        <td>
                            <input type="text" class="input" name="institute" size="20" value="{$data.institute}" disabled="disabled">
                        </td>
                    </tr>    -->
                     <tr>
                        <th width="147">联系电话：</th>
                        <td>
                            <input type="text" class="input" name="tel" size="20" value="{$data['tel']['0']}" disabled="disabled">
                        </td>
                    </tr> 
                     <!--<tr>
                        <th width="147">电子邮箱：</th>
                        <td>
                            <input type="text" class="input" name="email" size="20" value="{$data.email}" disabled="disabled">
                        </td>
                    </tr>  -->
                     <tr>
                        <th style="width:80px">预约参观人数：</th>
                        <td>
                            <input type="text" class="input" name="attendance_num" size="20" value="{$data.attendance_num}" disabled="disabled">
                            <!--成人： <input type="text" class="input" name="adult_num" size="20" value="{$data.adult_num}" disabled="disabled">
                            学生： <input type="text" class="input" name="student_num" size="20" value="{$data.student_num}" disabled="disabled">
                           老人: <input type="text" class="input" name="elder_num" size="20" value="{$data.elder_num}" disabled="disabled">
                           小孩:  <input type="text" class="input" name="child_num" size="20" value="{$data.child_num}" disabled="disabled">-->
                        </td>
                    </tr>   
                    <!--<tr>
                        <th style="width:80px">预约参观时间：</th>
                        <td>
                            <input type="text" class="input" name="appointment_time" size="20" value="{$data.appointment_time}" disabled="disabled">
                            时段: <input type="text" class="input" name="time_interval" size="20" value="{$data.time_interval}" disabled="disabled">
                        </td>
                    </tr>  -->
                    <tr>
                        <th style="width:80px">预约备注：</th>
                        <td>
                            <textarea name="notice" cols="40" rows="10" class="valid" disabled="disabled">{$data['notice']}</textarea>
                        </td>
                    </tr>            
                </table>
                </if>

        </div>
    </div>
</div>
</body>

<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/uploadfile.js?v"></script>
<script>

</script>
</html>