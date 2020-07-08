<?php
$url = 'https://broleads.com/api/v1/order';
$requestQuery = array(
	'stream' => $stream,
	'landing' => $other_offer,
	'country' => $geo_offer,
	'name' => $name,
	'phone' => $phone,
	'postcode' => $other_lead,
	'address' => $address,
	'comment' => $comment,
	'ip' => $ip,
	'user-agent' => $ua,
	'sub1' => $sub1,
	'sub2' => $sub2,
	'sub3' => $sub3,
	'sub4' => $sub4,
	'clickid' => (!empty($_GET["clickid"]) ? $_GET["clickid"] : "")
);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POSTFIELDS, $requestQuery);
$result['exec'] = curl_exec($curl);
$json_request = json_decode($result['exec'], true);


// Success
//!empty($_POST['lym']) ? $data["lym"] = htmlspecialchars($_POST['lym']) : '';
//!empty($_POST['fbpx']) ? $data["fbpx"] = htmlspecialchars($_POST['fbpx']) : '';
//!empty($_POST['lga']) ? $data["lga"] = htmlspecialchars($_POST['lga']) : '';
//!empty($data) ? $urlQuery = "&" . http_build_query($data) : $urlQuery = "";
//$s = base64_encode(json_encode($s_arr));
//$s_arr['name'] = $_POST['name'];
//$s_arr['phone'] = htmlspecialchars($_POST['phone']);
//header("Location: $success_url&s=" . $s . $urlQuery);

