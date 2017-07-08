<?php
/**
 * SendMail 发关邮件（mail方法）
 * @parma $username	string 发件人姓名
 * @parma $mailfrom	string 发件地址
 * @parma $mailto	string 接收地址
 * @parma $title	string 邮件标题
 * @parma $body		string 邮件正文
 * @parma $Charset	string 邮件编码
 * @return 失败后返回 false
 */
function SendMail($username, $mailfrom, $mailto, $title, $body, $Charset = "GBK") {
	$headers = '';
	$headers .= 'Content-type: text/html; charset=' . $Charset . "\r\n"; // Additional headers 
	$headers .= 'Reply-To: ' . $mailto . '<[email]' . $mailto . '[/email]>' . "\r\n";
	$headers .= 'From: ' . $username . '<' . $mailfrom . '>' . "\r\n";
	try {
		mail ( $mailto, '=?' . $Charset . '?B?' . base64_encode ( $title ) . '?=', $body, $headers );
	} catch ( Exception $e ) {
		return false;
	}
}
/**
 * 构造SQL语句
 *
 * @param array $field 字段 格式 array( 字段=>值， ……)
 * @param string $type set("and","or",",")
 * @return string sql
 */
function makesql($field, $type = ",") {
	if (empty ( $field ))
		return '';
	if (! is_array ( $field ))
		return '';
	
	$sql = "";
	foreach ( $field as $key => $var ) {
		$sql .= ($sql == '' ? "`$key`='$var'" : " {$type} `$key`='$var'");
	}
	return $sql;
}
function makeselect($table, $where, $fields = "*", $orderby = '') {
	return "select $fields from $table $where $orderby#@|@#select count(*) as n from $table $where";
}

function stripslashes_deep($value) {
	$value = is_array ( $value ) ? array_map ( "stripslashes_deep", $value ) : stripslashes ( $value );
	return $value;
}

function mkdirs($dir, $mode = 511) {
	if (! is_dir ( $dir )) {
		mkdirs ( dirname ( $dir ), $mode );
		$result = mkdir ( $dir, $mode );
		return $result;
	}
	return TRUE;
}

function dontarr($arr) {
	$ouput = array ();
	foreach ( ( array ) $arr as $row ) {
		$row = join ( ",", $row );
		$ouput [] = $row;
	}
	$ouput = array_unique ( ( array ) $ouput );
	foreach ( ( array ) $ouput as $key => $row ) {
		$ouput [$key] = explode ( ",", $row );
	}
	return $ouput;
}

function search($find, $arr) {
	foreach ( ( array ) $arr as $key => $val ) {
		if (! in_array ( $find, $val )) {
			continue;
		}
		return $key;
	}
	return FALSE;
}

function single_array($arr) {
	static $new_a = array ();
	foreach ( ( array ) $arr as $value ) {
		if (is_array ( $value )) {
			single_array ( $value );
		} else {
			$new_a [] = $value;
		}
	}
	return $new_a;
}

function checkdateformat($string) {
	if (preg_match ( "/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}\$/", $string )) {
		$arr = explode ( "-", $string );
		return checkdate ( $arr [1], $arr [2], $arr [0] ) ? TRUE : FALSE;
	}
	return FALSE;
}

function add_magic_quotes(&$arr) {
	foreach ( ( array ) $arr as $key => $value ) {
		$key = preg_replace ( "/[^a-z0-9_]+/i", "", $key );
		if (! is_array ( $value )) {
			if (! MAGIC_QUOTES_GPC) {
				$arr [$key] = replacehtmlcode ( addslashes ( $value ) );
			} else {
				$arr [$key] = replacehtmlcode ( $value );
			}
		} else {
			add_magic_quotes ( $arr [$key] );
		}
	}
}

function trans($string) {
	$string = str_replace ( array ("&lt;", "&gt;", "&quot;", "&#39;" ), array ("<", ">", "\"", "'" ), $string );
	return $string;
}

