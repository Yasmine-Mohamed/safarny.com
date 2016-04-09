<?php

class Application_Form_AddUserExp extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */

        //User Experience Title
        $u_title = new Zend_Form_Element_Text('post_title');
        $u_title->setLabel('Experience Title: ');
        $u_title->setAttribs(array(
            'placeholder' => 'Post Title',
            'class' => 'form-control',
        ));
        $u_title->setRequired();
        $u_title->addFilter('StringTrim');


        //User Experience Description
        $u_desc = new Zend_Form_Element_Textarea('post_desc');
        $u_desc->setLabel('Experience Description: ');
        $u_desc->setAttribs(array(
            'placeholder' => 'Post Description',
            'class' => 'form-control',
            'rows' => '5'
        ));
        $u_desc->setRequired();
        $u_desc->addFilter('StringTrim');


        //Submit Button
        $submit = new Zend_Form_Element_Submit('ShareExperience');
        $submit->setAttrib('class','btn btn-success btn-lg');

        $this->addElements(array(
            $u_title,
            $u_desc,
            $submit
        ));
    }


}

