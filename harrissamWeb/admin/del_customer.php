<?php
include 'connect.php';
session_start();

$sql = "DELETE FROM client WHERE id='".$_GET["id"]."'";
$res = $conn->query($sql) ;
 $_SESSION['success']='Customer succesfully removed';
?>
<script>
window.location = "view_customer.php";
</script>

