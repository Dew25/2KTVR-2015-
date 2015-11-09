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
	$model=new Model();
	$posts = $model->get_all_posts();
	$html=render_template("view/template/list.php",array('posts'=>$posts));
	return new Response($html);
}
function show_action($id){
	$model=new Model();
	$post=$model->get_post_by_id($id);
	require 'view/template/show.php';
}
function admin_action(){
	$model=new Model();
	$posts = $model->get_all_posts();
	global $test;
	if($test==true)var_dump_to_file($posts,'log_posts.txt');
	require 'view/template/admin.php';
}

function add_action(){
//echo "hello controller1";
	$model=new Model();
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
	$model=new Model();
	$model->update();
	$posts = Model::get_all_posts();
	require 'view/template/admin.php';

}