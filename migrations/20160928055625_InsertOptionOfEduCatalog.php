<?php

use Phpmig\Migration\Migration;

class InsertOptionOfEduCatalog extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="INSERT INTO `cu_option` (`id`, `name`, `title`) VALUES ('5', 'officeact_type', '馆办活动目录');";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
        $sql="INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('18', 'officeact_type', '文化演出活动', '文化演出活动', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('19', 'officeact_type', '文化展览活动', '文化展览活动', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('20', 'officeact_type', '文化赛事活动', '文化赛事活动', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('21', 'officeact_type', '理论研讨活动', '理论研讨活动', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('22', 'officeact_type', '对外交流活动', '对外交流活动', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('23', 'officeact_type', '馆办文艺团结活动', '馆办文艺团结活动', '0', '1');";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql = "delete from cu_option where id =5;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);

        $sql = "delete from cu_option_field where value ='officeact_type';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
