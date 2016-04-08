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

    //<-------------Country------------>
    public function listAction()
    {
        // action body
        $countries = new Application_Model_Country();
        $this->view->countries = $countries->find_all_countries();
        $add_form = new Application_Form_AddCountry();
        $this->view->add_country = $add_form;

        if($this->_request->isPost())
        {
            if($add_form->isValid($this->_request->getPost()))
            {
                $country = new Application_Model_Country();
                $upload_image = new Zend_File_Transfer_Adapter_Http();
                $upload_image->addFilter('Rename',"/var/www/html/safarny/public/bootstrap/images/" . $_POST['name'] . ".jpg");
                $upload_image->receive();
                $_POST['image'] = "/bootstrap/images/" . $_POST['name'] .".jpg";
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
                $upload_image = new Zend_File_Transfer_Adapter_Http();
                $image = $_FILES['image']['name'];
                if($image != "")
                {
                    $upload_image->addFilter('Rename',array('target' => "/var/www/html/safarny/public/bootstrap/images/".$image, 'overwrite' => true));
                    $_POST['image'] = "/bootstrap/images/" .$image;
                }else{
                    $_POST['image'] = "";
                }
                $upload_image->receive();
                $country->editCountry($_POST);
                $this->redirect("/admin/list");

            }
        }
    }

    //<----------City------>
    public function listCitiesAction()
    {
        // action body
        $cities = new Application_Model_City();
        $this->view->cities = $cities->listCities();
        $add_form = new Application_Form_AddCity();
        $this->view->add_city = $add_form;

        if($this->_request->isPost())
        {
            if($add_form->isValid($this->_request->getPost()))
            {
                $city = new Application_Model_City();
                $upload_image = new Zend_File_Transfer_Adapter_Http();
                $upload_image->addFilter('Rename',"/var/www/html/safarny/public/bootstrap/images/" . $_POST['name'] . ".jpg");
                $upload_image->receive();
                $_POST['image'] = "/bootstrap/images/" . $_POST['name'] .".jpg";
                $city->addCity($_POST);
                $this->redirect("/admin/list-Cities");
            }
        }
    }

    public function editCityAction()
    {
        // action body
        $city = new Application_Model_City();
        $edit_form = new Application_Form_AddCity();
        $id = $this->_request->getParam('cid');
        $cityById = $city->listOneCity($id);
        $edit_form->populate($cityById[0]);
        $this->view->add_city = $edit_form ;

        //$request = $this->getRequest();
        if($this->_request->isPost())
        {

            if($edit_form->isValid(($this->_request->getPost())))
            {
                $upload_image = new Zend_File_Transfer_Adapter_Http();
                $image = $_FILES['image']['name'];
                if($image != "")
                {
                    $upload_image->addFilter('Rename',array('target' => "/var/www/html/safarny/public/bootstrap/images/".$image, 'overwrite' => true));
                    $_POST['image'] = "/bootstrap/images/" .$image;
                }else{
                    $_POST['image'] = "";
                }
                $upload_image->receive();
                $city->editCity($_POST);
                $this->redirect("/admin/list-Cities");

            }
        }
    }

    public function deleteCityAction()
    {
        // action body
        $city = new Application_Model_City();
        $cid = $this->_request->getParam("cid");
        $city->deleteCity($cid);
        $this->redirect("/admin/list-Cities");
    }


}











