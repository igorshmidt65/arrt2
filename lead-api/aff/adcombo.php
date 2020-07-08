<?php
$apiKey = 'a3f84123fa1be81d726459b64926da47';  ////// ВАШ АПИ КЛЮЧ
$url = 'https://api.adcombo.com/api/v2/order/create/';

$data['country_code'] = $geo_offer;
$data['api_key'] = $apiKey;
$data['name'] = $name;
$data['phone'] = $phone;
$data['offer_id'] = $stream;
$data['base_url'] = 'http://land1.abxyz.info';
$data['price'] = 666;
$data['referrer'] = $_SERVER['HTTP_REFERER'];
$data['ip'] = $ip;
$data['subacc'] = $sub1;
$data['subacc2'] = $sub2;
$data['subacc3'] = $sub3;
$data['subacc4'] = $sub4;
$requestQuery = $url . '?' . http_build_query($data);

$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,$requestQuery);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($curl);

$json_request = json_decode($result, true);