<?php
require ('../../vendor/autoload.php');
use Controller\{
    BlogController};
    

if(!isset($_GET['controller'])){

    $ctrl = new BlogController();
    $ctrl->indexAction();

}