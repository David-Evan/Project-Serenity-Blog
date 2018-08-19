<?php

namespace Controller;

use Library\BaseController;

class BlogController extends BaseController{

    const ENVIRONNEMENT = 'frontend';

    public function indexAction(){
        
        return $this->twig->render(self::ENVIRONNEMENT.'/index.html');
    }

    public function viewArticleAction($id){



    }

}