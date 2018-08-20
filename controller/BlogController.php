<?php

namespace Controller;

use Library\BaseController;
use Model\BlogPostsManager;
use Model\CommentsManager;

class BlogController extends BaseController{

    const ENVIRONNEMENT = 'frontend';

    /**
     * {blog} + {id}
     * @return string - index view (list of last Posts)
     */
    public function indexAction(){
        
        $blogPostManager = new BlogPostsManager;

        return $this->twig->render(self::ENVIRONNEMENT.'/index.html', array(

            'BlogPosts' => $blogPostManager->getAllPublishedPosts(),
        ));
    }

    /**
     * {blog} + {id}
     * @return string - Single Post view
     */
    public function viewBlogPostAction($id){

        $blogPostManager = new BlogPostsManager;

        $blogPost = $blogPostManager->getPostByID($id);

        if(!$blogPost or $blogPost->status !== 'published')
            return $this->redirect404();


        $commentManager = new CommentsManager;
        $postComments = $commentManager->getAllCommentsForPostID($id);


        return $this->twig->render(self::ENVIRONNEMENT.'/viewBlogPost.html', array(
            'BlogPost' => $blogPost,
            'Comments' => $postComments,
        ));

    }

}