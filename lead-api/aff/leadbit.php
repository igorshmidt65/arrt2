<?php
$url = 'http://leadbit.com/api/new-order/4c24536a4c7c325743526d25636c7b47';

$data = array(
	'flow_hash'     =>  $stream,
	'name'          =>  $name,
	'phone'         =>  $phone,
	'country'       =>  $geo_offer,
	'landing'       =>  $other_offer,
	'sub1'		=>  $sub1,
	'sub2'		=>  $sub2,
	'sub3'		=>  $sub3,
	'sub4'		=>  $sub4,
	'ip' => $ip,
	'referrer' => $_SERVER['HTTP_REFERER']
);
$requestQuery = http_build_query($data);
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
//curl_setopt($curl, CURLOPT_TIMEOUT, 20);
curl_setopt($curl, CURLOPT_POST, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POSTFIELDS, $requestQuery);
$result = curl_exec($curl);
//$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$json_request = json_decode($result, true);
