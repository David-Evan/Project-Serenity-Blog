<?php

namespace Model;

use Library\EntityManager;
use Model\BlogPost;

class BlogPostManager extends EntityManager{

    private $_tableName =  'blog_post';

    public function getAllPosts(){
        return $this->_db->query('SELECT * from '.$this->_tableName, \PDO::FETCH_ASSOC);
    }

    public function getPostByID($id){

    }

    public function updatePost(BlogPost $blogPost){

    }

    public function deletePostByID($id){

    }

    public function createPost(BlogPost $blogPost){
        
    }
}