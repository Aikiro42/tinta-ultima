<?php

//initialize MySQL Connection Variables

DEFINE('DB_USER','b37bbc2c9689ea');
DEFINE('DB_PASSWORD','43a055bf');
DEFINE('DB_HOST', 'us-cdbr-gcp-east-01.cleardb.net	');
DEFINE('DB_NAME', 'gcp_51dd865eb539f6526b03');

//DEFINE('DB_HOST', '192.168.56.103');

$host="localhost";
$username="root";
$password="13-01104";
$dbname="ultima";

//establish MySQL Connection

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die ('Could not connect to MySQL: ' . mysqli_connect_error());

//detect changes okay


?>