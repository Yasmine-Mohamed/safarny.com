<?php

class Application_Form_Hotel extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */

        // to set submission method

        $this->setMethod('POST');

        //defining form elements

        $id = new Zend_Form_Element_Hidden('hotelreservation_id');

        $city_id=1;
        //$city_id=$_GET['city_id'];

       //INSERTION OF HOTEL_ID IN DATABASE

        $hotelname_obj= new Application_Model_HotelName();
        $allHotels=$hotelname_obj->listHotels($city_id);
        $hotel_id = new Zend_Form_Element_Select('hotel_id');
        $hotel_id->setAttribs(Array('class'=>'form-control','placeholder'=>'Search For Hotel'));
        foreach($allHotels as $key=>$value)
        {
            $hotel_id->addMultiOption($value['hotel_id'], $value['hotel_name']);

        }



        //check in date insertion in database via form

        $date_from= new Zend_Form_Element_Text('date_from');

        $date_from->setAttribs(Array(

            'class'=>'form-control','readonly'=>'readonly','placeholder'=>'From',
        ));
        $date_from->setRequired();

        //check out date insertion in database via form

        $date_to= new Zend_Form_Element_Text('date_to');
        $date_to->setAttribs(Array(


            'class'=>'form-control','readonly'=>'readonly','placeholder'=>'To'
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
        $submit=new Zend_Form_Element_Submit('Search Hotels');
        $submit->setAttribs(Array(

            'class'=>'btn btn-block btn-lg btn-success'
        ));



        $this->addElements(array($hotel_id,$date_from,$date_to,$members,$submit));

    }


}

