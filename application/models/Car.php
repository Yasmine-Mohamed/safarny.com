<?php

class Application_Model_Car extends Zend_Db_Table_Abstract
{
    //table name in database
    protected $_name = 'car';

    function addCarRental($carData)
    {
        $row = $this->createRow();

        $row->pickup_location = $carData['pickup_location'];
        $row->date_from = $carData['date_from'];
        $row->date_to = $carData['date_to'];

        $row->save();
    }

}

