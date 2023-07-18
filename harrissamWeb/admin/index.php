<?php
ob_start();
error_reporting(0);
session_start();
include("connect.php");
include('sidebar.php');
include('head.php');
include('header.php');
if (empty($_SESSION['username'])) {
    header('location:login.php');
} else {
?>
<?php


    $sql_currency = "select * from manage_website";
    $result_currency = $conn->query($sql_currency);
    $row_currency = mysqli_fetch_array($result_currency);
    ?>
<!-- Page wrapper  -->
<div class="page-wrapper">

    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Page Content -->
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-danger p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-comment f-s-40"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <?php

                                $sql = "select * from `personnel` where `status`='0'";
                                $res = $conn->query($sql);
                                $num_rows = mysqli_num_rows($res);
                                ?>
                            <h2 class="color-white">
                                <?php

                                    echo $num_rows

                                    ?>
                            </h2>
                            <p class="m-b-0">New Personnel accounts</p>
                        </div>
                    </div>
                </div>
            </div>





            <div class="col-md-4">
                <div class="card bg-primary p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-bag f-s-40"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <?php
                                $sql = "select * from `personnel` where `status`='1'";
                                $res = $conn->query($sql);
                                $num_rows = mysqli_num_rows($res);
                                ?>
                            <h2 class="color-white">
                                <?php

                                    echo $num_rows

                                    ?>

                            </h2>
                            <p class="m-b-0">Active Personnel</p>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-4">
                <div class="card bg-danger p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-comment f-s-40"></i></span>
                        </div>

                        <div class="media-body media-text-right">
                            <?php
                                $sql = "select * from `supplier` where `status`='0' ";
                                $res = $conn->query($sql);
                                $num_rows = mysqli_num_rows($res);
                                ?>
                            <h2 class="color-white">
                                <?php

                                    echo $num_rows

                                    ?>
                            </h2>
                            <p class="m-b-0">New Suppliers</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-primary p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-comment f-s-40"></i></span>
                        </div>

                        <div class="media-body media-text-right">
                            <?php
                                $sql = "select * from `supplier` where `status`='1' ";
                                $res = $conn->query($sql);
                                $num_rows = mysqli_num_rows($res);
                                ?>
                            <h2 class="color-white">
                                <?php

                                    echo $num_rows

                                    ?>
                            </h2>
                            <p class="m-b-0">Active Suppliers</p>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-4">
                <div class="card bg-danger p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-comment f-s-40"></i></span>
                        </div>

                        <div class="media-body media-text-right">
                            <?php
                                $sql = "select * from `client` where `status`='0' ";
                                $res = $conn->query($sql);
                                $num_rows = mysqli_num_rows($res);
                                ?>
                            <h2 class="color-white">
                                <?php

                                    echo $num_rows

                                    ?>
                            </h2>
                            <p class="m-b-0">New Clients</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="card bg-primary p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-bag f-s-40"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <?php

                                $sql = "select * from `client` where `status`='1'";
                                $res = $conn->query($sql);
                                $num_rows = mysqli_num_rows($res);
                                ?>
                            <h2 class="color-white">
                                <?php

                                    echo $num_rows

                                    ?>
                            </h2>
                            <p class="m-b-0">Active Client</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="card">
        <div class="card-body">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">Harrissam Personnel details</h3>
            </div>
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

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            include 'connect.php';
                            $sql = "SELECT * FROM `personnel`";
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
                            <?php if ($row['status'] == 0) {
                                    ?>
                            <td>Inactive</td>
                            <?php } else {

                                    ?>
                            <td>Active</td>
                            <?php } ?>
                            <td>
                                <?php if ($row['status'] == 0) {
                                        ?>

                                <?php } ?>





                                <!-- <a href="assign_role.php?id=<?= $row['id']; ?>"><button type="button" class="btn btn-xs btn-danger" ><i class="fa fa-pay"></i></button></a> -->
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    <?php } ?>