<?php

use Phpmig\Migration\Migration;

class InsertArtCategorynews extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`, `total_num`, `is_leaf`, `description`, `picture`) VALUES
        (328, 0, '最新咨询', '0', 0, '1498094161', 0, 1, 0, 0, 0, '', ''),
        (329, 328, '三晋文化', '0', 0, '1498094225', 0, 0, 0, 0, 0, '', ''),
        (330, 328, '市县动态', '0', 0, '1498094238', 0, 0, 0, 0, 0, '', ''),
        (331, 328, '艺术创作', '0', 0, '1498094250', 0, 0, 0, 0, 0, '', ''),
        (332, 328, '教育科技', '0', 0, '1498094555', 0, 0, 0, 0, 0, '', ''),
        (333, 328, '对外文化', '0', 0, '1498094569', 0, 0, 0, 0, 0, '', ''),
        (334, 328, '非遗保护', '0', 0, '1498094586', 0, 0, 0, 0, 0, '', ''),
        (335, 328, '文化市场', '0', 0, '1498094609', 0, 0, 0, 0, 0, '', ''),
        (336, 328, '文化广角', '0', 0, '1498094629', 0, 0, 0, 0, 0, '', ''),
        (337, 328, '幻灯图片', '0', 0, '1498094641', 0, 0, 0, 0, 0, '', ''),
        (338, 328, '图片新闻', '0', 0, '1498094651', 0, 0, 0, 0, 0, '', ''),
        (339, 328, '视频新闻', '0', 0, '1498094664', 0, 0, 0, 0, 0, '', ''),
        (340, 328, '通知公告', '0', 0, '1498094675', 0, 0, 0, 0, 0, '', '');

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `cu_art_category` WHEREcid=>328 and cid<=340;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}