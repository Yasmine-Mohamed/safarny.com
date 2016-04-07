<?php

class Application_Model_Hotel extends Zend_Db_Table_Abstract
{
    // Table name of the model class
    protected $_name = 'hotelreservation';
    protected $_referenceMap = array('hotels'=>array(
        'columns'=>array('hotel_id'),
        'refTableClass'=>'Application_Model_HotelName',
        'refColumns'=>array('hotel_id'),
        'onDelete'=>'cascade'

    ),'cities'=>array(
        'columns'=>array('city_id'),
        'refTableClass'=>'Application_Model_City',
        'refColumns'=>array('city_id'),
        'onDelete'=>'cascade'

    ));


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



    public function find_hotel_reservations($user_id)
    {
        return $this->fetchAll("user_id=$user_id")->toArray();
    }

    public function find_hotel_name ($user_id)
    {
        // return zend row object

        $all = $this->fetchAll("user_id=$user_id");
        $hotelName=[];
        foreach($all as $i => $row)
        {
            $hotelName[] = $row->findParentRow('Application_Model_HotelName')->toArray();
        				# code...
        }

        return $hotelName;

    }

    public function find_city_hotel($user_id)
    {
        // return zend row object
        $all = $this->fetchAll("user_id=$user_id");
        $hotelName=[];

        foreach($all as $i => $row)
        {
            $cityHotel[] = $row->findParentRow('Application_Model_City')->toArray();
        				# code...
        }

        return $cityHotel;

    }
}

