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

    //get city by id

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

    function listCities()
    {
        return $this->fetchAll()->toArray();
    }

    function addCity($city_data)
    {
        $row = $this->createRow();
        $row->city_name = $city_data['city_name'];
        $row->rate = $city_data['rate'];
        $row->description = $city_data['description'];
        $row->country_id = $city_data['country_id'];
        $row->image = $city_data['image'];
        $row->save();

    }

    function editCity($city_data)
    {
        $city['city_name'] = $city_data['city_name'];
        $city['rate'] = $city_data['rate'];
        $city['description'] = $city_data['description'];
        $city['country_id'] = $city_data['country_id'];
        if($city_data['image'] = !"")
        {
            $city['image'] = $city_data['image'];
        }
        $id = $city_data['city_id'];
        $this->update($city,"city_id=$id");
    }

    function deleteCity($id)
    {
        $this->delete("city_id=$id");
    }

    public function find_top_rated_cities()
    {

        $select = $this->select();
        $select->order('rate DESC');

        $resultset = $this->fetchAll($select)->toArray();

        return $resultset;

    }


}

