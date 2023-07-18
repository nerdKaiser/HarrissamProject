<?php
include("connection.php");
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //id,fname,lname,dob,gender,contact,address,email,password,role,status,comment
    $fname = test_input($_POST["fname"]);
    $lname = test_input($_POST["lname"]);
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];
    $field = $_POST['field'];
    $gender = $_POST['gender'];
    $date_added = $_POST['date_added'];
    $date = date("Y-m-d");
    $year = date("Y");
    $mon = date("M");
    $naming = "/^[a-zA-Z]{2,}$/";
    if (!preg_match($naming, $fname)) {
        $result["success"] = 0;
        $result["message"] = "Your First name is invalid";
        echo json_encode($result);
    } else if (!preg_match($naming, $lname)) {
        $result["success"] = 0;
        $result["message"] = "Your Lastname is invalid";
        echo json_encode($result);
    } else {
        if (date(strtotime($date)) < (strtotime($date_added))) {
            $result["success"] = 0;
            $result["message"] = "Oops! You entered an invalid Date";
            echo json_encode($result);
        } else {
            $select = "SELECT email FROM personnel WHERE email='$email'";
            $query = mysqli_query($lib, $select);
            if (mysqli_num_rows($query) > 0) {
                $result["success"] = 0;
                $result["message"] = "Email not Accepted";
                echo json_encode($result);
                mysqli_close($lib);
            } else {
                $select = "SELECT contact FROM personnel WHERE contact='$contact'";
                $query = mysqli_query($lib, $select);
                if (mysqli_num_rows($query) > 0) {
                    $response["success"] = 0;
                    $response["message"] = " Phone not Accepted";
                    echo json_encode($response);
                    mysqli_close($lib);
                } else {
                    $count_my_page = ("marathon.txt");
                    $hits = file($count_my_page);
                    $hits[0]++;
                    $fp = fopen($count_my_page, "w");
                    fputs($fp, "$hits[0]");
                    fclose($fp);
                    $values = $hits[0];
                    $id = $values . '-' . $year;
                    $count_my_page = ("special.txt");
                    $hits = file($count_my_page);
                    $hits[0]++;
                    $fp = fopen($count_my_page, "w");
                    fputs($fp, "$hits[0]");
                    fclose($fp);
                    $fine = $hits[0];
                    $mail = $fname . '@staf-' . $fine . '-' . $year . '.harrissam.ac.ke';
                    $sql = "INSERT INTO personnel(id,fname,lname,gender,contact,email,password,date_added,role,field,address)
    VALUES('$id','$fname','$lname','$gender','$contact','$email','$password','$date_added','$role','$field','$mail')";
                    if (mysqli_query($lib, $sql)) {
                        $response["success"] = 1;
                        $response["message"] = "Account created successsfully. Your Serial is " . $id . " and Your official mail is { " . $mail . " }";
                        echo json_encode($response);
                        mysqli_close($lib);
                    } else {
                        $response["success"] = 0;
                        $response["message"] = "  Failed to create account";
                        echo json_encode($response);
                        mysqli_close($lib);
                    }
                }
            }
        }
    }
}