function replacehtmlcode(&$value) {
	if (is_array ( $value )) {
		foreach ( $value as $key => $val ) {
			replacehtmlcode ( $value [$key] );
		}
		return $value;
	}
	if (! is_numeric ( $value )) {
		$value = preg_replace ( "/[\\x00-\\x08\\x0B\\x0C\\x0E-\\x1F]/", "", $value );
		$value = str_replace ( array ("%3C", "<" ), "&lt;", $value );
		$value = str_replace ( array ("%3E", ">" ), "&gt;", $value );
		$value = str_replace ( array ("\"", "'", "\t" ), array ("&quot;", "&#39;", "    " ), $value );
		$value = str_ireplace ( array ("char(", "load_file", "select", "update%", "update%", "update ", "insert", "delete", "dede", "%00", "\\0", "\\r", "\\x1a", "/*" ), "", $value );
	}
	return $value;
}

function sub_str($string, $strlen = 10) {
	$j = 0;
	for($i = 0; $j < $strlen; ++ $j) {
		if (160 < ord ( substr ( $string, $j, 1 ) )) {
			++ $i;
		}
	}
	if ($i % 2 != 0) {
		++ $strlen;
	}
	$st = substr ( $string, 0, $strlen );
	if ($strlen < strlen ( $string )) {
		$st .= "...";
	}
	return $st;
}

function random($num) {
	mt_srand ( ( double ) microtime () * 100000000 );
	$num = rand ( 10000000, 90000000 );
	return $num;
}

function isweekday($j) {
	$arr = array ("日", "一", "二", "三", "四", "五", "六" );
	return $arr [$j];
}



function dump($html, $var = "", $error = FALSE) {
	if (ini_get ( "html_errors" )) {
		$content = "<pre>\n";
		if ($var != "") {
			$content .= "<strong>" . $var . " :</strong>\n";
		}
		$content .= htmlspecialchars ( print_r ( $html, TRUE ) );
		$content .= "\n</pre>\n";
	} else {
		$content = $var . " :\n" . print_r ( $html, TRUE );
	}
	if ($error) {
		return $content;
	}
	echo $content;
}

function t($str) {
	return nl2br ( str_replace ( " ", "&nbsp;", htmlspecialchars ( $str ) ) );
}

function h($value) {
	$value = is_array ( $value ) ? array_map ( "h", $value ) : htmlspecialchars ( $value );
	return $value;
}

function redirect($url, $ismeta = 0) {
	if (! headers_sent ()) {
		if (0 === $ismeta) {
			header ( "Location: " . $url );
			exit ();
		}
		header ( "refresh:" . $ismeta . ";url={$url}" );
		exit ();
	}
	echo "<meta http-equiv='Refresh' content='";
	echo $ismeta;
	echo ";URL=";
	echo $url;
	echo "'>";
	exit ();
}

function toplocation($url) {
	exit ( "<script>top.location=\"http://" . $GLOBALS ['CONFIG'] ['base_url'] . "/" . $url . "\";</script>" );
}

function message($msg, $url = "") {
	require (P_TPL . "/message.lang.php");
	if ($url == "") {
		echo "<script>alert('";
		echo $m [$msg];
		echo "');history.back();</script>";
		exit ();
	}
	echo "<script>alert('" . $m [$msg] . "');top.location='" . $url . "';</script>";
	exit ();
}

function alert($jsdata) {
	$jsdata = preg_replace ( "/\\s+/", "", $jsdata );
	echo "<script>alert('";
	echo $jsdata;
	echo "');</script>";
	exit ();
}



function ctr($views, $clicks) {
	if (0 < $views) {
		$nums = number_format ( $clicks * 100 / $views, 2 ) . "%";
		return $nums;
	}
	$nums = "0.00%";
	return $nums;
}

function httpbrowser($url, $query = "") {
	$context = array ("http" => array ("timeout" => 10, "method" => "GET", "header" => "User-Agent:Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0)\r\nAccept:*/*\r\nReferer:www.07073.com\r\n", "content" => $query ) );
	$fp = @file_get_contents ( $url, FALSE, @stream_context_create ( $context ) );
	return $fp;
}

function _ispost() {
	return strtolower ( $_SERVER ['REQUEST_METHOD'] ) == "post";
}

