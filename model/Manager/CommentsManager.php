<?php

namespace Model\Manager;

use Library\EntityManager;
use Model\Entity\Comment;

// Comment status : published | pending
class CommentsManager extends EntityManager{

    const TABLE_NAME =  'comments';

    public function getAllCommentsForPostID($postID){

        $sql = 'SELECT * from '.self::TABLE_NAME.' where postID=:id';
        $query = $this->_db->prepare($sql);

        $query->execute(array(':id' => $postID));
        $post = $query->fetchAll(\PDO::FETCH_OBJ);

        if($query->rowCount() > 0)
            return $post;
        else
            return false;
    }

    public function deleteCommentByID($id){
        $sql = 'DELETE from '.$this->_tableName.' where id=:id';
        $query = $this->_db->prepare($sql);

        $query->execute(array(':id' => $id));
        
        if($query->rowCount() > 0)
            return true;
        else
            return false;
    }

    public function createComment(Comment $comment){

    }
}