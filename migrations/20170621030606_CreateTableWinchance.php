<?php

use Phpmig\Migration\Migration;

class CreateTableWinchance extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `culture`.`cu_winchance`
         ( `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
         `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
         `keyword` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '关键字' ,
          `image` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
          `url` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
          `addtime` VARCHAR(25) NOT NULL , `isdelete` INT(1) NOT NULL DEFAULT '0' ,
           PRIMARY KEY (`id`))
         ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT = '文创精品';



        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table `cu_winchance`

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}