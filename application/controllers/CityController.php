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
    }




}


