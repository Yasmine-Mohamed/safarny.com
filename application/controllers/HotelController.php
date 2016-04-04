<?php

class HotelController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

//    public function listhotelsAction()
//    {
//        // action body
//        $hotel_model = new Application_Model_Hotel();
//        $this->view->hotels = $hotel_model->listHotels();
//    }

    public function addnewhotelreservationAction()
    {
        // action body
        $form= new Application_Form_Hotel();

        $request = $this->getRequest();
        if($request->isPost()){
            if($form->isValid($request->getPost()))
            {
                $user_model = new Application_Model_Hotel();
                $user_model-> addNewHotelReservation($request->getParams());
            }
        }
        $this->view->hotel_form = $form;
    }



}





