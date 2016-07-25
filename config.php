<?php
/*
// mysql_connect("database-host", "username", "password")
$conn = mysql_connect("localhost","root","root") 
			or die("cannot connected");

// mysql_select_db("database-name", "connection-link-identifier")
@mysql_select_db("test",$conn);
*/

/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */

$databaseHost = 'panel.mspotter.be';
$databaseName = 'zadmin_easydungeon';
$databaseUsername = 'easydungeon';
$databasePassword = 'na5age7uz';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

//getting id of the data from url


$action = str_replace("/","",$_SERVER["REQUEST_URI"]);

$tables = array(
    "users" => array(
        "fields" => array(
            "name",
            "age",
            "email"
        )
    ),
    "heroes"=> array(
        "fields" => array(
            "name",
            "posX",
            "posY",
            "imagePath"
        )
    ),
    "maps"=> array(
        "fields" => array(
            "name",
            "imagePath"
        )
    ),
)

?>
