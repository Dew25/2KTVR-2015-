<?php ob_start();?>
	<h1>Список постов</h1>
	<ol><!--Это коментарий -->
		<?php //это коментарий
		foreach ($posts as $post): ?>
			<li>

				<a href="/show?id=<?php echo $post['id'];?>">

					<?php echo  $post['title'];?>
				</a>
			</li>
		<?php endforeach;?>
	</ol>
<?php $content = ob_get_clean();?>

<?php include 'view/template/layout.php';?>