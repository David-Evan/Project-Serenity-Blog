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

        $this->twig->addExtension(new \Twig_Extension_Debug());

    }
}