<?php

use Phpmig\Migration\Migration;

class InsertGoodsFollow extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="INSERT INTO `cu_goods_follow` (`id`, `good_id`, `uid`, `inputtime`) VALUES
         (37, 7, 0, 1487325827),
         (38, 6, 0, 1487325843),
         (39, 5, 0, 1487325852),
         (40, 7, 0, 1487325853),
         (41, 2, 0, 1487325856),
         (42, 3, 0, 1487325859),
         (43, 1, 0, 1487325907),
         (44, 6, 0, 1487504845);";
         $container = $this->getContainer();
         $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
         $sql="delete from cu_goods_follow where id >=37 and id <=44;";        
         $container = $this->getContainer();
         $container['db']->query($sql);
    }
}
