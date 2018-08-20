<?php

namespace Library;  

class EntityManager{

    
    const SQL_USER = 'root';
    const SQL_SERVER = 'localhost';
    const SQL_PASSWORD = '';

    const DATABASE = 'serenity';

    /**
     * Database Instance
     */
    protected $_db;

    public function __construct()
    {
        try{
            $this->_db = new \PDO('mysql:dbname='.self::DATABASE.';host='.self::SQL_SERVER,self::SQL_USER ,self::SQL_PASSWORD);
        }
        catch(\PDOException $e){
            echo 'Une erreur est survenue :'.$e->getMessage();
            die();
        } 
    }
}