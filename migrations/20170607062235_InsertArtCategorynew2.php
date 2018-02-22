<?php

use Phpmig\Migration\Migration;

class InsertArtCategorynew2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(241, 3, '保护措施', '0', 0, '1496817562', 0, 1, 1, 0, 0, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(242, 241, '依法保护', '0', 0, '1496817643', 0, 0, 0, 0, 0, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(243, 241, '整体性保护', '0', 0, '1496817635', 0, 0, 0, 0, 0, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(244, 241, '抢救性保护', '0', 0, '1496817623', 0, 0, 0, 0, 0, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(245, 241, '生产性保护', '0', 0, '1496817613', 0, 1, 1, 0, 0, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(246, 245, '国家级生产性保护示范基地', '0', 0, '1496817276', 0, 0, 1, 0, 1, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(247, 245, '省级生产性保护示范基地', '0', 0, '1496817287', 0, 0, 1, 0, 1, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(248, 241, '创新性保护', '0', 0, '1496817772', 0, 1, 1, 0, 0, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(249, 248, '乡村文化记忆工程', '0', 0, '1496817670', 0, 1, 1, 0, 0, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(250, 249, '试点工作', '0', 0, '1496817695', 0, 1, 1, 0, 0, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(251, 250, '第一批', '0', 0, '1496817401', 0, 0, 1, 0, 1, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(252, 250, '第二批', '0', 0, '1496817409', 0, 0, 1, 0, 1, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(253, 249, '推广工作', '0', 0, '1496817689', 0, 0, 0, 0, 1, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(254, 248, '中国非物质文化遗产传承人群研修研习培训计划', '0', 0, '1496817678', 0, 1, 1, 0, 0, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(255, 254, '研培院校', '0', 0, '1496817463', 0, 0, 1, 0, 1, '', '');
UPDATE `culture`.`cu_art_category` SET `name`='名录' WHERE `cid`='75';
UPDATE `culture`.`cu_art_category` SET `isdelete`='1' WHERE `cid`='76';
UPDATE `culture`.`cu_art_category` SET `isdelete`='1' WHERE `cid`='77';
UPDATE `culture`.`cu_art_category` SET `isdelete`='1' WHERE `cid`='78';
UPDATE `culture`.`cu_art_category` SET `isdelete`='1' WHERE `cid`='79';



        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from cu_art_category where cid >=241 and cid <=255;
        UPDATE `culture`.`cu_art_category` SET `name`='代表性项目及代表性传承人' WHERE `cid`='75';
UPDATE `culture`.`cu_art_category` SET `isdelete`='0' WHERE `cid`='76';
UPDATE `culture`.`cu_art_category` SET `isdelete`='0' WHERE `cid`='77';
UPDATE `culture`.`cu_art_category` SET `isdelete`='0' WHERE `cid`='78';
UPDATE `culture`.`cu_art_category` SET `isdelete`='0' WHERE `cid`='79';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}