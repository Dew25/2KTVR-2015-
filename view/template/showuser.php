<?php $title = "Страничка пользователя"; ?>

<?php ob_start() ?>
	<h2><?php echo "Страничка пользователя"; ?></h2>

	<div class="date">Личный код: <?php echo $row['code']; ?></div>
	<div class="autor">Имя: <?php echo $row['firstname']; ?></div>
	<div class="content">Фамилия: <?php echo $row['lastname']; ?></div>

<?php $content=ob_get_clean(); ?>

<?php include 'view/template/layout.php'; ?>