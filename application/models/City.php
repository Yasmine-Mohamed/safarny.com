<?php

class Application_Model_City extends Zend_Db_Table_Abstract
{
    protected $_name = 'city';
    protected $_dependentTables= array('Application_Model_Car','Application_Model_Hotel','Application_Model_HotelName','Application_Model_Location');
    protected $_referenceMap = array('cities'=>array(
        'columns'=>array('city_id'),
        'refTableClass'=>'Application_Model_Country',
        'refColumns'=>array('city_id'),
        'onDelete'=>'cascade'

    ));

    public function listOneCity($city_id){
        return $this->find($city_id)->toArray();
    }

    public function find_city_country($country_id){
        return $this->fetchAll("country_id=$country_id")->toArray();
    }

    public function listAll()
    {
        return $this->fetchAll()->toArray();
    }
    public function find_all_cities()
    {

        return $this->fetchAll()->toArray();
    }
}

