<?php

use Phpmig\Migration\Migration;

class Updatecharset2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
       $sql="ALTER TABLE `cu_comartcenter` CHANGE `id_cac` `id` INT(11) NOT NULL AUTO_INCREMENT;";
       $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE `cu_comartcenter` CHANGE `id` `id_cac` INT(10) NOT NULL AUTO_INCREMENT COMMENT '群艺馆ID';";
       $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
