<?php
//db details
$dbHost = 'app4cure.cfq2io7fexvh.ap-south-1.rds.amazonaws.com';
$dbUsername = 'app4cure';
$dbPassword = 'app4cure';
$dbName = 'app4cure';

/*
mysql_connect($dbHost, $dbUsername, $dbPassword);
mysql_select_db($dbName);
*/

//Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>