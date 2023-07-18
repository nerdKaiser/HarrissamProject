<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $engineer = $_POST["engineer"];
    $assign_date=$_POST["assign_date"];
    $reg_id = $_POST["reg_id"];
    $select = "SELECT * FROM request where mgrstatus2='Assigned' and engineer='Pending' and engserial='$engineer'";
    $query = mysqli_query($lib, $select);
    if (mysqli_num_rows($query) > 1) {
        $response["success"] = 0;
        $response["message"] = "Failed! The qouted engineer has two incomplete projects.";
        echo json_encode($response);
        mysqli_close($lib);
    } else {
    $sql = "UPDATE request set mgrstatus2='Assigned',engserial='$engineer',assign_date='$assign_date' where reg_id='$reg_id'";
    if (mysqli_query($lib, $sql)) {
        $response["success"] = 1;
        $response["message"] = "Assignment was successful";
        echo json_encode($response);
        mysqli_close($lib);
    } else {
        $response["success"] = 0;
        $response["message"] = "Failed to assign Engineer";
        echo json_encode($response);
        mysqli_close($lib);
    }
}
}