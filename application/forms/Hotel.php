<?php

class Application_Form_Hotel extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        // to set submission method
        $this->setMethod('POST');

        //defining form elements

        $id = new Zend_Form_Element_Hidden('hotel_id');

       // city_id insertion in database via form

        $city_id = new Zend_Form_Element_Text('city_id');
        $city_id->setLabel('Find hotel');
        $city_id->setAttribs(Array(
            'placeholder'=>'Insert city id',
            'class'=>'form-control',

        ));
        $city_id->setRequired();

        //hotel_name insertion in database via form

        $hotel_name=new Zend_Form_Element_Text('hotel_name');
        $hotel_name->setAttribs(Array('class'=>'form-control','placeholder'=>'Hotel name'));
        $hotel_name->setRequired();

        //check in date insertion in database via form

        $date_from= new Zend_Form_Element_Text('date_from');

        $date_from->setAttribs(Array(

            'class'=>'form-control','readonly'=>'readonly'
        ));
        $date_from->setRequired();

        //check out date insertion in database via form
        $date_to= new Zend_Form_Element_Text('date_to');
        $date_to->setAttribs(Array(


            'class'=>'form-control','readonly'=>'readonly'
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
        $submit=new Zend_Form_Element_Submit('Submit');
        $submit->setAttribs(Array(

            'class'=>'btn btn-success'
        ));



        $this->addElements(array($city_id,$hotel_name,$date_from,$date_to,$members,$submit));

    }


}

