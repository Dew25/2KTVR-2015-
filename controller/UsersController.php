<?php
use Symfony\Component\HttpFoundation\Response;

class ModelController{


private function render_template($path, array $args)
{
	extract($args);
	ob_start();
	require $path;
	$html=ob_get_clean();
	return $html;
}

public function users_action() {
	$usersModel=new UsersModel();
	$posts = $usersModel->get_all_rows();
	$html=$this->render_template("view/template/list.php",array('posts'=>$posts));
	return new Response($html);
}

}
