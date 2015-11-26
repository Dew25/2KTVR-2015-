<?php ob_start();?>

	<h2>Администрирование странички</h2>
<form action="/adduser" method="POST" name="add_form">

	<table>
		<tr>
			<td>Личный номер пользователя: </td>
			<td><input type="text" name="code"></td>
		</tr>
		<tr>
			<td>Имя пользователя: </td>
			<td><input type="text" name="firstname"></td>
		</tr>
		<tr>
			<td>Фамилия пользователя: </td>
			<td><input type="text" name="lastname"></td>
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
				<a href="/showuser?id=<?php echo $row['id'];?>">
					<?php echo $row['firstname']." ".$row['lastname'];?>
				</a>
				<a href="/delete?id=<?php echo $row['id'];?>">
					x
				</a>
			</li>
		<?php endforeach;?>
	</ol>
<?php $content = ob_get_clean();?>

<?php include 'view/template/layout.php';?>