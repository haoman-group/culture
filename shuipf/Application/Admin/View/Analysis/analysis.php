
<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<style type="text/css">
    .table_list tr,.table_list th,.table_list td{padding: 0;}
    .table_list th,.table_list td{padding: 3px 10px;}
    .table_list td{padding-left: 5px;}
    select.cid{margin-left: 10px;}
</style>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <div class="h_a">搜索</div>
    <div class="table_list">
        <div class="table_full">
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                    <th width="147">类目：</th>
                    <td>
                        <div id="category" style="display:inline-block;">
                            <select id="parentItems" name="art_cid" onchange="getChildListAndSetValue(this)">
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
                        <select id="area" class="select_area"></select>
                    </td>
                </tr>
            </table>
            <div class="J_ajaxForm">
                <input type="hidden" name="url" value="{$data.ajax_url}">
                <input type="hidden" name="art_cid" value="{$data.default_art}">
                <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <div style="margin: 10px 0 0;">
                        <button class="btn">确定</button>
                    </div>
            </div>
        </div>
    </div>


    <div class="table_list" >
        <div id="line-statistic" style="width: 55%;height:400px;float: left;margin-top: 50px;"></div>
        <div id="pie-statistic" style="width: 40%;height:400px;float: left;margin: 50px 0 0 50px;"></div>
    </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js"></script>
<script src="//cdn.bootcss.com/echarts/3.3.1/echarts.min.js"></script>
<script type="text/javascript">

    var chart_change = function() {
        var ajax_url = $(".J_ajaxForm input[name='url']").val();
        var art_cid = $(".J_ajaxForm input[name='art_cid']").val();
        var area_id = $(".J_ajaxForm input[name='area']").val();
        var lineChart = echarts.init(document.getElementById('line-statistic'));
        $.ajax({
            type:"POST",
            url:ajax_url,
            dataType:"json",
            data:{"art_cid":art_cid, "area_id":area_id},
            success: function(result) {
                console.log(result);
                var pie_data = result.data.pie_data;
                var line_option = {
                    title: {
                        text: result.data.title //chart_data.title
                    },
                    tooltip: {
                        trigger: 'axis',
                    },
                    legend: {
                        data: result.data.column_list
                    },
                    toolbox: {
                        feature: {
                            saveAsImage: {}
                        }
                    },
                    grid: {
                        left: '3%',
                        right: '4%',
                        bottom: '3%',
                        containLabel: true
                    },
                    xAxis: [
                        {
                            type: 'category',
                            boundaryGap: false,
                            data: ['周一', '周二', '周三', '周四', '周五', '周六', '周日']
                        }
                    ],
                    yAxis: [
                        {
                            type: 'value'
                        }
                    ],
                    series: result.data.column_data
                };
                lineChart.setOption(line_option);

                var pieChart = echarts.init(document.getElementById('pie-statistic'));

                var pie_option = {
                    title:  {
                        text:'访问设备分析'
                    },
                    tooltip: {
                        trigger: 'item',
                        formatter: "{a} <br/>{b}: {c} ({d}%)"
                    },
                    //legend: {
                    //    orient: 'vertical',
                    //    x: 'left',
                    //    data:['MacOS', 'Windows','Linux','iPad','AndroidPad', '平板其他', 'iPhone','Android', '手机其他']
                    //},
                    series: [
                        {
                            name:'访问设备',
                            type:'pie',
                            selectedMode: 'single',
                            radius: [0, '30%'],

                            label: {
                                normal: {
                                    position: 'inner'
                                }
                            },
                            labelLine: {
                                normal: {
                                    show: false
                                }
                            },
                            data:[
                                {value:pie_data.MacOS+pie_data.Windows+pie_data.Linux, name:'PC', selected:true},
                                {value:pie_data.iPad+pie_data.AndroidPad+pie_data.otherPad, name:'平板电脑'},
                                {value:pie_data.iPhone+pie_data.Android+pie_data.otherPhone, name:'手机'}
                            ]
                        },
                        {
                            name:'访问来源',
                            type:'pie',
                            radius: ['40%', '55%'],
                            data:[
                                {value:pie_data.MacOS, name:'MacOS'},
                                {value:pie_data.Windows, name:'Windows'},
                                {value:pie_data.Linux, name:'Linux'},
                                {value:pie_data.iPad, name:'iPad'},
                                {value:pie_data.AndroidPad, name:'AndroidPad'},
                                {value:pie_data.otherPad, name:'平板其他'},
                                {value:pie_data.iPhone, name:'iPhone'},
                                {value:pie_data.Android, name:'Android'},
                                {value:pie_data.otherPhone, name:'手机其他'}
                            ]
                        }
                    ]
                };
                pieChart.setOption(pie_option);
            },
            error:function() {
                alert("获取数据失败");
            }
        });
    };
    $(".J_ajaxForm button").click(function(){
        chart_change();
        return false;
    });
    chart_change();
</script>

</body>

</html>
