<?php

class Application_Model_Comment  extends Zend_Db_Table_Abstract
{
    protected $_name = 'comment';

    public function getComments($post_id){
        return $this->fetchAll("post_id = $post_id")->toArray();
    }

    public function addComment($comment_data){
        $rowComment = $this->createRow();
        $rowComment->comment = $comment_data['comment'];
        $rowComment->post_id = $comment_data['post_id'];
        $rowComment->user_id = $comment_data['user_id'];
        $rowComment->save();
    }

    public function removeComment($commentData){
            $comment_id = $commentData['comment_id'];
            $this->delete("comment_id=$comment_id");
    }

    public function getComment($comment){
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = 'ahh2010';
        $dbname = 'safarny';

        $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
        $stmt = $con->prepare("select comment_id from comment where comment = ?");
        $stmt->bind_param("s",$comment);
        $stmt->execute();
        $stmt->bind_result($comment_id);
        while($stmt->fetch()){
            $assoc_array = array(
                'comment_id'=> $comment_id
            );
        }

        $jsonObj = json_encode($assoc_array);

        return  $jsonObj;
        $stmt->close();
    }

    public function updateComment($new_comment){
        $commentvalue['comment'] = $new_comment['comment'];
        $comment_id = $new_comment['comment_id'];
        $this->update($commentvalue,"comment_id=$comment_id");
    }



}

