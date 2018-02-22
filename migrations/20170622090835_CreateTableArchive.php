<?php

use Phpmig\Migration\Migration;

class CreateTableArchive extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_archive` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  `intro` VARCHAR(1045) NULL,
  `addtime` INT NULL,
  `updatetime` INT NULL,
  `video` VARCHAR(245) NULL,
  `type` INT NULL,
  `category` VARCHAR(45) NULL,
  `images` TEXT NULL,
  `content_json` TEXT NULL,
  `if_position` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table `cu_archive`

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}