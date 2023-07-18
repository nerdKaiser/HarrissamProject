<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //id,ind,bank,account,cheque,supplier,amount,reg_date//disburse
    $ref_id = $_POST["ref_id"];
    $client_id = $_POST["client_id"];
    $fullname = $_POST['fullname'];
    $company = $_POST['company'];
    $address = $_POST["address"];
    $business_phone = $_POST["business_phone"];
    $order_type = $_POST["order_type"];
    $scale = $_POST["scale"];
    $bank = $_POST["bank"];
    $account = $_POST["account"];
    $cheque = $_POST["cheque"];
    $amnt = $_POST["amnt"];
    $amount = $_POST["amount"];
    $words = $_POST["words"];
    $date = $_POST["date"];
    $select = "SELECT cheque FROM payment WHERE cheque='$cheque'";
    $query = mysqli_query($lib, $select);
    if (mysqli_num_rows($query) > 0) {
        $response["success"] = 0;
        $response["message"] = "Your Cheque number is Suspicious";
        echo json_encode($response);
        mysqli_close($lib);
    } else {
        $select = "SELECT client_id,bank,account FROM payment WHERE client_id='$client_id' and bank='$bank' and account!='$account'";
        $query = mysqli_query($lib, $select);
        if (mysqli_num_rows($query) > 0) {
            $response["success"] = 0;
            $response["message"] = "Hi there, You had used your " . $bank . " Bank Account Number there before. Enter your ORIGINAL Account Number!!";
            echo json_encode($response);
            mysqli_close($lib);
        } else {
            $insert = mysqli_query($lib, "INSERT into payment(ref_id,client_id,fullname,company,address,business_phone,order_type,scale,bank,account,cheque,amnt,amount,words,date)
    values('$ref_id','$client_id','$fullname','$company','$address','$business_phone','$order_type','$scale','$bank','$account','$cheque','$amnt','$amount','$words','$date')");
            if ($insert) {
                $sql = "UPDATE request set clistatus='Paid' where reg_id='$ref_id'";
                if (mysqli_query($lib, $sql)) {
                    $response["success"] = 1;
                    $response["message"] = "Payment was submitted successful";
                    echo json_encode($response);
                    mysqli_close($lib);
                } else {
                    $response["success"] = 0;
                    $response["message"] = "  Failed to submit";
                    echo json_encode($response);
                    mysqli_close($lib);
                }
            } else {
                $response["success"] = 0;
                $response["message"] = "An error occurred while sending payment";
                echo json_encode($response);
                mysqli_close($lib);
            }
        }
    }
}