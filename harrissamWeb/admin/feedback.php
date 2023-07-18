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
            <h3 class="text-primary"> View Feedback</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">View Feedback</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>rate</th>
                        <th>message</th>
                        <th>sender</th>
                        <th>name</th>
                        <th>phone</th>
                        <th>post</th>
                        <th>send_date</th>
                        <th>reply</th>
                        <th>reply_date</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM chat where receiver='Admin'";
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                        ?>
                    <tr>
                        <td><?php echo htmlentities($cnt); ?></td>
                        <td><?php echo $rows['rate']; ?></td>
                        <td><?php echo $rows['message']; ?></td>
                        <td><?php echo $rows['sender']; ?></td>
                        <td><?php echo $rows['name']; ?></td>
                        <td><?php echo $rows['phone']; ?></td>
                        <td><?php echo $rows['post']; ?></td>
                        <td><?php echo $rows['send_date']; ?></td>

                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
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