<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');

if(isset($_GET['id']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
<div class="popup__background"></div>
<div class="popup__content">
<h3 class="popup__content__title">
Sure
</h1>
<p>Are You Sure To Delete This Record?</p>
<p>
<a href="del_order.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Yes</a>
<a href="view_order.php" class="button button--error" data-for="js_success-popup">No</a>
</p>
</div>
</div>
<?php } ?>



<!-- Page wrapper  -->
<div class="page-wrapper">
<!-- Bread crumb -->
<div class="row page-titles">
<div class="col-md-5 align-self-center">
<h3 class="text-primary"> View Project</h3> </div>
<div class="col-md-7 align-self-center">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
<li class="breadcrumb-item active">View Project</li>
</ol>
</div>
</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">
<!-- Start Page Content -->

<div class="table-responsive m-t-40">
<table id="myTable" class="table table-bordered table-striped">
<thead>
<tr>
<th>id</th>
<th>customer Name</th>
<th>project title</th>
<th>Description</th>
<th>Cost(kshs)</th>
<th>Completion Date</th>
<th>launch date</th>
<th>status</th>
<th>Action</th>

</tr>
</thead>
<tbody>
<?php 
include 'connect.php';
$sql = "SELECT * FROM `project`";
$result = $conn->query($sql);

while($row = $result->fetch_assoc())

{
$sql1 = "SELECT * FROM `project_types` where id='".$row['id']."'" ;
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

$sql2 = "SELECT * FROM `customer` where id='".$row['id']."'";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row2['fname']; ?></td>
<!-- <td><?php echo $row['lname']; ?></td> -->

<td><?php echo isset($row1['pname']) ? $row1['pname'] : 'N/A'; ?></td>

<td><?php echo $row['discription']; ?></td>
<td><?php echo $row['prizes']; ?></td>
<td><?php echo $row['completion_date']; ?></td>
<td><?php echo $row['date']; ?></td>
<?php if ($row['completion_status']==0) {
?>
<td>pending</td>
<?php } 
else{

?>
<td>completed</td>
<?php }?>
<td>
<?php if ($row['completion_status']==0) {
?>

<a href="complete_order.php?id=<?=$row['id'];?>"><button type="button" class="btn btn-xs btn-danger" ><i class="fa fa-exchange"></i></button></a>
<?php }?>




<?php if(isset($useroles)){  if(in_array("edit_order",$useroles)){ ?> 
<a href="edit_order.php?id=<?=$row['id'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>
<?php } } ?>

</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>

<?php include('footer.php');?>


<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
<div class="popup__background"></div>
<div class="popup__content">
<h3 class="popup__content__title">
Success 
</h1>
<p><?php echo $_SESSION['success']; ?></p>
<p>
<button class="button button--success" data-for="js_success-popup">Close</button>
</p>
</div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
<div class="popup__background"></div>
<div class="popup__content">
<h3 class="popup__content__title">
Error 
</h1>
<p><?php echo $_SESSION['error']; ?></p>
<p>
<button class="button button--error" data-for="js_error-popup">Close</button>
</p>
</div>
</div>
<?php unset($_SESSION["error"]);  } ?>
<script>
var addButtonTrigger = function addButtonTrigger(el) {
el.addEventListener('click', function () {
var popupEl = document.querySelector('.' + el.dataset.for);
popupEl.classList.toggle('popup--visible');
});
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
</script>