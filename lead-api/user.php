<?php
require '../lead-api/config.php';
if (isset($_POST['submit'])) {
	$keitaro_url = $_POST['keitaro_url'];
	$explode = explode('/', $keitaro_url);
	$explode = explode('?', $explode[3]);
	$user_id = $explode[0];
	$explode = explode('&utm_source={', $explode[1]);
	$explode = explode('}&utm_campaign={', $explode[1]);
	$sub1 = $explode[0];
	$explode = explode('}&utm_medium={', $explode[1]);
	$sub3 = $explode[0];
	$explode = explode('}&fbpx={', $explode[1]);
	$sub2 = $explode[0];
	$explode = explode('}', $explode[1]);
	$fbpx = $explode[0];

	$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$db->set_charset("utf8");

	//Таблица пользовательского айди оффера
	if (!$db->query("CREATE TABLE IF NOT EXISTS `user_id`(id INT NOT NULL PRIMARY KEY auto_increment, datetime DATETIME, user_id varchar(255), fbpx varchar(255), sub1 varchar(255), sub2 varchar(255), sub3 varchar(255))")) {
		echo "Не удалось создать таблицу: (" . $db->errno . ") " . $db->error;
	}
	//Проверка на существующий поток id
	if ($id_sql = $db->query("SELECT user_id FROM `user_id` WHERE user_id = '$user_id'")->num_rows > 0) {
		if (!$db->query("UPDATE user_id SET fbpx = '$fbpx', sub1 = '$sub1', sub2 = '$sub2', sub3 = '$sub3' WHERE user_id = '$user_id'")) {
			echo "Не удалось обновить ID: (" . $db->errno . ") " . $db->error;
		}
		echo 'Пользовательский ID обновлён: ' . $user_id;
		exit;
	} else {
		//Запись ID
		if (!$db->query("INSERT INTO `user_id`(datetime, user_id, fbpx, sub1, sub2, sub3) VALUES (NOW(), '$user_id', '$fbpx', '$sub1', '$sub2', '$sub3')")) {
			echo "Не удалось записать лэнд в таблицу: (" . $db->errno . ") " . $db->error;
		}
		mysqli_close($db);
		echo 'Пользовательский ID добавлен: ' . $user_id;
		exit;
	}
}
?>
<!doctype html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Установка глобального оффера</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        span {
            font-weight: bold;
        }

        form {
            display: inline;
        }

        input {
            white-space: normal;
        }

        h3 {
            text-align: center;
        }

        .align-margin-center {
            margin-right: auto;
            margin-left: auto;
            display: block;
        }
    </style>
</head>
<body>
<h4 style="text-align: center;">Установка пользовательского ID</h4>
<div class="container mt-3">
    <form action="" method="post">
        <div class="row justify-content-center form-row">
            <div class="col-4">
                <label class="font-weight-bold">Введи ссылку на кампанию в кейтаро в разделе интеграция</label>
                <input class="input-group" name="keitaro_url" type="text" value="">
                <!--
				<label class="font-weight-bold">Введи пиксель</label>
				<input class="input-group" name="fbpx" type="text" value="">
                <label class="font-weight-bold">Введи САБ1 - utm_source</label>
                <input class="input-group" name="sub1" type="text" value="">
                <label class="font-weight-bold">Введи САБ2 - utm_medium</label>
                <input class="input-group" name="sub2" type="text" value="">
                <label class="font-weight-bold">Введи САБ3 - utm_campaign</label>
                <input class="input-group" name="sub3" type="text" value="">
                -->
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