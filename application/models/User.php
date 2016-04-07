<?php

class Application_Model_User extends Zend_Db_Table_Abstract
{
    protected $_name = 'user';


  function updateUser($id,$userData)
	{
		if (isset($userData['user_name']))
			{
				$user_data['user_name'] = $userData['user_name'];
				$this->update($user_data,"user_id=$id");

			}
			//$user_data['email'] = $userData['email'];
		elseif ((isset($userData['pswd']))&&(isset($userData['confirm_pswd'])))
			{
				//$id=$userData['user_id'];
				//$row=$this->fetchAll("user_id=$user_id")->toArray();	
				$user_data['password'] = $userData['pswd'];
				$user_data['confirm_pass'] = $userData['confirm_pswd'];

				//$user_data['email'] = $userData['email'];
				$this->update($user_data,"user_id=$id");


			}

	}

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






