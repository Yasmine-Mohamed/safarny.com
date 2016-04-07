<?php

class Application_Form_SignUp extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */

        $this->setMethod('POST');
        $this->setAttrib('class','form-horizontal');

        //Username
        $username = new Zend_Form_Element_Text('username');
        $username->setAttribs(array(
            'placeholder' => 'Username',
            'class' => 'form-control',
        ));
        $username->setRequired();
        $username->addFilter('StringTrim');

        //Email
        $email = new Zend_Form_Element_Text('email');
        $email->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Email Address'
        ));
        $email->setRequired();

        //Password
        $password = new Zend_Form_Element_Password('password');
        $password->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Password'
        ));
        $password->setRequired();

        //Confirm Password
        $c_password = new Zend_Form_Element_Password('c_password');
        $c_password->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Password Again'
        ));
        $c_password->setRequired();

        //Submit Button
        $submit = new Zend_Form_Element_Submit('SignUp');
        $submit->setAttrib('class','btn btn-primary btn-block btn-lg');

        //add elements
        $this->addElements(array(
            $username,
            $email,
            $password,
            $c_password,
            $submit
        ));
    }
}

