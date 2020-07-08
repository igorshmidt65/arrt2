<?php

class OrderApi
{
	const API_KEY = '1jDRq6Tnr46VNBkOlVPFuJ5DViJVJHhg';
	const API_URL = 'https://leadreaktor.lat/api/';

	/**
	 * Setting order in our system
	 *
	 * @param $params
	 * @return mixed
	 */
	public function setOrder($params)
	{
		return $this->request('set-order', $params);
	}

	/**
	 * Getting statuses of your orders
	 *
	 * @param $params
	 * @return mixed
	 */
	public function getStatus($params)
	{
		return $this->request('get-status', $params);
	}

	/**
	 * Base function of request
	 *
	 * @param $method
	 * @param array $params
	 * @return mixed
	 */
	public function request($method, $params = [])
	{
		$curl = curl_init();

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_URL, self::API_URL . $method);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		if (count($params) > 0) {
			$params['api_key'] = self::API_KEY;
			$params = urldecode(http_build_query($params));
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
		}

		$response = json_decode(curl_exec($curl));
		curl_close($curl);

		return $response;
	}
}
$order = new OrderApi();

if ($geo == 'pe') {
	if (strpos($phone, '+51') === false) {
		if (strpos($phone, '51') === false) {
			$phone = '+51' . $phone;
		} elseif (strpos($phone, '51') !== 0 and strpos($phone, '51') !== 1) {
			$phone = '+51' . $phone;
		}
	}
}


$params = array(
	'goods_id' => $stream,
	'ip' => $ip,
	'msisdn' => $phone,
	'name' => $name,
	'country' => $geo,
	'url_params[sub1]' => $sub1,
	'url_params[sub2]' => $sub2,
	'url_params[sub3]' => $sub3,
	'url_params[sub4]' => $sub4,
);
$response = $order->setOrder($params);
$json_request = (array)$response;
//Response in json