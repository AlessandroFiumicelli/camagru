<?php
$DB_HOST = 'localhost:8080';
$DB_CREATOR = 'creator';
$DB_CREATOR_PSW = '12345678';
$DB_USER = 'alfiumic';
$DB_NAME = 'camagru';
$DB_PASSWORD = 'alfiumic';
$DB_DSN_SETUP = 'mysql:host='.$DB_HOST.';';
$DB_DSN = 'mysql:host='.$DB_HOST.';dbname='.$DB_NAME.';';
$check = file_get_contents("installed");
if ($check != '1')
	include 'config/newuser.php';
	include 'config/setup.php';
?>
