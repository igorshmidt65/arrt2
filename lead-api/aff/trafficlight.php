<?php
$apiKey = 'GCQciBqA68ykWpZtW5U1CvKq22wq5Ey4Zf';  ////// ВАШ АПИ КЛЮЧ
$url = 'http://api.cpa.tl/api/lead/send';

$data = array(
	'key' => $apiKey,
	'id' => microtime(true),
	'offer_id' => $other_offer,
	'stream_hid' => $stream,
	'name' => $name,
	'phone' => $phone,
	'comments' => $comment,
	'country' => $geo, // формат ISO 3166-1 Alpha-2 - https://ru.wikipedia.org/wiki/ISO_3166-1
	'address' => $address,
	'tz' => 3,
	'web_id' => $sub4,
	'ip_address' => $ip,
	'user_agent' => $ua,
	'sub1' => $sub1,
	'sub2' => $sub2,
	'sub3' => $sub3,
	'sub4' => $sub4
);

$requestQuery = http_build_query($data);

$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $requestQuery);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($curl);

$json_request = json_decode($result, true);