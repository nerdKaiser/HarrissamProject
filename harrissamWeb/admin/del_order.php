<?php
include 'connect.php';
session_start();

$sql = "DELETE FROM `order` WHERE id='".$_GET["id"]."'";
$res = $conn->query($sql) ;
 $_SESSION['success']=' Order Successfully Deleted';
?>
<script>
window.location = "view_order.php";
</script>
