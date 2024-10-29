<?php

//I make the connection with tha database in localhostAdmin 

$sname  = "localHost";
$uname = "root";
$password = "";

$db_name = "calculator";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    echo "Connection is failed";
}
