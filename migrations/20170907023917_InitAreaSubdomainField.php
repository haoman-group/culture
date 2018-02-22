<?php

use Phpmig\Migration\Migration;

class InitAreaSubdomainField extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "UPDATE `cu_area` SET `sub_domain`='www' WHERE `id`='25120000';
        UPDATE `cu_area` SET `sub_domain`='taiyuan' WHERE `id`='25110000';
        UPDATE `cu_area` SET `sub_domain`='linfen' WHERE `id`='25100000';
        UPDATE `cu_area` SET `sub_domain`='xinzhou' WHERE `id`='25090000';
        UPDATE `cu_area` SET `sub_domain`='changzhi' WHERE `id`='25080000';
        UPDATE `cu_area` SET `sub_domain`='datong' WHERE `id`='25070000';
        UPDATE `cu_area` SET `sub_domain`='lvliang' WHERE `id`='25060000';
        UPDATE `cu_area` SET `sub_domain`='yangquan' WHERE `id`='25050000';
        UPDATE `cu_area` SET `sub_domain`='yuncheng' WHERE `id`='25040000';
        UPDATE `cu_area` SET `sub_domain`='jinzhong' WHERE `id`='25030000';
        UPDATE `cu_area` SET `sub_domain`='shuozhou' WHERE `id`='25020000';
        UPDATE `cu_area` SET `sub_domain`='jincheng' WHERE `id`='25010000';        
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "UPDATE `cu_area` SET `sub_domain`='' WHERE `pid`='25000000';        

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}