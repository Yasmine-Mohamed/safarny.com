<?php

class UserDataController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function showProfileAction()
    {
        $car_model = new Application_Model_Car ();

        $hotel_model = new Application_Model_Hotel ();
        $city_model = new Application_Model_City();

        $hotel_name_model = new Application_Model_HotelName ();

            $authen_instance = Zend_Auth::getInstance();
            $storage = $authen_instance->getStorage();
            $sessionRead = $storage->read();
            if (!empty($sessionRead)) {
                $id = $sessionRead->user_id;
                //$cars=[];
                //$hotel_data=[];
                $cars=$car_model->find_all_car_reservations($id);
                $city=$car_model->find_city_name($id);
             
                //var_dump($city);
                $hotel=$hotel_model->find_hotel_reservations($id);
                $hotel_data=$hotel_model->find_hotel_name($id);
                $cityHotel=$hotel_model->find_city_hotel($id);
                //var_dump($cityHotel);

                $this->view->showCar = $cars;
                $this->view->showCity = $city;

                $this->view->showHotel = $hotel;
                $this->view->showHotelName = $hotel_data;
                $this->view->showHotelCity = $cityHotel;

          
    }


    }

    public function showCityAction()
    {        $country_id = $this->_request->getParam("cuid");        
    
            $country_model = new Application_Model_Country ();
        $city_model = new Application_Model_City ();

        $country=$country_model->find_country_name($country_id);
        $cities=$city_model->find_city_country($country_id);
        $this->view->show_country_name = $country;
        $this->view->show_city_country = $cities;



    }

    public function showCountriesAction()
    {   
        $country_model = new Application_Model_Country ();
        $all_countries=$country_model->find_all_countries() ;
        
       $this->view->layout()->all_countries=$all_countries;
    }


}








