<?php
include 'connect.php';
session_start();

$sql =" UPDATE `admin` SET `status`=1 WHERE `id`='".$_GET['id']."'";
$res = $conn->query($sql) ;
 $_SESSION['success']=' Admin account activated';
?>
<script>
window.location = "view_user.php";
</script>