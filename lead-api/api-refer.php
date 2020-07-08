<?php
require 'keitaro-admin.php';
if (empty($fbpx) or empty($sub1)) {
	$company_id = findCompanyId($user_id);
	if ($company_id !== false) {
		$company_info = getCompany($company_id);
		$fbpx = $company_info['fbpx'];
		$sub1 = $company_info['sub1'];
		$sub2 = $company_info['sub2'];
		$sub3 = $company_info['sub3'];
	}
}
//Глобальный id
if (isset($_POST['id'])) {
	include 'aff/ip.php';
	require 'aff/curl.php';

	$id = $_POST['id'];

	$name = $_POST['name'] ?? $_POST['client'] ?? null;
	$phone = $_POST['phone'] ?? $_POST['tel'] ?? null;
	$address = $_POST['address'] ?? $_POST['adress'] ?? $_POST['other']['address'] ?? null;
	$comment = $_POST['comment'] ?? $_POST['comments'] ?? $_POST['message'] ?? $_POST['other']['note'] ?? $_POST['notes'] ?? $_POST['count'] ?? null;
	$other_lead = $_POST['other'] ?? $_POST['postcode'] ?? $_POST['zipcode'] ?? null;
	$city = isset($_POST['city']) ? $_POST['city'] : null;
	$email = isset($_POST['email']) ? $_POST['email'] : null;
	if (is_array($_POST['other'])) {
		foreach ($_POST['other'] as $other_val) {
			$other_lead .= $other_val . PHP_EOL;
		}
	}

	$fbpx = isset($_POST['fbpx']) ? $_POST['fbpx'] : null;
	$sub1 = isset($_POST['sub1']) ? $_POST['sub1'] : null;
	$sub2 = isset($_POST['sub2']) ? $_POST['sub2'] : null;
	$sub3 = isset($_POST['sub3']) ? $_POST['sub3'] : null;
	$sub4 = $_POST['_subid'] ?? $_POST['sub4'] ?? 'ERROR';

	$sub4_error = $_POST['sub4_error'];
	$success_refer = $_POST['refer'] . 'pages/success';
	$success_url = 'success/success_' . $geo . '.php';
	$error_api_url = "success/error-api.html";
	$error_d_url = "$url/error-d.html";

	// MySQLi @var $db
	$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$db->set_charset("utf8");

	// DB LOST
	if ($db->connect_errno) {
		$error_sql .= "Не подключиться к БД:" . $db->error;
		file_put_contents('../../../../lead-api/log.txt',
			date('Y-m-d H:i:s') . ' | ' . $name . ' | ' . $phone . ' | ' . $sub1 . " | " . $sub2 . " | " . $sub3 . " | " . $address . " | " . $url . "\n",
			FILE_APPEND);
	}

	//Проверка на наличие ленда//
	if ($select = $db->query("SELECT pp, stream, other, geo, lang, pay FROM `global_aff_id` WHERE global_id = '$id'")->num_rows === 0) {
		$error_sql .= "Глобальный ID не найден! ";
	}

	//Поиск Оффера по глобальному ID
	$select = $db->query("SELECT pp, stream, other, geo, lang, pay FROM `global_aff_id` WHERE global_id = '$id'");
	$array = $select->fetch_array();
	$pp = $array[0];
	$stream = $array[1];
	$other_offer = $array[2];
	$geo_offer = $array[3];
	$lang = $array[4];
	$pay = $pay[5];

	// Создание таблицы ПП если её нет
	if (!$db->query("CREATE TABLE IF NOT EXISTS `$pp`(id INT NOT NULL PRIMARY KEY auto_increment, datetime DATETIME, offer_stream varchar(255), geo varchar(5), land varchar(8), name varchar(255), phone varchar(255), sub1 varchar(255), sub2 varchar(255), sub3 varchar(255), sub4 varchar(255), address varchar(255), comment varchar(255), other_lead varchar(255), ip varchar(75))")) {
		$error_sql .= "Не удалось создать таблицу: (" . $db->errno . ") " . $db->error;
		file_put_contents('../../../../lead-api/log.txt',
			date('Y-m-d H:i:s') . ' | ' . $name . ' | ' . $phone . ' | ' . $sub1 . " | " . $sub2 . " | " . $sub3 . " | " . $address . " | " . $url . "\n",
			FILE_APPEND);
	}

	// Дублёр телефона
	if (!$select = $db->query("SELECT phone FROM `$pp` WHERE phone = '$phone' AND offer_stream = '$offer'")->num_rows === 0) {
		require 'success/error-d.html';
		file_put_contents('../../../../lead-api/log-d.txt',
			date('Y-m-d H:i:s') . ' | ДУБЛЬ!!! | ' . $name . ' | ' . $phone . ' | ' . $sub1 . " | " . $sub2 . " | " . $sub3 . " | " . $address . " | " . $url . "\n",
			FILE_APPEND);
		exit;
	}

	// Запись в таблицу
	if (!$db->query("INSERT INTO `$pp`(datetime, offer_stream, geo, land, name, phone , sub1, sub2, sub3, sub4, address, comment, other_lead, ip) VALUES (NOW(), '$offer', '$geo', '$lp', '$name', '$phone', '$sub1', '$sub2', '$sub3', '$sub4', '$address', '$comment', '$other_lead . $city . $email', '$ip')")) {
		$error_sql .= "Не удалось записать в таблицу: (" . $db->errno . ") " . $db->error;
		file_put_contents('../../../../lead-api/log.txt',
			date('Y-m-d H:i:s') . ' | ' . $name . ' | ' . $phone . ' | ' . $sub1 . " | " . $sub2 . " | " . $sub3 . " | " . $address . " | " . $url . " | " . $ip . "\n",
			FILE_APPEND);
	}
	mysqli_close($db);

	if ($pp == 'Aff1') {
		require_once 'aff/aff1.php';
	}
	if ($pp == 'Affbay') {
		require_once 'aff/affbay.php';
	}
	if ($pp == 'Adcombo') {
		require_once 'aff/adcombo.php';
	}
	if ($pp == 'MonsterLeads') {
		require_once 'aff/monsterleads.php';
	}
	if ($pp == 'BroLeads') {
		require_once 'aff/broleads.php';
	}
	if ($pp == 'KMA') {
		require_once 'aff/kma.php';
	}
	if ($pp == 'Lead-R') {
		require_once 'aff/leadr.php';
	}
	if ($pp == 'LeadRock') {
		require_once 'aff/leadrock.php';
	}
	if ($pp == 'LeadBit') {
		require_once 'aff/leadbit.php';
	}
	if ($pp == 'LuckyOnline') {
		require 'aff/luckyonline.php';
	}
	if ($pp == 'TerraLeads') {
		require 'aff/terraleads.php';
	}
	if ($pp == 'Worldfilia') {
		require_once 'aff/worldfilia.php';
	}
	if ($pp == 'Everad') {
		require_once 'aff/everad.php';
	}
	if ($pp == 'RocketProfit') {
		require_once 'aff/rocketprofit.php';
	}
	if ($pp == 'MetaCPA') {
		require_once 'aff/metacpa.php';
	}
	if ($pp == 'TrafficLight') {
		require_once 'aff/trafficlight.php';
	}
	if ($pp == 'Ikon') {
		require_once 'aff/ikon.php';
	}
	if ($pp == 'DrCash') {
		require_once 'aff/drcash.php';
	}
	if ($pp == 'LeadReaktor') {
		header("Location: $success_refer");
	}
	if ($pp == 'LeadReaktor.lat') {
		header("Location: $success_refer");
	}
	//MYSQL ERROR
	if (isset($error_sql)) {
		echo $error_sql;
	}

	//SUCCESS
	if ($json_request['status'] == 'success'
		OR $json_request['status'] == 'ok'
		OR $json_request['status'] === true
		OR $json_request['success'] === true
		OR $json_request['info'] == 200
		OR $json_request['status_code'] == '200'
		OR $json_request['httpCode'] == '200'
		OR $json_request["ok"] === true
		OR $json_request['code'] == 'ok'
		OR isset($json_request['id'])
		OR !empty($order)) {
		if ($geo == "shopify") {
			header("Location: $success_url");
		}
		require "$success_url";
	} else {
		if ($geo == "shopify") {
			header("Location: $error_api_url");
		}
		require "$error_api_url";
		file_put_contents('../../../../lead-api/log.txt',
			date('Y-m-d H:i:s') . ' | ' . $name . ' | ' . $phone . ' | ' . $sub1 . " | " . $sub2 . " | " . $sub3 . " | " . $address . " | " . $url . "\n",
			FILE_APPEND);
		var_dump($json_request);
	}
	exit;
}
//Спасибо
if ($_GET['success'] == 'success') {
	$success_url = 'success/success_' . $geo . '.php';
	require "$success_url";
	exit;
}