<?php

class Application_Model_City extends Zend_Db_Table_Abstract
{
    protected $_name = 'city';

    function listCities()
    {
        return $this->fetchAll()->toArray();
    }

    function getCityById($id)
    {
        return $this->find($id)->toArray();
    }

    function addCity($city_data)
    {
        $row = $this->createRow();
        $row->city_name = $city_data['city_name'];
        $row->rate = $city_data['rate'];
        $row->description = $city_data['description'];
        $row->save();
    }

    function editCity($city_data)
    {
        $city['city_name'] = $city_data['city_name'];
        $city['rate'] = $city_data['rate'];

        $id = $city_data['city_id'];
        $this->update($city,"city_id=$id");
    }

    function deleteCountry($id)
    {
        $this->delete("city_id=$id");
    }





}

