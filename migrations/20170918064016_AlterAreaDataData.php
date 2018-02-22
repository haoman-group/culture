<?php

use Phpmig\Migration\Migration;

class AlterAreaDataData extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "UPDATE `cu_area_data` SET `sub_domain`='www' WHERE `area_id`='25000000';
        UPDATE `cu_area_data` SET `sub_domain`='taiyuan' WHERE `area_id`='25110000';
        UPDATE `cu_area_data` SET `sub_domain`='linfen' WHERE `area_id`='25100000';
        UPDATE `cu_area_data` SET `sub_domain`='xinzhou' WHERE `area_id`='25090000';
        UPDATE `cu_area_data` SET `sub_domain`='changzhi' WHERE `area_id`='25080000';
        UPDATE `cu_area_data` SET `sub_domain`='datong' WHERE `area_id`='25070000';
        UPDATE `cu_area_data` SET `sub_domain`='lvliang' WHERE `area_id`='25060000';
        UPDATE `cu_area_data` SET `sub_domain`='yangquan' WHERE `area_id`='25050000';
        UPDATE `cu_area_data` SET `sub_domain`='yuncheng' WHERE `area_id`='25040000';
        UPDATE `cu_area_data` SET `sub_domain`='jinzhong' WHERE `area_id`='25030000';
        UPDATE `cu_area_data` SET `sub_domain`='shuozhou' WHERE `area_id`='25020000';
        UPDATE `cu_area_data` SET `sub_domain`='jincheng' WHERE `area_id`='25010000';        
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "UPDATE `cu_area_data` SET `sub_domain`='' WHERE `area_id`='25000000';
        UPDATE `cu_area_data` SET `sub_domain`='' WHERE `area_id`='25110000';
        UPDATE `cu_area_data` SET `sub_domain`='' WHERE `area_id`='25100000';
        UPDATE `cu_area_data` SET `sub_domain`='' WHERE `area_id`='25090000';
        UPDATE `cu_area_data` SET `sub_domain`='' WHERE `area_id`='25080000';
        UPDATE `cu_area_data` SET `sub_domain`='' WHERE `area_id`='25070000';
        UPDATE `cu_area_data` SET `sub_domain`='' WHERE `area_id`='25060000';
        UPDATE `cu_area_data` SET `sub_domain`='' WHERE `area_id`='25050000';
        UPDATE `cu_area_data` SET `sub_domain`='' WHERE `area_id`='25040000';
        UPDATE `cu_area_data` SET `sub_domain`='' WHERE `area_id`='25030000';
        UPDATE `cu_area_data` SET `sub_domain`='' WHERE `area_id`='25020000';
        UPDATE `cu_area_data` SET `sub_domain`='' WHERE `area_id`='25010000';
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}