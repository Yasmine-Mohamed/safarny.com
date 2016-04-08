<?php

class Application_Model_HotelName extends Zend_Db_Table_Abstract
{
    protected $_name = 'hotel';
    protected $_dependentTables= array('Application_Model_Hotel');

    function listHotels($city_id)

    {
        return $this->fetchAll("city_id=$city_id")->toArray();
    }



}

