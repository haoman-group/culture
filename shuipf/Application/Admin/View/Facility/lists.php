<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <div class="nav">
    <ul class="cc">
        <li  class="current"><a href="">参观预约</a></li>
       
  </ul>
</div>
    <div class="table_list">
     
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td align="left">序号</td>
            <td align="left">馆名类别</td>
            <td align="left">培训/讲座的名称</td>
             <td align="left">类别</td>

            <!--<td align="left">预约人姓名</td>
            <td align="left">户籍</td>
            <td align="left">证件类型</td>
            <td align="left">证件号</td>
            <td align="left">所属单位</td>-->
            <td align="left">联系电话</td>
            <!--<td align="left">电子邮箱</td>-->
            <td align="left">预约参观人数</td>
            <!-- <td align="left">成人</td>
            <td align="left">学生</td>
            <td align="left">老人</td>
            <td align="left">小孩</td> -->
            <!--<td align="left">预约参观日期</td>-->
            <td>操作</td>
            <!-- <td align="left">时段</td>
            <td align="left">预约人姓名</td>
            <td align="left">时间</td> -->
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
              <td align="left" style="text-align:center">{$vo.id}</td>
              <td align="left" style="text-align:center"><if condition="$vo['tablename'] eq 'Library'">图书馆<elseif condition="$vo['tablename'] eq 'Comartcenter'" />文化馆<else/>文化活动</if></td>
              <td align="left" style="text-align:center">{$vo.them}</td>
              <td align="left" style="text-align:center"><if condition="$vo['style'] eq '1' ">个人<else/>团队</if></td>
              <!--<td align="left" style="text-align:center">{$vo.permanent_name}</td>
              <td align="left" style="text-align:center">{$vo.permanent_address}</td>
              <td align="left" style="text-align:center">{$vo.document_type}</td>
              <td align="left" style="text-align:center">{$vo.credential_no}</td>
              <td align="left" style="text-align:center">{$vo.institute}</td>-->
              <td align="left" style="text-align:center">{$vo['tel']['0']}</td>
              <!--<td align="left" style="text-align:center">{$vo.email}</td>-->
              <td align="left" style="text-align:center">{$vo.attendance_num}(人)</td>
              <!--<td align="left" style="text-align:center">{$vo.appointment_time}</td>-->
               <td align="left" style="text-align:center"><a href="{:U('breakshow',array('id'=>$vo['id']))}">查看</a></td>
            </tr>
          </volist>
        </tbody>
      </table>
      <form action="" method="post">
        <input type="hidden" value="Admin" name="g">
        <input type="hidden" value="Facility" name="m">
        <input type="hidden" value="export" name="a" >
               <input type="submit" class="export" value="导出"><span  style="color:red;margin-left:50px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*导出后的文件请用UTF8格式打开</span>
        </form>
      <div class="p10">
        <div class="pages">{$pageinfo.page} </div>
      </div>
    </div>
</div>
</body>
<script>
// $(function(){
//   $('.export').click(function(){
//       $("#searchform #a").val("export");
//       $("#searchform").submit();
//       $("#searchform #a").val("index");
//     });
// })
</script>
</html>