<?php

use Phpmig\Migration\Migration;

class InsertModel extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    { 
       $sql="INSERT INTO `cu_model` (`modelid`, `name`, `description`, `tablename`, `setting`, `addtime`, `items`, `enablesearch`, `disabled`, `default_style`, `category_template`, `list_template`, `show_template`, `js_template`, `sort`, `type`) VALUES
           (4, '资讯', '', 'news', '', 1480561927, 0, 0, 0, '', '', '', '', '', 0, 0),
          (5, '金融', '', 'finser', '', 1481684992, 0, 0, 0, '', '', '', '', '', 0, 0);"; 
          $container = $this->getContainer();
        $container['db']->query($sql);

    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="delete from cu_model where id >=4 and id <=5;";
    $container = $this->getContainer();
    $container['db']->query($sql);
    }
}
