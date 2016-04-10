<?php

class Application_Form_Signup extends Zend_Form
{

		public function init()
    	{

			/* Form Elements & Other Definitions Here ... */
			$this->setMethod('POST');

			$id = new Zend_Form_Element_Hidden('id');
			$user_name = new Zend_Form_Element_Text('user_name');
			$user_name->setLabel('username');

			$user_name->setAttribs(Array(
				'placeholder'=>'Example: ghada',
				'class'=>'form-control form-group color'));

            /* Form Elements & Other Definitions Here ... */

			$user_name->setRequired();
			$user_name->addValidator('StringLength', false, Array(4,20));
			$user_name->getDecorator('Errors')->setOption('class', 'errors');


			$email = new Zend_Form_Element_Text('email');

			$email->setLabel('email');
			$email->setRequired();
			$email->addValidator('StringLength', false, Array(10,50));
			$email->addValidator('EmailAddress');
			$email->addValidator( 'Db_NoRecordExists', true, array(
					'table' => 'user',
					'field' => 'email',
					'messages' => array(
						'recordFound' => 'Email already taken'
					))
			);
			$email->getDecorator('Errors')->setOption('class', 'errors');
			$email->setAttribs(Array(
				'placeholder'=>'Example: ahmed@gmail.com',
				'class'=>'form-control form-group color',

			));

			$pswd = new Zend_Form_Element_Password('pswd');
			$pswd->setLabel('Password:');
			$pswd->setAttrib('size', 35);
			$pswd->setRequired(true);
			$pswd->addValidator('StringLength', false, array(4,15));
			$pswd->addErrorMessage('Please choose a password between 4-15 characters');
			$pswd->getDecorator('Errors')->setOption('class', 'errors');
			$pswd->setAttribs(Array(
				'class'=>'form-control form-group color',

			));


			$confirmPswd = new Zend_Form_Element_Password('confirm_pswd');
			$confirmPswd->setLabel('Confirm Password:');
			$confirmPswd->setAttrib('size', 35);
			$confirmPswd->setRequired(true);
			$confirmPswd->addValidator('Identical', false, array('token' => 'pswd'));
			$confirmPswd->addErrorMessage('The passwords do not match');
			$confirmPswd->getDecorator('Errors')->setOption('class', 'errors');
			$confirmPswd->setAttribs(Array(
				'class'=>'form-control form-group color',

			));

			$submit = new Zend_Form_Element_Submit('submit');
			$submit->setAttrib('class', 'btn  btn-block btn-info');



			$this->addElements(array($id,$user_name,$email,$pswd,$submit));

		}    }




