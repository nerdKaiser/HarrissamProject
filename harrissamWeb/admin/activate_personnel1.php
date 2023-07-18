<?php
include("sess.php");
if (empty($_SESSION['username'])) {
    header('location:login.php');
} else {

    $sql = " UPDATE `personnel` SET `status`=2 WHERE `id`='" . $_GET['id'] . "'";
    $res = $conn->query($sql);
    $_SESSION['success'] = ' Personnel account deactivated';
?>
<script>
window.location = "view_personnel.php";
</script>
<?php } ?>