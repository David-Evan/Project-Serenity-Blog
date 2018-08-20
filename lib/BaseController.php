<?php
namespace Library;

class BaseController{
    
    const VIEW_FOLDER = '../../view/';
    const CACHE_FOLDER = '../../view/cache';

    protected $twig;

    public function __construct(){

        // Twig Initialization
        $loader = new \Twig_Loader_Filesystem(self::VIEW_FOLDER);
        $this->twig = new \Twig_Environment($loader, array(
            'cache' => false,
            'debug' => true
        ));

        // Bebug only, need to be remove in prod verv.
        $this->twig->addExtension(new \Twig_Extension_Debug());

        $filter = new \Twig_Filter('excerpt', 'Library\Tool::getExcerpt');
        $this->twig->addFilter($filter);

    }

    public function redirect404(){

        return $this->twig->render('404.html');
    }
}