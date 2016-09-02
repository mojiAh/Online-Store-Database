<?php
function getDB() {
    $dbhost="mydb.tamk.fi";
    $dbuser="c6mahmad"; // Your own username
    $dbpass="Silver123"; // Your own password
    $dbname="dbc6mahmad62"; // Your own database name
    $dbConnection = new PDO("mysql:host=$dbhost;
	dbname=$dbname;charset=utf8", 
	$dbuser, $dbpass,array(PDO::MYSQL_ATTR_INIT_COMMAND 
	=> "SET NAMES 'utf8'"));
    
    return $dbConnection;
}