<?php
session_start();
unset($_SESSION['username']);
$url = 'login.php';
header('Location: ' . $url);