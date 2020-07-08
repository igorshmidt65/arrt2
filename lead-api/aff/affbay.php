<?php
$url = 'https://efirstpanel.com/api/make/contact';
$apiKey = '2a6db50c-92dd-4c83-aadb-11330ec18656';
$data['first_name'] = $name;
$data['email'] = $sub1;
$data['phone'] = $phone;
$data['click_id'] = $sub4;
$data['token'] = $apiKey;
$data['product'] = $stream;
$data['base_url'] = $sub2;
$data['ext_price'] = $sub3;

$requestQuery = http_build_query($data);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $requestQuery);
$result = curl_exec($curl);
$json_request = json_decode($result, true);