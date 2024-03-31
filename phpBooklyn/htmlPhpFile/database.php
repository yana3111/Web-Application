<?php

$hostName= "localhost";
$dbUser ="root";
$dbPassword= "";
$dbName ="testuser"
$conn= mysqli_connect($hname, $dbUser,, $dbPassword, $dbName);
if(!$conn){
    die("Something went wrong")
}

?>