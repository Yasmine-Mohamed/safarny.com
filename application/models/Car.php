<?php

class Application_Model_Car extends Zend_Db_Table_Abstract
{
    //table name in database
    protected $_name = 'carreservation';
    protected $_referenceMap = array('cars'=>array(
        'columns'=>array('city_id'),
        'refTableClass'=>'Application_Model_City',
        'refColumns'=>array('city_id'),
        'onDelete'=>'cascade'

    ));

    function addCarRental($carData,$user_id)
    {
        $row = $this->createRow();
        $row->city_id = $carData['city_id'] ;
        $row->user_id=$user_id;
        $row->pickup_location = $carData['pickup_location'];
        $row->date_from = $carData['date_from'];
        $row->date_to = $carData['date_to'];
        $row->save();
    }

    public function find_all_car_reservations($user_id)
    {
        return $this->fetchAll("user_id=$user_id")->toArray();
    }

    public function find_city_name ($user_id)
    {
        // return zend row object
        $all = $this->fetchAll("user_id=$user_id");
        $cityName=[];

        foreach($all as $i => $row)
        {
            $cityName[] = $row->findParentRow('Application_Model_City')->toArray();
            # code...
        }

        //var_dump($cityName);
        return $cityName;
    }
}