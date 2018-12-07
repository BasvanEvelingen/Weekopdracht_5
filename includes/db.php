<?php 

ob_start();

$db['db_host'] = "localhost";
$db['db_user'] = "admin";
$db['db_pass'] = "admin";
$db['db_name'] = "basblogv5";

foreach($db as $key => $value) {
define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);



$query = "SET NAMES utf8";
mysqli_query($connection,$query);

//if($connection) {
//
//echo "Connectie succesvol";
//
//}








