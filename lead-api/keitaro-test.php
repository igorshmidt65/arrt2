<?php
require '../lead-api/config.php';
require '../lead-api/keitaro-admin.php';

$company_id = "Company_not_found";
$streams = 0;
$company_id = findCompanyId($user_id);
$company_info = getCompany($company_id);
if ($company_info['streams'] > 1) {
	$split_id = rand(1, $company_info['streams']);
}

/** @var $split_id Поток - Достать оффер из кейтаро*/
/** @var  $offer_url $geo_hideclick Достать парраметры оффера*/