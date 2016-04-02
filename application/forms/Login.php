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
        $username->setLabel('Username: ');
        $username->setAttribs(array(
            'placeholder' => 'Username',
            'class' => 'form-control',
        ));
        $username->setRequired();
        $username->addFilter('StringTrim');

        //Password
        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Password: ');
        $password->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Password'
        ));
        $password->setRequired();

        //Submit Button
        $submit = new Zend_Form_Element_Submit('Sign In');
        $submit->setAttrib('class','btn btn-info btn-block');

        $this->addElements(array(
            $username,
            $password,
            $submit
        ));
    }


}

