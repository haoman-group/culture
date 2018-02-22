<?php

use Phpmig\Migration\Migration;

class Updatecharset extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
       $sql="ALTER TABLE `cu_policy_culture` CHANGE `id_publish` `id` INT(10) NOT NULL AUTO_INCREMENT;
            ALTER TABLE `cu_industry` CHANGE `id_ind` `id` INT(11) NOT NULL AUTO_INCREMENT;
            ALTER TABLE `cu_library` CHANGE `id_lib` `id` INT(11) NOT NULL AUTO_INCREMENT;
            ALTER TABLE `cu_comartcenter` CHANGE `id_cac` `id` INT(11) NOT NULL AUTO_INCREMENT;
       ";
       $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE `cu_policy_culture` CHANGE `id` `id_id_publish` INT(10) NOT NULL AUTO_INCREMENT COMMENT '群艺馆ID';
             ALTER TABLE `cu_industry` CHANGE `id` `id_ind` INT(11) NOT NULL AUTO_INCREMENT;
             ALTER TABLE `cu_library` CHANGE `id` `id_lib` INT(11) NOT NULL AUTO_INCREMENT;
             ALTER TABLE `cu_comartcenter` CHANGE `id` `id_cac` INT(11) NOT NULL AUTO_INCREMENT;
        ";
       $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
