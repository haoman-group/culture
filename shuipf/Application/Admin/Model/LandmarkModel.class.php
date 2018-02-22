<?php

namespace Admin\Model;

use Common\Model\Model;

class LandmarkModel extends Model {
    protected $_auto = array(
        array('addtime', 'm_date', 1, 'callback'),
        array('updatetime', 'm_date', 3, 'callback')
    );
    protected $_validate = array(
    );
    protected $_scope = array(
        'normal'=>array('where'=>array('isdelete'=>0,'status'=>0))
    );
}

