<?php

use Phpmig\Migration\Migration;

class UpdateIFResources extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = " UPDATE `cu_policy_culture` SET `if_resources` = '1' ;
                UPDATE `cu_immaterial` SET `if_resources` = '1' ;
                UPDATE `cu_industry` SET `if_resources` = '1' ;
                UPDATE `cu_re_culture` SET `if_resources` = '1' ;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "UPDATE `cu_policy_culture` SET `if_resources` = '0' ;
                UPDATE `cu_immaterial` SET `if_resources` = '0' ;
                UPDATE `cu_industry` SET `if_resources` = '0' ;
                UPDATE `cu_re_culture` SET `if_resources` = '0' ;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}