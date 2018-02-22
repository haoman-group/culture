
function barimg(id,data,count){
    // alert(count)
    var myChart = echarts.init(document.getElementById(id));
    // alert(count)
    var option = {
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: null // 默认为直线，可选为：'line' | 'shadow'
        },
        formatter: '<div style="text-align: center;">项目类别</div>{b} : {c}'
    },
    grid: {
        left: '3%',
        right: '4%',
        top: '10%',
        height: 280, //设置grid高度
        containLabel: true
    },
    xAxis: [{
        type: 'value',
        axisLabel: {
            show: false,
            formatter: '{value} %' 
        },
        axisTick: {
            show: false
        },
        axisLine: {
            show: false
        },
        splitLine: {
            show: false
        }

    }],
    yAxis: [{
        type: 'category',
        boundaryGap: true,
        axisTick: {
            show: false
        },
        axisLine: {
            show: false
        },
        axisLabel: {
            interval: null
        },
        data: ['新闻出版发行服务', '广播电视电影服务', '文化艺术服务', '文化信息传输服务', '文化创意和设计服务', '文化休闲娱乐服务', '工艺美术品的生产','文化产品生产的辅助生产','文化用品的生产','文化专用设备的生产'],
        splitLine: {
            show: false
        }
    }],
    series: [{
        name: '项目类别',
        type: 'bar',
        barWidth: 25,
        label: {
            normal: {
                show: true,
                position: 'right'
            }

        },
        data: data,
        barWidth:12,
        itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                },
                normal:{
                label:{
                    show: true,
                    formatter: '{c}',///
                    position: ['5', '-15'],
                    // position:top
                },
                color:function (params){
                        var colorList = ['#afd8f8','#f6bd0f','#8bba00','#ff8e46','#008e8e','#d64646','#8e468e','#588526','#008ed6','#9d080d'];
                        return colorList[params.dataIndex];
                    },
                  labelLine :{show:true}
                }

            }
    }]
    };
    myChart.setOption(option);
}


function bieimg(id,data){
	// alert()
	var bieChart = echarts.init(document.getElementById(id));

        // 指定图表的配置项和数据
        var option = {
    //         title : {
    //     text: '某站点用户访问来源',
    //     subtext: '纯属虚构',
    //     x:'center'
    // },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'horizontal',
        left: 60,
        bottom:40,
        itemGap:18,
        align:'left',
        itemWidth:14,
        data: ['策划立项','建设实施','竣工达产','项目续建']
    },
    calculable : true,
    series : [
        {
            name: '项目阶段',
            type: 'pie',
            radius : '45%',
            center: ['50%', '30%'],
            data:[
                {value:data[0]['sum'], name:'策划立项'},
                {value:data[1]['sum'], name:'建设实施'},
                {value:data[2]['sum'], name:'竣工达产'},
                
                {value:data[3]['sum'], name:'项目续建'}
            ],
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                },
                 normal:{
                  label:{
                    show: true,
                    formatter: '{d}%'
                  },
                  labelLine :{show:true}
                }

            }
        }
    ]
        };

        // 使用刚指定的配置项和数据显示图表。
        bieChart.setOption(option);
}

function huanimg(id,data){
    var huanChart = echarts.init(document.getElementById(id));
    var option = {
        tooltip: {
        trigger: 'item',
        formatter: "{a} <br/>{b}: {c} ({d}%)"
    },
    legend: {
        // orient: 'vertical',
        orient:'horizontal',
        x: 'left',
        bottom : 30,
        itemWidth:14,
        data:['太原市','大同市','阳泉市','长治市','晋城市','朔州市','晋中市','运城市','忻州市','临汾市','吕梁市']
    },
    series: [
        {
            name:'区域',
            type:'pie',
            radius: ['38%', '45%'],
            center: ['50%', '30%'],
            avoidLabelOverlap: false,
            
            data:[
                {value:data[0], name:'太原市'},
                {value:data[1], name:'大同市'},
                {value:data[2], name:'阳泉市'},
                {value:data[3], name:'长治市'},
                {value:data[4], name:'晋城市'},
                {value:data[5], name:'朔州市'},
                {value:data[6], name:'晋中市'},
                {value:data[7], name:'运城市'},
                {value:data[8], name:'忻州市'},
                {value:data[9], name:'临汾市'},
                {value:data[10], name:'吕梁市'},
            ],
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                },
                 normal:{
                  label:{
                    show: true,
                    formatter: '{d}%'
                  },
                  labelLine :{show:true}
                }

            }
        }
    ]
    };
    huanChart.setOption(option);
}


function pie_jimg(id,data){
    var pie_jChart = echarts.init(document.getElementById(id));
    // var option = {
    var option = {
         tooltip: {
        trigger: 'axis',
        axisPointer: { // 坐标轴指示器，坐标轴触发有效
            type: 'shadow' // 默认为直线，可选为：'line' | 'shadow'
        }
    },
    legend: {
        data: ['100万以下', '100-1000万', '1000万-5000万', '5000-1亿', '1-10亿', '10亿以上' ],
        // top: 'top',
        orient:'horizontal',
        // left: 'right'
        itemWidth:14,
        bottom:0,


    },
    // grid: {
    //     left: '3%',
    //     right: '15%',
    //     bottom: '3%',
    //     containLabel: true
    // },
    yAxis: {
        type: 'value'
    },
    xAxis: {
        type: 'category',
        data: ['投资规模'],
        axisLabel:{
                    textStyle:{
                        color:'#fff',
                    },
                    
                },
    },
    series: [{
            name: '100万以下',
            type: 'bar',
            // stack: '总量',
            label: {
                normal: {
                    show: true,
                    position: 'top'
                }
            },
            data: [data[0], ]
        }, {
            name: '100-1000万',
            type: 'bar',
            //stack: '总量',
            label: {
                normal: {
                    show: true,
                    position: 'top'
                }
            },
            data: [data[1], ]
        }, {
            name: '1000-5000万',
            type: 'bar',
            //stack: '总量',
            label: {
                normal: {
                    show: true,
                    position: 'top'
                }
            },
            data: [data[2], ]
        }, {
            name: '5000-1亿',
            type: 'bar',
            //stack: '总量',
            label: {
                normal: {
                    show: true,
                    position: 'top'
                }
            },
            data: [data[3], ]
        }, {
            name: '1-10亿',
            type: 'bar',
            //stack: '总量',
            label: {
                normal: {
                    show: true,
                    position: 'top'
                }
            },
            data: [data[4], ]
        }, {
            name: '10亿以上',
            type: 'bar',
            //stack: '总量',
            label: {
                normal: {
                    show: true,
                    position: 'top'
                }
            },
            data: [data[5], ]
        }, 

    ]
            
    };
    pie_jChart.setOption(option);   
    // },
    // pie_jChart.setOption(option);
}