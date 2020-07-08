<?php
$url = 'https://bestshop-product.ru/order/api.php';
$data = array(
	'api_key' => 'c7332a230efc9760f33e3a7ef010d255',
	'user_id' => '16344',
	'flow_id' => $stream,
	'geo' => $geo_offer,
	'ip' => $ip,
	'name' => $name,
	'phone' => $phone,
	'data1' => $sub1,
	'data2' => $sub2,
	'data3' => $sub3,
	'data4' => $sub4,
	'other' => $other_lead,
	'count' => $comment
);
$requestQuery = http_build_query($data);
$result = postCurlData($url, $requestQuery, $ua);
$json_request['info'] = json_decode($result['info'], true);