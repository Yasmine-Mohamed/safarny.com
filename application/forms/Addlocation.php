<?php

class Application_Form_Addlocation extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setMethod('POST');

        $location_id=new Zend_Form_Element_Hidden('location_id');

        $location_name = new Zend_Form_Element_Text('location_name');
        $location_name->setLabel('Location Name: ');
        $location_name->setAttribs(Array(
            'placeholder'=>'Example: Sedi Gaber',
            'class'=>'form-control'
        ));
        $location_name->setRequired();

        $location_name->addFilter('StringTrim');


        $location_image = new Zend_Form_Element_Text('location_image');
        $location_image->setLabel('Location Image: ');
        $location_image->setAttribs(Array(
            'placeholder'=>'Example: https://cdn.photographylife.com/wp-content/uploads/2014/06/Nikon-D810-Image-Sample-6.jpg',
            'class'=>'form-control'
        ));
        $location_image->setRequired();

        $location_image->addFilter('StringTrim');

        $city_obj = new Application_Model_City();
        $allCities = $city_obj->listAll();
        $city_id = new Zend_Form_Element_Select('city_id');


        foreach($allCities as $key=>$value)
        {
            $city_id->addMultiOption($value['city_id'], $value['city_name']);
        }
        $city_id->setAttribs(Array(
            'class'=>'form-control'));


        $submit=new Zend_Form_Element_Submit('GetYourQuote');
        $submit->setAttribs(Array(
            'class'=>'btn btn-block btn-lg btn-success'));


        $this->addElements(array(
            $location_name,
            $location_image,
            $city_id,
            $submit
        ));


    }





}

