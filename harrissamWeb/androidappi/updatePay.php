<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //status,comment,pay_id,reg_id
    $status = $_POST["status"];
    $comment = $_POST["comment"];
    $pay_id = $_POST['pay_id'];
    $reg_id = $_POST['reg_id'];
    $namba = mysqli_query($lib, "UPDATE payment set status='$status',comment='$comment' where pay_id='$pay_id'");
    if ($namba) {
        if ($status == 'Approved') {
            mysqli_query($lib, "UPDATE request set finstatus='Confirmed' where reg_id='$reg_id'");
            $response["success"] = 1;
            $response["message"] = "Payment Confirmed successfully";
            echo json_encode($response);
            mysqli_close($lib);
        } elseif ($status == 'Rejected') {
            $merit = 'Rejected->' . $comment;
            mysqli_query($lib, "UPDATE request set finstatus='$merit' where reg_id='$reg_id'");
            $response["success"] = 1;
            $response["message"] = "Payment Confirmed successfully";
            echo json_encode($response);
            mysqli_close($lib);
        }
    } else {
        $response["success"] = 0;
        $response["message"] = "  Failed to confirm payment";
        echo json_encode($response);
        mysqli_close($lib);
    }
}