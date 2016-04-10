<?php

class Application_Form_Hotel extends Zend_Form
{

    public function init()
    {
       	$hotel_id=new Zend_Form_Element_Text('hotel_id');


        $hotel_id->setLabel('hotel_id');
        $hotel_id->addValidator('Digits');

        // to set submission method

        $this->setMethod('POST');

        //defining form elements


        //check in date insertion in database via form
        $date_from= new Zend_Form_Element_Text('date_from');
        $date_from->setAttribs(Array(
            'class'=>'form-control',
            'readonly'=>'readonly',
            'placeholder'=>'From',
        ));
        $date_from->setRequired();


        //check out date insertion in database via form
        $date_to= new Zend_Form_Element_Text('date_to');
        $date_to->setAttribs(Array(
            'class'=>'form-control',
            'readonly'=>'readonly',
            'placeholder'=>'To'
        ));
        $date_to->setRequired();

        //insert number of members in database

        $members=new Zend_Form_Element_Select('members');
        $members->setAttribs(Array('class'=>'form-control'));
        $members->setRequired();

        $members->addMultiOption('1','1 Adult')->
        addMultiOption('2','2 Adults')->
        addMultiOption('3','3 Adults')->addMultiOption('4','4 Adults');

        //to be able to submit form
        $submit=new Zend_Form_Element_Submit('ReserveHotels');
        $submit->setAttribs(Array(
            'class'=>'btn btn-block btn-lg btn-primary'
        ));


        $this->addElements(array(
            $date_from,
            $date_to,
            $members,
            $submit
        ));
    }

    public function setCityid($city_id){
        $this->city_id = $city_id;
    }

    public function setHotels(){
        $hotelname_obj= new Application_Model_HotelName();
        $allHotels=$hotelname_obj->listHotels($this->city_id);
        $hotel_id = new Zend_Form_Element_Select('hotel_id');

        $hotel_id->setAttribs(Array(
		'placeholder'=>'please enter digit',
		'class'=>'form-control form-group color'
			));

        $hotel_id->setRequired();
        $hotel_name = new Zend_Form_Element_Text('hotel_name');
        $hotel_name->setLabel('hotel name');

        $hotel_name->setAttribs(Array(
		'placeholder'=>'Example: plaza hotel',
		'class'=>'form-control form-group color'
		));
        $hotel_name->setRequired();
		$hotel_name->addValidator('StringLength', false, Array(4,50));

        $city_name = new Zend_Form_Element_Select('city_name');
        $city_name->setLabel('city name');

        $city=$city_model = new Application_Model_City();

        $city->setOptions(array('disable' => array('--')));
        $allcities=$city_model->find_all_cities(); 
		foreach($allcities as $key=>$value)
			{
				$city_name->addMultiOption($value['city_id'], $value['city_name']);
			}
        $city_name->setAttribs(Array(
		'class'=>'form-control form-group color',

		));


        $city_name->setRequired();
		$submit = new Zend_Form_Element_Submit('submit');

    	$submit->setAttrib('class', 'btn btn-info btn-block btn-lg form-group');
    
    	 $this->addElements(array(
            $hotel_id,
            $hotel_name,
            $city_name,
            $submit,
        ));

    	    }


}