function convertip($ip) {
	if (! preg_match ( "/^\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}\$/", $ip )) {
		return "";
	}
	$adscitymodel = D::getsingleton ( "client_adscity" );
	$arr = $adscitymodel->query ( $ip );
	$adscitymodel->close ();
	return $arr [0];
}

function arraykeyformat(&$value) {
	$value = "'" . $value . "'";
	return $value;
}

function gd_version() {
	if (function_exists ( "gd_info" )) {
		$gdinfo = gd_info ();
		$gdversion = $gdinfo ['GD Version'] ? $gdinfo ['GD Version'] : 0;
		unset ( $gdinfo );
		return $gdversion;
	}
	$gdversion = 0;
	return $gdversion;
}

function dexit() {
	$html = "<!DOCTYPE HTML PUBLIC '-//IETF//DTD HTML 2.0//EN'>\r\n\t<html><head>\r\n\t<title>404 Not Found</title>\r\n\t</head><body>\r\n\t<h1>Not Found</h1>\r\n\t<p>The requested URL  was not found on this server.</p>\r\n\t</body></html>";
	exit ( $html );
}

function randomkey($strlen = 5) {
	$string = substr ( md5 ( rand () ), 1, $strlen );
	return $string;
}

function html2ubb($html) {
	$output = $html;
	$output = preg_replace ( '/\r/i', "", $output );
	$output = preg_replace ( '/\r/i', "", $output );
	$output = preg_replace ( '/on(load|click|dbclick|mouseover|mousedown|mouseup)="[^"]+"/i', "", $output );
	$output = preg_replace ( '/<script[^>]*?>([\w\W]*?)<\/script>/i', "", $output );
	
	$output = preg_replace ( '/<a[^>]+href="([^"]+)"[^>]*>(.*?)<\/a>/i', "\n[url=$1]$2[/url]\n", $output );
	
	$output = preg_replace ( '/<font[^>]+color=([^ >]+)[^>]*>(.*?)<\/font>/i', "[color=$1]$2", $output );
	
	$output = preg_replace ( '/<img[^>]+src="([^"]+)"[^>]*>/i', "[img]$1[/img]", $output );
	
	$output = preg_replace ( '/<([\/]?)b>/i', "[$1b]", $output );
	$output = preg_replace ( '/<([\/]?)strong>/i', "[$1b]", $output );
	$output = preg_replace ( '/<([\/]?)u>/i', "[$1u]", $output );
	$output = preg_replace ( '/<([\/]?)i>/i', "[$1i]", $output );
	
	$output = preg_replace ( '/&nbsp;/i', " ", $output );
	$output = preg_replace ( '/&amp;/i', "&", $output );
	$output = preg_replace ( '/&quot;/i', "\"", $output );
	$output = preg_replace ( '/&lt;/i', "<", $output );
	$output = preg_replace ( '/&gt;/i', ">", $output );
	
	$output = preg_replace ( '/<br>/i', "\n", $output );
	$output = preg_replace ( '/<[^>]*?>/i', "", $output );
	$output = preg_replace ( '/\[url=([^\]]+)\]\n(\[img\][^\[]+?\[\/img\])\n\[\/url\]/i', "[url=$1]$2[/url]", $output );
	$output = preg_replace ( '/\n+/i', "\n", $output );
	
	return $output;
}

function getip() {
     $ip = $_SERVER['REMOTE_ADDR']; 
     if (isset($_SERVER['HTTP_X_REAL_FORWARDED_FOR']) && preg_match('/^([0-9]{1,3}.){3}[0-9]{1,3}$/', $_SERVER['HTTP_X_REAL_FORWARDED_FOR'])) { 
         $ip = $_SERVER['HTTP_X_REAL_FORWARDED_FOR']; 
     } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && preg_match('/^([0-9]{1,3}.){3}[0-9]{1,3}$/', $_SERVER['HTTP_X_FORWARDED_FOR'])) {
          $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
     } elseif (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) { 
         $ip = $_SERVER['HTTP_CLIENT_IP']; 
     } 
     return $ip; 
}

