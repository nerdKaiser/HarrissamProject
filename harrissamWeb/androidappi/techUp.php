<?php
include("connection.php");
$email = $_POST['email'];
$password = md5($_POST['password']);
$sql = "SELECT * FROM personnel WHERE email='$email' and role='Technician'";
$response = mysqli_query($lib, $sql);
if (mysqli_num_rows($response) === 1) {
    mysqli_query($lib, "UPDATE personnel set password='$password' where email='$email' and role='Technician'");
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