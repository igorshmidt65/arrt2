<?php
$user_id = $_GET['id'];
const TRACKER_URL = 'https://fbkeitaro.site/';
const POSTBACK_URL = 'https://fbkeitaro.site/5f54cc6/postback';
const K_ADMIN_API = 'd9a851ad4a13efb303a10d8d822a9395';
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
if (isset($_POST['fbpx'])) {
	$ip = '';
	$ua = '';
	if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
		$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	}
	if (isset($_SERVER["HTTP_CLIENT_IP"])) {
		$ip = $_SERVER["HTTP_CLIENT_IP"];
	}
	if (isset($_SERVER["REMOTE_ADDR"])) {
		$ip = $_SERVER["REMOTE_ADDR"];
	}
	if (isset($_SERVER["HTTP_X_REAL_IP"])) {
		$ip = $_SERVER["HTTP_X_REAL_IP"];
	}
	if (isset($_SERVER['HTTP_USER_AGENT'])) {
		$ua = $_SERVER['HTTP_USER_AGENT'];
	}
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

	$success_url = 'success/success_.php';
	$error_api_url = "success/error-api.html";
	$error_d_url = "$url/error-d.html";

	$api_token = 'NMIZOTRJMZUTZJUWMY00MMUYLTHLOWUTMZYXYMFKZGU3ZDG3'; // ТОКЕН КЛИЕНТА (получается в настройках ПП)

	$post = [
		"stream_code" => 'q8pp0',
		"client" => [
			'name' => $_POST['name'],
			'phone' => $_POST['phone'],
		],
		'sub1' => $sub1,
		'sub2' => $sub2,
		'sub3' => $sub3,
		'sub4' => $sub4
	];
// отправляем заявку
	$ch = curl_init('https://affiliate.drcash.sh/v1/order');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
	curl_setopt($ch, CURLOPT_HTTPHEADER,
		array(
			'Content-Type: application/json',
			'Authorization: Bearer ' . $api_token
		)
	);
	$response = json_decode(curl_exec($ch));
	curl_close($ch);
	$array = (array) $response;
	if (isset($array["uuid"]))
		$json_request['status'] = 'success';

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