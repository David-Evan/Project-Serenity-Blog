<?php

namespace Controller;

use Library\BaseController;
use Model\BlogPostManager;

class BlogController extends BaseController{

    const ENVIRONNEMENT = 'frontend';

    public function indexAction(){
        

        $blogPostManager = new BlogPostManager();

        return $this->twig->render(self::ENVIRONNEMENT.'/index.html', array(

            'BlogPosts' => $blogPostManager->getAllPosts(),
        ));
    }

    public function viewArticleAction($id){



    }

}