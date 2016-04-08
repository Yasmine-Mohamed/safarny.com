<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */

        $facebook_session = new Zend_Session_Namespace('facebook');
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
            $password = md5($this->_request->getParam('password'));

            $db = Zend_Db_Table::getDefaultAdapter();
            $authen_adapter = new Zend_Auth_Adapter_DbTable(
                $db,'user','user_name','password'
            );

            $authen_adapter->setIdentity($username);
            $authen_adapter->setCredential($password); // Should be Hashed with md5
            $result = $authen_adapter->authenticate();

            if($result->isValid()){
                $authen_instance = Zend_Auth::getInstance();
                $storage = $authen_instance->getStorage();
                $storage->write($authen_adapter->getResultRowObject(
                   array(
                       'user_id',
                       'user_name',
                       'email'
                   )
                ));

                $this->redirect();

            }else{
                $this->view->errorMessage = 'Sorry, we can\'t find that account. Perhaps your username or password is wrong ? ';
            }
        }

        $this->view->login_form = $login_form;

        // Facebook Login

        $facebook_app = new Facebook\Facebook([
            'app_id' => '1075021125889928',
            'app_secret' => '6c99f9d12fba6630f2ada5bb38d0731f',
            'default_graph_version' => 'v2.2'
            ]);

        $redirectLoginHelper = $facebook_app->getRedirectLoginHelper();
        $login_url = $redirectLoginHelper->getLoginUrl($this->view->serverUrl().'/user/fblogin');
        $this->view->facebook_url = $login_url;

    }

    public function logoutAction()
    {
        // action body
        $authen_adapter = Zend_Auth::getInstance();
        $authen_adapter->clearIdentity();
        $this->redirect();

    }

    public function fbloginAction()
    {
        // action body

        $facebook_app = new Facebook\Facebook([
            'app_id' => '1075021125889928',
            'app_secret' => '6c99f9d12fba6630f2ada5bb38d0731f',
            'default_graph_version' => 'v2.2'
        ]);

        $redirectLoginHelper = $facebook_app->getRedirectLoginHelper();

        try{
            $accessToken = $redirectLoginHelper->getAccessToken();
            $facebook_app->setDefaultAccessToken($accessToken);
            $response = $facebook_app->get('/me');
            $user_node = $response->getGraphUser();

            $facebook_session = new Zend_Session_Namespace('facebook');
            $facebook_session->name = $user_node->getName();
            $this->redirect();

        }catch(Facebook\Exceptions\FacebookSDKException $e){
            // When Graph returns an error (headers link)
            echo 'Graph returned an error: ' . $e->getMessage();
            Exit;
        }


    }

    public function fblogoutAction()
    {
        // action body
        Zend_Session::namespaceUnset('facebook');
        $this->redirect();
    }

    public function signupAction()
    {
        // action body

        $signUp_form = new Application_Form_SignUp();
        $this->view->signUp_form = $signUp_form ;

        $request = $this->getRequest();
        if($request->isPost())
        {
           if($signUp_form->isValid(($request->getPost())))
           {
               $user = new Application_Model_User();
               $user->signUp($_POST);
               $this->redirect();
           }
        }

    }



    
    public function editDetailsAction()
    {       
            $form = new Application_Form_Signup ();
            $form2=new Application_Form_Password();
            $user_model = new Application_Model_User ();
            $form->removeElement('pswd');
            $form->removeElement('email');
            $form->removeElement('reset');
            $authen_instance = Zend_Auth::getInstance();
            $storage = $authen_instance->getStorage();
            $sessionRead = $storage->read();
            
            if (!empty($sessionRead)) {
                $user_data = json_decode(json_encode($sessionRead), true);
                $form->populate($user_data);
                $id=$user_data['user_id'];
                $this->view->user_form = $form;
                $request = $this->getRequest ();

        if($request-> isPost()){
            if (!empty($_POST['submit'])) {
   //do something here;
            if($form-> isValid($request-> getPost())){
              $user_model-> updateUser ($id, $_POST);

}}}
        $this->view->password_form = $form2;
        if($request-> isPost()){
        if (!empty($_POST['password_submit'])) {
   //do something here;

            if($form2-> isValid($request-> getPost())){

              $user_model-> updateUser ($id, $_POST);
            }
        }
        }}
    }
}


