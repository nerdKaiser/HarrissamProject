<?php
include("connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reg_id = $_POST['reg_id']; //reg_id,begin,techserial,techname
    $begin = $_POST['begin'];
    $techserial = $_POST['techserial'];
    $techcont=$_POST["techcont"];
    $techname = $_POST['techname'];
    $sql = "UPDATE request set begin='$begin',techserial='$techserial',techname='$techname',techcont='$techcont' where reg_id='$reg_id'";
    if (mysqli_query($lib, $sql)) {
        $response["success"] = 1;
        $response["message"] = "Request updated successfully";
        echo json_encode($response);
        mysqli_close($lib);
    } else {
        $response["success"] = 0;
        $response["message"] = " Failed to update request";
        echo json_encode($response);
        mysqli_close($lib);
    }
}