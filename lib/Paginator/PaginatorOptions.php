<?php

namespace Library\Paginator;

/**
 * PaginatorOptions can be used to set parameters for Paginator.
 * You can create a new PaginatorOption or use anonym class extend PaginatorOption.
 * Each params are optionals and, if values isn't set, default paginator Option will be used.
 * 
 * PaginatorOptions is really usefull to create custom parameters for differents data.
 * 
 * Eg 1 : NewsPaginatorOptions extends PaginatorOptions
 * Eg 2 : CommentsPaginatorOptions extends Paginator Options
 */
class PaginatorOptions{

    protected $paginatorRange = 2;
    protected $elementsPerPage = 3;
    protected $currentPage = 1;
    protected $URLTemplate = '{page}';
    protected $URLPattern = '/{page}/';
    protected $enableStrictMode = true;


    /**
     * currentPage can be set using constructor. 
     *  It's just a shortcut.
     *
     * @param int $currentPage
     */
    public function __construct($currentPage = null){
        if($currentPage !== null)
            $this->setCurrentPage($currentPage);
    }

    /**
     * Use this method to get an array of all Properties.
     * Used by Paginator. You shouldn't rewrite it.
     *
     * @return array
     */
    public function getObjectProperties(){
        return get_object_vars($this);
    }

    /**** Getter ****/
    public function getPaginatorRange(){
        return $this->paginatorRange;
    }

    public function getElementsPerPage(){
        return $this->elementsPerPage;
    }

    public function getCurrentPage(){
        return $this->currentPage;
    }

    public function getURLTemplate(){
        return $this->URLTemplate;
    }

    public function getEnableStrictMode(){
        return $this->enableStrictMode;
    }

    /**** Setter ****/
    public function setPaginatorRange($paginatorRange){
        if(is_int($paginatorRange))
            $this->paginatorRange = $paginatorRange;
        else
            throw new \Exception('paginatorRange need to be an integer');
    }

    public function setElementsPerPage($elementsPerPage){
        if(is_int($elementsPerPage))
            $this->elementsPerPage = $elementsPerPage;
        else
            throw new \Exception('elementPerPage need to be an integer');
    }

    public function setCurrentPage($currentPage){
        if(is_int($currentPage))
            $this->currentPage = $currentPage;
        else
            throw new \Exception('currentPage need to be an integer');
    }

    public function setURLTemplate($URLTemplate){
        if(is_string($URLTemplate))
            $this->URLTemplate = $URLTemplate;
        else
            throw new \Exception('URLTemplate need to be a string');
    }

    public function setURLPattern($URLPattern){
        if(is_string($URLPattern))
            $this->URLPattern = $URLPattern;
        else
            throw new \Exception('URLTemplate need to be a string');
    }

    public function setEnableStrictMode($enableStrictMode){
        if(is_bool($enableStrictMode))
            $this->enableStrictMode = $enableStrictMode;
        else
            throw new \Exception('enableStrictMode need to be a boolean');
    }
}