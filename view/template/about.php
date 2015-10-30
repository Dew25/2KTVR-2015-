<?php ob_start();?>
	<h1>Список постов</h1>
	<p>Описание нашей фирмы</p>
<?php $content = ob_get_clean();?>

<?php include 'view/template/layout.php';?>