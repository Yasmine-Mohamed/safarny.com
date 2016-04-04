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
        // action body
        $form= new Application_Form_Car();

        $request = $this->getRequest();
        if($request->isPost()){
            if($form->isValid($request->getPost()))
            {
                $car_model = new Application_Model_Car();
                $car_model-> addCarRental($request->getParams());
            }
        }
        $this->view->car_form = $form;

    }

}



