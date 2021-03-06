<?php

class Application_Model_UserExp extends Zend_Db_Table_Abstract
{
    protected $_name = 'post';

    public function getExperiences($city_id){
        return $this->fetchAll("city_id = $city_id")->toArray();
    }

    public function getExperience($exp_id){
        return $this->find($exp_id)->toArray();
    }

    public function addNewExperience($exp_data,$user_id,$city_id){
        $rowExp = $this->createRow();
        $rowExp->post_title = $exp_data['post_title'];
        $rowExp->post = $exp_data['post_desc'];
        $rowExp->city_id = $city_id;
        $rowExp->user_id = $user_id;
        $rowExp->save();
    }

    function deleteExpereince($id){
        $this->delete("post_id=$id");
    }

    public function updateExp($new_user_exp){
        $userExpvalue['post_title'] = $new_user_exp['post_title'];
        $userExpvalue['post'] = $new_user_exp['post'];
        $post_id = $new_user_exp['post_id'];
        $this->update($userExpvalue,"post_id=$post_id");
    }

}

