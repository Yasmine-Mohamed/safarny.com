<?php

class Application_Model_Location extends Zend_Db_Table_Abstract
{
    protected $_name = 'location';
    protected $_referenceMap = array('location'=>array(
        'columns'=>array('city_id'),
        'refTableClass'=>'Application_Model_City',
        'refColumns'=>array('city_id'),
        'onDelete'=>'cascade'

    ));


    // To list locations
    function listLocations($city_id)
    {
        return $this->fetchAll("city_id=$city_id")->toArray();
    }

    //list locations without dependency on city id

    function listAllLocations()
    {
        return $this->fetchAll()->toArray();
    }

    public function find_city_name ()
    {
        // return zend row object
        $all = $this->fetchAll();
        $cityName=[];

        foreach($all as $key => $value)
        {
            $cityName[] = $value->findParentRow('Application_Model_City')->toArray();
            # code...
        }

        //var_dump($cityName);
        return $cityName;
    }

    function locationDetails($id)
    {
        return $this->find($id)->toArray();
    }




    // To delete a location via admin
    function deleteLocation($id)
    {
        $this->delete("location_id=$id");
    }



    function addLocation($locationData)
    {
        $row = $this->createRow();
        $row->location_name= $locationData['location_name'] ;
        $row->location_image =$locationData['location_image'];
        $row->city_id = $locationData['city_id'];
        $row->save();
    }


    function updateLocation($locationData)
    {   //$location_data['location_id']=$locationData['location_id'];
        $location_data['location_name']=$locationData['location_name'];
        $location_data['location_image']=$locationData['location_image'];
        $location_data['city_id']=$locationData['city_id'];
        $id=$locationData['location_id'];
        $this->update($location_data,"location_id=$id");

    }



}

