<?php
include 'connect.php';
session_start();

$sql = "DELETE FROM `project` WHERE id='".$_GET["id"]."'";
$res = $conn->query($sql) ;
 $_SESSION['success']=' Project Successfully Deleted';
?>
<script>
window.location = "view_projects.php";
</script>
