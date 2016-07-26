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

/*$databaseHost = 'panel.mspotter.be';
$databaseName = 'zadmin_easydungeon';
$databaseUsername = 'easydungeon';
$databasePassword = 'na5age7uz';*/

$databaseHost = 'localhost:3306';
$databaseName = 'heroes';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if(!$mysqli){
    echo "database connection error";
    die;
}

//getting id of the data from url

$route = explode('/', $_SERVER['REQUEST_URI']);
$action = $route[1];

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
