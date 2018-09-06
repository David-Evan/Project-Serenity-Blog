<?php

namespace Model\Manager;

use Library\EntityManager;
use Model\Entity\Comment;

// Comment status : published | pending
class CommentsManager extends EntityManager{

    const TABLE_NAME =  'comments';

    public function getAllCommentsForPostID($postID, $orderByPublishDate = 'DESC'){

        $sql =  ' SELECT * FROM '.self::TABLE_NAME.
                ' WHERE postID=:id'.
                ' ORDER BY publishDate '.$orderByPublishDate;

        $query = $this->_db->prepare($sql);

        $query->execute(array(':id' => $postID));
        $post = $query->fetchAll(\PDO::FETCH_OBJ);

        if($query->rowCount() > 0)
            return $post;
        else
            return false;
    }

    public function getAllCommentsUnderSurvey(){
        return $this->_db->query(' SELECT * FROM '.self::TABLE_NAME.
                                    ' WHERE isUnderSurvey = true '.
                                    ' ORDER BY surveyCount DESC ', \PDO::FETCH_OBJ)->fetchAll();
    }

    public function deleteCommentByID($id){
        $sql =  ' DELETE FROM '.self::TABLE_NAME.
                ' WHERE id=:id';

        $query = $this->_db->prepare($sql);

        $query->execute(array(':id' => $id));
        
        if($query->rowCount() > 0)
            return true;
        else
            return false;
    }

    public function createComment(Comment $comment){
        
        if(!$comment->isValidEntity())
            return false;

        $sql =  ' INSERT INTO '.self::TABLE_NAME.
                ' (postID, authorEmail, authorName, content, status)'.
                ' VALUES (:postID, :authorEmail, :authorName, :content, :status)';

        $query = $this->_db->prepare($sql);

        $query->execute(array(':postID' => $comment->getPostID(),
                              ':authorEmail' => $comment->getAuthorEmail(),
                              ':authorName' => $comment->getAuthorName(),
                              ':content' => $comment->getContent(),
                              ':status' => $comment->getStatus(),
            ));

        if($query->rowCount() > 0)
            return true;
        else
            return false; 
    }

    public function surveyComment($id){
        
        $sql =  ' UPDATE '.self::TABLE_NAME.
                ' SET isUnderSurvey = true,'.
                    ' surveyCount = surveyCount + 1'.
                ' WHERE id = :id';

        $query = $this->_db->prepare($sql);

        $query->execute(array(':id' => $id));

        if($query->rowCount() > 0)
            return true;
        else
            return false; 
    }

    public function removeSurveyOnComment($id){
        
        $sql =  ' UPDATE '.self::TABLE_NAME.
                ' SET isUnderSurvey = false,'.
                    ' surveyCount = 0'.
                ' WHERE id = :id';

        $query = $this->_db->prepare($sql);

        $query->execute(array(':id' => $id));

        if($query->rowCount() > 0)
            return true;
        else
            return false; 
    }
}