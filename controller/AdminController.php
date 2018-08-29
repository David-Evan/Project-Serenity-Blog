<?php

namespace Controller;

use Library\{BaseController};
use Library\Paginator\ {Paginator, TablePaginatorOptions};
use Model\Manager\{BlogPostsManager, CommentsManager};
use Model\Entity\{BlogPost, Comment};

class AdminController extends BaseController{

    const CONTROLLER_NAME = 'admin';

    /**
     * GET : {?p}
     * Show index page
     */
    public function indexAction($page = 1){

        $commentManager = new CommentsManager;

        $commentsUnderSurvey = $commentManager->getAllCommentsUnderSurvey();

        $paginator = new Paginator($commentsUnderSurvey, new TablePaginatorOptions($page));
        $paginator->setURLTemplate('?p={page}');

        return $this->twig->render(self::CONTROLLER_NAME.'/index.html', array(
            'CommentsUnderSurvey' => $paginator->getElementsForCurrentPage(),
            'Paginator' => $paginator,
        ));
    }

    /**
     * Delete comment Action
     */
    public function deleteCommentAction($id){
        
        $commentManager = new CommentsManager;

        if(!is_numeric($id))
            return $this->redirect404();
        
        if($commentManager->deleteCommentByID($id))
            return $this->indexAction();
        else
            return $this->redirect404();
    }

    /**
     * Remove Survey on Comment Action
     */
    public function removeSurveyOnCommentAction($id){
        
        $commentManager = new CommentsManager;

        if(!is_numeric($id))
            return $this->redirect404();
        
        if($commentManager->removeSurveyOnComment($id))
            return $this->indexAction();
        else
            return $this->redirect404();
    }
}