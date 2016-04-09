<?php

class Application_Model_HotelName extends Zend_Db_Table_Abstract
{
    protected $_name = 'hotel';
    protected $_dependentTables= array('Application_Model_Hotel');
    protected $_referenceMap = array('hotels_city'=>array(
        'columns'=>array('city_id'),
        'refTableClass'=>'Application_Model_City',
        'refColumns'=>array('city_id'),
        'onDelete'=>'cascade'

    ));
    function listHotels($city_id)

    {
        return $this->fetchAll("city_id=$city_id")->toArray();
    }

    public function list_Hotel($id)

    {
        return $this->find($id)->toArray();
    }

    public function list_Hotels()

    {
        return $this->fetchAll()->toArray();
    }
    public function list_Hotels_city()

    {
        $all = $this->fetchAll();
        $city=[];
        foreach($all as $i => $row)
        {
            $city[] = $row->findParentRow('Application_Model_City')->toArray();
            # code...
        }
        //var_dump($cityName);
        return $city;
    }

    public function add_hotel($hotelData)

    {
        $row = $this->createRow();

        $row->hotel_name = $hotelData['hotel_name'];
        $row->city_id=$hotelData['city_name'];

        $row->save();

    }

    public function update_hotel($hotel_id,$hotelData)

    {
        $hotel['hotel_name'] = $hotelData['hotel_name'];
        $hotel['hotel_id']=$hotelData['hotel_id'];
        $city_id = $hotel_data['city_id'];
        $this->update($hotel,"hotel_id=$hotel_id");
    }

    public function delete_hotels($id)
    {
        $this->delete("hotel_id=$id");
    }







}

