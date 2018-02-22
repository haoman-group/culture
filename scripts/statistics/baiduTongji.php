<?php 
use Libs\Util\BaiduTJ;
error_reporting(E_ERROR);
require_once "./shuipf/Libs/Util/BaiduTJ.class.php";
$baiduTj = new BaiduTJ();
//获取可用网站列表
// $siteList = $baiduTj->getSiteList();
//www.sx-cc.com 的site_id 为11080954

//获取当前时间和昨天
$today = new Datetime('now');
$interval = new DateInterval('P1D');
$today->sub($interval);
$yesterday = $today->format('Ymd');

//接口字段说明：https://tongji.baidu.com/dataapi/file/TongjiApiFile.pdf
//获取趋势报告
$trend = $baiduTj->getReportData(array('site_id' => 11080954,                   //站点ID
    'method' => 'trend/time/a',             //趋势分析报告
    'start_date' => $yesterday,             //所查询数据的起始日期
    'end_date' => $yesterday,               //所查询数据的结束日期
    'metrics' => 'pv_count,visit_count,ip_count,visitor_count,new_visitor_count',  //所查询指标为PV和UV
    'max_results' => 0,                     //返回所有条数
    'gran' => 'day',                        //按天粒度)
));
//获取受访页面
$visit = $baiduTj->getReportData(array('site_id' => 11080954,                   
    'method' => 'overview/getTimeTrendRpt',         
    'start_date' => $yesterday,             
    'end_date' => $yesterday,               
    'metrics' => 'pv_count,visitor_count,ip_count',  //所查询指标
    'max_results' => 0,              
    'gran' => 'day',                    
));
var_dump($baiduTj->header);
// var_dump($baiduTj->getError());
var_dump($visit['data'][0]['result']);
var_dump($visit['data'][0]['result']['items'][1]);