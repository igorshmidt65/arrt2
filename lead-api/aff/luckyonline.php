<?php
$url = 'https://lucky.online/api-webmaster/lead.html?subid1='.$sub4.'&utm_source='.$sub1.'&utm_medium='.$sub2.'&utm_campaign='.$sub3.'&api_key=5ad49fe98726965342319784830';
$data = array(
	'campaignHash' => $stream,
	'userAgent' => $ua,
	'ip' => $ip,
	'name' => $name,
	'phone' => $phone,
	'country' => $geo_offer
);
$requestQuery = http_build_query($data);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POSTFIELDS, $requestQuery);
$result = curl_exec($curl);
curl_close($curl);

$json_request = json_decode($result, true);