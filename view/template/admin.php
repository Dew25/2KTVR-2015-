<?php ob_start();?>

<h2>Администрирование странички</h2>
<form action="/add" method="POST" name="add_form">

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
	<ol><!--Это коментарий -->
		<?php //это коментарий
		foreach ($rows as $row): ?>
			<li>
				<a href="/show?id=<?php echo $row['id'];?>">
					<?php echo $post['title'];?>
				</a>
				<a href="/delete?id=<?php echo $row['id'];?>">
					x
				</a>
			</li>
		<?php endforeach;?>
	</ol>
<?php $content = ob_get_clean();?>

<?php include 'view/template/layout.php';?>