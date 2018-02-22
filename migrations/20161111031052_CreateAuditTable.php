<?php

use Phpmig\Migration\Migration;
class CreateAuditTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
    $sql="CREATE TABLE IF NOT EXISTS `cu_audit` (
    `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
    `audit_id` int(10) NOT NULL COMMENT '审核人',
    `reason` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '不通过的原因',
    `category` int(10)  NOT NULL COMMENT '大分类',
    `cid` int(10) NOT NULL COMMENT 'id',
    `addtime` DATETIME NULL,
     PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='审核表' AUTO_INCREMENT=1;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
       $sql="drop table cu_audit;";  
      $container = $this->getContainer();
      $container['db']->query($sql);
    }
}
