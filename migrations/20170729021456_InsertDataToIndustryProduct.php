<?php

use Phpmig\Migration\Migration;

class InsertDataToIndustryProduct extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_industry_product` (`id`, `title`, `keyword`, `image`, `url`, `addtime`, `updatetime`, `isdelete`) VALUES(1, '', '', '', '###', '0000-00-00 00:00:00', '2017-07-29 10:21:38', 0);
INSERT INTO `cu_industry_product` (`id`, `title`, `keyword`, `image`, `url`, `addtime`, `updatetime`, `isdelete`) VALUES(2, '', '', '', '###', '0000-00-00 00:00:00', '2017-07-29 10:32:07', 0);
INSERT INTO `cu_industry_product` (`id`, `title`, `keyword`, `image`, `url`, `addtime`, `updatetime`, `isdelete`) VALUES(3, '', '', '', '###', '0000-00-00 00:00:00', '2017-07-29 10:13:29', 0);
INSERT INTO `cu_industry_product` (`id`, `title`, `keyword`, `image`, `url`, `addtime`, `updatetime`, `isdelete`) VALUES(4, '', '', '', '###', '0000-00-00 00:00:00', '2017-07-29 10:03:01', 0);
INSERT INTO `cu_industry_product` (`id`, `title`, `keyword`, `image`, `url`, `addtime`, `updatetime`, `isdelete`) VALUES(5, '', '', '', '###', '0000-00-00 00:00:00', '2017-07-29 10:32:23', 0);


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "truncate table `cu_industry_product`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}