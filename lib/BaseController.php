<?php
namespace Library;

class BaseController{
    
    const viewFolder = '../../view/';
    const cacheFolder = '../../view/cache';

    protected $environnement;
    protected $twig;

    public function __construct(){

        // Twig Initialization
        $loader = new \Twig_Loader_Filesystem(self::viewFolder);
        $this->twig = new \Twig_Environment($loader, array(
            'cache' => false,
            'debug' => true
        ));

    }


    /**
     * Getter - Setter
     */
    public function getEnvironnement(){
        return $this->environnement;
    }

}