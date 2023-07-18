<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mgrstatus = $_POST["mgrstatus"];
    $mgrcomment = $_POST["mgrcomment"];
    $reg_id = $_POST['reg_id'];
    $sql = "UPDATE request set mgrstatus='$mgrstatus',mgrcomment='$mgrcomment' where reg_id='$reg_id'";
    if (mysqli_query($lib, $sql)) {
        $response["success"] = 1;
        $response["message"] = "Request updated successfully";
        echo json_encode($response);
        mysqli_close($lib);
    } else {
        $response["success"] = 0;
        $response["message"] = "  Failed to update request";
        echo json_encode($response);
        mysqli_close($lib);
    }
}