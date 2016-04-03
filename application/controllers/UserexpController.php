<?php

class UserexpController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function viewAction()
    {
        // action body
        $userExp_model = new Application_Model_UserExp();
        $userExp_id = $this->_request->getParam('eid');
        $userExp = $userExp_model->getExperience($userExp_id);
        $this->view->experience = $userExp[0];

        
    }


}



