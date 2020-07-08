<?php
$ip = '';
$ua = '';
if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
	$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
if (isset($_SERVER["HTTP_CLIENT_IP"])) {
	$ip = $_SERVER["HTTP_CLIENT_IP"];
}
if (isset($_SERVER["REMOTE_ADDR"])) {
	$ip = $_SERVER["REMOTE_ADDR"];
}
if (isset($_SERVER["HTTP_X_REAL_IP"])) {
	$ip = $_SERVER["HTTP_X_REAL_IP"];
}
if (isset($_SERVER['HTTP_USER_AGENT'])) {
	$ua = $_SERVER['HTTP_USER_AGENT'];
}