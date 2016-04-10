<?php

class Application_Form_Password extends Zend_Form
{

	public function init()
	{
		$this->setMethod('POST');

		$id = new Zend_Form_Element_Hidden('id');


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

		$submit = new Zend_Form_Element_Submit('password_submit');
    	$submit->setAttrib('class', 'btn btn-block btn-info');
    	 $confirmPswd->getDecorator('Errors')->setOption('class', 'errors');
        $confirmPswd->setAttribs(Array(
		'class'=>'form-control form-group color',

		));
    	$this->addElements(array($pswd,$confirmPswd,$submit));





	}


}
