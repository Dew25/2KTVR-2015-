<?php
//echo "<br>uri=".$_SERVER['REQUEST_URI'];

// $s = explode('?', $_SERVER['REQUEST_URI']);
// $uri = $s[0];

// $uri=parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// echo "uri=".$uri;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

 $request = Request::createFromGlobals();
 $uri = $request->getPathInfo();
 //echo $uri;
if ($uri == '/') {
	$response = list_action();
}elseif($uri=='/show' && $request->query->has('id')){
	$response = show_action($request->query->has('id'));
}elseif($uri=='/admin'){
	$response = admin_action();
}elseif($uri=='/add'){
	$response = add_action();
}


