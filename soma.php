<?php
set_time_limit(0);
define('CONFIG', 1);
require_once('inc.globals.php');

exit;

//for songs **********
// http://stackoverflow.com/questions/14127529/mysql-import-data-from-csv-using-load-data-infile
// http://dev.mysql.com/doc/refman/5.1/en/load-data.html
// Date -- Number of Listeners -- Artist -- Song -- Album (if available)
// list($date, $listeners, $artist, $song, $album) = $fields;


$filenames = array();
$result = $db->query("SELECT `filename` FROM `soma_playlists`");
while($row = $db->fetch($result)) {
	$filenames[] = $row['filename'];
}
// _printr($filenames);
// exit;	

// $db->query("TRUNCATE TABLE `soma_tracks`");
// $filename = 'digitalis-2015-Feb.txt';
$dir = './soma/';
foreach($filenames AS $filename) {	
	$db->query("
		LOAD DATA LOCAL INFILE '$dir$filename' IGNORE INTO TABLE `soma_tracks`
		FIELDS TERMINATED BY '\\t' 
		LINES TERMINATED BY '\\n'
		(date, listeners, artist, song, album)
		SET filename = '$filename'
	");
}
exit;

// $csv = file_get_contents($file);
// echo iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE', $csv); //get rid of utf characters.
// exit;
	
	
	


//local
$local_playlists = array();
$directory = './soma/';
$scanned_directory = array_diff(scandir($directory), array('..', '.'));

//zero sized files should not be marked as downloaded.
foreach($scanned_directory AS $val) {
	$bytes = filesize($directory.'/'. $val);
	if($bytes > 0) {
		$local_playlists[] = $val;
	}
}


//live
$live_playlists = array();
$playlists = file_get_contents("http://somafm.com/playlist/archives/");
preg_match_all("|href=[\"'](.*?)[\"']|", $playlists, $hrefs);

//cull the playlist E.g. href="/playlist/.
foreach($hrefs[1] AS $val) {	
	if(strpos($val, '/') === false && strpos($val, '?') === false) {
		$live_playlists[] = $val;
	}
}

//don't re-download files that already exist here.
$result = array_diff($live_playlists, $local_playlists);
$playlist = '';
foreach($result AS $val) {
	$playlist .= "$val\n";
	
	//save a copy of the playlist here and now.
	$csv = file_get_contents("http://somafm.com/playlist/archives/$val");
	file_put_contents('./soma/'. $val, $csv);
	echo"$val<br>";	
}

//save a copy of the master playlist
// file_put_contents('soma-playlists.txt', $playlist);





//DATABASE STUFF *************************	

//local
$local_playlists = array();
$directory = './soma/';
$scanned_directory = array_diff(scandir($directory), array('..', '.'));

//zero sized files should not be marked as downloaded.
foreach($scanned_directory AS $val) {
	// $bytes = filesize($directory.'/'. $val);
	// if($bytes > 0) {
		$local_playlists[] = $val;
	// }
}

// _printr($local_playlists);
// exit;


$query = array();
$stations = array();
foreach($local_playlists AS $val) {
	// 7soul-2014-Apr.txt
	$filename = $val;
	$fields = explode('-', $filename);
	list($station, $year, $month) = $fields;
	
	//for songs
	// http://dev.mysql.com/doc/refman/5.1/en/load-data.html
	// Date -- Number of Listeners -- Artist -- Song -- Album (if available)
	// list($date, $listeners, $artist, $song, $album) = $fields;
	
	$months = array(
		'Jan' => 1,
		'Feb' => 2,
		'Apr' => 3,
		'Mar' => 4,
		'May' => 5,
		'Jun' => 6,
		'Jul' => 7,
		'Aug' => 8,
		'Sep' => 9,
		'Oct' => 10,
		'Nov' => 11,
		'Dec' => 12
	);
	
	$month = str_replace('.txt', '', $month);
	$month = $months[$month];
	
	if(empty($stations[$filename])) {
		$query[] = "('$station', '$year', '$month', '$filename')";
	}
	$stations[$filename] = true;
}

if(!empty($query)) {
	// http://stackoverflow.com/questions/2714587/mysql-on-duplicate-key-update-for-multiple-rows-insert-in-single-query
	$db->query("
		INSERT INTO `soma_playlists` (station, year, month, filename)
		VALUES	". implode(",", $query) ."
		ON DUPLICATE KEY UPDATE station=VALUES(station), year=VALUES(year), month=VALUES(month), filename=VALUES(filename)
	");	
	// echo implode(",\n", $query);
}

// _printr($result);
// _printr($local_playlists);
// _printr($live_playlists);
exit;


?>