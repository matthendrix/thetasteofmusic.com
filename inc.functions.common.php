<?php
if(!defined('CONFIG') || basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {
	exit();
}

/**
* fancy print_r
*
* formats the php print_r function for readibility, primarily used for debugging.
*
* @param required "arr" - array
* @param optional "title" - string
* @returns echoes html;
*/
function _printr($arr, $title = '') {
	echo"<pre style='background:#fff;border:2px solid #cc0000;color:#000;font-size:12px;line-height:1.4;padding:10px;'>";
	echo !empty($title) ? "<h2>$title</h2>" : "";
	print_r($arr);	
	echo"</pre>";
}


?>