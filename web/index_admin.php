<?php
require ('../vendor/autoload.php');
use Controller\{AdminController};

/**
 * $_GET['c'] = controller
 * $_GET['a'] = action
 * $_GET['p'] = page
 */

$ctrl = new AdminController();

if(isset($_GET['a']))
    switch($_GET['a']){
        
        /********************/


        /********************/


        /********************/
        default: 
            echo $ctrl->indexAction();
        }
else
        echo $ctrl->indexAction();