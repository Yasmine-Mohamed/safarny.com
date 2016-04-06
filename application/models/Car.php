<?php

class Application_Model_Car extends Zend_Db_Table_Abstract
{
    //table name in database
    protected $_name = 'carreservation';

    function addCarRental($carData,$user_id,$city_id)
    {
        $row = $this->createRow();

        $row->city_id=$city_id;
        $row->user_id=$user_id;

        $row->pickup_location = $carData['pickup_location'];

        $row->date_from = $carData['date_from'];
        $row->date_to = $carData['date_to'];

        $row->save();
    }

}

