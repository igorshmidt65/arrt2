<?php
$url = 'https://metacpa.ru/create';

$data['flow_id'] = $stream;
$data['name'] = $name;
$data['phone'] = $phone;
$data['geo'] = $geo_offer;
$data['ip'] = $ip;
$data['sub1'] = $sub1;
$data['sub2'] = $sub2;
$data['sub3'] = $sub3;
$data['sub4'] = $sub4;
$requestQuery = $url . '?' . http_build_query($data);

$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,$requestQuery);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($curl);
$json_request = json_decode($result, true);