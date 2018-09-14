<?php

namespace Controller;

use Library\{BaseController};
use Library\Paginator\ {Paginator, CommentsPaginatorOptions, BlogPostsPaginatorOptions};
use Model\Manager\{BlogPostsManager, CommentsManager};
use Model\Entity\{BlogPost, Comment};

class BlogController extends BaseController{

    const CONTROLLER_NAME = 'blog';

    /**
     * {blog?} {page?}
     * @return string - index view (list of last Posts)
     */
    public function indexAction($page = 1){
        
        $blogPostManager = new BlogPostsManager;

        $blogPosts = $blogPostManager->getAllPublishedPosts();
        
        $paginator = new Paginator($blogPosts, new BlogPostsPaginatorOptions($page));

        return $this->twig->render(self::CONTROLLER_NAME.'/index.html', array(
            'BlogPosts' => $paginator->getElementsForCurrentPage(),
            'Sidebar' => array('BlogPosts' => $paginator->getElementsForPage(1)),
            'Paginator' => $paginator,
        ));
    }

    /**
     * {blog?}/auteur
     * @return string - author view
     */
    public function authorAction(){
        return $this->twig->render(self::CONTROLLER_NAME.'/author.html');
    }

    /**
     * {blog?} + {id}
     * @return string - Single Post view
     */
    public function viewBlogPostAction($id, $commentsPage = 1){

        // Get Blog Post
        $blogPostManager = new BlogPostsManager;

        $blogPost = $blogPostManager->getPostByID($id);

        if(!$blogPost or $blogPost->status !== 'published')
            return $this->redirect404();

        // Get comments
        $commentManager = new CommentsManager;
        $commentForPost = $commentManager->getAllCommentsForPostID($id);

        if(!$commentForPost)
            $commentForPost = array();

        $paginator = new Paginator($commentForPost, new CommentsPaginatorOptions($commentsPage));
        if(!$paginator->isCurrentPageFirstOne() && !$paginator->currentPageExist())
            return $this->redirect404();

        // Render view
        return $this->twig->render(self::CONTROLLER_NAME.'/viewBlogPost.html', array(
            'BlogPost' => $blogPost,
            'Comments' => $paginator->getElementsForPage($commentsPage),
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
        $commentForPost = $commentManager->getAllCommentsForPostID($id);

        return $this->twig->render(self::CONTROLLER_NAME.'/partial/commentsList.html', array(
            'Comments' => $commentForPost,
        ));
    }

    /**
     * Ajax GET : {id}
     * Update a comment to underSurvey
     */
    public function surveyCommentAction($id){

        $commentManager = new CommentsManager;

        if(!is_numeric($id))
            return self::AJAX_FAIL_RETURN;
        
        if($commentManager->surveyComment($id))
            return self::AJAX_SUCCESS_RETURN;
        else
            return self::AJAX_FAIL_RETURN;
    }

    
}