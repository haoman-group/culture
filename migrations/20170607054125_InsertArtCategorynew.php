<?php

use Phpmig\Migration\Migration;

class InsertArtCategorynew extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES
                                              (231, 3, '基础设施', '0', 0, '1496806957', 0, 1, 1, 0, 0, '', ''),
                                              (232, 3, '宣传展示', '0', 0, '1496806985', 0, 1, 1, 0, 0, '', ''),
                                              (233, 231, '传习中心', '0', 0, '1496816882', 0, 0, 1, 0, 1, '', ''),
                                              (234, 231, '传习点', '0', 0, '1496816891', 0, 0, 1, 0, 1, '', ''),
                                               (235, 231, '工作站', '0', 0, '1496816899', 0, 0, 1, 0, 1, '', ''),
                                              (236, 231, '工作室', '0', 0, '1496816906', 0, 0, 1, 0, 1, '', ''),
                                              (237, 232, '系列宣传活动', '0', 0, '1496819196', 0, 0, 1, 0, 1, '', ''),
                                               (238, 232, '文化和自然遗产日活动', '0', 0, '1496819326', 0, 0, 1, 0, 1, '', ''),
                                              (239, 232, '节庆活动', '0', 0, '1496819679', 0, 0, 1, 0, 1, '', ''),
                                              (240, 232, '有关展会', '0', 0, '1496819684', 0, 0, 1, 0, 1, '', '');

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
       $sql="delete from cu_art_category where cid >=231 and id <=240;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}