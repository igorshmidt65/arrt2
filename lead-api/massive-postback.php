<?php

$url = 'https://fbkeitaro.site/5f54cc6/postback';

$data['sub1'] = '';
$data['sub2'] = '';
$data['sub3'] = '';
$data['sub4'] = '';
$data['lead_status'] = '';


$requestQuery = $url . '?' . http_build_query($data);
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,$requestQuery);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($curl);

$json_request = json_decode($result, true);