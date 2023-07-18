<?php
include('../connect.php');

function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();

extract($_POST);

  $sql="INSERT INTO `service`(`sname`, `prize`) VALUES ('$sname','$prize')";


 if ($conn->query($sql) === TRUE)
  {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="../view_services.php";
</script>
<?php
} else 
{
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_services.php";
</script>
<?php } ?>