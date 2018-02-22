<?php
/**
 * Created by PhpStorm.
 * User: zsun
 * Date: 1/26/17
 * Time: 10:53
 */

namespace Admin\Model;

use Common\Model\Model;

class CustomizedFilterModel extends Model
{
    //获取add的新的id
    public function getNewID()
    {
        return $this->max('id') + 1;
    }

}