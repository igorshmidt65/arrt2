<?php
const TRACKER_URL = 'https://fbkeitaro.site/';
const POSTBACK_URL = 'https://fbkeitaro.site/5f54cc6/postback';
const K_ADMIN_API = 'd9a851ad4a13efb303a10d8d822a9395';

if (isset($_GET['id'])) {
	$user_id = $_GET['id'];
}

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

	$success_url = 'success/success_' . $geo . '.php';
	$error_api_url = "success/error-api.html";
	$error_d_url = "$url/error-d.html";


$API = array(
	'key' => '135',
	'secret' => 'dcc6104588f828768f1c3293fc2c5ddf'
);
if (isset($_POST['other'])) {
	foreach ($_POST['other'] as $other_val) {
		$other .= $other_val . PHP_EOL;
	}
}
$params = array(
	'flow_url' => 'https://leadrock.com/URL-C689E-46100',
	'user_phone' => $phone,
	'user_name' => $name,
	'other' => $_POST['other'],
	'ip' => $ip,
	'ua' => $ua,
	'api_key' => $API['key'],
	'sub1' => $sub1,
	'sub2' => $sub2,
	'sub3' => $sub3,
	'sub4' => $sub4,
);
$url = 'https://leadrock.com/api/v2/lead/save';
$trackUrl = $params['flow_url'] . (strpos($params['flow_url'],
		'?') === false ? '?' : '') . '&ajax=1' . '&ip=' . $params['ip'] . '&ua=' . $params['ua'];
foreach ($params as $param => $value) {
	if (strpos($param, 'sub') === 0) {
		$trackUrl .= '&' . $param . '=' . $value;
		unset($params[$param]);
	}
}
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $trackUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
$params['track_id'] = curl_exec($ch);

$params['sign'] = sha1(http_build_query($params) . $API['secret']);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
//$result = curl_exec($ch);
curl_exec($ch);
curl_close($ch);
//return $result;

//НЕТ ПРОВЕРКИ ОТВЕТА ОТ СЕРВЕРА - FIX
if (!empty($phone)) {
	$json_request['status'] = 'success';
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
