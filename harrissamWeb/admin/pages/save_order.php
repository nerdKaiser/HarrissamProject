<?php

include('../connect.php');

extract($_POST);

$sname=$_POST['sname'];
$exp=explode(',', $sname);

   $sql="INSERT INTO `order`(`fname`, `sname`, `discription`, `prizes`, `delivery date`,`todays_date`) VALUES ('$fname','".$exp[0]."','$discription','".$exp[1]."','$dod',
   '$todays_date')";
 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="../view_order.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_order.php";
</script>
<?php } ?>