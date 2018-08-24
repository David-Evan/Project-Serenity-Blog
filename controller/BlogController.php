<?php

namespace Controller;

use Library\{BaseController, Paginator};
use Model\Manager\{BlogPostsManager, CommentsManager};
use Model\Entity\{BlogPost, Comment};

class BlogController extends BaseController{

    const ENVIRONNEMENT = 'frontend';
    
    const BLOGPOST_PER_PAGE = '1';

    /**
     * {blog?} {page?}
     * @return string - index view (list of last Posts)
     */
    public function indexAction($page = 1){
        
        $blogPostManager = new BlogPostsManager;

        $blogPosts = $blogPostManager->getAllPublishedPosts();

        $paginator = new Paginator($blogPosts, $page);

        return $this->twig->render(self::ENVIRONNEMENT.'/index.html', array(
            'BlogPosts' => $paginator->getElementsForCurrentPage(),
            'Sidebar' => array('BlogPosts' => $paginator->getElementsForPage(1)),
            'Paginator' => $paginator,
        ));
    }

    /**
     * {blog?} + {id}
     * @return string - Single Post view
     */
    public function viewBlogPostAction($id){

        $blogPostManager = new BlogPostsManager;

        $blogPost = $blogPostManager->getPostByID($id);

        if(!$blogPost or $blogPost->status !== 'published')
            return $this->redirect404();

        $commentManager = new CommentsManager;
        $postComments = $commentManager->getAllCommentsForPostID($id);

        $paginator = new Paginator($postComments, 1, 1);

        return $this->twig->render(self::ENVIRONNEMENT.'/viewBlogPost.html', array(
            'BlogPost' => $blogPost,
            'Comments' => $paginator->getElementsForCurrentPage(),
            'Paginator' => $paginator,
        ));

    }

    /**
     * Ajax POST : {blog?} + $_POST 
     */
    public function publishCommentAction($post){

        $comment = new Comment;

        $comment->setPostID($post['postID']);
        $comment->setAuthorEmail($post['authorEmail']);
        $comment->setAuthorName($post['authorName']);
        $comment->setContent($post['commentContent']);
        $comment->setStatus(Comment::DEFAULT_STATUS);
        
        $commentManager = new CommentsManager;

        if($commentManager->createComment($comment))
            return self::AJAX_SUCCESS_RETURN;
        else
            return self::AJAX_FAIL_RETURN;
    }

    /**
     * Ajax GET : {id}
     * Return only comments (need to be insert in template)
     */
    public function getCommentsForPostAction($id){

        $commentManager = new CommentsManager;
        $postComments = $commentManager->getAllCommentsForPostID($id);

        return $this->twig->render(self::ENVIRONNEMENT.'/partial/commentsList.html', array(
            'Comments' => $postComments,
        ));
    }
}