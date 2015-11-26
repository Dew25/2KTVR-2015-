<?php
use Symfony\Component\HttpFoundation\Response;

class UsersController{


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
	$rows = $usersModel->get_all_rows();
	$html=$this->render_template("view/template/listuser.php",array('rows'=>$rows));
	return new Response($html);
}
public function adminuser_action() {
	$usersModel=new UsersModel();
	$rows = $usersModel->get_all_rows();
	$html=$this->render_template("view/template/adminuser.php",array('rows'=>$rows));
	return new Response($html);
}
public function adduser_action(){
//echo "hello controller1";
	$model=new UsersModel();
	$model->adduser();
	$rows = $model->get_all_rows();
	$html=$this->render_template("view/template/adminuser.php",array('rows'=>$rows));
	return new Response($html);
	//require 'view/template/admin.php';
}
}
