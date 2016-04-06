<?php

class Application_Model_HotelName extends Zend_Db_Table_Abstract
{
    protected $_name = 'hotel';
    function listHotels($city_id)

    {

        return $this->fetchAll("city_id=$city_id")->toArray();
    }

}

