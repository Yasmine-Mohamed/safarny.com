<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setMethod('POST');
        $this->setAttrib('class','form-horizontal');

        //Username
        $username = new Zend_Form_Element_Text('username');
        $username->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Username'

        ));
        $username->setRequired();
        $username->addFilter('StringTrim');


        //Password
        $password = new Zend_Form_Element_Password('password');
        $password->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Password'
        ));
        $password->setRequired();

        //Submit Button
        $submit = new Zend_Form_Element_Submit('Login');
        $submit->setAttrib('class','btn  btn-lg btn-block btn-primary');

        $this->addElements(array(
            $username,
            $password,
            $submit
        ));
    }


}

