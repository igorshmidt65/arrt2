<?php
$url = $stream;
$create_lead = 'https://fb-dev.pro/click.php?cnv_id='.$sub4.'&payout='.$pay.'&cnv_status=created';

$data = array(
	'api_token' => '458720a868e718715615c5fc2a837284',
	'source_id' => '9fdef890a0a6',
	'quantity'    =>  1,
	'ip'        =>  $ip,
	'name'      =>  $name,
	'phone'     =>  $phone,
	'address'     =>  $address,
	'city'     =>  $city,
	'zipcode'     =>  $other_lead,
	'notes'     =>  $comment,
	'email' => $email,
	'aff_sub1' => $sub1 . PHP_EOL . $sub2 . PHP_EOL . $sub3,
	'aff_sub2' => $sub4
);
$requestQuery = http_build_query($data);
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POSTFIELDS, $requestQuery);
$result = curl_exec($curl);
$json_request = json_decode($result, true);
postBack($create_lead);