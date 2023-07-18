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
    //fname,lname,company,business_phone,business_email,country,address,product,password
    $fname = test_input($_POST["fname"]);
    $lname = test_input($_POST["lname"]);
    $company = $_POST['company'];
    $business_phone = $_POST['business_phone'];
    $business_email = $_POST['business_email'];
    $password = md5($_POST['password']);
    $country = $_POST['country'];
    $address = $_POST['address'];
    $product = $_POST['product'];
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
        $select = "SELECT business_email FROM supplier WHERE business_email='$business_email'";
        $query = mysqli_query($lib, $select);
        if (mysqli_num_rows($query) > 0) {
            $result["success"] = 0;
            $result["message"] = "Email not Accepted";
            echo json_encode($result);
            mysqli_close($lib);
        } else {
            $select = "SELECT business_phone FROM supplier WHERE business_phone='$business_phone'";
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
                $sql = "INSERT INTO supplier(id,fname,lname,company,business_phone,business_email,country,address,product,password)
    VALUES('$id','$fname','$lname','$company','$business_phone','$business_email','$country','$address','$product','$password')";
                if (mysqli_query($lib, $sql)) {
                    $response["success"] = 1;
                    $response["message"] = "Account created successsfully. Your Serial is " . $id . "";
                    echo json_encode($response);
                    mysqli_close($lib);
                } else { //fname,lname,company,business_phone,business_email,country,address,product,password
                    $response["success"] = 0;
                    $response["message"] = "  Failed to create account";
                    echo json_encode($response);
                    mysqli_close($lib);
                }
            }
        }
    }
}