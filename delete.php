<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $route[2];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM $action WHERE id=$id");
echo $result;
