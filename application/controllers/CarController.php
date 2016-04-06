<?php

class CarController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function addcarrentalAction()
    {
        $city_id=1;
        $authen = Zend_Auth::getInstance();
        $storage = $authen->getStorage();
        $session_read = $storage->read();
        $user_id = $session_read->user_id;

        $form= new Application_Form_Car();

        $request = $this->getRequest();
        if($request->isPost()){
            if($form->isValid($request->getPost()))
            {
                $car_model = new Application_Model_Car();
                $car_model-> addCarRental($request->getParams(),$user_id,$city_id);
            }
        }
        $this->view->car_form = $form;

    }

}



