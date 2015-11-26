<?php $title = $row['title']; ?>

<?php ob_start() ?>
	<h2><?php echo $row['title']; ?></h2>

	<div class="date">Дата: <?php echo $row['date']; ?></div>
	<div class="autor">Автор: <?php echo $row['autor']; ?></div>
	<div class="content"><?php echo $row['content']; ?></div>

<?php $content=ob_get_clean(); ?>

<?php include 'view/template/layout.php'; ?>