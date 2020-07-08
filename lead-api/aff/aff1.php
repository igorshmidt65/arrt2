<?php
$url = 'https://api.aff1.com/v2/lead.create ';
$data = array(
	'api_key' => '3gNQYTXB94XHNRIV',
	'name' => $name,
	'phone' => $phone,
	'target_hash' => $stream,
	'country_code' => $geo_offer,
	'ip' => $ip,
	'data1' => $sub1,
	'data2' => $sub2,
	'data3' => $sub3,
	'clickid' => $sub4,
	'address' => $address
);
$requestQuery = http_build_query($data);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_USERAGENT, $ua);
curl_setopt($curl, CURLOPT_POSTFIELDS, $requestQuery);
$result['exec'] = curl_exec($curl);
$json_request = json_decode($result['exec'], true);