<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$dbName = 'au';

$link = mysqli_connect($host, $user, $password, $dbName);
mysqli_query($link, "SET NAMES 'utf8'");