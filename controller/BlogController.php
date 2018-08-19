<?php

namespace Controller;

use Library\BaseController;

class BlogController extends BaseController{

    const Environnement = 'frontend';

    public function __construct(){
        $this->environnement = self::Environnement;
    }

    public function indexAction(){

        echo __DIR__;
    }

}