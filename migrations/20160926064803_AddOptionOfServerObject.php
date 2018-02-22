<?php

use Phpmig\Migration\Migration;

class AddOptionOfServerObject extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="INSERT INTO `cu_option` (`id`, `name`, `title`) VALUES ('2', 'server_object', '活动对象');";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
        $sql="INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('3', 'server_object', '残疾人活动', '残疾人活动', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('4', 'server_object', '进城务工人员', '进城务工人员', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('5', 'server_object', '未成年人', '未成年人', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('6', 'server_object', '老年人', '老年人', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('7', 'server_object', '馆办团队', '馆办团队', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('8', 'server_object', '社会自然人', '社会自然人', '0', '1');";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from cu_option where id =2;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);

        $sql = "delete from cu_option_field where value ='server_object';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
