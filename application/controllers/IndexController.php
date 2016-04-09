<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
$country_model = new Application_Model_Country ();
        $array=$country_model->find_top_rated_countries();

        $top6 = array_slice($array, 0,6);

$this->view->top_rated = $top6;
    }

    public function editAction()
    {
        // action body
    }


}





