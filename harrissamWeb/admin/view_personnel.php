<?php
include("sess.php");
include('sidebar.php');
include('head.php');
include('header.php');
if (empty($_SESSION['username'])) {
  header('location:login.php');
} else {
?>



<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary"> View Personnel</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">View Personnel</li>
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
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>OfficeMail</th>
                        <th>Contact</th>
                        <th>Role</th>
                        <th>DateAdded</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
            $sql = "SELECT * FROM personnel ";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td><?php echo $row['role']; ?></td>
                        <td><?php echo $row['date_added']; ?></td>
                        <td><?php if ($row['status'] == 0) {
                      echo 'Account Inactive';
                    } elseif ($row['status'] == 1) {
                      echo 'Acount Activated';
                    } elseif ($row['status'] == 2) {
                      echo 'Account Deactivated';
                    }
                    ?></td>
                        <td>
                            <?php if ($row['status'] == 0) {
                  ?>

                            <a href="activate_personnel.php?id=<?= $row['id']; ?>"><button type="button"
                                    class="btn btn-xs btn-primary"><i class="fa fa-exchange"></i> Approve</button></a>
                            <a href="activate_personnel1.php?id=<?= $row['id']; ?>"><button type="button"
                                    class="btn btn-xs btn-danger"><i class="fa fa-exchange"></i> Deactivate</button></a>
                            <?php } elseif ($row['status'] == 1) { ?>
                            <a href="activate_personnel1.php?id=<?= $row['id']; ?>"><button type="button"
                                    class="btn btn-xs btn-danger"><i class="fa fa-exchange"></i> Deactivate</button></a>
                            <?php } elseif ($row['status'] == 2) { ?>
                            <a href="activate_personnel.php?id=<?= $row['id']; ?>"><button type="button"
                                    class="btn btn-xs btn-success"><i class="fa fa-exchange"></i> Activate</button></a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- /# row -->

<!-- End PAge Content -->


<?php include('footer.php'); ?>

<link rel="stylesheet" href="popup_style.css">
<?php if (!empty($_SESSION['success'])) {  ?>
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
<?php if (!empty($_SESSION['error'])) {  ?>
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
<?php unset($_SESSION["error"]);
  } ?>
<script>
var addButtonTrigger = function addButtonTrigger(el) {
    el.addEventListener('click', function() {
        var popupEl = document.querySelector('.' + el.dataset.for);
        popupEl.classList.toggle('popup--visible');
    });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
</script>
<?php } ?>