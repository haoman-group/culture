<?php

use Phpmig\Migration\Migration;

class InsertFinanceAgent extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="INSERT INTO `cu_finance_agent` (`id`, `objid`, `money`, `method`, `purpose`, `profit`, `term`, `uid`, `inputtime`, `status`, `imethod`) VALUES
           (3, 0, 5000, 1, '', '', 0, 2, 1487316990, 0, ''),
           (4, 0, 1000, 1, '房地产项目', '25%', 10, 2, 1487388241, 0, ''),
           (5, 45, 100, 2, '项目开发', '100%', 10, 2, 1487425603, 1, ''),
           (6, 46, 10000, 3, '网站建设', '100%', 5, 2, 1487494838, 1, ''),
           (7, 47, 10, 0, '网站建设', '1000%', 2, 2, 1487503070, 2, '银行贷款'),
            (8, 48, 10000, 0, '线下推广', '1000%', 6, 2, 1487509402, 1, '其他');";
      $container = $this->getContainer();
      $container['db']->query($sql);      
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql="DELETE FROM `culture`.`cu_finance_agent` ;";  
      $container = $this->getContainer();
      $container['db']->query($sql);
    }
}
