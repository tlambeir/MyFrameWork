<?php
//including the database connection file
include_once("config.php");

if(count($_FILES)){
	include 'file_upload.php';
} else {
	$post = json_decode(file_get_contents("php://input"));

	$sql = "INSERT INTO $action(";
	foreach($tables[$action]["fields"] as $index => $field){
		@$sql .= ($index !== 0 ? ", " :"") . $field;
	}
	$sql .= ") VALUES (";
	foreach($tables[$action]["fields"] as $index => $field){
		@$sql .= ($index !== 0 ? ", " :"") . "'" . $post->$field . "'";
	}
	$sql .=")";
	$result = mysqli_query($mysqli, $sql);
	echo json_encode(array("result"=>$result));
}

