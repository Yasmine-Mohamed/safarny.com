<?php

class CarController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function addcarrentalAction()
    {


        $authen = Zend_Auth::getInstance();
        $storage = $authen->getStorage();
        $session_read = $storage->read();
        $user_id = $session_read->user_id;
        $city_id = $this->_request->getParam("cid");



        $form= new Application_Form_Car();
        $form->setCityid($city_id);
        $form->setLocations();

        $request = $this->getRequest();

        if($request->isPost()){
            if($form->isValid($request->getPost()))
            {
                $car_model = new Application_Model_Car();
                $car_model-> addCarRental($request->getParams(),$user_id);
            }
        }
        $this->view->city_id=$city_id;
        $this->view->car_form = $form;

    }
}