<style>
   .right-main2 div{color: #84571F;font-size: 12px;}
</style>
<div id="column-statistic" style="width: 500px;height:400px;float: left;margin-top: 50px;"></div>
<div id="pie-statistic" style="width: 400px;height:400px;float: left;margin: 50px 0 0 50px;"></div>
<script src="//cdn.bootcss.com/echarts/3.3.1/echarts.min.js"></script>
<script type="text/javascript">
    var chart_data = <?php echo json_encode($chart_statistics);?>;
    var columnChart = echarts.init(document.getElementById('column-statistic'));
    // 指定图表的配置项和数据
    var column_option = {
        title: {
            text: chart_data.title
        },
        tooltip: {
            trigger: 'axis',
            axisPointer : {
                type : 'shadow'
            }
        },
        toolbox: {
            show: true,
            feature: {
                magicType: {type: ['line', 'bar']},
                restore: {},
                saveAsImage: {}
            }
        },
        legend: {
            data:['总数']
        },
        xAxis: {
            data: chart_data.name_list
        },
        yAxis: {},
        series: [{
            name: '总数',
            type: 'bar',
            data: chart_data.sum_list
        }]
    };
    // 使用刚指定的配置项和数据显示图表。
    columnChart.setOption(column_option);

    var pieChart = echarts.init(document.getElementById('pie-statistic'));
    pie_option = {
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b}: {c} ({d}%)"
        },
        legend: {
            orient: 'vertical',
            x: 'left',
            data:chart_data.pie_legend_list
        },
        series: [
            {
                name:'数量',
                type:'pie',
                radius: ['30%', '70%'],
                avoidLabelOverlap: false,
                label: {
                    normal: {
                        show: false,
                        position: 'center'
                    },
                    emphasis: {
                        show: true,
                        textStyle: {
                            fontSize: '30',
                            fontWeight: 'bold'
                        }
                    }
                },
                labelLine: {
                    normal: {
                        show: false
                    }
                },
                data:chart_data.pie_list
            }
        ]
    };
    pieChart.setOption(pie_option);
</script>
