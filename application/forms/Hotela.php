<?php

class Application_Form_Hotel extends Zend_Form
{

    public function init()
    {
		$this->setMethod('POST');
       	$hotel_id=new Zend_Form_Element_Text('hotel_id');

        $hotel_id->setLabel('hotel_id');
        $hotel_id->addValidator('Digits');
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

