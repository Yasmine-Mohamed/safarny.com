<?php

class Application_Model_Country extends Zend_Db_Table_Abstract
{
    protected $_name = 'country';
    protected $_dependentTables= array('Application_Model_City');

    	public function find_country_name($country_id)
		{
			return $this->find("$country_id")->toArray();
		}
	//listCountries

	    public function find_all_countries()
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
		$row->country_description = $country_data['country_description'];
		$row->rate = $country_data['rate'];
		$row->image = $country_data['image'];
		$row->save();
	}

	function editCountry($country_data)
	{
		$country['country_name'] = $country_data['country_name'];
		$country['country_description'] = $country_data['country_description'];
		$country['rate'] = $country_data['rate'];
		if($country_data['image'] != "")
		{
			$country['image'] = $country_data['image'];
		}

		$id = $country_data['country_id'];
		$this->update($country,"country_id=$id");
	}

	function deleteCountry($id)
	{
		$this->delete("country_id=$id");
	}

	public function find_top_rated_countries()
	{

		$select = $this->select();
		$select->order('rate DESC');

		$resultset = $this->fetchAll($select)->toArray();

		return $resultset;

	}


}

