<?php
$api_domain = 'http://tl-api.com';
$user_id = '16662';
$api_key = '4eb992e3fd14a336a389bc83218c0b53';
$model = 'lead';
$method = 'create';

$data = array(
	'user_id' => $user_id,
	'data' => array(
		'name'         => $name,
		'country'      => $geo_offer,
		'phone'        => $phone,
		'address'       => $address,
		'user_comment'  => $comment ?? null,
		'offer_id'     => $stream,
		'utm_source'   => $sub1,
		'utm_medium'   => $sub2,
		'utm_campaign' => $sub3,
		'sub_id_4' => $sub4
	)
);

$json_data = json_encode($data);

$api_url = $api_domain.'/api/'.$model.'/'.$method.'?'.http_build_query(array(
		'check_sum' => sha1($json_data.$api_key)
	));

$json_request = post_request($api_url, $json_data);

function post_request( $url, $data, $headers = array() )
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST,true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	if( !empty($headers) ){
		$http_headers = array();

		foreach( $headers as $header_name => $header_value ){
			$http_headers[] = $header_name.': '.$header_value;
		}

		curl_setopt($ch, CURLOPT_HTTPHEADER, $http_headers);
	}

	$result = curl_exec($ch);

	$curl_error = curl_error($ch);
	$http_code  = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	curl_close ($ch);

	$response = array(
		'error'    => $curl_error,
		'httpCode' => $http_code,
		'result'   => $result,
	);

	return $response;
}
