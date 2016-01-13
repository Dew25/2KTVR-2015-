<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


function myautoloader($class_name){
	
	$myDirs=array(	'controller/' , 
					'model/',
					'route/',
					'view');

	foreach($myDirs as $directory)
        {
            //see if the file exsists
            if(file_exists($directory.$class_name . '.php'))
            {
                require_once($directory.$class_name . '.php');
                //only require the class once, so quit after to save effort (if you got more, then name them something else 
                return;
            }            
        }
}

// 
// Инициализация классов и файлов с функциями.
// +++++++++++++++++++++++++++++++++++++++++++
include_once 'vendor/autoload.php';
spl_autoload_register('myautoloader');

// Единая точка входа в наше приложение
// ++++++++++++++++++++++++++++++++++++
//функции в этом файле принимают и обрабатывают запрос,
//а также формируют маршрут.
include_once 'route/routing.php';
// use Doctrine\ORM\EntityManager,
// Doctrine\ORM\Configuration;
// $applicationMode="development";
// if ($applicationMode == "development") {
//     $cache = new \Doctrine\Common\Cache\ArrayCache;
// } else {
//     $cache = new \Doctrine\Common\Cache\ApcCache;
// }

// $config = new Configuration;
// $config->setMetadataCacheImpl($cache);
// $driverImpl = $config->newDefaultAnnotationDriver('/model');
// $config->setMetadataDriverImpl($driverImpl);
// $config->setQueryCacheImpl($cache);
// $config->setProxyDir('/vendor/doctrine/lib/MyProject/Proxies');
// $config->setProxyNamespace('MyProject\Proxies');


// if ($applicationMode == "development") {
//     $config->setAutoGenerateProxyClasses(true);
// } else {
//     $config->setAutoGenerateProxyClasses(false);
// }

// $connectionOptions = array(
//     'driver' => 'pdo_mysql',
//     'path' => 'localhost'
// );

// $em = EntityManager::create($connectionOptions, $config);
//отсылает html с данными клиенту webserver-a
$response->send();






