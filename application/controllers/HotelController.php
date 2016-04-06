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



    public function addnewhotelreservationAction()
    {
        // action body


        $city_id=1;

        //GETTING USER_ID FROM SESSION
        $authen = Zend_Auth::getInstance();
        $storage = $authen->getStorage();
        $session_read = $storage->read();
        $user_id = $session_read->user_id; //till login

        //IDENTIFYING THE HOTEL FORM OBJECT
        $form= new Application_Form_Hotel();

        $request = $this->getRequest();
        if($request->isPost()){
            if($form->isValid($request->getPost()))
            {
                $user_model = new Application_Model_Hotel();
                $user_model-> addNewHotelReservation($request->getParams(),$user_id,$city_id);

            }
        }
        $this->view->hotel_form = $form;


    }



}





