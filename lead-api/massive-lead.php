<?php
require '../lead-api/config.php';
if (isset($_POST['submit']) && isset($_POST['pp'])) {
	$pp = $_POST['pp'];
	$stream = $_POST['stream'];
	$other = $_POST['other'];
	$geo = $_POST['geo'];
	$lang = $_POST['lang'];
	$pay = $_POST['pay'];
	$id = rand(1000, 9999999);
	$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$db->set_charset("utf8");

	//Таблица глобального айди оффера
	if (!$db->query("CREATE TABLE IF NOT EXISTS `global_aff_id`(id INT NOT NULL PRIMARY KEY auto_increment, datetime DATETIME, global_id INT, pp varchar(50), stream varchar(255), other varchar(255), geo varchar(20), lang varchar(20), pay varchar(50))")) {
		echo "Не удалось создать таблицу: (" . $db->errno . ") " . $db->error;
	}
	//Проверка на существующий поток
	if (!$stream_sql = $db->query("SELECT global_id FROM `global_aff_id` WHERE pp = '$pp' AND stream = '$stream' AND other = '$other' AND geo = '$geo' AND lang = '$lang'")->num_rows === 0) {
		$stream_sql = $db->query("SELECT global_id FROM `global_aff_id` WHERE pp = '$pp' AND stream = '$stream' AND other = '$other' AND geo = '$geo' AND lang = '$lang'")->fetch_array();
		echo 'Глобальный ID уже существует: ' . $stream_sql[0];
		exit;
	}
	//Уникальный ID
	while (!$id_sql = $db->query("SELECT global_id FROM `global_aff_id` WHERE global_id = '$id'")->num_rows === 0) {
		$id .= rand(10,9999);
	}
	//Запись ID
	if (!$db->query("INSERT INTO `global_aff_id`(datetime, global_id, pp, stream, other, geo, lang, pay) VALUES (NOW(), '$id', '$pp', '$stream', '$other', '$geo', '$lang', '$pay')")) {
		echo "Не удалось записать лэнд в таблицу: (" . $db->errno . ") " . $db->error;
	}
	mysqli_close($db);

	echo 'Глобальный ID добавлен: ' . $id;
	exit;
}
?>
?>
<!doctype html>
<html lang="ru-RU">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Установка глобального оффера</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		span{
			font-weight: bold;
		}
		form{
			display: inline;
		}
		input{
			white-space: normal;
		}
		h3{
			text-align: center;
		}
		.align-margin-center{
			margin-right: auto;
			margin-left: auto;
			display: block;
		}
	</style>
</head>
<body>
<h4 style="text-align: center;">Прокидование пачки лидов</h4>
<div class="container mt-3">
	<form action="" method="post">
		<div class="row justify-content-center form-row">
			<div class="col-4">
				<h4 style="text-align: center;">Введи глобальный ID</h4>
				<input class="input-group" name="id" type="text" value="">
				<label class="font-weight-bold">Введи Имя</label>
				<input class="input-group" name="other" type="text" value="">
				<label class="font-weight-bold">Введи Телефон</label>
				<input class="input-group" name="geo" type="text" value="">
				<label class="font-weight-bold">Введи адрес</label>
				<input class="input-group" name="lang" type="text" value="">
			</div>
		</div>
		<div class="row justify-content-center form-row">
			<div class="col-4">
				<br>
				<input type="submit" name="submit" class="btn btn-success align-margin-center" value="Добавить лэнд">
			</div>
		</div>
	</form>
</div>
</body>
</html>
