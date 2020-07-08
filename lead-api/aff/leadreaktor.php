<?php
$params = array(
	'goods_id' => $stream,
	'ip' => $ip,
	'msisdn' => $phone,
	'name' => $name,
	'country' => $geo,
	'url_params[sub1]' => $sub1,
	'url_params[sub2]' => $sub2,
	'url_params[sub3]' => $sub3,
	'url_params[sub4]' => $sub4,
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://leadreaktor.com/api/order/create.php?api_key=lvyCaSmnb8kaOsIJg3rgVItHT0EqboVM");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
$return = curl_exec($ch);
curl_close($ch);
$json_request = json_decode($return, true);