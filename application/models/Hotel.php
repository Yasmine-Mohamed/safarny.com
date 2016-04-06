<?php

class Application_Model_Hotel extends Zend_Db_Table_Abstract
{
    protected $_name = 'hotelreservation';

    protected $_referenceMap = array('hotels'=>array(
        'columns'=>array('hotel_id'),
        'refTableClass'=>'Application_Model_HotelName',
        'refColumns'=>array('hotel_id'),
        'onDelete'=>'cascade'

    ));

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


}

