<?php
include('connection.php');
//placement,identity,supplier,company,product,price,quantity,description,image,status,comment,reg_date,placed_order
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quant = $_POST['quant'];
    $identity = $_POST['identity'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $supplier = $_POST['supplier'];
    $company = $_POST['company'];
    $product = $_POST['product'];
    $image = $_POST['image'];
    $filename = "IMG" . rand() . ".PNG";
    if ($quantity > $quant) {
        $response["success"] = 9;
        $response["message"] = "Your Quantity is too high";
        echo json_encode($response);
    } else {
        $sql = mysqli_query($lib, "INSERT INTO placed_order(identity,supplier,company,product,price,quantity,description,image)
        VALUES('$identity','$supplier','$company','$product','$price','$quantity','$description','$filename')");
        if ($sql) {
            mysqli_query($lib, "UPDATE quoted_order set quantity=(quantity-$quantity) where identity='$identity'");
            file_put_contents("images/" . $filename, base64_decode($image));
            $response["success"] = 1;
            $response["message"] = "Product uploaded successfully";
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