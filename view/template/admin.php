<?php ob_start();?>

	<h2>Администрирование странички</h2>
<form action="/2KTVR2015/index.php/add" method="POST" name="add_form">

	<table>
		<tr>
			<td>Автор: </td>
			<td><input type="text" name="add_autor"></td>
		</tr>
		<tr>
			<td>Заголовок: </td>
			<td><input type="text" name="add_title"></td>
		</tr>
		<tr>
			<td>Text: </td>
			<td><input type="text" name="add_content"></td>
		</tr>
		<tr>
			<td><input type="reset" name="reset" value="Очистить"></td>
			<td><input type="submit" name="submit" value="Добавить"></td>

		</tr>
	</table>
</form>
<h3>Список постов</h3>
	<ul><!--Это коментарий -->
		<?php //это коментарий
		foreach ($posts as $post): ?>
			<li>
				<a href="/2KTVR2015/index.php/show?id=<?php echo $post['id'];?>">
					<?php echo $post['id'] . '. ' . $post['title'];?>
				</a>
			</li>
		<?php endforeach;?>
	</ul>
<?php $content = ob_get_clean();?>

<?php include 'view/template/layout.php';?>