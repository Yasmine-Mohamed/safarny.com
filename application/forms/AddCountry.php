<?php

class Application_Form_AddCountry extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setMethod('POST');
        $this->setAttrib('class','form-horizontal');

        $id = new Zend_Form_Element_Hidden('country_id');

        $country = new Zend_Form_Element_Text('country_name');
        $country->setAttribs(array(
            'placeholder' => 'Country',
            'class' => 'form-control'
        ));

        $country_description = new Zend_Form_Element_Text('country_description');
        $country_description->setAttribs(array(
            'placeholder' => 'Country Description',
            'class' => 'form-control'
        ));

        $rate = new Zend_Form_Element_Text('rate');
        $rate->setAttribs(array(
            'placeholder' => 'Rate',
            'class' => 'form-control'
        ));

        $add = new Zend_Form_Element_Submit('Add');
        $add->setValue('Add');
        $add->setAttrib('class','btn btn-primary btn-lg');

        $this->addElements(array(
            $id,
            $country,
            $country_description,
            $rate,
            $add
        ));

    }



}

