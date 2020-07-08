<?php
$url = 'https://tracker.everad.com/conversion/new';
$data = array(
	'campaign_id' => $stream,
	'country_code' => $geo_offer,
	'ip' => $ip,
	'name' => $name,
	'phone' => $phone,
	'sid1' => $sub1,
	'sid2' => $sub2,
	'sid3' => $sub3,
	'sid4' => $sub4,
	'address' => $address
);
$requestQuery = http_build_query($data);
$result = postCurlData($url, $requestQuery, $ua);
$json_request = json_decode($result['exec'], true);