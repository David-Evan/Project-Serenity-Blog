<?php

namespace Library;

class BaseController{
    
    protected $environnement;

    public function getEnvironnement(){
        return $this->environnement;
    }

}