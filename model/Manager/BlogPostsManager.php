<?php

namespace Model\Manager;

use Library\EntityManager;
use Model\BlogPost;

/**
 * BlogPostManager - 
 * All SELECT Query return false if no result found
 * All UPDATE / CREATE / DELETE return true / false depending success
 */
class BlogPostsManager extends EntityManager{

    const TABLE_NAME =  'blog_posts';


    public function getAllPosts(){
        
        $result = $this->_db->query('SELECT * from '.self::TABLE_NAME, \PDO::FETCH_OBJ)->fetchAll();

        if(empty($result))
            return false;
        return $result;
    }

    public function getAllPublishedPosts(){

        $result = $this->_db->query('SELECT * from '.self::TABLE_NAME.' where status="published"', \PDO::FETCH_OBJ)->fetchAll();

        if(empty($result))
            return false;
        return $result;
    }

    public function getAllDraftPosts(){

        $result = $this->_db->query('SELECT * from '.self::TABLE_NAME.' where status="draft"', \PDO::FETCH_OBJ)->fetchAll();

        if(empty($result))
            return false;
        return $result;
    }

    public function getPostByID($id){

        $sql = 'SELECT * from '.self::TABLE_NAME.' where id=:id';
        $query = $this->_db->prepare($sql);

        $query->execute(array(':id' => $id));
        $post = $query->fetch(\PDO::FETCH_OBJ);

        if($query->rowCount() > 0)
            return $post;
        else
            return false;
    }

    public function updatePost(BlogPost $blogPost){

    }

    public function deletePostByID($id){
        $sql = 'DELETE from '.self::TABLE_NAME.' where id=:id';
        $query = $this->_db->prepare($sql);

        $query->execute(array(':id' => $id));

        if($query->rowCount() > 0)
            return true;
        else
            return false;
    }

    public function createPost(BlogPost $blogPost){
        
    }
}