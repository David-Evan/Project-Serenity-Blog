<?php

namespace Model\Manager;

use Library\EntityManager;
use Model\Entity\BlogPost;

/**
 * BlogPostManager - 
 * All SELECT Query return false if no result found
 * All UPDATE / CREATE / DELETE return true / false depending success
 */
class BlogPostsManager extends EntityManager{

    const TABLE_NAME =  'blog_posts';


    public function getAllPosts($orderByPublishDate = 'DESC') {
        
        return $this->_db->query(' SELECT * FROM '.self::TABLE_NAME.
                                 ' ORDER BY publishDate '.$orderByPublishDate, \PDO::FETCH_OBJ)->fetchAll();
    }

    public function getAllPublishedPosts($orderByPublishDate = 'DESC'){

        return $this->_db->query(' SELECT * FROM '.self::TABLE_NAME.
                                    ' WHERE status="published"'.
                                    ' ORDER BY publishDate '.$orderByPublishDate, \PDO::FETCH_OBJ)->fetchAll();
    }

    public function getAllDraftPosts(){

        $result = $this->_db->query(' SELECT * FROM '.self::TABLE_NAME.
                                    ' WHERE status="draft"', 
                                    \PDO::FETCH_OBJ)->fetchAll();

        if(empty($result))
            return false;
        return $result;
    }

    public function getPostByID($id){

        $sql = 'SELECT * FROM '.self::TABLE_NAME.
               ' WHERE id=:id';

        $query = $this->_db->prepare($sql);

        $query->execute(array(':id' => $id));
        $post = $query->fetch(\PDO::FETCH_OBJ);

        if($query->rowCount() > 0)
            return $post;
        else
            return false;
    }

    public function updatePost(BlogPost $blogPost){

        if(!$blogPost->isValidEntity())
            return false;
            
        $sql =  ' UPDATE '.self::TABLE_NAME.
                ' SET title = :title ,'.
                    ' content = :content ,'.
                    ' status = :status'.
                ' WHERE id = :id';

        $query = $this->_db->prepare($sql);

        $query->execute(array(  ':title' => $blogPost->getTitle(),
                                ':content' => $blogPost->getContent(),
                                ':status' => $blogPost->getStatus(),
                                ':id' => $blogPost->getId(),
            ));

        if($query->rowCount() > 0)
            return true;
        else
            return false; 
    }

    public function createPost(BlogPost $blogPost){
      
        if(!$blogPost->isValidEntity())
            return false;

        $sql =  ' INSERT INTO '.self::TABLE_NAME.
                ' (title, authorName, content, status, slug)'.
                ' VALUES (:title, :authorName, :content, :status, :slug)';

        $query = $this->_db->prepare($sql);

        $query->execute(array(  ':title' => $blogPost->getTitle(),
                                ':authorName' => $blogPost->getAuthorName(),
                                ':content' => $blogPost->getContent(),
                                ':status' => $blogPost->getStatus(),
                                ':slug' => $blogPost->getSlug(),
            ));

        if($query->rowCount() > 0)
            return true;
        else
            return false; 
    }

    
    public function deletePostByID($id){
        $sql = ' DELETE FROM '.self::TABLE_NAME.
               ' WHERE id=:id';

        $query = $this->_db->prepare($sql);

        $query->execute(array(':id' => $id));

        if($query->rowCount() > 0)
            return true;
        else
            return false;
    }

    public function changePostStatus($id){

        if(!$blogPost = $this->getPostByID($id))
            return false;
            
        $status = ($blogPost->status == BlogPost::PUBLISHED_STATUS) ? BlogPost::DRAFT_STATUS : BlogPost::PUBLISHED_STATUS;

        $sql =  ' UPDATE '.self::TABLE_NAME.
                         ' SET status = :status'.
                         ' WHERE id = :id';

        $query = $this->_db->prepare($sql);

        $query->execute(array(  ':status' => $status,
                                ':id' => $id,
            ));

        if($query->rowCount() > 0)
            return true;
        else
            return false; 
    }
}