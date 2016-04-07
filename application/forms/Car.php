<?php

class Application_Form_Car extends Zend_Form
{
    public $city_id=0;

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */

        $this->setMethod('POST');

       // car_id hidden element in the form
//        $id = new Zend_Form_Element_Hidden('car_id');

        $date_from= new Zend_Form_Element_Text('date_from');
        $date_from->setAttribs(Array(

            'class'=>'form-control',
            'readonly'=>'readonly',
            'placeholder'=>'From'
        ));
        $date_from->setRequired();

        //leaving time date insertion in database via form
        $date_to= new Zend_Form_Element_Text('date_to');
        $date_to->setAttribs(Array(
            'class'=>'form-control',
            'readonly'=>'readonly',
            'placeholder'=>'To'
        ));
        $date_to->setRequired();

        //to submit form
        $submit=new Zend_Form_Element_Submit('GetYourQuote');
        $submit->setAttribs(Array(
            'class'=>'btn btn-block btn-lg btn-success'
        ));

        $this->addElements(array($date_from,$date_to,$submit));


    }

    public function setCityid($city_id){
        $this->city_id = $city_id;
    }

    public function setLocations(){
        $pickuplocation_obj= new Application_Model_Location();
        $allLocations=$pickuplocation_obj->listLocations($this->city_id);
        //or the name of the function
        //ahmed created
        $pickup_location= new Zend_Form_Element_Select('pickup_location');
        $pickup_location->setAttribs(Array('class'=>'form-control'));


        foreach($allLocations as $key=>$value){
            $pickup_location->addMultiOption($value['location_name'], $value['location_name']);
        }
        $pickup_location->setRequired();

        $this->addElement(
          $pickup_location
        );
    }
}



