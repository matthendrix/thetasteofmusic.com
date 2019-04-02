<?php
if(!defined('CONFIG') || basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {
	exit;
}

//php config
@ini_set('error_log', '_phperrors.log');
@ini_set('log_errors', 1);
@ini_set('display_errors', 1);
@ini_set('ignore_repeated_errors', 1);
@ini_set('ignore_repeated_source', 1);


//dev or live
if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
	define('SERVER', 'dev');
}
else {
	define('SERVER', 'live');
}

//include functions/classes
require_once(dirname(__FILE__) .'/inc.functions.common.php');
require_once(dirname(__FILE__) .'/inc.class.db.php');

//db
if(SERVER === 'dev') {
	$db_server = 'localhost';
	$db_name = 'thetasteofmusic';
	$db_user = 'devo';
	$db_passwd = 'devo';
} else {
	$db_server = '';
	$db_name = '';
	$db_user = '';
	$db_passwd = '';
}


//init db class
$db = new db($db_server, $db_user, $db_passwd, $db_name);
if(SERVER === 'dev') {
	$db->debug(true);	
}
