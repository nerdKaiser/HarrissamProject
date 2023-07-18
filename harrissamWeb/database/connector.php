<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "harrissam";
$lib = new mysqli($servername, $username, $password, $dbname);
if ($lib->connect_error) {
    die("Connection failed: " . $lib->connect_error);
}