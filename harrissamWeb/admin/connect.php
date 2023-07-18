<?php
/* Local Database*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "harrissam";


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



?> 