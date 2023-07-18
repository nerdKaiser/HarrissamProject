<?php
require_once 'connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM personnel WHERE email='$email' AND password='$password' and role='Engineer' ";
    $response = mysqli_query($lib, $sql);
    if (mysqli_num_rows($response) === 1) {
        $row = mysqli_fetch_array($response);
        if ($row['status'] == 0) {
            $result['success'] = "0";
            $result['message'] = "Your Account has not been Approved";
            echo json_encode($result);
        } elseif ($row['status'] == 2) {
            $result = array();
            $result['login'] = array();
            $index['comment'] = $row['comment'];
            $result['success'] = "2";
            $result['message'] = "Your account has been rejected";
            array_push($result['login'], $index);
            echo json_encode($result);
        } else {
            //id,fname,lname,contact,address,email,password,buss_permit,buss_name,status
            $result = array();
            $result['login'] = array();
            $index['id'] = $row['id'];
            $index['fname'] = $row['fname'];
            $index['lname'] = $row['lname'];
            $index['gender'] = $row['gender'];
            $index['contact'] = $row['contact'];
            $index['address'] = $row['address'];
            $index['email'] = $row['email'];
            $index['date_added'] = $row['date_added'];
            $index['role'] = $row['role'];
            $index['field'] = $row['field'];
            $index['status'] = $row['status'];
            $index['reg_date'] = $row['reg_date'];
            array_push($result['login'], $index);
            $result['success'] = "1";
            $result['message'] = "Welcome";
            echo json_encode($result);
            mysqli_close($lib);
        }
    } else {
        $result['success'] = "0";
        $result['message'] = "Failed!! Either your email or password is invalid.";
        echo json_encode($result);
        mysqli_close($lib);
    }
}