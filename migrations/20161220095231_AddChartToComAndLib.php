<?php

use Phpmig\Migration\Migration;

class AddChartToComAndLib extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql = "ALTER TABLE `culture`.`cu_library` 
                ADD COLUMN `publish_content` TEXT DEFAULT '' COMMENT '具体详情';
              ALTER TABLE `culture`.`cu_comartcenter` 
                ADD COLUMN `publish_content` TEXT DEFAULT '' COMMENT '具体详情';
                ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql = "ALTER TABLE `culture`.`cu_library` 
                DROP COLUMN `publish_content`;
              ALTER TABLE `culture`.`cu_comartcenter` 
                DROP COLUMN `publish_content`;
                ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
