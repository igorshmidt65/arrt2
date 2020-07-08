<?php
require '../lead-api/config.php';

if (isset($_POST['submit'])) {

	$campaign_id = $_POST['campaign_id'];
	$geo_hideclick = $_POST['geo_hideclick'];
	$offer_url = $_POST['offer_url'];
	$method = $_POST['method'];
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
	//Таблица HideClick айди оффера
	if (!$db->query("CREATE TABLE IF NOT EXISTS `hideclick`(id INT NOT NULL PRIMARY KEY auto_increment, `datetime` DATETIME, `campaign_id` varchar(255), `geo` varchar(155), `offer_url` varchar(255), `method` varchar(155), `fbpx` varchar(255), `sub1` varchar(255), `sub2` varchar(255), `sub3` varchar(255))")) {
		echo "Не удалось создать таблицу: (" . $db->errno . ") " . $db->error;
	}
	//Проверка на существующий поток id
	if ($id_sql = $db->query("SELECT campaign_id FROM `hideclick` WHERE campaign_id = '$campaign_id'")->num_rows > 0) {
		if (!$db->query("UPDATE `hideclick` SET geo = '$geo_hideclick', offer_url = '$offer_url', method = '$method', fbpx  = '$fbpx', sub1 = '$sub1', sub2 = '$sub2', sub3 = '$sub3' WHERE campaign_id = '$campaign_id'")) {
			echo "Не удалось обновить ID: (" . $db->errno . ") " . $db->error;
		}
		echo 'ID Кампании обновлён: ' . $campaign_id;
	} else {
		//Запись ID
		if (!$db->query("INSERT INTO `hideclick`(datetime, campaign_id, geo, offer_url, method, fbpx, sub1, sub2, sub3) VALUES (NOW(), '$campaign_id', '$geo_hideclick', '$offer_url', '$method', '$fbpx', '$sub1', '$sub2', '$sub3')")) {
			echo "Не удалось записать лэнд в таблицу: (" . $db->errno . ") " . $db->error;
		}
		echo 'ID кампании добавлен: ' . $campaign_id;
		mysqli_close($db);
	}
}
$file = file_get_contents('hide_js.txt');
echo "<h1>Скрипт для шопика:</h1>";
$explode = explode('|', $file);
$hideclick_js = htmlspecialchars($explode[rand(0,count($explode)-1)]);
echo $hideclick_js;
?>

<!doctype html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ХАЙДКЛИК УСТАНОВКА</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

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
        .btn{
            height: 40px;
        }
    </style>
</head>
<body>
<!--
<h4 style="text-align: center;">ХАЙДКЛИК УСТАНОВКА</h4>
<div class="container mt-3">
    <form action="" method="post">
        <div class="row justify-content-center form-row">
            <div class="col-4">
                <label class="font-weight-bold">Введи ID кампании в кейтаро</label>
                <input class="input-group" name="campaign_id" type="text" value="" placeholder="Например: Xk3S4DZK">
                <label class="font-weight-bold">ГЕО пример - RS,HR</label>
                <select type="text" class="selectpicker" id="selectpicker" multiple="multiple" data-live-search="true">
                    <option>BA</option>
                    <option>BG</option>
                    <option>CZ</option>
                    <option>DE</option>
                    <option>ES</option>
                    <option>PT</option>
                    <option>ID</option>
                    <option>RO</option>
                    <option>RS</option>
                    <option>RU</option>
                    <option>SK</option>
                    <option>HU</option>
                    <option>VN</option>
                </select>
                <label class="font-weight-bold">Адрес ленда пример -
                    https://yaashviservices.com/sustarad/sr/lp2/</label>
                <input class="input-group" name="offer_url" type="text" value="">
                <label class="font-weight-bold">Метод добавления скрипта</label>
                <select class="input-group" name="method" type="text" value="">
                    <option>redirect</option>
                    <option>iframe</option>
                </select>
                <input type="hidden" name="geo_hideclick" value="">
                <br>
                <label class="font-weight-bold">Интеграция кейтаро - Ссылка кампании</label>
                <input class="input-group" name="keitaro_url" type="text" value="">
            </div>
        </div>
        <div class="row justify-content-center form-row">
            <div class="col-4">
                <br>
                <input type="submit" name="submit" id="submit" class="btn btn-success align-margin-center"
                       value="Добавить хайдклик">
            </div>
        </div>
    </form>
</div>
<script>
    $('select').selectpicker();
    $('document').ready(function(){
        $('#submit').click(function(){
            var ag = $('#selectpicker').val();
            $('[name="geo_hideclick"]').val(ag);
        });
    });
</script>
</body>-->
</html>
