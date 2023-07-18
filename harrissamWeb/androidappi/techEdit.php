<?php
include('connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $description = $_POST['description'];
    $reg_id = $_POST['reg_id'];
    $image = $_POST['image'];
    $filename = "IMG" . rand() . ".PNG";
        $sql = mysqli_query($lib, "UPDATE request set background='$description',image='$filename' where reg_id='$reg_id'");
        if ($sql) {
            file_put_contents("images/" . $filename, base64_decode($image));
            $response["success"] = 1;
            $response["message"] = "Background report submitted successfully";
            echo json_encode($response);
            mysqli_close($lib);
        } else {
            $response["success"] = 0;
            $response["message"] = " Failed to submit report";
            echo json_encode($response);
            mysqli_close($lib);
        }
    }