<?php
$api_token = 'NMIZOTRJMZUTZJUWMY00MMUYLTHLOWUTMZYXYMFKZGU3ZDG3'; // ТОКЕН КЛИЕНТА (получается в настройках ПП)

$post = [
	"stream_code" => $stream,
	"client" => [
		'name' => $_POST['name'],
		'phone' => $_POST['phone'],
	],
	'sub1' => $sub1,
	'sub2' => $sub2,
	'sub3' => $sub3,
	'sub4' => $sub4
];
// отправляем заявку
$ch = curl_init('https://affiliate.drcash.sh/v1/order');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
curl_setopt($ch, CURLOPT_HTTPHEADER,
	array(
		'Content-Type: application/json',
		'Authorization: Bearer ' . $api_token
	)
);
$response = json_decode(curl_exec($ch));
curl_close($ch);
$array = (array) $response;
if (isset($array["uuid"]))
$json_request['status'] = 'success';