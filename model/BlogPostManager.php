<?php

namespace Model;

use Library\EntityManager;
use Model\BlogPost;

/**
 * BlogPostManager - 
 * All SELECT Query return false if no result found
 * All UPDATE / CREATE / DELETE return true / false depending success
 */
class BlogPostManager extends EntityManager{

    private $_tableName =  'blog_post';


    public function getAllPosts(){
        
        $result = $this->_db->query('SELECT * from '.$this->_tableName, \PDO::FETCH_OBJ)->fetchAll();

        if(empty($result))
            return false;
        return $result;
    }

    public function getAllPublishedPost(){

        $result = $this->_db->query('SELECT * from '.$this->_tableName.' where status="unpublished"', \PDO::FETCH_OBJ)->fetchAll();

        if(empty($result))
            return false;
        return $result;
    }

    public function getPostByID($id){

        $sql = 'SELECT * from '.$this->_tableName.' where id=:id';
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

    }

    public function createPost(BlogPost $blogPost){
        
    }
}