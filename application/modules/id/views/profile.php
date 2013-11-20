<meta charset="utf-8">

	Профиль <br>

<ul>
<?php foreach ($profile_data as $item):?>


	<li>Фамилия: <?php echo $item->famil;?></li>  
	<li>Имя: <?php echo $item->name;?> </li>
	<li>Отчество: <?php echo $item->otchestvo;?></li>
	<li>Почта: <?php echo $item->mail;?></li>
	<li>Дата Рождения: <?php echo $item->birthday;?></li>
	<li>Дата регистрации: <?php echo $item->date;?></li>
	<li>Специализация: <?php echo $item->spec_user;?></li>

<?php endforeach; ?>
</ul>