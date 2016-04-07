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


        $comment_model = new Application_Model_Comment();
        $comments = $comment_model->getComments($userExp_id);
        $this->view->comments = $comments;

    }

    public function addcommentAction()
    {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $request = $this->getRequest();
        $comment_model = new Application_Model_Comment();

        if($request->isPost()){
            $comment_model->addComment($request->getParams());
        }

        $comment = $request->getParams();
        $comment_id = $comment_model->getComment($comment['comment']);
        echo $comment_id;

    }

    public function removeexpAction()
    {
        $userExp_model = new Application_Model_UserExp();
        $userExp_id = $this->_request->getParam('eid');
        $userExp_model->deleteExpereince($userExp_id);
        $this->redirect();
    }

    public function removecommentAction()
    {
        // action body
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $request = $this->getRequest();

        if($request->isPost()){
            $comment_model = new Application_Model_Comment();
            $comment_model->removeComment($request->getParams());
        }
    }

    public function editcommentAction()
    {
        // action body

        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $request = $this->getRequest();

        if($request->isPost()){
            $comment_model = new Application_Model_Comment();
            $comment_model->updateComment($request->getParams());
        }

    }


}











