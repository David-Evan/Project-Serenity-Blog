<?php

namespace Controller;

use Library\BaseController;
use Model\BlogPostManager;

class BlogController extends BaseController{

    const ENVIRONNEMENT = 'frontend';

    /**
     * {blog} + {id}
     * @return string - index view (list of last Posts)
     */
    public function indexAction(){
        
        $blogPostManager = new BlogPostManager();

        return $this->twig->render(self::ENVIRONNEMENT.'/index.html', array(

            'BlogPosts' => $blogPostManager->getAllPublishedPost(),
        ));
    }

    /**
     * {blog} + {id}
     * @return string - Single Post view
     */
    public function viewBlogPostAction($id){

        $blogPostManager = new BlogPostManager();

        $blogPost = $blogPostManager->getPostByID($id);

        if(!$blogPost or $blogPost->status !== 'published')
            return $this->redirect404();

        return $this->twig->render(self::ENVIRONNEMENT.'/viewBlogPost.html', array(
            'BlogPost' => $blogPost,
        ));

    }

}