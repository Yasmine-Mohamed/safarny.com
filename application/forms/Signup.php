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
			'class'=>'form-control form-group'
		));
        $user_name->setRequired();
		$user_name->addValidator('StringLength', false, Array(4,20));
		

//email
		$email = new Zend_Form_Element_Text('email');
        $email->setAttribs(Array(
			'placeholder'=>'Example: ahmed@gmail.com',
			'class'=>'form-control'
			));
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


		$pswd = new Zend_Form_Element_Password('pswd');
		$pswd->setLabel('Password:');
		$pswd->setAttrib('size', 35);
		$pswd->setRequired(true);
		$pswd->addValidator('StringLength', false, array(4,15));
		$pswd->addErrorMessage('Please choose a password between 4-15 characters');


		$confirmPswd = new Zend_Form_Element_Password('confirm_pswd');
		$confirmPswd->setLabel('Confirm Password:');
		$confirmPswd->setAttrib('size', 35);
		$confirmPswd->setRequired(true);
		$confirmPswd->addValidator('Identical', false, array('token' => 'pswd'));
		$confirmPswd->addErrorMessage('The passwords do not match');




/*		$gender = new Zend_Form_Element_Radio('gender');
		$gender->setLabel('gender');

		$gender->setRequired();
		$gender->addMultiOption('male','Male')->
		addMultiOption('female','Female')->
		addMultiOption('non','Prefer not to mention');
		$gender->setAttrib('class', 'form-group');

		$track_obj = new Application_Model_Track();
		$allTracks = $track_obj->listAll();
		$track = new Zend_Form_Element_Select('track');
		$track->setLabel('track');

		foreach($allTracks as $key=>$value)
			{
				$track->addMultiOption($value['id'], $value['track_name']);
			}

 $track->setAttribs(Array(
'placeholder'=>'choose track',
'class'=>'form-control'
));*/
// submit
    	$submit = new Zend_Form_Element_Submit('submit');
    	$submit->setAttrib('class', 'btn btn-success');
    	
    	//reset
    	$reset = new Zend_Form_Element_Reset('reset');
    	$reset->setValue('Reset');

    	$reset->setAttrib('class', 'btn btn-danger');

        $this->addElements(array($id,$user_name,$email,$pswd,$submit,$reset));

    }    }




