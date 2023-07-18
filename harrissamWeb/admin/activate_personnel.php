<?php
include("sess.php");
if (empty($_SESSION['username'])) {
    header('location:login.php');
} else {

    $sql = " UPDATE `personnel` SET `status`=1 WHERE `id`='" . $_GET['id'] . "'";
    $res = $conn->query($sql);
    $_SESSION['success'] = ' Personnel account activated';
?>
<script>
window.location = "view_personnel.php";
</script>
<?php } ?>