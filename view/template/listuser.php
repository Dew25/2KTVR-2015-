<?php ob_start();?>
	<h1>Список пользователей</h1>
	<ol><!--Это коментарий -->
		<?php //это коментарий
		foreach ($rows as $row): ?>
			<li>

				<a href="/show?id=<?php echo $row['id'];?>">

					<?php echo  $row['title'];?>
				</a>
			</li>
		<?php endforeach;?>
	</ol>
<?php $content = ob_get_clean();?>

<?php include 'view/template/layout.php';?>