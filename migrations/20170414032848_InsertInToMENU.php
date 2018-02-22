<?php

use Phpmig\Migration\Migration;

class InsertInToMENU extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
     
      (281, '产品展示', 0, 'Admin', 'Product', 'index', '', 1, 1, '', 0),
      (282, '产品发布记录', 281, 'Admin', 'Product', 'index', '', 1, 1, '', 0),
      (283, '未审核记录', 282, 'Admin', 'Product', 'index', '', 1, 1, '', 0),
      (287, '已审核记录', 282, 'Admin', 'Product', 'index', 'status=1', 1, 1, '', 0),
      (288, '未通过记录', 282, 'Admin', 'Product', 'index', 'status=2', 1, 1, '', 0),
      (289, '产品属性设置', 281, 'Admin', 'Product', 'index', '', 1, 1, '', 0),
      (290, '产品分类', 289, 'Admin', 'Product', 'category', '', 1, 1, '', 0),
      (291, '品牌', 289, 'Admin', 'Product', 'brand', '', 1, 1, '', 0),
      (292, '产品功能', 289, 'Admin', 'Product', 'type', '', 1, 1, '', 0),
      (293, '产业项目', 0, 'Admin', 'InPro', 'declarey', '', 1, 1, '', 0),
      (294, '产业项目发布', 293, 'Admin', 'InPro', 'index', '', 1, 1, '', 0),
      (295, '所有记录', 294, 'Admin', 'InPro', 'index', '', 1, 1, '', 0),
      (296, '未审核', 294, 'Admin', 'InPro', 'disaudit', 'type=0', 1, 1, '', 0),
      (297, '已审核', 294, 'Admin', 'InPro', 'suc', 'type=1', 1, 1, '', 0),
      (298, '未通过', 294, 'Admin', 'InPro', 'declarey', 'type=2', 1, 1, '', 0),
      (299, '消费服务', 0, 'Admin', 'Goods', 'index', '', 1, 1, '', 0),
      (300, '商家联盟', 0, 'Admin', 'Business', 'index', '', 1, 1, '', 0),
      (304, '商家审核', 300, 'Admin', 'Business', 'index', '', 1, 1, '', 0),
      (305, '审核列表', 304, 'Admin', 'Business', 'index', '', 1, 1, '', 0),
      (306, '审核通过列表', 304, 'Admin', 'Businesspass', 'index', '', 1, 1, '', 0),
      (307, '审核未通过列表', 304, 'Admin', 'Businesspass', 'nein', '', 1, 1, '', 0),
      (308, '商家图片信息', 300, 'Admin', 'Business', 'index', '', 1, 1, '', 0),
      (309, '添加', 308, 'Admin', 'Business', 'add', '', 1, 1, '', 0),
      (310, '商品', 299, 'Admin', 'Goods', 'index', '', 1, 1, '', 0),
      (311, '商品列表', 310, 'Admin', 'Goods', 'index', '', 1, 1, '', 0),
      (312, '添加', 310, 'Admin', 'Goods', 'add', '', 1, 1, '', 0),
      (313, '产业项目申报', 293, 'Admin', 'Report', 'index', '', 1, 1, '', 0),
      (314, '申报列表', 313, 'Admin', 'Report', 'index', '', 1, 1, '', 0),
      (315, '金融服务', 0, 'Admin', 'Finance', 'index', '', 1, 1, '', 0),
      (316, '诚信申请',315, 'Admin', 'Finance', 'index', '', 1, 1, '', 0),
      (317, '金融代理', 315, 'Admin', 'Finance', 'agent', '', 1, 1, '', 0),
      (318, '申请记录', 316, 'Admin', 'Finance', 'index', '', 1, 1, '', 0),
      (319, '待审核记录', 316, 'Admin', 'Finance', 'index', 'type=3', 1, 1, '', 0),
      (320, '审核通过', 316, 'Admin', 'Finance', 'index', 'type=1', 1, 1, '', 0),
      (321, '未通过记录', 316, 'Admin', 'Finance', 'index', 'type=2', 1, 1, '', 0),
      (322, '代理产品记录', 317, 'Admin', 'Finance', 'agent', '', 1, 1, '', 0),
      (323, '待审核记录', 317, 'Admin', 'Finance', 'agent', 'type=3', 1, 1, '', 0),
      (324, '已通过审核记录',317, 'Admin', 'Finance', 'agent', 'type=1', 1, 1, '', 0),
      (325,'未通过记录', 317, 'Admin', 'Finance', 'agent', 'type=2', 1, 1, '', 0);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="delete from cu_menu where id >=280 and id <=325;";   
     $container = $this->getContainer();
     $container['db']->query($sql);
    }
}
