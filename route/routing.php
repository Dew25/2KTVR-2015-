<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
// //echo "<br>uri=".$_SERVER['REQUEST_URI'];
// $s = explode('?', $_SERVER['REQUEST_URI']);
// //echo "uri="
// $uri = $s[0];
// $uri=rtrim($uri,'/');
// //echo "<br>обработанный uri=".$uri;
$request = Request::createFromGlobals();
$uri = $request->getPathInfo();

if ($uri == '/') {
	$response=list_action();
}elseif($uri=='/show' && $request->query->has('id')){
	$response=show_action($request->query->get('id'));
}elseif($uri=='/2KTVR-2015-/index.php/admin'){
	admin_action();
}elseif($uri=='/2KTVR-2015-/index.php/add'){
	add_action();
}elseif($uri=='/2KTVR-2015-/index.php/about'){
	about_action();
}elseif($uri=='/2KTVR-2015-/index.php/update'){
	update_action();
}

