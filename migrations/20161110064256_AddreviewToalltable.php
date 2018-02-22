<?php

use Phpmig\Migration\Migration;

class AddreviewToalltable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="ALTER TABLE `cu_re_culture` ADD `auditstatus` int(3)  NOT NULL DEFAULT '-1' COMMENT '审核' ;
           ALTER TABLE `cu_immaterial` ADD `auditstatus` int(3)  NOT NULL DEFAULT '-1' COMMENT '审核' ;
           ALTER TABLE `cu_industry` ADD `auditstatus` int(3)  NOT NULL DEFAULT '-1' COMMENT '审核' ;
           ALTER TABLE `cu_policy_culture` ADD `auditstatus` int(3)  NOT NULL DEFAULT '-1' COMMENT '审核';
           ALTER TABLE `cu_comartcenter` ADD `auditstatus` int(3)  NOT NULL DEFAULT '-1' COMMENT '审核';
           ALTER TABLE `cu_library` ADD `auditstatus` int(3)  NOT NULL DEFAULT '-1' COMMENT '审核';


         
      ";
      $container = $this->getContainer();
      $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql="ALTER TABLE `cu_re_culture` DROP `auditstatus`;
      ALTER TABLE `cu_immaterial` DROP `auditstatus`;
      ALTER TABLE `cu_industry` DROP `auditstatus`;
      ALTER TABLE `cu_policy_culture` DROP `auditstatus`;
      ALTER TABLE `cu_comartcenter` DROP `auditstatus`;
      ALTER TABLE `cu_library` DROP `auditstatus`;
      ";
      $container = $this->getContainer();
      $container['db']->query($sql);
    }
}
