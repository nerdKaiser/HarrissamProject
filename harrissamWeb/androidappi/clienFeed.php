<?php
include("connection.php");
//reg_id,client,phone,company,message,rate
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reg_id = $_POST["reg_id"];
    $client=$_POST["client"];
    $phone = $_POST["phone"];
    $company = $_POST["company"];
    $message = $_POST["message"];
    $rate = $_POST["rate"];
    $sql = "UPDATE request set client='Confirmed' where reg_id='$reg_id'";
    if (mysqli_query($lib, $sql)) {
        mysqli_query($lib,"INSERT into feedback(reg_id,client,phone,company,message,rate)
        values('$reg_id','$client','$phone','$company','$message','$rate')");
        $response["success"] = 1;
        $response["message"] = "Feedback plus confirmation was successful";
        echo json_encode($response);
        mysqli_close($lib);
    } else {
        $response["success"] = 0;
        $response["message"] = "could not send your feedback";
        echo json_encode($response);
        mysqli_close($lib);
    }
}