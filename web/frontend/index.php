<?php
require ('../../vendor/autoload.php');
use Controller\{
    BlogController};
    
    /**
     * $_GET['c'] = controller
     * $_GET['a'] = action
     */

if(empty($_GET['c']) or $_GET['c']== 'blog'){

    $ctrl = new BlogController();

    switch($_GET['a']){

        case 'viewBlogPost':

            if(isset($_GET['id']) && is_numeric($_GET['id']))
                echo $ctrl->viewBlogPostAction($_GET['id']);
        break;

        case 'publishComment':
            if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST))
                echo $ctrl->publishCommentAction($_POST);
        break;

        default: 
            echo $ctrl->indexAction();
    }
}
else{
    $ctrl = new BlogController();
    echo $ctrl->indexAction();
}