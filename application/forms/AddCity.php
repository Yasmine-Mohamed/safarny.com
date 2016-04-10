<?php

class Application_Form_AddCity extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setMethod('POST');
        $this->setAttrib('class','form-horizontal');

        $id = new Zend_Form_Element_Hidden('city_id');

        $city = new Zend_Form_Element_Text('city_name');
        $city->setAttribs(array(
            'placeholder' => 'City',
            'class' => 'form-control'
        ));

        $rate = new Zend_Form_Element_Text('rate');
        $rate->setAttribs(array(
            'placeholder' => 'Rate',
            'class' => 'form-control'
        ));

        $description = new Zend_Form_Element_Text('description');
        $description->setAttribs(array(
            'placeholder' => 'City Description',
            'class' => 'form-control'
        ));

        $country_id = new Zend_Form_Element_Select('country_id');
        $country_id->setAttribs(array(
            'placeholder' => 'Select Country ID',
            'class' => 'form-control'
        ));

        $country = new Application_Model_Country();
        $all_countries = $country->find_all_countries();
        foreach($all_countries as $key => $value)
        {
            $country_id->addMultiOption($value['country_id'],$value['country_name']);
        }

        $image = new Zend_Form_Element_File('image');
        $image->addValidator('Count',false ,1);
        $image->addValidator('Extension',false,'jpg,jpeg,png,gif');

        $add = new Zend_Form_Element_Submit('Add');
        $add->setValue('Add');
        $add->setAttrib('class','btn btn-primary btn-lg');

        $this->addElements(array(
            $id,
            $city,
            $description,
            $rate,
            $country_id,
            $image,
            $add
        ));


    }


}