function GetCookie($key) {
	if (! isset ( $_COOKIE [$key] ) || ! isset ( $_COOKIE [$key . '__ckMd5'] )) {
		return '';
	} else {
		if ($_COOKIE [$key . '__ckMd5'] != substr ( md5 ( COOKIE_KEY . $_COOKIE [$key] ), 0, 16 ))
			return '';
		else
			return $_COOKIE [$key];
	}
}

function PutCookie($key, $value, $kptime = 0, $pa = "/") {
	setcookie ( $key, $value, time () + $kptime, $pa, ".07073.com" );
	setcookie ( $key . '__ckMd5', substr ( md5 ( COOKIE_KEY . $value ), 0, 16 ), time () + $kptime, $pa, ".07073.com" );
}

function DropCookie($key) {
	@setcookie ( $key, '', time () - 360000, "/", ".07073.com" );
	@setcookie ( $key . '__ckMd5', '', time () - 360000, "/", ".07073.com" );
}

function pykey($py_key) {
	$pinyin = 65536 + pys ( $py_key );
	if (45217 <= $pinyin && $pinyin <= 45252) {
		$zimu = "A";
		return $zimu;
	}
	if (45253 <= $pinyin && $pinyin <= 45760) {
		$zimu = "B";
		return $zimu;
	}
	if (45761 <= $pinyin && $pinyin <= 46317) {
		$zimu = "C";
		return $zimu;
	}
	if (46318 <= $pinyin && $pinyin <= 46825) {
		$zimu = "D";
		return $zimu;
	}
	if (46826 <= $pinyin && $pinyin <= 47009) {
		$zimu = "E";
		return $zimu;
	}
	if (47010 <= $pinyin && $pinyin <= 47296) {
		$zimu = "F";
		return $zimu;
	}
	if (47297 <= $pinyin && $pinyin <= 47613) {
		$zimu = "G";
		return $zimu;
	}
	if (47614 <= $pinyin && $pinyin <= 48118) {
		$zimu = "H";
		return $zimu;
	}
	if (48119 <= $pinyin && $pinyin <= 49061) {
		$zimu = "J";
		return $zimu;
	}
	if (49062 <= $pinyin && $pinyin <= 49323) {
		$zimu = "K";
		return $zimu;
	}
	if (49324 <= $pinyin && $pinyin <= 49895) {
		$zimu = "L";
		return $zimu;
	}
	if (49896 <= $pinyin && $pinyin <= 50370) {
		$zimu = "M";
		return $zimu;
	}
	if (50371 <= $pinyin && $pinyin <= 50613) {
		$zimu = "N";
		return $zimu;
	}
	if (50614 <= $pinyin && $pinyin <= 50621) {
		$zimu = "O";
		return $zimu;
	}
	if (50622 <= $pinyin && $pinyin <= 50905) {
		$zimu = "P";
		return $zimu;
	}
	if (50906 <= $pinyin && $pinyin <= 51386) {
		$zimu = "Q";
		return $zimu;
	}
	if (51387 <= $pinyin && $pinyin <= 51445) {
		$zimu = "R";
		return $zimu;
	}
	if (51446 <= $pinyin && $pinyin <= 52217) {
		$zimu = "S";
		return $zimu;
	}
	if (52218 <= $pinyin && $pinyin <= 52697) {
		$zimu = "T";
		return $zimu;
	}
	if (52698 <= $pinyin && $pinyin <= 52979) {
		$zimu = "W";
		return $zimu;
	}
	if (52980 <= $pinyin && $pinyin <= 53640) {
		$zimu = "X";
		return $zimu;
	}
	if (53689 <= $pinyin && $pinyin <= 54480) {
		$zimu = "Y";
		return $zimu;
	}
	if (54481 <= $pinyin && $pinyin <= 62289) {
		$zimu = "Z";
		return $zimu;
	}
	$zimu = $py_key;
	return $zimu;
}
function pys($pysa) {
	$pyi = "";
	for($i = 0; $i < strlen ( $pysa ); $i ++) {
		$str_ascii = ord ( substr ( $pysa, $i, 1 ) );
		if (160 < $str_ascii) {
			$ascii = ord ( substr ( $pysa, $i ++, 1 ) );
			$str_ascii = $str_ascii * 256 + $ascii - 65536;
		}
		$pyi .= $str_ascii;
	}
	return $pyi;
}

