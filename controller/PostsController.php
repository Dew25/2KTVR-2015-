<?php
use Symfony\Component\HttpFoundation\Response;

class PostsController{


private function render_template($path, array $args)
{
	extract($args);
	ob_start();
	require $path;
	$html=ob_get_clean();
	return $html;
}

public function list_action() {
	$postsModel=new PostsModel();
	$posts = $postsModel->get_all_posts();
	$html=$this->render_template("view/template/list.php",array('posts'=>$posts));
	return new Response($html);
}
public function show_action($id){
	$postsModel=new PostsModel();
	$post=$postsModel->get_post_by_id($id);
	$html=$this->render_template("view/template/show.php",array('post'=>$post));
	return new Response($html);
	//require 'view/template/show.php';
}
public function delete_action($id){
	$postsModel=new PostsModel();
	$postsModel->delete_post($id);
	$posts = $postsModel->get_all_posts();
	$html=$this->render_template("view/template/admin.php",array('posts'=>$posts));
	return new Response($html);
	//require 'view/template/admin.php';
}
public function add_action(){
//echo "hello controller1";
	$model=new PostsModel();
	$model->add_post();
	$posts = $model->get_all_posts();
	$html=$this->render_template("view/template/admin.php",array('posts'=>$posts));
	return new Response($html);
	//require 'view/template/admin.php';
}
public function admin_action(){
	$postsModel=new PostsModel();
	$posts = $postsModel->get_all_posts();
	$html=$this->render_template("view/template/admin.php",array('posts'=>$posts));
	return new Response($html);
	require 'view/template/admin.php';
}
}