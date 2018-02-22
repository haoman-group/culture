<?php

use Phpmig\Migration\Migration;

class CreateTableAreaData extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_area_data` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `area_id` INT NULL,
  `index_slide` VARCHAR(1025) NULL COMMENT '首页轮播',
  `pub_slide` VARCHAR(1025) NULL COMMENT '公共服务轮播',
  `create_time` INT(10) NULL,
  `update_time` INT(10) NULL,
  `status` INT NULL,
  PRIMARY KEY (`id`))
COMMENT = '各级地区数据信息表';
";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE `cu_area_data`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
