<?php

class Application_Form_SignUp extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */

        $this->setMethod('POST');
        $this->setAttrib('class','form-horizontal');

        //Setting Unique Validator for Username
        $validator = new Zend_Validate_Db_NoRecordExists(
            array(
                'table' => 'user',
                'field' => 'user_name'
            )
        );

        $validator->setMessage('This Username is already taken');

        //Username
        $username = new Zend_Form_Element_Text('username');
        $username->setAttribs(array(
            'placeholder' => 'Username',
            'class' => 'form-control',
        ));
        $username->setRequired();
        $username->addFilter('StringTrim');
        $username->addValidator($validator);

        //Setting Unique Validator for Email
        $email_validator = new Zend_Validate_Db_NoRecordExists(
            array(
                'table' => 'user',
                'field' => 'email'
            )
        );
        $email_validator->setMessage('This Email is already taken');

        //Email
        $email = new Zend_Form_Element_Text('email');
        $email->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Email Address'
        ));
        $email->setRequired();
        $email->addValidator('EmailAddress');
        $email->addValidator($email_validator);

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
        $c_password->addValidator('identical',false,array(
            'token' => 'password'
        ));

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

