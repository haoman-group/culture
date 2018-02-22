<?php

use Phpmig\Migration\Migration;

class AddOptionTrain extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="INSERT INTO `cu_option` (`id`, `name`, `title`) VALUES ('6', 'train_type', '辅导培训活动目录');";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
        $sql="INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('24', 'train_type', '文化站人员培训', '文化站人员培训', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('25', 'train_type', '面向社会各类人培训', '面向社会各类人培训', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('26', 'train_type', '老年文化艺术培训', '老年文化艺术培训', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('27', 'train_type', '少儿文化艺术培训', '少儿文化艺术培训', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('28', 'train_type', '农民工文化艺术培训', '农民工文化艺术培训', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('29', 'train_type', '残疾人文化艺术培训', '馆办文艺团结活动', '0', '1');";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql = "delete from cu_option where id =6;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);

        $sql = "delete from cu_option_field where value ='train_type';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
