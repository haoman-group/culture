<?php

use Phpmig\Migration\Migration;

class AddOptionOfFundResource extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
         $sql = "INSERT INTO cu_option (name,title) value ('fund_source','经费投入来源');
                INSERT INTO `cu_option_field` VALUES (1,'fund_source','地方财政配套资金','地方财政配套资金',0,1),
                (2,'fund_source','中央补助地方资金','中央补助地方资金',0,1);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from cu_option where name='fund_source';
                delete from cu_option_field where name='fund_source';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
