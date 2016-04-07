<?php

class Application_Model_Country extends Zend_Db_Table_Abstract
{
    protected $_name = 'country';
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

