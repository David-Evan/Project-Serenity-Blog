<?php

namespace Controller;

use Library\{BaseController};
use Library\Paginator\ {Paginator, CommentsPaginatorOptions, BlogPostsPaginatorOptions};
use Model\Manager\{BlogPostsManager, CommentsManager};
use Model\Entity\{BlogPost, Comment};

class AdminController extends BaseController{

    const CONTROLLER_NAME = 'admin';

    /**
     * @return string
     */
    public function indexAction(){

        return $this->twig->render(self::CONTROLLER_NAME.'/index.html', array());
    }
}