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
        case 'removeSurveyOnComment':
            
            if(isset($_GET['id']) && is_numeric($_GET['id']))
                echo $ctrl->removeSurveyOnCommentAction((int)$_GET['id']);
        break;

        /********************/
        case 'deleteComment':
            
            if(isset($_GET['id']) && is_numeric($_GET['id']))
                echo $ctrl->deleteCommentAction((int)$_GET['id']);
        break;

        /********************/
        default: 
            if(isset($_GET['p']) && is_numeric($_GET['p']))
                echo $ctrl->indexAction((int)$_GET['p']);
            else
                echo $ctrl->indexAction();
        }
else{
    if(isset($_GET['p']) && is_numeric($_GET['p']))
        echo $ctrl->indexAction((int)$_GET['p']);
    else
        echo $ctrl->indexAction();
}