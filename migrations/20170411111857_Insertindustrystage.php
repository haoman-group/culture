<?php

use Phpmig\Migration\Migration;

class Insertindustrystage extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="INSERT INTO `cu_industry_stage` (`sid`, `stagename`) VALUES
         (1, '策划立项'),
          (2, '建设实施'),
          (3, '竣工达产'),
          (4, '项目续建');";
      $container = $this->getContainer();
      $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="DELETE FROM `culture`.`cu_industry_stage` WHERE `cu_industry_stage`.`id` in(1,2,3,4);";
     $container = $this->getContainer();
      $container['db']->query($sql);
    }
}
