<?php
//const DB_HOST = 'localhost';
//const DB_USER = 'i58112_dbuser';
//const DB_PASS = 'ON0%?UEITLKApe5E';
//const DB_NAME = 'i58112_db';

const DB_HOST = 'localhost';
const DB_USER = 'u0973921_default';
const DB_PASS = 'Vvf1!3ZA';
const DB_NAME = 'u0973921_default';

//const DB_HOST = 'mysql.bestqualitygoods.club';
//const DB_USER = 'dh_vdaf5h';
//const DB_PASS = 'ffdkgthjofgmrt453l';
//const DB_NAME = 'dh_vdaf5h';

const TRACKER_URL = 'https://fbkeitaro.site/';
const POSTBACK_URL = 'https://fbkeitaro.site/5f54cc6/postback';
const K_ADMIN_API = 'd9a851ad4a13efb303a10d8d822a9395';

if (isset($_GET['id'])) {
	$user_id = $_GET['id'];
}
//Hideclick SUB - ID
if (!empty($_GET['q'])) {
	parse_str(urldecode($_GET['q']), $tmppar);
	if (!empty($tmppar['id'])) {
		$user_id = $tmppar['id'];
	}
}

//OLD SUBS - DB HIDECLICK, SUBS
if (!empty($user_id)){
	$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$db->set_charset("utf8");
	if ($select = $db->query("SELECT geo, offer_url, method FROM `hideclick` WHERE campaign_id = '$user_id'")->num_rows > 0) {
		$select = $db->query("SELECT geo, offer_url, method FROM `hideclick` WHERE campaign_id = '$user_id'");
		$array = $select->fetch_array();
		$geo_hideclick = $array[0];
		$offer_url = $array[1];
		$method = $array[2];
	}
	if ($select = $db->query("SELECT fbpx, sub1, sub2, sub3 FROM `hideclick` WHERE campaign_id = '$user_id'")->num_rows > 0) {
		$select = $db->query("SELECT fbpx, sub1, sub2, sub3 FROM `hideclick` WHERE campaign_id = '$user_id'");
		$array = $select->fetch_array();
		$fbpx = $array[0];
		$sub1 = $array[1];
		$sub2 = $array[2];
		$sub3 = $array[3];
	}
	mysqli_close($db);
}

//OLD SUBS - FBPX//////////////////////
if (isset($_GET['fbpx'])) {
	$fbpx = $_GET['fbpx'];
}
if (isset($_GET['utm_source'])) {
	$sub1 = $_GET['utm_source'];
}
if (isset($_GET['utm_medium'])) {
	$sub2 = $_GET['utm_medium'];
}
if (isset($_GET['utm_campaign'])) {
	$sub3 = $_GET['utm_campaign'];
}
///////////////////////////////////

$tiktok = $_GET['tiktok'];
$sub4 = $_GET['sub4'];

$data1 = $sub1;
$data2 = $sub2;
$data3 = $sub3;
$data4 = $sub4;
$sub4_error = $_GET['sub4_error'];

$url = 'https://' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$explode = explode('/', $url);
$offer = $explode[3];
if (empty($offer)){
	$offer = $_SERVER['HTTP_HOST'];
}
$geo = $explode[4];
if ($geo == "uae") {
	$geo = 'ae';
}
$lp = $explode[5];