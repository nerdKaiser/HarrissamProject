<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     //id,ind,bank,account,cheque,supplier,amount,reg_date//disburse
    $supplier = $_POST["supplier"];
    $bank = $_POST["bank"];
    $account = $_POST["account"];
    $cheque = $_POST["cheque"];
    $amount = $_POST["amount"];
    $per = '4DEFGHIJKL56789ABCMNWXYZOPQR0123STUV';
    $ind = substr(str_shuffle($per), 0, 10);
    $select = "SELECT cheque FROM disburse WHERE cheque='$cheque'";
    $query = mysqli_query($lib, $select);
    if (mysqli_num_rows($query) > 0) {
        $response["success"] = 0;
        $response["message"] = "Your Cheque number is Suspicious";
        echo json_encode($response);
        mysqli_close($lib);
    } else {
        $select = "SELECT supplier,bank,account FROM disburse WHERE supplier='$supplier' and bank='$bank' and account!='$account'";
        $query = mysqli_query($lib, $select);
        if (mysqli_num_rows($query) > 0) {
            $response["success"] = 0;
            $response["message"] = "Hi there, You had used your " . $bank . " Bank Account Number there before. Enter your ORIGINAL Account Number!!";
            echo json_encode($response);
            mysqli_close($lib);
        } else {
            $insert = mysqli_query($lib, "INSERT into disburse(ind,bank,account,cheque,supplier,amount)
    values('$ind','$bank','$account','$cheque','$supplier','$amount')");
            if ($insert) {
                $sql = "UPDATE placed_order set disburse='Disbursed' where supplier='$supplier' and status='Approved' and disburse='Pending'";
                if (mysqli_query($lib, $sql)) {
                    $response["success"] = 1;
                    $response["message"] = "Amount disbursed successfully";
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