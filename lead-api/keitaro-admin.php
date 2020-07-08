<?php

function findCompanyId($user_id)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, TRACKER_URL . 'admin_api/v1/campaigns');
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Api-Key: ' . K_ADMIN_API));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$array = json_decode(curl_exec($ch), true);
	foreach ($array as $company) {
		if ($company["alias"] == $user_id) {
			$company_id = $company["id"];
		}
	}
	if (!isset($company_id) or empty($company_id)) {
		$company_id = false;
	}
	return $company_id;
}

function getCompany($company_id)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, TRACKER_URL . 'admin_api/v1/campaigns/' . $company_id);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Api-Key: ' . K_ADMIN_API));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$array = json_decode(curl_exec($ch), true);
	$company_info['streams'] = $array["streams_count"];
	$company_info['sub1'] = $array["parameters"]["sub_id_1"]["placeholder"];
	$company_info['sub2'] = $array["parameters"]["sub_id_2"]["placeholder"];
	$company_info['sub3'] = $array["parameters"]["sub_id_3"]["placeholder"];
	$company_info['fbpx'] = $array["parameters"]["sub_id_4"]["placeholder"];
	$company_info['method'] = $array["parameters"]["sub_id_5"]["placeholder"];

	if (!isset($company_info)) {
		echo "Company_Error";
		exit;
	}
	return $company_info;
}

function getStreams($company_id)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, TRACKER_URL . 'admin_api/v1/campaigns/' . $company_id . '/streams');
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Api-Key: ' . K_ADMIN_API));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$stream_info = json_decode(curl_exec($ch), true);
	if (!isset($stream_info) or empty($stream_info)) {
		$stream_info = false;
	}
	return $stream_info;
}


function getOffer($offer_id)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, TRACKER_URL . 'admin_api/v1/offers/' . $offer_id);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Api-Key: ' . K_ADMIN_API));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$array = json_decode(curl_exec($ch), true);
	$offer_info["url"] = explode("?", $array["action_payload"])[0];
	for ($c = 0; $c < count($array["country"]) - 1; $c++) {
		$offer_info["geo"] .= $array["country"][$c] . ",";
	}
	$offer_info["geo"] .= $array["country"][$c];
	return $offer_info;
}
function enableStream($stream_id){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, TRACKER_URL . 'admin_api/v1/streams/' . $stream_id .'/enable');
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Api-Key: ' . K_ADMIN_API));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_exec($ch);
}
function disableStream($stream_id)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, TRACKER_URL . 'admin_api/v1/streams/' . $stream_id .'/disable');
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Api-Key: ' . K_ADMIN_API));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_exec($ch);
}

function updateCompany($company_id, $sub1, $sub2, $sub3, $fbpx)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, TRACKER_URL . 'admin_api/v1/campaigns/' . $company_id);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Api-Key: ' . K_ADMIN_API));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
	curl_setopt($ch, CURLOPT_POST, 1);
	$params["parameters"]["sub_id_1"]["name"] = "utm_source";
	$params["parameters"]["sub_id_1"]["placeholder"] = $sub1;
	$params["parameters"]["sub_id_1"]["alias"] = "UTM_SOURCE";
	$params["parameters"]["sub_id_2"]["name"] = "utm_campaign";
	$params["parameters"]["sub_id_2"]["placeholder"] = $sub2;
	$params["parameters"]["sub_id_2"]["alias"] = "UTM_CAMPAIGN";
	$params["parameters"]["sub_id_3"]["name"] = "utm_medium";
	$params["parameters"]["sub_id_3"]["placeholder"] = $sub3;
	$params["parameters"]["sub_id_3"]["alias"] = "UTM_MEDIUM";
	$params["parameters"]["sub_id_5"]["name"] = "fbpx";
	$params["parameters"]["sub_id_5"]["placeholder"] = $fbpx;
	$params["parameters"]["sub_id_5"]["alias"] = "Facebook Pixel";

	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
	echo curl_exec($ch);
}