<?php
namespace Admin\Model;

use Common\Model\Model;

class ArtModel extends Model {
  private $Category = NULL;
       protected function _initialize() {
        parent::_initialize();
        $this->Category=M('ArtCategory');
        
    }

    

}
?>