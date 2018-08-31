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
        case 'createBlogPost':
            if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST))
                echo $ctrl->createBlogPostAction($_POST);
            else
                echo $ctrl->showCreateBlogPostFormAction();
        break;

        /********************/
        case 'updateBlogPost':
        if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST))
            echo $ctrl->updateBlogPostAction($_POST);

        elseif(isset($_GET['id']) && is_numeric($_GET['id']))
            echo $ctrl->showUpdateBlogPostFormAction((int) $_GET['id']);
        
            else
            echo $ctrl->redirect404();
        break;

        /********************/
        case 'deleteBlogPost':
            
        if(isset($_GET['id']) && is_numeric($_GET['id']))
            echo $ctrl->deleteBlogPostAction((int)$_GET['id']);
        break;

        /********************/
        case 'viewAllBlogPosts':
            if(isset($_GET['p']) && is_numeric($_GET['p']))
                echo $ctrl->viewAllBlogPostsAction((int)$_GET['p']);
            else
                echo $ctrl->viewAllBlogPostsAction();
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