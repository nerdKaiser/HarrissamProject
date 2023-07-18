<?php
include 'connect.php';
session_start();

$sql = "DELETE FROM project_types WHERE id='".$_GET["id"]."'";
$res = $conn->query($sql) ;
 $_SESSION['success']=' Record Successfully Deleted';
?>
<script>
window.location = "view project_types.php";
</script>