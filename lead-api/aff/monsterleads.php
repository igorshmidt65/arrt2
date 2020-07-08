<?php
$url = 'https://api.monsterleads.pro/method/order.add?api_key=7453534a9a075d93a3cde7a378a6dd48&format=json&code='.$stream;
$create_lead = 'https://fb-dev.pro/click.php?cnv_id='.$sub4.'&payout='.$pay.'&cnv_status=created';
$data = array(
	'ip'        =>  $ip,
	'client'      =>  $name,
	'tel'     =>  $phone,
	'adress'     =>  $address,
	'comments' => $comment,
	'subid'     => $sub1 . ":" . $sub2 . ":" . $sub3 . ":" . $sub4

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
$result['info'] = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$json_request = json_decode($result['exec'], true);
//var_dump($json_request);