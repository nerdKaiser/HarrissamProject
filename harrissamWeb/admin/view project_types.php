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
  <a href="del_project.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Yes</a>
    <a href="view_view_projects.php" class="button button--error" data-for="js_success-popup">No</a>
    </p>
  </div>
</div>
<?php } ?>



  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> View projects</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View projects</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                 <div class="card">
              <div class="card-body">
      <?php if(isset($useroles)){  if(in_array("add project_types",$useroles)){ ?> 
        <a href="add project_types.php"><button class="btn btn-primary">Add projects</button></a>
                       <?php } } ?>
             <div class="table-responsive m-t-40">
   <table id="myTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
         <th>id</th>
            <th>Project name</th>
                    <th>Cost</th>
                    <th>Action</th>
                    
                    </tr>
                    </thead>
                                        <tbody>
               <?php 
                    include 'connect.php';

                $sql = "SELECT * FROM project_types";
             $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
                                      ?>
                  <tr>
         <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['pname']; ?></td>
      <td><?php echo $row['prize']; ?></td>
    

     <td>
            

  <?php if(isset($useroles)){  if(in_array("del_project_types",$useroles)){ ?> 
<a href="view project_types.php?id=<?=$row['id'];?>"><button type="button" class="btn btn-xs btn-danger" ><i class="fa fa-trash"></i></button></a>
               <?php } } ?> 
  
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
                -->
                <!-- /# row -->

                <!-- End PAge Content -->
           

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