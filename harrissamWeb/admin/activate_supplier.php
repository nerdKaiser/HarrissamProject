<?php
include("sess.php");
if (empty($_SESSION['username'])) {
    header('location:login.php');
} else {

    $sql = " UPDATE `supplier` SET `status`=1 WHERE `id`='" . $_GET['id'] . "'";
    $res = $conn->query($sql);
    $_SESSION['success'] = ' Customer account activated';
?>
<script>
window.location = "view_supplier.php";
</script>
<?php } ?>