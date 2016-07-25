<?php
// including the database connection file
include_once("config.php");
$post = json_decode(file_get_contents("php://input"));
$id = $post->id;

$sql = "UPDATE $action SET ";
foreach($tables[$action]["fields"] as $index => $field){
    $sql .= ($index !== 0 ? ", " :"") . "$field='" . $post->$field . "'";
}
$sql .= " WHERE id=$id";
	//updating the table
$result = mysqli_query($mysqli, $sql);
echo $result;
?>