function cn_substr($str, $slen, $startdd = 0) {
	$restr = '';
	$c = '';
	$str_len = strlen ( $str );
	if ($str_len < $startdd + 1) {
		return '';
	}
	if ($str_len < $startdd + $slen || $slen == 0) {
		$slen = $str_len - $startdd;
	}
	$enddd = $startdd + $slen - 1;
	for($i = 0; $i < $str_len; $i ++) {
		if ($startdd == 0) {
			$restr .= $c;
		} else if ($i > $startdd) {
			$restr .= $c;
		}
		
		if (ord ( $str [$i] ) > 0x80) {
			if ($str_len > $i + 1) {
				$c = $str [$i] . $str [$i + 1];
			}
			$i ++;
		} else {
			$c = $str [$i];
		}
		
		if ($i >= $enddd) {
			if (strlen ( $restr ) + strlen ( $c ) > $slen) {
				break;
			} else {
				$restr .= $c;
				break;
			}
		}
	}
	return $restr;
}

/**
 * 加密函数
 * Enter description here ...
 * @param string $encrypt
 * @param string $mc_key
 */
function mc_encrypt($encrypt, $mc_key) {
	$iv = mcrypt_create_iv ( mcrypt_get_iv_size ( MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB ), MCRYPT_RAND );
	$passcrypt = trim ( mcrypt_encrypt ( MCRYPT_RIJNDAEL_256, $mc_key, trim ( $encrypt ), MCRYPT_MODE_ECB, $iv ) );
	$encode = base64_encode ( $passcrypt );
	return $encode;
}
/**
 * 解密函数
 * Enter description here ...
 * @param string $decrypt
 * @param string $mc_key
 */
function mc_decrypt($decrypt, $mc_key) {
	$decoded = base64_decode ( $decrypt );
	$iv = mcrypt_create_iv ( mcrypt_get_iv_size ( MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB ), MCRYPT_RAND );
	$decrypted = trim ( mcrypt_decrypt ( MCRYPT_RIJNDAEL_256, $mc_key, trim ( $decoded ), MCRYPT_MODE_ECB, $iv ) );
	return $decrypted;
}

if (! defined ( "MAGIC_QUOTES_GPC" )) {
	define ( "MAGIC_QUOTES_GPC", get_magic_quotes_gpc () );
}
/**
 * 用于计算签到天数
 * @param 时间戳 $d
 */
function mkdate($d) {
	if ($d) {
		return date ( 'Y', $d ) * 1000 + date ( 'z', $d );
	}
	return 0;
}
function isToday($d){
	$today = date('Ymd', strtotime('today'));
	$com = date('Ymd', $d);
	return $today==$com ? TRUE : FALSE;
}
function isYesterday($d){
	$yestday = date('Ymd', strtotime('-1 day'));
	$com = date('Ymd', $d);
	return $yestday==$com ? TRUE : FALSE;
}

function mkdate2CN() {
	$day = date ( 'w' );
	switch ($day) {
		case 0 :
			return '周日';
		case 1 :
			return '周一';
		case 2 :
			return '周二';
		case 3 :
			return '周三';
		case 4 :
			return '周四';
		case 5 :
			return '周五';
		case 6 :
			return '周六';
	}
}

//中文截取2，单字节截取模式
//如果是request的内容，必须使用这个函数
function cn_substrR($str, $slen, $startdd = 0) {
	$str = cn_substr ( stripslashes ( $str ), $slen, $startdd );
	return addslashes ( $str );
}

