<?php

use Phpmig\Migration\Migration;

class AddOptionOfEduCatalog extends Migration
{
    /**
     * Do the migration
     */
     public function up()
    {
        $sql="INSERT INTO `cu_option` (`id`, `name`, `title`) VALUES ('3', 'edu_act_catalog', '教育活动目录');";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
        $sql="INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('9',  'edu_act_catalog', '讲座', '讲座', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('10', 'edu_act_catalog', '培训', '培训', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('11', 'edu_act_catalog', '展览活动', '展览活动', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('12', 'edu_act_catalog', '阅读推广活动', '阅读推广活动', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('13', 'edu_act_catalog', '图书馆业务培训', '图书馆业务培训', '0', '1');";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from cu_option where id =3;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);

        $sql = "delete from cu_option_field where value ='edu_act_catalog';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}