<?php
include("connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reg_id = $_POST['reg_id'];
    $available=$_POST['available'];
        $sql = "UPDATE request set available='$available' where reg_id='$reg_id'";
        if (mysqli_query($lib, $sql)) {
            $response["success"] = 1;
            $response["message"] = "Visibility Status updated successfully";
            echo json_encode($response);
            mysqli_close($lib);
        } else {
            $response["success"] = 0;
            $response["message"] = " Failed to update status";
            echo json_encode($response);
            mysqli_close($lib);
        }
    }