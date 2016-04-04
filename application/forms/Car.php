<?php

class Application_Form_Car extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */


        $this->setMethod('POST');

       // car_id hidden element in the form

        $id = new Zend_Form_Element_Hidden('car_id');

        //pickup_location insertion in database via form

        $pickup_location=new Zend_Form_Element_Text('pickup_location');
        $pickup_location->setAttribs(Array('class'=>'form-control',
            'placeholder'=>'pickup_location'));
        $pickup_location->setRequired();

        //pick time insertion in database via form

        $date_from= new Zend_Form_Element_Text('date_from');
        $date_from->setAttribs(Array(

            'class'=>'form-control',
            'readonly'=>'readonly'


        ));
        $date_from->setRequired();

        //leaving time date insertion in database via form
        $date_to= new Zend_Form_Element_Text('date_to');
        $date_to->setAttribs(Array(


            'class'=>'form-control',


            'readonly'=>'readonly'
        ));
        $date_to->setRequired();

        //to submit form
        $submit=new Zend_Form_Element_Submit('Submit');
        $submit->setAttribs(Array(

            'class'=>'btn btn-success'
        ));


        $this->addElements(array($pickup_location,$date_from,$date_to,$submit));


    }


}

