<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


// function __autoloader($class_name){
	
// 	$myDirs=array(	'controller/' , 
// 					'model/',
// 					'route/',
// 					'view');

// 	foreach($myDirs as $directory)
//         {
//             //see if the file exsists
//             if(file_exists($directory.$class_name . '.php'))
//             {
//                 require_once($directory.$class_name . '.php');
//                 //only require the class once, so quit after to save effort (if you got more, then name them something else 
//                 return;
//             }            
//         }
// }
include_once 'vendor/autoload.php';
// spl_autoload_register('__autoloader');

include_once 'vendor/autoload.php';
include_once 'model/model.php';
include_once 'model/PostsModel.php';
include_once 'controller/PostsController.php';
include_once 'controller/UsersController.php';
include_once 'controller/controllers.php';
include_once 'route/routing.php';
	
	$response->send();






