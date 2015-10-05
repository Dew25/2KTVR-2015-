<?php ob_start();?>
	<h1>Список постов</h1>
	<ul><!--Это коментарий -->
		<?php //это коментарий
		foreach ($posts as $post): ?>
			<li>
				<a href="index.php/show?id=<?php echo $post['id'];?>">
					<?php echo $post['id'] . '. ' . $post['title'];?>
				</a>
			</li>
		<?php endforeach;?>
	</ul>
<?php $content = ob_get_clean();?>

<?php include 'view/template/layout.php';?>