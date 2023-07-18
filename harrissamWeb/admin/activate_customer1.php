<?php
include("sess.php");
if (empty($_SESSION['username'])) {
    header('location:login.php');
} else {

    $sql = " UPDATE `client` SET `status`=2 WHERE `id`='" . $_GET['id'] . "'";
    $res = $conn->query($sql);
    $_SESSION['success'] = ' Client account deactivated';
?>
<script>
window.location = "view_customer.php";
</script>
<?php } ?>