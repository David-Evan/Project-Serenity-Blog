<?php
require ('../vendor/autoload.php');
use Controller\{AdminController};

/**
 * $_GET['c'] = controller
 * $_GET['a'] = action
 * $_GET['p'] = page
 */

$ctrl = new AdminController();

switch($_GET['a']){
    
    /********************/


    /********************/


    /********************/
    default: 
        echo $ctrl->indexAction();
    }