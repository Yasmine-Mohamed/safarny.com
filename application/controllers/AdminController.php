<?php

class AdminController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function listAction()
    {
        // action body
        $countries = new Application_Model_Country();
        $this->view->countries = $countries->listCountries();
        $add_form = new Application_Form_AddCountry();
        $this->view->add_country = $add_form;

        if($this->_request->isPost())
        {
            if($add_form->isValid($this->_request->getPost()))
            {
                $country = new Application_Model_Country();
                $country->addCountry($_POST);
                $this->redirect("/admin/list");
            }
        }
    }

    public function deleteAction()
    {
        // action body

        $country = new Application_Model_Country();
        $cid = $this->_request->getParam("cid");
        $country->deleteCountry($cid);
        $this->redirect("/admin/list");
    }

    public function editAction()
    {
        // action body
        $country = new Application_Model_Country();
        $edit_form = new Application_Form_AddCountry();
        $id = $this->_request->getParam('cid');
        $countryById = $country->getCountryById($id);
        $edit_form->populate($countryById[0]);
        $this->view->add_country = $edit_form ;

        //$request = $this->getRequest();
        if($this->_request->isPost())
        {

            if($edit_form->isValid(($this->_request->getPost())))
            {
                $country->editCountry($_POST);
                $this->redirect("/admin/list");

            }
        }


    }


}













