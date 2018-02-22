<?php

use Phpmig\Migration\Migration;

class AddOptionOfCommTypes extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="INSERT INTO `cu_option` (`id`, `name`, `title`) VALUES ('4', 'commend_type', '表彰类型');";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
        $sql="INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('14', 'commend_type', '国家级', '国家级', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('15', 'commend_type', '省级', '省级', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('16', 'commend_type', '市级', '市级', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('17', 'commend_type', '县级', '县级', '0', '1');";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from cu_option where id =4;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);

        $sql = "delete from cu_option_field where value ='commend_type';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
