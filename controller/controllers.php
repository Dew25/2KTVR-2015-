<?php
use Symfony\Component\HttpFoundation\Response;
echo 'test1';
function list_action() {
	$posts = get_all_posts();
	$html=render_template('view/template/list.php', array('posts' => $posts));

	return new Response($html);
}

function show_action($id){
	$post=get_post_by_id($id);
	$html=render_template('view/template/show.php', array('post' => $post));

	return new Response($html);
}

function admin_action(){
	$posts = get_all_posts();
	$html=render_template('view/template/admin.php', array('posts' => $posts));

	return new Response($html);
}

function add_action(){
	add_post();
	$posts = get_all_posts();
	$html=render_template('view/template/admin.php', array('posts' => $posts));

	return new Response($html);
}

// функция помощник (helper), которая возвращает
// html из указанного шаблона, передавая ему 
// массив данных вычисленных моделью.
function render_template($path, array $args)
{
    extract($args);
    ob_start();
    require $path;
    $html = ob_get_clean();

    return $html;
}