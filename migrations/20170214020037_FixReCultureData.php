<?php

use Phpmig\Migration\Migration;

class FixReCultureData extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sqls = array();
        // 戏曲
        $sqls[] = "update cu_re_culture set art_cid = 14 and drama = 181 where art_cid = 181;";
        $sqls[] = "update cu_re_culture set art_cid = 14 and drama = 182 where art_cid = 182;";
        $sqls[] = "update cu_re_culture set art_cid = 14 and drama = 183 where art_cid = 183;";
        $sqls[] = "update cu_re_culture set art_cid = 14 and drama = 184 where art_cid = 184;";

        // 歌曲
        $sqls[] = "update cu_re_culture set art_cid = 19 and drama = 20 where art_cid = 20;";
        $sqls[] = "update cu_re_culture set art_cid = 19 and drama = 21 where art_cid = 21;";
        $sqls[] = "update cu_re_culture set art_cid = 19 and drama = 22 where art_cid = 22;";
        $sqls[] = "update cu_re_culture set art_cid = 19 and drama = 23 where art_cid = 23;";
        $sqls[] = "update cu_re_culture set art_cid = 19 and drama = 24 where art_cid = 24;";

        // 器乐
        $sqls[] = "update cu_re_culture set art_cid = 25 and drama = 26 where art_cid = 26;";
        $sqls[] = "update cu_re_culture set art_cid = 25 and drama = 27 where art_cid = 27;";
        $sqls[] = "update cu_re_culture set art_cid = 25 and drama = 28 where art_cid = 28;";
        $sqls[] = "update cu_re_culture set art_cid = 25 and drama = 29 where art_cid = 29;";
        $sqls[] = "update cu_re_culture set art_cid = 25 and drama = 30 where art_cid = 30;";

        // 绘画
        $sqls[] = "update cu_re_culture set art_cid = 36 and drama = 40 where art_cid = 40;";
        $sqls[] = "update cu_re_culture set art_cid = 36 and drama = 41 where art_cid = 41;";
        $sqls[] = "update cu_re_culture set art_cid = 36 and drama = 42 where art_cid = 42;";
        $sqls[] = "update cu_re_culture set art_cid = 36 and drama = 45 where art_cid = 45;";
        $sqls[] = "update cu_re_culture set art_cid = 36 and drama = 46 where art_cid = 46;";
        $sqls[] = "update cu_re_culture set art_cid = 36 and drama = 62 where art_cid = 62;";

        // 板诵
        $sqls[] = "update cu_re_culture set art_cid = 73 and drama = 82 where art_cid = 82;";
        $sqls[] = "update cu_re_culture set art_cid = 73 and drama = 83 where art_cid = 83;";
        $sqls[] = "update cu_re_culture set art_cid = 73 and drama = 84 where art_cid = 84;";

        $container = $this->getContainer();
        foreach($sqls as $sql){
            $container['db']->query($sql);
        }
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sqls = array();
        // 戏曲
        // 截止至修正数据时,只有戏曲分类有这样的数据,所以只修改戏曲数据
        $sqls[] = "update cu_re_culture set art_cid = 181 and drama = '无' where art_cid = 14;";
        $sqls[] = "update cu_re_culture set art_cid = 182 and drama = '无' where art_cid = 14;";
        $sqls[] = "update cu_re_culture set art_cid = 183 and drama = '无' where art_cid = 14;";
        $sqls[] = "update cu_re_culture set art_cid = 184 and drama = '无' where art_cid = 14;";

        $container = $this->getContainer();
        foreach($sqls as $sql){
            $container['db']->query($sql);
        }
    }
}
