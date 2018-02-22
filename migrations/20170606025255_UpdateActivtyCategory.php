<?php

use Phpmig\Migration\Migration;

class UpdateActivtyCategory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(220, 0, '文化活动', '0', 0, '1496717125', 0, 1, 1, 0, 1, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(221, 220, '辅导', '0', 0, '1496717159', 0, 0, 1, 0, 0, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(222, 220, '培训', '0', 0, '1496717191', 0, 0, 1, 0, 0, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(223, 220, '讲座', '0', 0, '1496717191', 0, 0, 1, 0, 0, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(224, 220, '展览', '0', 0, '1496717191', 0, 0, 1, 0, 0, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(225, 220, '展演', '0', 0, '1496717191', 0, 0, 1, 0, 0, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(226, 220, '赛事', '0', 0, '1496717191', 0, 0, 1, 0, 0, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(227, 220, '活动', '0', 0, '1496717191', 0, 0, 1, 0, 0, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(228, 220, '团体', '0', 0, '1496717191', 0, 1, 1, 0, 0, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(229, 228, '官办团体', '0', 0, '1496717191', 0, 0, 1, 0, 0, '', '');
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES(230, 228, '社会团体', '0', 0, '1496717191', 0, 0, 1, 0, 0, '', '');


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `culture`.`cu_art_category` WHERE `cid`='220';
DELETE FROM `culture`.`cu_art_category` WHERE `cid`='221';
DELETE FROM `culture`.`cu_art_category` WHERE `cid`='222';
DELETE FROM `culture`.`cu_art_category` WHERE `cid`='223';
DELETE FROM `culture`.`cu_art_category` WHERE `cid`='224';
DELETE FROM `culture`.`cu_art_category` WHERE `cid`='225';
DELETE FROM `culture`.`cu_art_category` WHERE `cid`='226';
DELETE FROM `culture`.`cu_art_category` WHERE `cid`='227';
DELETE FROM `culture`.`cu_art_category` WHERE `cid`='228';
DELETE FROM `culture`.`cu_art_category` WHERE `cid`='229';
DELETE FROM `culture`.`cu_art_category` WHERE `cid`='230';


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}