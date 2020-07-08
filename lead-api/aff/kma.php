<?php
$token = 'nFsiwJ8CZseLsec_ZT0G7y75ubkiZbJF';
require_once 'KmaLead.php';

/** @var KmaLead $kma */
$kma = new KmaLead($token);

if (isset($_SERVER['HTTP_X_KMA_API']) && $_SERVER['HTTP_X_KMA_API'] === 'click') {
	echo $kma->getClick($stream);
	exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	exit();
}

$data = [
	'channel' => $stream,
	'ip' => $_SERVER['REMOTE_ADDR'],
];

$_POST['data1'] = $sub1;
$_POST['data2'] = $sub2;
$_POST['data3'] = $sub3;
$_POST['data4'] = $sub4;

foreach (['name', 'phone', 'data1', 'data2', 'data3', 'data4', 'data5', 'click', 'referer', 'return_page', 'client_data', 'quantity', 'color'] as $item) {
	if (isset($_POST[$item]) && !empty($_POST[$item])) {
		$data[$item] = $_POST[$item];
	}
}

$kma->debug = $debug;

if (isset($_POST['return_page']) && !empty($_POST['return_page'])) {
	echo $kma->addLeadAndReturnPage($data);
	exit();
} else {
	$order = $kma->addLead($data);
	$name = $data['name'];
	$phone = $data['phone'];
}