//utf-8中文截取，单字节截取模式
function cn_substr_utf8($str, $length, $start = 0) {
	if (strlen ( $str ) < $start + 1) {
		return '';
	}
	preg_match_all ( "/./su", $str, $ar );
	$str = '';
	$tstr = '';
	
	//为了兼容mysql4.1以下版本,与数据库varchar一致,这里使用按字节截取
	for($i = 0; isset ( $ar [0] [$i] ); $i ++) {
		if (strlen ( $tstr ) < $start) {
			$tstr .= $ar [0] [$i];
		} else {
			if (strlen ( $str ) < $length + strlen ( $ar [0] [$i] )) {
				$str .= $ar [0] [$i];
			} else {
				break;
			}
		}
	}
	return $str;
}

/**
 * 创建Token
 */
function make_token() {
	$enc_key = '&#' . time () . '|' . rand ( 0, 100 );
	$code = sha1 ( $enc_key );
	@session_start ();
	$_SESSION ['_token_'] = $code;
	return $code;
}

/**
 * 验证Token
 * @param string $token
 */
function validate_token($token) {
	@session_start ();
	$stoken = $_SESSION ['_token_'];
	unset ( $_SESSION ['_token_'] );
	if ($stoken == $token)
		return TRUE;
	return FALSE;
}

//时间转换函数
function tranTime($time) {
	$rtime = date ( "m-d H:i", $time );
	$htime = date ( "H:i", $time );
	$otime = $time;
	$time = time () - $time;
	if ($time < 60) {
		$str = '刚刚';
	} elseif ($time < 60 * 60) {
		$min = floor ( $time / 60 );
		$str = $min . '分钟前';
	} elseif ($time < 60 * 60 * 24) {
		$h = floor ( $time / (60 * 60) );
		$str = $h . '小时前 ' . $htime;
	} elseif (date ( 'Y-m-d', $otime ) == date ( 'Y-m-d', strtotime ( '-1 day' ) )) {
		
		$str = '昨天 ' . $htime;
	} elseif (date ( 'Y-m-d', $otime ) == date ( 'Y-m-d', strtotime ( '-2 day' ) )) {
		echo '前天' . $htime;
	} else {
		$str = $rtime;
	}
	return $str;
}

function phpUnescape($escstr) {
	preg_match_all ( "/%u[0-9A-Za-z]{4}|%.{2}|[0-9a-zA-Z.+-_]+/", $escstr, $matches );
	$ar = &$matches [0];
	$c = "";
	foreach ( $ar as $val ) {
		if (substr ( $val, 0, 1 ) != "%") {
			$c .= $val;
		} elseif (substr ( $val, 1, 1 ) != "u") {
			$x = hexdec ( substr ( $val, 1, 2 ) );
			$c .= chr ( $x );
		} else {
			$val = intval ( substr ( $val, 2 ), 16 );
			if ($val < 0x7F){
				$c .= chr ( $val );
			} elseif ($val < 0x800){
				$c .= chr ( 0xC0 | ($val / 64) );
				$c .= chr ( 0x80 | ($val % 64) );
			} else {
				$c .= chr ( 0xE0 | (($val / 64) / 64) );
				$c .= chr ( 0x80 | (($val / 64) % 64) );
				$c .= chr ( 0x80 | ($val % 64) );
			}
		}
	}
	return $c;
}


function smsCode($len=6){
	$code = '';
	for($i = 0; $i<$len; $i++){
		$code .= rand(0,9);
	}
	return $code;
}

function SBC2DBC($str){
    $arr1 = array('。','，','！');
    $arr2 = array('.',',','!');
	return str_replace($arr1,$arr2,$str);
}
function html2text($str)
{
	$str = preg_replace("/<sty(.*)\\/style>|<scr(.*)\\/script>|<!--(.*)-->/isU","",$str);
	$alltext = "";
	$start = 1;
	for($i=0;$i<strlen($str);$i++)
	{
		if($start==0 && $str[$i]==">")
		{
			$start = 1;
		}
		else if($start==1)
		{
			if($str[$i]=="<")
			{
				$start = 0;
				$alltext .= " ";
			}
			else if(ord($str[$i])>31)
			{
				$alltext .= $str[$i];
			}
		}
	}
	$alltext = str_replace("　"," ",$alltext);
	$alltext = preg_replace("/&([^;&]*)(;|&)/","",$alltext);
	$alltext = preg_replace("/[ ]+/s"," ",$alltext);
	$alltext = SBC2DBC($alltext);
	return $alltext;
}

