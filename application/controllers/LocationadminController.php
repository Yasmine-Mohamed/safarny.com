<?php

class LocationadminController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function createlocationAction()
    {
        // action body
        $form = new Application_Form_Addlocation();
        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {
                $location_model = new Application_Model_Location();
                $location_model->addLocation($request->getParams());
                $this->redirect('/locationadmin/list');
            }
        }
        $this->view->location_form = $form;
    }

    public function listAction()
    {
        // action body
        $location_model = new Application_Model_Location;
        $this->view->locations = $location_model->listAllLocations();
        $this->view->cityname = $location_model->find_city_name();
    }

    public function deleteAction()
    {
        // action body
        $location_model = new Application_Model_Location;
        $loc_id = $this->_request->getParam('lid');
        $location_model->deleteLocation($loc_id);
        $this->redirect('/locationadmin/list');
    }

    public function editAction()
    {
        // action body
        $form = new Application_Form_Addlocation ();
        $location_model = new Application_Model_Location ();
        $id = $this->_request->getParam('lid');
        $location_data = $location_model->locationDetails($id);
        $form->populate($location_data[0]);
        $this->view->location_form = $form;
        $request = $this->getRequest();
        if ($request->isPost())
        {
            if ($form->isValid($request->getPost())) {
                $location_model->updateLocation( $_POST);
                $this->redirect('/locationadmin/createlocation');
            }
        }



}

}







