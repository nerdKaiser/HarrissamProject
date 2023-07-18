<?php
include("connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reg_id = $_POST['reg_id'];
        $sql = "UPDATE request set manager='Job Done' where reg_id='$reg_id'";
        if (mysqli_query($lib, $sql)) {
            $response["success"] = 1;
            $response["message"] = "Project closed successfully";
            echo json_encode($response);
            mysqli_close($lib);
        } else {
            $response["success"] = 0;
            $response["message"] = " Failed to close job";
            echo json_encode($response);
            mysqli_close($lib);
        }
    }