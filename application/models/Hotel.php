<?php

class Application_Model_Hotel extends Zend_Db_Table_Abstract
{

    // Table name of the model class
    protected $_name = 'hotelreservation';

    //list available hotels in city



    //add a hotel reservation in database
    function addNewHotelReservation($hotelData,$user_id)
    {
        $row = $this->createRow();

        $row->city_id = $hotelData['city_id'];
        $row->user_id =$user_id;
        $row->hotel_id = $hotelData['hotel_id'];

        $row->date_from = $hotelData['date_from'];
        $row->date_to = $hotelData['date_to'];

        $row->members = $hotelData['members'];

        $row->save();

    }


}

