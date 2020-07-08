<?php

$order = array (
	'campaign_id' => $stream,
	'ip' => $ip,
	'name' => $name,
	'phone' => $phone,
	'sid1' => $sub1,
	'sid2' => $sub2,
	'sid3' => $sub3,
	'sid4' => $sub4,
);


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://tracker.rocketprofit.com/conversion/new" );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_POST,           1 );
curl_setopt($ch, CURLOPT_POSTFIELDS,     http_build_query($order) );
curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/x-www-form-urlencoded'));

$result=curl_exec ($ch);
$json_request['httpCode'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);