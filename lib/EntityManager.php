<?php

namespace Library;

use Library\Database;

class EntityManager{

    /**
     * Database 
     */
    protected $_db;

    public function __construct(){
        $this->_db = Database::getInstance();
    }
}