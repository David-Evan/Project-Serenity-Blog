<?php
namespace Library;

class BaseController{
    
    const AJAX_SUCCESS_RETURN = 'SUCCESS';
    const AJAX_FAIL_RETURN = 'FAIL';

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

        $excerptFilter = new \Twig_Filter('excerpt', 'Library\Tool::getExcerpt');
        $gravatarFilter = new  \Twig_Filter('gravatar', 'Library\Tool::getGravatar');
        
        $this->twig->addFilter($excerptFilter);
        $this->twig->addFilter($gravatarFilter);
    }
    
    public function redirect404(){

        return $this->twig->render('404.html');
    }
}