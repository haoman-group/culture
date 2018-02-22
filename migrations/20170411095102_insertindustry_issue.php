<?php

use Phpmig\Migration\Migration;

class InsertindustryIssue extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="INSERT INTO `cu_industry_issue` (`id`, `cname`, `pname`, `pcategory`, `plimit`, `pleader`, `contactnum`, `plocation`, `pbriefing`, `pstage`, `prospect`, `pthumb`, `pfinancing`, `inputtime`, `status`, `uid`, `type`, `area`) VALUES
(1, '', '深圳波西房地产开发公司', 0, 1000, '王俊', '13956348921', '深圳市南山区科技园南区R2-B', '深圳波西房地产开发公司', 0, '', '/d/file/links/2017/02/58a6c363a69a5.png', 1, 1487388213, 1, 2, 0, ''),
(2, '', '文化云平台', 0, 100, '张一斐', '18618468683', '山西太原', '文化艺术服务项目', 0, '大', '/d/file/links/2017/02/58a6c1c0712f0.png', 1, 1487425552, 1, 2, 0, ''),
(3, '', '文化产业网', 0, 10000, '贺德虎', '18618468683', '山西晋城市', '文化产业', 0, '广', '/d/file/links/2017/02/58a6c363a69a5.png', 1, 1487494784, 1, 2, 0, ''),
(4, '', '体育云平台', 0, 10, '李博凯', '18618468683', '山西临汾', '云平台', 0, '好', '/d/file/links/2017/02/58a6c363a69a5.png', 1, 1487503048, 0, 2, 0, ''),
(5, '', '文化产业网1', 0, 10000, '张拓', '18618468683', '山西省忻州市', '简介', 0, '好', '/d/file/links/2017/02/58a6c363a69a5.png', 1, 1487509369, 1, 2, 0, ''),
(6, '山西灏鼎科技有限公司', '产业网', 4, 1463, '王瑞', '0351-888888', '山西太原', '文化产业网', 1, '好', '/d/file/content/2017/03/58b6466a7f2e1.jpg', 1, 1488349217, 1, 8, 1, '4,84,'),
(7, '异世界', '产业测试', 1, 1111, '王', '18210630013', '某某小区28号', '222', 1, '1111', '/d/file/content/2017/03/58b7b645cf741.jpg', 1, 1488434765, 0, 10, 1, '4,84,1298'),
(8, '', '测试项目', 1, 10000, '张一斐', '18618468683', '山西太原', '测试项目', 1, '好', '/d/file/content/2017/03/58b7b645cf741.jpg', 1, 1488893448, 0, 8, 0, '4,84,1299');";
    $container = $this->getContainer();
   $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="DELETE FROM `culture`.`cu_industry_issue` WHERE `cu_industry_issue`.`id` in(1,2,3,4,5,6,7,8);";   
    $container = $this->getContainer();
   $container['db']->query($sql);
    }
}
