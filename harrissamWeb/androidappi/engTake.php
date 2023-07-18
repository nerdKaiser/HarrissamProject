<?php
include("connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reg_id = $_POST['reg_id'];
    $timer = $_POST['timer'];
    $eng = $_POST['eng'];
    $engcont=$_POST["engcont"];
    $field=$_POST["field"];
    $quantity=$_POST["quantity"];
     $select = "SELECT * FROM store WHERE product='$field'";
        $query = mysqli_query($lib, $select);
        if (mysqli_num_rows($query) > 0) {
    $gett = mysqli_query($lib, "SELECT quantity as qty from store WHERE product='$field'");
    $myImage = mysqli_fetch_assoc($gett);
    $avail=$myImage['qty'];
    if($quantity>=$avail){
       $response["success"] = 0;
        $response["message"] = "Sorry! We have insufficient amount of raw materials. Try to reduce your quantity";
        echo json_encode($response); 
    }else{
    $select = "SELECT * FROM request where engstatus='Started' and engineer='Pending' and engserial='$eng'";
    $query = mysqli_query($lib, $select);
    if (mysqli_num_rows($query) > 0) {
        $response["success"] = 0;
        $response["message"] = "Sorry! You have an ongoing project. Close the project first";
        echo json_encode($response);
        mysqli_close($lib);
    } else {
        $sql = "UPDATE request set engstatus='Started',engcont='$engcont',engstart='$timer',quantity='$quantity' where reg_id='$reg_id'";
        if (mysqli_query($lib, $sql)) {
            mysqli_query($lib, "UPDATE store set quantity=(quantity-$quantity) where product='$field'");
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
    }
        } else {
            $result["success"] = 0;
            $result["message"] = "Failed! The raw materials are missing from our system";
            echo json_encode($result);
            mysqli_close($lib);
        }
}