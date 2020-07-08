<?php

function postCurlData($url, $requestQuery, $ua)
{
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_USERAGENT, $ua);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $requestQuery);
	$result['exec'] = curl_exec($curl);
	$result['info'] = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	return $result;
}

function postBack($create_lead)
{
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $create_lead);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	$result = curl_exec($curl);
	return $result;
}


function postCurlLeadRock($trackUrl, $API, $ua){
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $trackUrl);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($curl, CURLOPT_USERAGENT, $ua);
	$data['track_id'] = curl_exec($curl);
	$data['sign'] = sha1(http_build_query($data) . $API['secret']);
	return $data;
}
