<?php

namespace Library;

use Library\Database;

class ModelManager{

    /**
     * Database 
     */
    protected $_db;

    public function __construct(){
        $this->_db = Database::getInstance();
    }
}