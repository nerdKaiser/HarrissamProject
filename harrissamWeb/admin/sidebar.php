 <?php
    include('connect.php');
    $sql = "select * from admin where username = '" . $_SESSION["username"] . "'";
    $result = $conn->query($sql);
    $row1 = mysqli_fetch_array($result);

    $q = "select * from tbl_permission_role where role_id='" . $row1['group_id'] . "'";
    $ress = $conn->query($q);
    //$row=mysqli_fetch_all($ress);
    $name = array();
    while ($row = mysqli_fetch_array($ress)) {
        $sql = "select * from tbl_permission where id = '" . $row['permission_id'] . "'";
        $result = $conn->query($sql);
        $row1 = mysqli_fetch_array($result);
        array_push($name, $row1[1]);
    }
    $_SESSION['name'] = $name;
    $useroles = $_SESSION['name'];

    ?>

 <!-- Left Sidebar  -->
 <div class="left-sidebar">
     <!-- Sidebar scroll-->
     <div class="scroll-sidebar">
         <!-- Sidebar navigation-->
         <nav class="sidebar-nav">
             <ul id="sidebarnav">
                 <li class="nav-devider"></li>
                 <li class="nav-label">Home</li>
                 <li> <a href="index.php" aria-expanded="false"><i class="fa fa-tachometer"></i>Dashboard</a>
                 </li>

                 <?php if (isset($useroles)) {
                        if (in_array("manage_user", $useroles)) { ?>

                 <li class="nav-label">Harrissam Imports LTD</li>

                 <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-user-plus"></i><span
                             class="hide-menu">Admin</span></a>
                     <ul aria-expanded="false" class="collapse">
                         <?php if (isset($useroles)) {
                                        if (in_array("add_user", $useroles)) { ?>
                         <li><a href="add_user.php">Add Admin</a></li>
                         <?php }
                                    } ?>
                         <li><a href="view_user.php">View Admins</a></li>
                     </ul>
                 </li>
                 <?php }
                    } ?>



                 <?php if ($_SESSION["username"] == 'admin') { ?>
                 <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-address-book"></i><span
                             class="hide-menu">Personnel</span></a>
                     <ul aria-expanded="false" class="collapse">
                         <li><a href="view_personnel.php">View Personnel</a></li>
                     </ul>
                 </li>
                 <?php } ?>

                 <?php if ($_SESSION["username"] == 'admin') { ?>
                 <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-address-book"></i><span
                             class="hide-menu">Customers</span></a>
                     <ul aria-expanded="false" class="collapse">
                         <li><a href="view_customer.php">View Customer</a></li>
                     </ul>
                 </li>
                 <?php } ?>

                 <?php if ($_SESSION["username"] == 'admin') { ?>
                 <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-inr"></i><span
                             class="hide-menu">Suppliers</span></a>
                     <ul aria-expanded="false" class="collapse">
                         <li><a href="view_supplier.php">Manage Suppliers</a></li>
                     </ul>
                 </li>
                 <?php } ?>
                 <?php if ($_SESSION["username"] == 'admin') { ?>
                 <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-cog"></i><span
                             class="hide-menu">Setting</span></a>
                     <ul aria-expanded="false" class="collapse">
                         <li><a href="manage_website.php">Appearance Management</a></li>
                     </ul>
                 </li>
                 <?php } ?>
                 <?php if ($_SESSION["username"] == 'admin') { ?>
                 <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-comment"></i><span
                             class="hide-menu">Customer Ratings</span></a>
                     <ul aria-expanded="false" class="collapse">
                         <li><a href="feedback.php">Feedback</a></li>
                     </ul>
                 </li>
                 <?php } ?>

             </ul>
         </nav>
         <!-- End Sidebar navigation -->
     </div>
     <!-- End Sidebar scroll-->
 </div>
 <!-- End Left Sidebar  -->