<?php
namespace Festival\Controller;

class TicketController extends BaseController {
    protected function _initialize(){
        parent::_initialize();
    }
    public function index(){
        $this->display();
    }

}
