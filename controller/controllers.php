<?php
use Symfony\Component\HttpFoundation\Response;

function render_template($path, array $args)
{
	extract($args);
	ob_start();
	require $path;
	$html=ob_get_clean();
	return $html;
}

function list_action() {
	$postsModel=new PostsModel();
	$posts = $postsModel->get_all_posts();
	$html=render_template("view/template/list.php",array('posts'=>$posts));
	return new Response($html);
}
function show_action($id){
	//$postsModel=new PostsModel();
	$post=get_post_by_id($id);
	$html=render_template('view/template/show.php',array('post'=>$post));
	return new Response($html);
}
function admin_action(){
	$postsModel=new PostsModel();
	$posts = $postsModel->get_all_posts();
	require 'view/template/admin.php';
}

function add_action(){
//echo "hello controller1";
	$model=new PostsModel();
	$model->add_post();
	$posts = $model->get_all_posts();
//var_dump($posts);
	require 'view/template/admin.php';
}

function about_action()
{
	require 'view/template/about.php';
}

function update_action(){
	$model=new PostsModel();
	$model->update();
	$posts = $model->get_all_posts();
	require 'view/template/admin.php';

}
function delete_action(){
	$model=new PostsModel();
	$model->delete_post($_REQUEST['id']);
	$posts = $model->get_all_posts();
	require 'view/template/admin.php';

}