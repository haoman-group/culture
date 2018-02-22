<?php

use Phpmig\Migration\Migration;

class AddArea extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_area` (`id`, `pid`, `name`, `span`, `status`, `area_display`) VALUES ('25120000', '25000000', '省属', '10000', '0', NULL);

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from `cu_area` where id ='25120000';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}