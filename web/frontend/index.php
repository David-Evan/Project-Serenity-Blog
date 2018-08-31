<?php
require ('../../vendor/autoload.php');
use Controller\{
    BlogController};
    
    /**
     * $_GET['c'] = controller
     * $_GET['a'] = action
     * $_GET['p'] = page
     */

if(empty($_GET['c']) or $_GET['c']== 'blog'){

    $ctrl = new BlogController();

    if(isset($_GET['a']))
        switch($_GET['a']){

            case 'viewBlogPost':
                if(isset($_GET['id']) && is_numeric($_GET['id']))
                {
                    if(isset($_GET['p']) && is_numeric($_GET['p']))
                        echo $ctrl->viewBlogPostAction($_GET['id'], (int)$_GET['p']);
                    else
                        echo $ctrl->viewBlogPostAction($_GET['id']);
                }
            break;
            
            /********************/
            case 'publishComment':
                if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST))
                    echo $ctrl->publishCommentAction($_POST);
            break;

            /********************/
            case 'getCommentsForPost':
                if(isset($_GET['id']) && is_numeric($_GET['id']))
                    echo $ctrl->getCommentsForPostAction($_GET['id']);
            break;

            /********************/
            case 'surveyComment':
                if(isset($_GET['id']) && is_numeric($_GET['id']))
                    echo $ctrl->surveyCommentAction($_GET['id']);
            break;

            /********************/
            default: 
                if(isset($_GET['p']) && is_numeric($_GET['p']))
                    echo $ctrl->indexAction((int)$_GET['p']);
                else
                    echo $ctrl->indexAction();
        }
    else
    {
        if(isset($_GET['p']) && is_numeric($_GET['p']))
            echo $ctrl->indexAction((int)$_GET['p']);
        else
            echo $ctrl->indexAction();
    }
}
else{
    $ctrl = new BlogController();
    echo $ctrl->indexAction();
}