<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $field = $_POST['field'];
    $scale = $_POST["scale"];
    $description = $_POST['description'];
    $client_id = $_POST['client_id'];
    $cst = $_POST["cst"];
    $cost = $_POST['cost'];
    $words = $_POST['words'];
    $fullname = $_POST['fullname'];
    $company = $_POST['company'];
    $business_phone = $_POST['business_phone'];
    $business_email = $_POST['business_email'];
    $location = $_POST['location'];
    //reg_id,field,description,client_id,fullname,company,business_phone,business_email,location,mgrstatus,clistatus,finstatus,
    //engserial,mgrstatus2,engstart,engstatus,engimage,engend,engstatus2,clirate,clicomme,clistatus2,reg_date,up_date//request

    $sql = "INSERT INTO request(field,scale,cst,cost,words,description,client_id,fullname,company,business_phone,business_email,location)
    VALUES('$field','$scale','$cst','$cost','$words','$description','$client_id','$fullname','$company','$business_phone','$business_email','$location')";
    if (mysqli_query($lib, $sql)) {
        $response["success"] = 1;
        $response["message"] = "Request submitted successfully";
        echo json_encode($response);
        mysqli_close($lib);
    } else {
        $response["success"] = 0;
        $response["message"] = " Failed to send request";
        echo json_encode($response);
        mysqli_close($lib);
    }
}