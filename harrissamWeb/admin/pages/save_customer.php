<?php

include('../connect.php');

extract($_POST);
  $sql="INSERT INTO `customer`(`fname`, `lname`, `contact`, `address`, `password`) VALUES ('$fname','$lname','$contact','$address','$password')";


 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="../view_customer.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_customer.php";
</script>
<?php } ?>