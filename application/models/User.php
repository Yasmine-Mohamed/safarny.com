<?php

class Application_Model_User extends Zend_Db_Table_Abstract
{
    protected $_name = 'user';

    //signUp
    function signUp($user_data)
    {
        $row = $this->createRow();
        $row->user_name = $user_data['username'];
        $row->email = $user_data['email'];
        $row->password = md5($user_data['password']);

        $row->save();

    }

}

