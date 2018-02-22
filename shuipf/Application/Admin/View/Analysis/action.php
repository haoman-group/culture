
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

    <div class="table_list">
        <div id="map1-statistic" style="width:49%;height:600px;float: left;margin-top: 50px;"></div>
        <div id="map2-statistic" style="width:49%;height:600px;float: left;margin-top: 50px;"></div>
        <div id="column-statistic" style="width:100%;height:600px;float: left;margin-top: 50px;"></div>
    </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js"></script>
<script src="//cdn.bootcss.com/echarts/3.5.3/echarts.min.js"></script>
<script type="text/javascript">

var chart_change = function() {
    var mapChart1 = echarts.init(document.getElementById('map1-statistic'));
    mapChart1.showLoading();
    $.get('{$config_siteurl}statics/map/shanxi.json', function(geoJson){
        mapChart1.hideLoading();
        echarts.registerMap('shanxi', geoJson);
        mapChart1.setOption({
            title: {
                text: '各地市举办活动数量',
            },
            tooltip: {
                trigger: 'item',
                formatter: '{b}<br/>个数 {c}'
            },
            toolbox: {
                show: true,
                orient: 'vertical',
                left: 'right',
                top: 'center',
                feature: {
                    dataView: {readOnly: false},
                    restore: {},
                    saveAsImage: {}
                }
            },
            visualMap: {
                min: 10,
                max: 30,
                text:['High','Low'],
                realtime: false,
                calculable: true,
                inRange: {
                    color: ['lightskyblue','yellow', 'orangered']
                }
            },
            series: [
                {
                    type: 'map',
                    map: 'shanxi', // 自定义扩展图表类型
                    itemStyle:{
                        normal:{label:{show:true}},
                        emphasis:{label:{show:true}}
                    },
                    data:[
                        {name: '太原市', value: 30},
                        {name: '晋中市', value: 28},
                        {name: '忻州市', value: 20},
                        {name: '吕梁市', value: 24},
                        {name: '朔州市', value: 18},
                        {name: '大同市', value: 14},
                        {name: '阳泉市', value: 12},
                        {name: '临汾市', value: 17},
                        {name: '运城市', value: 20},
                        {name: '长治市', value: 21},
                        {name: '晋城市', value: 12},
                    ],
                }
            ]
        });
    });
    var mapChart2 = echarts.init(document.getElementById('map2-statistic'));
    mapChart2.showLoading();
    $.get('{$config_siteurl}statics/map/shanxi.json', function(geoJson){
        mapChart2.hideLoading();
        echarts.registerMap('shanxi', geoJson);
        mapChart2.setOption({
            title: {
                text: '各地市活动参与人数',
            },
            tooltip: {
                trigger: 'item',
                formatter: '{b}<br/>人数 {c}'
            },
            toolbox: {
                show: true,
                orient: 'vertical',
                left: 'right',
                top: 'center',
                feature: {
                    dataView: {readOnly: false},
                    restore: {},
                    saveAsImage: {}
                }
            },
            visualMap: {
                min: 1000,
                max: 6000,
                text:['High','Low'],
                realtime: false,
                calculable: true,
                inRange: {
                    color: ['lightskyblue','yellow', 'orangered']
                }
            },
            series: [
                {
                    type: 'map',
                    map: 'shanxi', // 自定义扩展图表类型
                    itemStyle:{
                        normal:{label:{show:true}},
                        emphasis:{label:{show:true}}
                    },
                    data:[
                        {name: '太原市', value: 5000},
                        {name: '晋中市', value: 2800},
                        {name: '忻州市', value: 3000},
                        {name: '吕梁市', value: 2000},
                        {name: '朔州市', value: 2100},
                        {name: '大同市', value: 3400},
                        {name: '阳泉市', value: 1500},
                        {name: '临汾市', value: 3000},
                        {name: '运城市', value: 6000},
                        {name: '长治市', value: 2900},
                        {name: '晋城市', value: 1200},
                    ],
                }
            ]
        });
    });


    // 添加男女比例分析
    var colChart = echarts.init(document.getElementById('column-statistic'));
    var myData = ['太原市', '大同市', '阳同市', '长治市', '晋城市', '朔州市', '晋中市', '运城市', '忻州市', '临汾市', '吕梁市'];
    var databeast = {
        '辅导培训': [389, 259, 262, 324, 232, 176, 196, 214, 133, 370, 268],
        '文化展览': [111, 315, 139, 375, 204, 352, 163, 258, 385, 209, 209],
        '群文活动': [227, 210, 328, 292, 241, 110, 130, 185, 392, 392, 153],
        '社会团体': [100, 350, 300, 250, 200, 150, 100, 150, 200, 250, 300],

    };
    var databeauty = {
        '辅导培训': [121, 388, 233, 309, 133, 308, 297, 283, 349, 273, 229],
        '文化展览': [200, 350, 300, 250, 200, 150, 100, 150, 200, 250, 300],
        '群文活动': [380, 129, 173, 101, 310, 393, 386, 296, 366, 268, 208],
        '社会团体': [363, 396, 388, 108, 325, 120, 180, 292, 200, 309, 223],

    };
    var timeLineData = ['辅导培训', '文化展览', '群文活动', '社会团体'];

    option = {
        baseOption: {
            backgroundColor: '#fefefe',
            timeline: {
                show: true,
                axisType: 'category',
                tooltip: {
                    show: true,
                    formatter: function(params) {
                        return params.name + '数据统计';
                    }
                },
                autoPlay: true,
                currentIndex: 6,
                playInterval: 1000,
                label: {
                    normal: {
                        show: true,
                        interval: 'auto',
                        formatter: '{value}',
                    },
                },
                data: [],
            },
            title: {
                //   text:'各活动类型帅哥美女统计',
                textStyle: {
                    color: '#000',
                    fontSize: 16,
                },
            },
            legend: {
                data: ['帅哥', '美女'],
                top: 4,
                right: '10%',
                textStyle: {
                    color: '#000',
                },
            },
            tooltip: {
                show: true,
                trigger: 'axis',
                formatter: '{b}<br/>{a}: {c}人',
                axisPointer: {
                    type: 'shadow',
                }
            },
            toolbox: {
                feature: {
                    dataView: {
                        show: true,
                        readOnly: false
                    },
                    restore: {
                        show: true
                    },
                    saveAsImage: {
                        show: true
                    }
                }
            },
            grid: [{
                show: false,
                left: '4%',
                top: 60,
                bottom: 60,
                containLabel: true,
                width: '46%',
            }, {
                show: false,
                left: '50.5%',
                top: 80,
                bottom: 60,
                width: '0%',
            }, {
                show: false,
                right: '4%',
                top: 60,
                bottom: 60,
                containLabel: true,
                width: '46%',
            }, ],

            xAxis: [{
                type: 'value',
                inverse: true,
                axisLine: {
                    show: false,
                },
                axisTick: {
                    show: false,
                },
                position: 'top',
                axisLabel: {
                    show: true,
                    textStyle: {
                        color: '#B2B2B2',
                        fontSize: 12,
                    },
                },
                splitLine: {
                    show: true,
                    lineStyle: {
                        color: '#1F2022',
                        width: 1,
                        type: 'solid',
                    },
                },
            }, {
                gridIndex: 1,
                show: false,
            }, {
                gridIndex: 2,
                type: 'value',
                axisLine: {
                    show: false,
                },
                axisTick: {
                    show: false,
                },
                position: 'top',
                axisLabel: {
                    show: true,
                    textStyle: {
                        color: '#B2B2B2',
                        fontSize: 12,
                    },
                },
                splitLine: {
                    show: true,
                    lineStyle: {
                        color: '#1F2022',
                        width: 1,
                        type: 'solid',
                    },
                },
            }, ],
            yAxis: [{
                type: 'category',
                inverse: true,
                position: 'right',
                axisLine: {
                    show: false
                },
                axisTick: {
                    show: false
                },
                axisLabel: {
                    show: false,
                    margin: 8,
                    textStyle: {
                        color: '#9D9EA0',
                        fontSize: 12,
                    },

                },
                data: myData,
            }, {
                gridIndex: 1,
                type: 'category',
                inverse: true,
                position: 'left',
                axisLine: {
                    show: false
                },
                axisTick: {
                    show: false
                },
                axisLabel: {
                    show: true,
                    textStyle: {
                        color: '#9D9EA0',
                        fontSize: 12,
                    },

                },
                data: myData.map(function(value) {
                    return {
                        value: value,
                        textStyle: {
                            align: 'center',
                        }
                    };
                }),
            }, {
                gridIndex: 2,
                type: 'category',
                inverse: true,
                position: 'left',
                axisLine: {
                    show: false
                },
                axisTick: {
                    show: false
                },
                axisLabel: {
                    show: false,
                    textStyle: {
                        color: '#9D9EA0',
                        fontSize: 12,
                    },

                },
                data: myData,
            }, ],
            series: [],

        },

        options: [],


    };
    for (var i = 0; i < timeLineData.length; i++) {
        option.baseOption.timeline.data.push(timeLineData[i]);
        option.options.push({
            title: {
                text: timeLineData[i] + '参与人数统计',
            },
            series: [{
                name: '帅哥',
                type: 'bar',
                barGap: 20,
                barWidth: 20,
                label: {
                    normal: {
                        show: false,
                    },
                    emphasis: {
                        show: true,
                        position: 'left',
                        offset: [0, 0],
                        textStyle: {
                            color: '#fff',
                            fontSize: 14,
                        },
                    },
                },
                itemStyle: {
                    normal: {
                        color: '#659F83',
                    },
                    emphasis: {
                        color: '#08C7AE',
                    },
                },
                data: databeast[timeLineData[i]],
            },


                {
                    name: '美女',
                    type: 'bar',
                    barGap: 20,
                    barWidth: 20,
                    xAxisIndex: 2,
                    yAxisIndex: 2,
                    label: {
                        normal: {
                            show: false,
                        },
                        emphasis: {
                            show: true,
                            position: 'right',
                            offset: [0, 0],
                            textStyle: {
                                color: '#fff',
                                fontSize: 14,
                            },
                        },
                    },
                    itemStyle: {
                        normal: {
                            color: '#F68989',
                        },
                        emphasis: {
                            color: '#F94646',
                        },
                    },
                    data: databeauty[timeLineData[i]],
                }
            ]
        });
        colChart.setOption(option);
    }
};
$(".J_ajaxForm button").click(function(){
    chart_change();
    return false;
});
chart_change();
</script>

</body>

</html>
