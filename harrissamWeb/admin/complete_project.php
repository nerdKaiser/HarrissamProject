<?php
include 'connect.php';
session_start();

$sql =" UPDATE `project` SET `completion_status`=1 WHERE `id`='".$_GET['id']."'";
$res = $conn->query($sql) ;
 $_SESSION['success']=' order Successfully completed';
?>
<script>
window.location = "view_projects.php";
</script>