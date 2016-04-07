<?php

class CityController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function listcityAction()
    {
        $cityModelObj = new Application_Model_City();
        $city_id = $this->_request->getParam('cid');
        $cityObj = $cityModelObj->listOneCity($city_id);
        $this->view->city = $cityObj[0];

        $userExpModel_Obj = new Application_Model_UserExp();
        $userExpObj = $userExpModel_Obj->getExperiences($city_id);
        $this->view->experiences = $userExpObj;

        $userExpForm = new Application_Form_AddUserExp();
        if($this->_request->isPost() && $userExpForm->isValid($_POST)){
            // In case of submitting the form using POST
            // and In case the data is valid

            $authen = Zend_Auth::getInstance();
            $storage = $authen->getStorage();
            $session_read = $storage->read();
            $user_id = $session_read->user_id;

            $userExpModel_Obj->addNewExperience($_POST,$user_id,$city_id);
            $this->redirect('/city/listcity/cid/'.$city_id);
        }

        $this->view->UserExp_Form = $userExpForm;

    }




}


