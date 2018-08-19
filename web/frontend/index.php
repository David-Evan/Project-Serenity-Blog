<?php
require ('../../vendor/autoload.php');
use Library\FrontendApplication;

$app = new FrontendApplication();

if(!isset($_GET['c'])){

    require('../../views/'.$app->getEnvironnement().'/index.tpl.php');

}