<?php
$apiKey = 'cb1cd623874abfeb080c73b9a7c90f1e33f6d467e6d15bc571c41dbadb212ab86fe1f1be385eec22';
$url = 'http://ls.cpaikon.net/v2/external/lead/accept';

$data['api_key'] = $apiKey;
$data['name'] = $name;
$data['phone'] = $phone;
$data['flow_hash'] = $stream;
$data['geo'] = $geo_offer;
$data['ip'] = $ip;
$data['sub1'] = $sub1;
$data['sub2'] = $sub2;
$data['sub3'] = $sub3;
$data['sub4'] = $sub4;

$requestQuery = http_build_query($data);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $requestQuery);
$result = curl_exec($curl);
$json_request = json_decode($result, true);