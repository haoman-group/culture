<?php

use Phpmig\Migration\Migration;

class CreateChannelTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `culture`.`cu_channel`
         ( `id` INT(10) NOT NULL AUTO_INCREMENT , `activeid` INT(10) NOT NULL , 
        `cid` VARCHAR(20) NOT NULL COMMENT '频道ID' ,
         `name` VARCHAR(125) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
          `pushUrl` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '推流地址' ,
           `httpPullUrl` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'http拉流地址' ,
            `hlsPullUrl` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'hls拉流地址' , 
            `rtmpPullUrl` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'rtmp拉流地址' ,
             `status` INT(1) NOT NULL COMMENT '（0：空闲； 1：直播； 2：禁用； 3：直播录制）' ,
              PRIMARY KEY (`id`))
             ENGINE=MyISAM  DEFAULT CHARSET=utf8;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="DROP TABLE `cu_channel;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}