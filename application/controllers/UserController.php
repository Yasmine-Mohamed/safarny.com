<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function loginAction()
    {
        // action body
        $login_form = new Application_Form_Login();

        if($this->_request->isPost() && $login_form->isValid($_POST)){
            // In case of submitting the form using POST
            // and In case the data is valid

            $username = $this->_request->getParam('username');
            $password = $this->_request->getParam('password');

            $db = Zend_Db_Table::getDefaultAdapter();
            $authen_adapter = new Zend_Auth_Adapter_DbTable(
                $db,'user','user_name','password'
            );

            $authen_adapter->setIdentity($username);
            $authen_adapter->setCredential($password);
            $result = $authen_adapter->authenticate();

            if($result->isValid()){
                $authen_instance = Zend_Auth::getInstance();
                $storage = $authen_instance->getStorage();
                $storage->write($authen_adapter->getResultRowObject(
                   array(
                       'user_id',
                       'user_name',
                   )
                ));

                $this->redirect();

            }else{
                $this->view->errorMessage = 'Sorry, we can\'t find that account. Perhaps your username or password is wrong ? ';
            }
        }

        $this->view->login_form = $login_form;

    }

    public function logoutAction()
    {
        // action body
        $authen_adapter = Zend_Auth::getInstance();
        $authen_adapter->clearIdentity();

    }


}





