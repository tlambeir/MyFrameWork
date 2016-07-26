<?php
//fetching data in descending order (lastest entry first)
include_once("config.php");

$myArray = array();

if(@$id = $route[2]){
	//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
	$result = mysqli_query($mysqli, "SELECT * FROM $action where id=$id"); // using mysqli_query instead
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$myArray = $row;
	}
} else {
	//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
	$result = mysqli_query($mysqli, "SELECT * FROM $action ORDER BY id DESC"); // using mysqli_query instead
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$myArray[] = $row;
	}
}


echo json_encode($myArray);
