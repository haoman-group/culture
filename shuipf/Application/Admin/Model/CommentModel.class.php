<?php


namespace Admin\Model;

use Common\Model\Model;
class CommentModel extends Model {
	protected $_auto = array(
        array('addtime', 'm_date', 1, 'callback'),
        array('updatetime', 'm_date', 3, 'callback'),
       
    );
}