<?php

class Application_Model_Hotel extends Zend_Db_Table_Abstract
{

    // Table name of the model class
    protected $_name = 'hotel';

    //list available hotels in city

//    function listHotels()
//    {
//        return $this->fetchAll()->toArray();
//    }

    //add a hotel reservation in database
    function addNewHotelReservation($hotelData)
    {
        $row = $this->createRow();
        $row->city_id = $hotelData['city_id'];
        $row->hotel_name = $hotelData['hotel_name'];
        $row->date_from = $hotelData['date_from'];
        $row->date_to = $hotelData['date_to'];
        $row->members = $hotelData['members'];
        $row->save();
    }


}

