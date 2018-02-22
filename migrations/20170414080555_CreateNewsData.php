<?php

use Phpmig\Migration\Migration;

class CreateNewsData extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE IF NOT EXISTS `cu_news_data` (
           `id` mediumint(8) unsigned NOT NULL DEFAULT '0',
           `content` text COLLATE utf8_unicode_ci,
           `paginationtype` tinyint(1) NOT NULL DEFAULT '0',
           `maxcharperpage` mediumint(6) NOT NULL DEFAULT '0',
           `template` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
           `paytype` tinyint(1) unsigned NOT NULL DEFAULT '0',
          `allow_comment` tinyint(1) unsigned NOT NULL DEFAULT '1',
          `relation` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
           PRIMARY KEY (`id`)
          ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
         $sql="DROP TABLE `cu_news_data;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
