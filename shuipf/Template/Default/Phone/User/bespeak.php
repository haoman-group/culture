<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />

<block name="content">
<table class="am-table am-table-hover am-table-striped am-table-compact am-scrollable-horizontal ">
    <thead>
        <tr>
            <th>序号</th>
            <th>类别</th>
            <th>预约时间</th>
            <th>预约名称</th>
        </tr>
    </thead>
    <tbody>
        <volist name="data" id="vo">
        <tr>
            <td>{$vo.id}</td>
            <td><if condition="$vo['style'] eq '1'">个人<else/>团队</if></td>
            <td>{$vo['addtime']}</td>
            <td><if condition="$vo['show']['content_title'] neq ''">{$vo['show']['content_title']}<else/>无</if></td>
        </tr>
        </volist>
    </tbody>
</table>
</block>