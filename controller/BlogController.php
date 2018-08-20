<?php

namespace Controller;

use Library\BaseController;
use Model\BlogPostManager;

class BlogController extends BaseController{

    const ENVIRONNEMENT = 'frontend';

    public function indexAction(){
        

        $blogPostManager = new BlogPostManager();

        return $this->redirect404();
        return $this->twig->render(self::ENVIRONNEMENT.'/index.html', array(

            'BlogPosts' => $blogPostManager->getAllPublishedPost(),
        ));
    }

    public function viewBlogPostAction($id){

        $blogPostManager = new BlogPostManager();

        $blogPost = $blogPostManager->getPostByID($id);
        
        return $this->twig->render(self::ENVIRONNEMENT.'/index.html', array(

            'BlogPost' => $blogPost,
        ));
        
    }

}