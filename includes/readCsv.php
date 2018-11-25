<?php 

function read($file){
	$rows = array();
	foreach (file($file, FILE_IGNORE_NEW_LINES) as $line) {
		$rows[] = str_getcsv($line);
	}
	return $rows;
}

 ?>