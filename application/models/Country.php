<?php

class Application_Model_Country extends Zend_Db_Table_Abstract
{
    protected $_name = 'country';

    function listCountries()
    {
        return $this->fetchAll()->toArray();
    }

    function getCountryById($id)
    {
        return $this->find($id)->toArray();
    }

    function addCountry($country_data)
    {
        $row = $this->createRow();
        $row->country_name = $country_data['country_name'];
        $row->rate = $country_data['rate'];
        $row->save();
    }

    function editCountry($country_data)
    {
        $country['country_name'] = $country_data['country_name'];
        $country['rate'] = $country_data['rate'];

        $id = $country_data['country_id'];
        $this->update($country,"country_id=$id");
    }

    function deleteCountry($id)
    {
        $this->delete("country_id=$id");
    }


    protected $_dependentTables= array('Application_Model_City');

        public function find_country_name($country_id)
         {
                 return $this->find("$country_id")->toArray();
         }

        public function find_all_countries()
        {
                return $this->fetchAll()->toArray();
        }

}