function cut_str($str, $len){
	$slen = strlen($str);
	if($slen>$len){
		return mb_substr($str, 0, $len-2).'…';
	}
	return $str;
}

function chuli($var){
		$blockVars = 'select|insert|and|or|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|=|into|load_file|outfile';
		$var = str_replace(explode('|', $blockVars), '', $var);
		return $var;
	}
 /**
     * 处理s=这一串的参数和值，传递过来路径，返回参数名称和值
     */
 function set_val($url){
     	if(!empty($url)){
     		$arr=explode("/", $url);
     		if(count($arr)>0){
     			if(empty($arr[0])){
     				array_shift($arr);
     			}
     			foreach($arr as $k=>$v){
     				if($k==3 && $v){
     					return $v; 
     				}
     			}
     		}
     	}
     }
 function getStatus($status, $imageShow = true) {
	switch ($status) {
		case 0 :
			$showText = '待发布';
			$showImg = '<IMG SRC="' . WEB_URL . '/static/img/locked.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="待发布">';
			break;
		case 3 :
			$showText = '待发布';
			$showImg = '<IMG SRC="' . WEB_URL . '/static/img/locked.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="待发布">';
			break;
		case 2 :
			$showText = '待审';
			$showImg = '<IMG SRC="' . WEB_URL . '/static/img/prected.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="待审">';
			break;
		case - 1 :
			$showText = '删除';
			$showImg = '<IMG SRC="' . WEB_URL . '/static/img/del.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="删除">';
			break;
		case 1 :
		default :
			$showText = '已发布';
			$showImg = '<IMG SRC="' . WEB_URL . '/static/img/ok.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="已发布">';

	}
	return ($imageShow === true) ?  $showImg  : $showText;
}
function showStatus($status, $id) {
	switch ($status) {
		case 0 :
			$info = '<a href="javascript:resume(' . $id . ')">发布</a>';
			break;
		case 3 :
			$info = '<a href="javascript:resume(' . $id . ')">发布</a>';
			break;
		case 2 :
			$info = '<a href="javascript:pass(' . $id . ')">批准</a>';
			break;
		case 1 :
			$info = '<a href="javascript:forbid(' . $id . ')">取消发布</a>';
			break;
		case - 1 :
			$info = '<a href="javascript:recycle(' . $id . ')">还原</a>';
			break;
	}
	return $info;
}
function showStatu($status, $id,$model="") {
	switch ($status) {
		case 0 :
			$info = '<a class="status s_'.$id.'" href="javascript:;" data-url="'.base_url().'status/resume/id/'.$id.'&model='.$model.'">发布</a>';
			break;
		case 3 :
			$info = '<a class="status s_'.$id.'" href="javascript:;" data-url="'.base_url().'status/resume/id/'.$id.'&model='.$model.'">同步</a>';
			break;
		case 2 :
			$info = '<a class="status s_'.$id.'" href="javascript:;" data-url="'.base_url().'status/pass/id/'.$id.'&model='.$model.'">批准</a>';
			break;
		case 1 :
			$html="取消发布";
			if(WEB_TEST==1){
				$html="";
			}
			$info = '<a class="status s_'.$id.'" href="javascript:;" data-url="'.base_url().'status/forbid/id/'.$id.'&model='.$model.'">'.$html.'</a>';
			break;
		case - 1 :
			$info = '<a class="status s_'.$id.'" href="javascript:;" data-url="'.base_url().'status/recycle/id/'.$id.'&model='.$model.'">还原</a>';
			break;
	}
	return $info;
}
function toTime($time) {
	//time 格式 = 'Y-m-d H:i:s'  2011-09-13 19:23:32  int mktime (int hour, int minute, int second, int month, int day, int year [, int is_dst])

	$var=explode(' ',$time);
	$ti=explode('-',$var[0]);
	return mktime(0,0,0,$ti[1],$ti[2],$ti[0]);
}
?>