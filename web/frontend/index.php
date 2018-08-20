<?php
require ('../../vendor/autoload.php');
use Controller\{
    BlogController};
    
if($_GET['controller'] == 'blog'){

    $ctrl = new BlogController();

    switch($_GET['action']){

        case 'viewBlogPost':

            if(isset($_GET['id']) && is_numeric($_GET['id']))
                echo $ctrl->viewBlogPostAction($_GET['id']);
        break;

        default: 
            echo $ctrl->indexAction();
    }

}
else{
    $ctrl = new BlogController();
    echo $ctrl->indexAction();
}