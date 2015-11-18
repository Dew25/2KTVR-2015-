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
	$postsController=new PostsController();
	$response=$postsController->list_action();
}elseif($uri=='/show' AND $request->query->has('id')){
	$postsController=new PostsController();
	$response=$postsController->show_action($request->query->get('id'));
}elseif($uri=='/admin'){
	$postsController=new PostsController();
	$response=$postsController->admin_action();
}elseif($uri=='/add'){
	$postsController=new PostsController();
	$response=$postsController->add_action();
}elseif($uri=='/about'){
	$postsController=new PostsController();
	$response=$postsController->about_action();
}elseif($uri=='/update'){
	$postsController=new PostsController();
	$response=$postsController->update_action();
}elseif($uri=='/delete' AND $request->query->has('id')){
	$postsController=new PostsController();
	$response=$postsController->delete_action($request->query->get('id'));
}elseif($uri=='/users'){
	$usersController=new UsersController();
	$response=$usersController->users_action();
}

