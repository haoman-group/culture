<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员个人空间首页右侧 view_member_home_indexright
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Behavior;

use Libs\System\Behavior;

class ViewMemberHomeIndexrightBehavior extends Behavior {

    public function run(&$params) {
        $this->assign('userinfo', $params);
        $this->display();
    }

}
