<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $supplier = $_POST['supplier'];
    $company = $_POST['company'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $select = "SELECT * FROM quoted_order WHERE supplier='$supplier' and company='$company' and product='$product'";
    $query = mysqli_query($lib, $select);
    if (mysqli_num_rows($query) > 0) {
        $update = "UPDATE quoted_order set origin=(origin+$quantity), quantity=(Quantity+$quantity)";
        if (mysqli_query($lib, $update)) {
            $response["success"] = 1;
            $response["message"] = "An existing Order updated successfully";
            echo json_encode($response);
            mysqli_close($lib);
        } else {
            $response["success"] = 0;
            $response["message"] = "Failed to update";
            echo json_encode($response);
            mysqli_close($lib);
        }
    } else {
        $sql = "INSERT INTO quoted_order(supplier,company,product,origin,quantity)
    VALUES('$supplier','$company','$product','$quantity','$quantity')";
        if (mysqli_query($lib, $sql)) {
            $response["success"] = 1;
            $response["message"] = "Order sent successfully";
            echo json_encode($response);
            mysqli_close($lib);
        } else {
            $response["success"] = 0;
            $response["message"] = " Failed to send order";
            echo json_encode($response);
            mysqli_close($lib);
        }
    }
}