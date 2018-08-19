<?php

namespace Controller;

use Library\BaseController;

class BlogController extends BaseController{

    const Environnement = 'frontend';

    public function indexAction(){
        
        return $this->twig->render(self::Environnement.'/index.html');
    }

    public function viewArticleAction($id){



    }

}