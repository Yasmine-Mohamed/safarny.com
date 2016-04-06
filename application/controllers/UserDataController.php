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

                $this->view->showCar = $cars;
                $this->view->showCity = $city;

                $this->view->showHotel = $hotel;
                $this->view->showHotelName = $hotel_data;
          
    }


    }

    public function showCityAction()
    {
        // action body
    }


}






