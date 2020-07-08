<?php
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
	'flow_url' => $stream,
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