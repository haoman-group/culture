<?php

use Phpmig\Migration\Migration;

class AddMeun extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
    $sql="INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(165, '代办事件', 0, 'Admin', 'Reminder', 'index', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(156, '资源采集', 0, 'Admin', 'Resources', 'index', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(167, '资源检索', 0, 'Admin', 'ResourceSearch', 'index', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(175, '资源统计', 0, 'Admin', 'ResourceStatistics', 'index', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(177, '资源分析', 0, 'Admin', 'ResourceAnalysis', 'index', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(157, '文化艺术', 156, 'Admin', 'Art', 'index', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(168, '文化艺术', 167, 'Admin', 'Art', 'search', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(158, '公共文化', 156, 'Admin', 'Common', 'index', '', 0, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(169, '公共文化', 167, 'Admin', 'Common', 'search', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(159, '非物质文化遗产', 156, 'Admin', 'Immaterial', 'index', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(172, '非物质文化遗产', 167, 'Admin', 'Immaterial', 'search', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(160, '文化产业', 156, 'Admin', 'Industry', 'index', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(173, '文化产业', 167, 'Admin', 'Industry', 'search', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(161, '文化政策', 156, 'Admin', 'Policy', 'index', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(174, '文化政策', 167, 'Admin', 'Policy', 'search', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(166, '代办事项', 165, 'Admin', 'Action', 'index', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(162, '图书馆', 158, 'Admin', 'Library', 'index', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(170, '图书馆', 169, 'Admin', 'Library', 'search', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(163, '群艺馆', 158, 'Admin', 'ComArtCenter', 'index', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(171, '群艺馆', 169, 'Admin', 'ComArtCenter', 'search', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(176, '资源统计', 175, 'Admin', 'Statistics', 'index', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(178, '点击量', 177, 'Admin', 'ClickNum', 'index', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(179, '下载量', 177, 'Admin', 'DownLoadNum', 'index', '', 1, 1, '', 0);
           ";
    $container = $this->getContainer();
    $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
    $sql="delete from cu_menu where id in ('156','165','167','175','177','157','168','158','169','159','172','160','173','161','174','166','162','170','163','171','176','178','179');";    
    $container = $this->getContainer();
    $container['db']->query($sql);
    }
}
