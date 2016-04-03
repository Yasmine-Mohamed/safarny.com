<?php

class Application_Model_UserExp extends Zend_Db_Table_Abstract
{
    protected $_name = 'post';

    public function getExperiences($city_id){
        return $this->fetchAll("city_id = $city_id")->toArray();
    }

}

