<?php

use Phpmig\Migration\Migration;

class AddOptionFrequency extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="INSERT INTO `cu_option` (`id`, `name`, `title`) VALUES ('7', 'frequency_type', '活动开展频率');";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
        $sql="INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('30', 'frequency_type', '一周一次', '一周一次', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('31', 'frequency_type', '一月一次', '一月一次', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('32', 'frequency_type', '不定期', '不定期', '0', '1');
              INSERT INTO `cu_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('33', 'frequency_type', '单次培训', '单次培训', '0', '1');
              ";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql = "delete from cu_option where id =7;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);

        $sql = "delete from cu_option_field where value ='frequency_type';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
