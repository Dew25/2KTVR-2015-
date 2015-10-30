<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$test=false;
//include_once 'test/testFunction.php';

// echo "<pre>";
// print_r($_REQUEST);
//print_r($_SERVER);
// echo "</pre>";
include_once 'vendor/autoload.php';
include_once 'model/model.php';
include_once 'controller/controllers.php';
include_once 'route/routing.php';

$response->send();
?>



