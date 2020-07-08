<?php

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

	$success_url = 'success/success_' . $geo . '.php';
	$error_api_url = "success/error-api.html";
	$error_d_url = "$url/error-d.html";


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
		require_once 'aff/leadreaktor.php';
	}
	if ($pp == 'LeadReaktor.lat') {
		require_once 'aff/leadreaktorlat.php';
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
	}
	exit;
}
//Спасибо
if ($_GET['success'] == 'success') {
	$success_url = 'success/success_' . $geo . '.php';
	require "$success_url";
	exit;
}