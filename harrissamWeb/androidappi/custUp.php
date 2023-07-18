<?php
include("connection.php");
$email = $_POST['email'];
$password = md5($_POST['password']);
$sql = "SELECT * FROM client WHERE business_email='$email'";
$response = mysqli_query($lib, $sql);
if (mysqli_num_rows($response) === 1) {
    mysqli_query($lib, "UPDATE client set password='$password' where business_email='$email'");
    $row = mysqli_fetch_assoc($response);
    $result['success'] = 1;
    $result['message'] =  "Password was Reset";
    echo json_encode($result);
    mysqli_close($lib);
} else {
    $result['success'] = 0;
    $result['message'] = "Account does not exist!!";
    echo json_encode($result);
    mysqli_close($lib);
}