<?php

class Application_Model_Location extends Zend_Db_Table_Abstract
{
    protected $_name = 'location';

    function listLocations($city_id)
    {
        return $this->fetchAll("city_id=$city_id")->toArray();
    }
}

