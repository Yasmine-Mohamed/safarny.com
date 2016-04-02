<?php

class Application_Model_City extends Zend_Db_Table_Abstract
{
    protected $_name = 'city';

    public function listOneCity($cid){
        return $this->find($cid)->toArray();
    }

}

