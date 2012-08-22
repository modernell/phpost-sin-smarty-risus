<?php
/**********************************************************************************
* QueryString.php                                                                 *
***********************************************************************************/

// Clean the request variables - add html entities to GET and slashes if magic_quotes_gpc is Off.
function cleanRequest()
{
	//global $board, $topic, $boardurl, $scripturl, $modSettings, $smcFunc;
    global $tsCore;

	// Makes it easier to refer to things this way.
	$scripturl = $tsCore->settings['url'] . '/index.php';

	// What function to use to reverse magic quotes - if sybase is on we assume that the database sensibly has the right unescape function!
	$removeMagicQuoteFunction = @ini_get('magic_quotes_sybase') || strtolower(@ini_get('magic_quotes_sybase')) == 'on' ? 'unescapestring__recursive' : 'stripslashes__recursive';

	// Save some memory.. (since we don't use these anyway.)
	unset($GLOBALS['HTTP_POST_VARS'], $GLOBALS['HTTP_POST_VARS']);
	unset($GLOBALS['HTTP_POST_FILES'], $GLOBALS['HTTP_POST_FILES']);

	// These keys shouldn't be set...ever.
	if (isset($_REQUEST['GLOBALS']) || isset($_COOKIE['GLOBALS']))
		die('Invalid request variable.');

	// Same goes for numeric keys.
	foreach (array_merge(array_keys($_POST), array_keys($_GET), array_keys($_FILES)) as $key)
		if (is_numeric($key))
			die('Numeric request keys are invalid.');

	// Numeric keys in cookies are less of a problem. Just unset those.
	foreach ($_COOKIE as $key => $value)
		if (is_numeric($key))
			unset($_COOKIE[$key]);

	// Get the correct query string.  It may be in an environment variable...
	if (!isset($_SERVER['QUERY_STRING']))
		$_SERVER['QUERY_STRING'] = getenv('QUERY_STRING');

	// It seems that sticking a URL after the query string is mighty common, well, it's evil - don't.
	if (strpos($_SERVER['QUERY_STRING'], 'http') === 0)
	{
		header('HTTP/1.1 400 Bad Request');
		die;
	}

	// If magic quotes is on we have some work...
	if (function_exists('get_magic_quotes_gpc') && @get_magic_quotes_gpc() != 0)
	{
		$_ENV = $removeMagicQuoteFunction($_ENV);
		$_POST = $removeMagicQuoteFunction($_POST);
		$_COOKIE = $removeMagicQuoteFunction($_COOKIE);
		foreach ($_FILES as $k => $dummy)
			if (isset($_FILES[$k]['name']))
				$_FILES[$k]['name'] = $removeMagicQuoteFunction($_FILES[$k]['name']);
	}

	// Add entities to GET.  This is kinda like the slashes on everything else.
	$_GET = htmlspecialchars__recursive($_GET);
    $_POST = htmlspecialchars__recursive($_POST);
    $_COOKIE = htmlspecialchars__recursive($_COOKIE);

	// Let's not depend on the ini settings... why even have COOKIE in there, anyway?
	$_REQUEST = $_POST + $_GET;

}

// Adds slashes to the array/variable.  Uses two underscores to guard against overloading.
function escapestring__recursive($var)
{
	global $smcFunc;

	if (!is_array($var))
		return addslashes($var);

	// Reindex the array with slashes.
	$new_var = array();

	// Add slashes to every element, even the indexes!
	foreach ($var as $k => $v)
		$new_var[addslashes($k)] = escapestring__recursive($v);

	return $new_var;
}

// Adds html entities to the array/variable.  Uses two underscores to guard against overloading.
function htmlspecialchars__recursive($var, $level = 0)
{

	if (!is_array($var))
		return htmlspecialchars($var, ENT_QUOTES);

	// Add the htmlspecialchars to every element.
	foreach ($var as $k => $v)
		$var[$k] = $level > 25 ? null : htmlspecialchars__recursive($v, $level + 1);

	return $var;
}

// Unescapes any array or variable.  Two underscores for the normal reason.
function unescapestring__recursive($var)
{

	if (!is_array($var))
		return stripslashes($var);

	// Reindex the array without slashes, this time.
	$new_var = array();

	// Strip the slashes from every element.
	foreach ($var as $k => $v)
		$new_var[stripslashes($k)] = unescapestring__recursive($v);

	return $new_var;
}

// Remove slashes recursively...
function stripslashes__recursive($var, $level = 0)
{
	if (!is_array($var))
		return stripslashes($var);

	// Reindex the array without slashes, this time.
	$new_var = array();

	// Strip the slashes from every element.
	foreach ($var as $k => $v)
		$new_var[stripslashes($k)] = $level > 25 ? null : stripslashes__recursive($v, $level + 1);

	return $new_var;
}
function string_seo($string)
{
	// ESPA�OL
	$espanol = array('�','�','�','�','�','�');
	$ingles = array('a','e','i','o','u','n');
	// MINUS
	$string = str_replace($espanol,$ingles,$string);
	$string = trim($string);
	$string = trim(preg_replace("/[^ A-Za-z0-9_]/", "-", $string));
	$string = preg_replace("/[ \t\n\r]+/", "-", $string);
	$string = str_replace(" ", "-", $string);
	$string = preg_replace("/[ -]+/", "-", $string);
	//
	return $string;
}

function string_truncate($string, $length = 80, $etc = '...',$break_words = false, $middle = false)
{
    if ($length == 0)
        return '';

    if (strlen($string) > $length) {
        $length -= min($length, strlen($etc));
        if (!$break_words && !$middle) {
            $string = preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length+1));
        }
        if(!$middle) {
            return substr($string, 0, $length) . $etc;
        } else {
            return substr($string, 0, $length/2) . $etc . substr($string, -$length/2);
        }
    } else {
        return $string;
    }
}

function modifier_hace($fecha, $show = false)
{
     
    $ahora = time();
    $tiempo = $ahora - $fecha; 
    //
    $dias = round($tiempo / 86400);
    // HOY
    if($dias <= 0) {
        // HACE MENOS DE 1 HORA
        if(round($tiempo / 3600) <= 0){ 
            // HACE MENOS DE 1 MINUTO
            if(round($tiempo / 60) <= 0){ 
                if($tiempo <= 60){ $hace = "Hace unos segundos"; }
            // HACE X MINUTOS 
            } else  { 
            	$can = round($tiempo / 60); 
            	if($can <= 1) {    $word = "minuto"; } else { $word = "minutos"; } 
            	$hace = 'Hace '.$can. " ".$word; 
            }
        // HACE X HORAS
        } else { 
            $can = round($tiempo / 3600); 
            if($can <= 1) {    $word = "hora"; } else {    $word = "horas"; } 
            $hace = 'Hace '.$can. " ".$word; 
        }    
    }
    // MENOS DE 7 DIAS
    else if($dias <= 30){
        // AYER
        if($dias < 2){
            $hace = 'Ayer';
        // HACE MENOS DE 5 DIAS
        } else {
            $hace = 'Hace '.$dias.' d&iacute;as';
        }
    // HACE MAS DE UNA SEMANA
    } else{
        $meses = round($tiempo / 2592000);
        if($meses == 1) $hace = 'M&aacute;s de 1 mes';
        elseif($meses < 12) {
            $hace = 'M&aacute;s de '.$meses.' meses';
        } else {
            $anos = round($tiempo / 31536000);
            if($anos == 1) $hace = 'M&aacute;s de un a&ntilde;o';
            else $hace = 'M&aacute;s de '.$anos.' a&ntilde;os';
        }
    }
    //
    return $hace;

}
?>