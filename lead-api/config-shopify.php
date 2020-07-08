<?php
//const DB_HOST = 'localhost';
//const DB_USER = 'i58112_dbuser';
//const DB_PASS = 'ON0%?UEITLKApe5E';
//const DB_NAME = 'i58112_db';

//const DB_HOST = '31.31.196.205:3306';
//const DB_USER = 'u0735999_default';
//const DB_PASS = '2cR!MJZ1';
//const DB_NAME = 'u0735999_default';

const DB_HOST = 'mysql.bestqualitygoods.club';
const DB_USER = 'dh_vdaf5h';
const DB_PASS = 'ffdkgthjofgmrt453l';
const DB_NAME = 'dh_vdaf5h';
const TRACKER_URL = 'https://fb-dev.pro/click.php';


$url  = $_POST['url'];
$explode = explode('?', $url);
$url = $explode[0];
$geo = 'shopify';
$offer = $url;
$land = 'shopify';