<?php
include('connection.php');
//id,description,image,reg_date,gallery_p
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $description = $_POST['description'];
    $reg_date = $_POST['reg_date'];
    $image = $_POST['image'];
    $date = date("Y-m-d");
    $filename = "IMG" . rand() . ".PNG";
    if (date(strtotime($date)) < (strtotime($reg_date))) {
        $response["success"] = 0;
        $response["message"] = "You entered an invalid Date";
        echo json_encode($response);
    } else {
        $sql = mysqli_query($lib, "INSERT INTO gallery_p(description,image,reg_date)
        VALUES('$description','$filename','$reg_date')");
        if ($sql) {
            file_put_contents("images/" . $filename, base64_decode($image));
            $response["success"] = 1;
            $response["message"] = "Award uploaded successfully";
            echo json_encode($response);
            mysqli_close($lib);
        } else {
            $response["success"] = 0;
            $response["message"] = " Failed to upload";
            echo json_encode($response);
            mysqli_close($lib);
        }
    }
}