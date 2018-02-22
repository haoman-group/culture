<?php

// +----------------------------------------------------------------------
// | 基本服务项目公示-内容模型
// +----------------------------------------------------------------------
// | Author: libing
// +----------------------------------------------------------------------

namespace Admin\Model;

use Common\Model\Model;
class BaseContentModel extends Model {
    //自动填充
    protected $_auto = array(
        array('addtime', 'm_date', 1, 'callback'),
        array('updatetime', 'm_date', 3, 'callback')
    );
}