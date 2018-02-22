<!doctype html>
<html lang="en" style="height: 100%;">
<head>
    <meta charset="UTF-8">
    <title>流量分析</title>

    <template file="Cudatabase/Common/_cssjs"/>
    <style>
        body{color: #fff;}
        .wraprow{height: 100%;}
        .wrapcol{height: 100%;}
        .cwrapcol{border-left: 1px solid rgba(255,255,255,0.2);border-right: 1px solid rgba(255,255,255,0.2);}
        .row-md-4{ height: 33.333%;}
        .crow{border-top: 1px solid rgba(255,255,255,0.2);border-bottom: 1px solid rgba(255,255,255,0.2);}
        .row-md-3{height: 25%;}
        .row-md-8{ height: 66.666%;}
        .row-md-6{ height: 50%;}
        .row-md-9{ height: 75%;}
        
    </style>
    <script src="//cdn.bootcss.com/echarts/3.5.3/echarts.min.js"></script>
</head>
<body class="bdanaindex">

<div class="anaindexwrap">
   <div class="row wraprow">
       <div class="col-md-4 wrapcol">
           <div id='statistic1' class="row-md-4">
               1
           </div>
           <div id='statistic2' class="row-md-4 crow">
               2
           </div>
           <div id='statistic3' class="row-md-4">
               3
           </div>
       </div>
       <!-- <div id='statistic4' class="col-md-4 wrapcol cwrapcol">
           4
       </div> -->
       <div class="col-md-4 wrapcol">
           <div id='statistic5' class="row-md-8">
               5
           </div>
           <div id='statistic6' class="row-md-4">
               6
           </div>
       </div>
   </div>
</div>

<script type="text/javascript">
    var chart_change = function() {
	var chart1 = echarts.init(document.getElementById('statistic1'));
	option1 = {
	    tooltip : {
		trigger: 'axis',
		axisPointer : {            // 坐标轴指示器，坐标轴触发有效
		    type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
		}
	    },
	    legend: {
		textStyle: {color: '#eee'},
		data: ['图书藏量', '电子图书藏量','报刊藏量','电子期刊藏量']
	    },
	    grid: {
		left: '3%',
		right: '4%',
		bottom: '3%',
		containLabel: true
	    },
	    yAxis:  {
		type: 'value'
	    },
	    xAxis: {
		type: 'category',
		data: [{value: '2012', textStyle: {color: '#fff'}}, {value: '2013', textStyle: {color: '#fff'}},{value: '2014', textStyle: {color: '#fff'}},{value: '2015', textStyle: {color: '#fff'}},{value: '2016', textStyle: {color: '#fff'}}]
	    },
	    series: [
		{
		    name: '图书藏量',
		    type: 'bar',
		    barWidth: '50%',
		    stack: '总量',
		    label: {
			normal: {
			    show: false,
			    position: 'insideRight'
			}
		    },
		    data: [320, 302, 301, 334, 390]
		},
		{
		    name: '报刊藏量',
		    type: 'bar',
		    stack: '总量',
		    label: {
			normal: {
			    show: false,
			    position: 'insideRight'
			}
		    },
		    data: [120, 132, 101, 134, 90]
		},
		{
		    name: '电子期刊藏量',
		    type: 'bar',
		    stack: '总量',
		    label: {
			normal: {
			    show: false,
			    position: 'insideRight'
			}
		    },
		    data: [220, 182, 191, 234, 290]
		},
		{
		    name: '电子图书藏量',
		    type: 'bar',
		    stack: '总量',
		    label: {
			normal: {
			    show: false,
			    position: 'insideRight'
			}
		    },
		    data: [420, 432, 301, 534, 390]
		}
	    ]
	}		
	chart1.setOption(option1)
	var chart2 = echarts.init(document.getElementById('statistic2'));
	option2 = {
	    color: ['#ff3d3d', '#00a0e9'],
	    tooltip: {
		trigger: 'item',
		position:["50%","50%"]
	    },
	    legend: {
		textStyle: {color: '#eee'},
		x: 'left',
		padding: [10, 20, 0, 20],
		data: ['志愿者', '图书馆人才队伍'],
		selected: {
		    '志愿者': true,
		    '图书馆人才队伍': true,
		}
	    },
	    grid: {
		left: '0',
		right: '3%',
		bottom: '3%',
		top: '13%',
		containLabel: true
	    },
	    xAxis: {
		type: 'category',
		boundaryGap: false,
		splitLine: { //网格线
		    show: false,
		    lineStyle: {
			color: ['#b1b1b1'],
			type: 'dashed'
		    }
		},
		data: [{value: '2012', textStyle: {color: '#fff'}}, {value: '2013', textStyle: {color: '#fff'}},{value: '2014', textStyle: {color: '#fff'}},{value: '2015', textStyle: {color: '#fff'}},{value: '2016', textStyle: {color: '#fff'}}]
	    },
	    yAxis: {
		splitLine: { //网格线
		    show: false,
		    lineStyle: {
			color: ['#b1b1b1'],
			type: 'dashed'
		    }
		}
	    },
	    series: [{
		name: '志愿者',
		type: 'line',
		data: ['500', '300', '280', '290', '230'],
		label: {
		    normal: {
			show: true,
			position: 'top' //值显示
		    }
		}
	    }, {
		name: '图书馆人才队伍',
		type: 'line',
		data: ['150', '100', '198', '140', '180'],
		label: {
		    normal: {
			show: true,
			position: 'top'
		    }
		}
	    }]
	};
	chart2.setOption(option2);

	var chart3 = echarts.init(document.getElementById('statistic3'));
	option3 = {
	    title : {
		textStyle: {color: '#eee'},
	        text: '经费投入情况',
	        x:'center'
	    },
	    tooltip : {
	        trigger: 'item',
	        formatter: "{a} <br/>{b} : {c} ({d}%)"
	    },
	    legend: {
		textStyle: {color: '#eee'},
	        orient: 'vertical',
	        left: 'left',
	        data: ['新增藏量购置费','免费开放本地经费','电子资源购置费', '其他']
	    },
	    series : [
	        {
	            name: '访问来源',
	            type: 'pie',
	            radius : '55%',
	            center: ['50%', '60%'],
	            data:[
	                {value:335, name:'新增藏量购置费'},
	                {value:1548, name:'免费开放本地经费'},
	                {value:310, name:'电子资源购置费'},
	                {value:210, name:'其他'}
	            ],
	            itemStyle: {
	                emphasis: {
	                    shadowBlur: 10,
	                    shadowOffsetX: 0,
	                    shadowColor: 'rgba(0, 0, 0, 0.5)'
	                }
	            }
	        }
	    ]
	};
	chart3.setOption(option3);
    var chart4 = echarts.init(document.getElementById('statistic4'));
        chart4.showLoading();
        $.get('{$config_siteurl}statics/map/shanxi.json', function(geoJson){
            chart4.hideLoading();
            echarts.registerMap('shanxi', geoJson);
            chart4.setOption({
                title: {
		            textStyle: {color: '#eee'},
                    text: '地区浏览量（PV）',
                },
                tooltip: {
                    trigger: 'item',
                    formatter: '{b}<br/>{c}'
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
                    min: 11000,
                    max: 16000, 
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
                            {name: '太原市', value: 15000},
                            {name: '晋中市', value: 12800},
                            {name: '忻州市', value: 13000},
                            {name: '吕梁市', value: 12000},
                            {name: '朔州市', value: 12100},
                            {name: '大同市', value: 13400},
                            {name: '阳泉市', value: 11500},
                            {name: '临汾市', value: 13000},
                            {name: '运城市', value: 16000},
                            {name: '长治市', value: 12900},
                            {name: '晋城市', value: 11200},
                        ],
                    }
                ]
            });
        });
	var chart5 = echarts.init(document.getElementById('statistic5'));
	option5 = {
	    tooltip : {
		trigger: 'axis',
		axisPointer : {            // 坐标轴指示器，坐标轴触发有效
		    type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
		}
	    },
	    legend: {
		textStyle: {color: '#eee'},
		data: ['图书藏量', '电子图书藏量','报刊藏量','电子期刊藏量']
	    },
	    grid: {
		left: '3%',
		right: '4%',
		bottom: '3%',
		containLabel: true
	    },
	    xAxis:  {
		type: 'value',
		textStyle: {color: '#fff'},
	    },
	    yAxis: {
		type: 'category',
		data: [{value: '太原', textStyle: {color: '#fff'}}, {value: '晋中', textStyle: {color: '#fff'}}, {value: '忻州', textStyle: {color: '#fff'}}, {value: '朔州', textStyle: {color: '#fff'}}, {value: '大同', textStyle: {color: '#fff'}}, {value: '阳泉', textStyle: {color: '#fff'}}, {value: '吕梁', textStyle: {color: '#fff'}}, {value: '临汾', textStyle: {color: '#fff'}}, {value: '运城', textStyle: {color: '#fff'}}, {value: '长治', textStyle: {color: '#fff'}}, {value: '晋城', textStyle: {color: '#fff'}}]
	    },
	    series: [
		{
		    name: '图书藏量',
		    type: 'bar',
		    barWidth: '50%',
		    stack: '总量',
		    label: {
			normal: {
			    show: true,
			    position: 'insideRight'
			}
		    },
		    data: [320, 302, 301, 334, 390, 226, 530, 286, 323, 425, 173]
		},
		{
		    name: '报刊藏量',
		    type: 'bar',
		    stack: '总量',
		    label: {
			normal: {
			    show: true,
			    position: 'insideRight'
			}
		    },
		    data: [120, 132, 101, 134, 90, 97, 108, 197, 96, 115, 84]
		},
		{
		    name: '电子期刊藏量',
		    type: 'bar',
		    stack: '总量',
		    label: {
			normal: {
			    show: true,
			    position: 'insideRight'
			}
		    },
		    data: [220, 182, 191, 234, 290, 238, 260, 170, 201, 254, 197]
		},
		{
		    name: '电子图书藏量',
		    type: 'bar',
		    stack: '总量',
		    label: {
			normal: {
			    show: true,
			    position: 'insideRight'
			}
		    },
		    data: [420, 432, 301, 534, 390, 476, 489, 354, 510, 388, 480]
		}
	    ]
	}		
	chart5.setOption(option5);

	var chart6 = echarts.init(document.getElementById('statistic6'));
	option6 = {
	    tooltip: {
	        trigger: 'item',
	        formatter: "{a} <br/>{b}: {c} ({d}%)"
	    },
	    legend: {
		textStyle: {color: '#eee'},
	        orient: 'vertical',
	        x: 'left',
	        data:['教师','中学生','本科生','研究生','其他']
	    },
	    series: [
	        {
	            name:'读者分布',
	            type:'pie',
	            radius: ['50%', '70%'],
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
	            data:[
	                {value:335, name:'教师'},
	                {value:234, name:'中学生'},
	                {value:1548, name:'本科生'},
	                {value:310, name:'研究生'},
	                {value:135, name:'其他'}
	            ]
	        }
	    ]
	};

	chart6.setOption(option6);
    };
    chart_change();
</script>
</body>
</html>
