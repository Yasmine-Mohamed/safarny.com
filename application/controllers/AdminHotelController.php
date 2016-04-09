<?php

class AdminHotelController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    }
       
    public function editAction()
    {
        $form = new Application_Form_AdminHotel();
        $hotel_model = new Application_Model_HotelName();
        $hotel_id = $this->_request->getParam("hid");
        $HotelById = $hotel_model->list_Hotel($id);
        $city->editCity($_POST);

        $form->populate($HotelById[0]);
        $this->view->hotel_form = $form;

    }

    public function listAction()
    {
  $form = new Application_Form_AdminHotel();
        $request = $this->getRequest();
        if($request->isPost()){
            if($form->isValid($request->getPost())){
                $hotel_model = new Application_Model_HotelName();
                $hotel_model-> add_Hotel($request->getParams());
                                }
    }
                    $this->view->hotel_form = $form;


        $hotel_model = new Application_Model_HotelName();
        $this->view->hotels=$hotel_model->list_Hotels();
$this->view->city= $hotel_model->list_Hotels_city();
    }

    public function deleteAction()
    {
          $hotel_model = new Application_Model_HotelName();
        $hotel_id = $this->_request->getParam("hid");
        $hotel_model->delete_hotels($hotel_id);
        $this->redirect("/admin-hotel/list");
    }

    public function addAction()
    {
 
        $form = new Application_Form_AdminHotel();
        $request = $this->getRequest();
        if($request->isPost()){
            if($form->isValid($request->getPost())){
                $hotel_model = new Application_Model_HotelName();
                $hotel_model-> add_Hotel($request->getParams());
                                }
    }



                    $this->view->hotel_form = $form; 
                    $elements = $form->getElements();    }


}

















