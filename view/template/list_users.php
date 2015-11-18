<?php ob_start();?>
	<h1>Список постов</h1>
	<ol><!--Это коментарий -->
		<?php //это коментарий
		foreach ($posts as $post): ?>
			<li>

				<a href="/ushow?id=<?php echo $user['uid'];?>">

					<?php echo $user['firstname']." ".$user['lastname'];?>
				</a>
			</li>
		<?php endforeach;?>
	</ol>
<?php $content = ob_get_clean();?>

<?php include 'view/template/layout.php';?>