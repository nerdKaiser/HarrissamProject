<?php
include('connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $sql = mysqli_query($lib, "DELETE from gallery_a where id='$id'");
    if ($sql) {
        $response["success"] = 1;
        $response["message"] = "Award Gallery Removed successfully";
        echo json_encode($response);
        mysqli_close($lib);
    } else {
        $response["success"] = 0;
        $response["message"] = "Failed to Remove the image";
        echo json_encode($response);
        mysqli_close($lib);
    }
}