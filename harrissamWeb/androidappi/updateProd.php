<?php
include('connection.php');
//placement,identity,status,company,product,price,quantity,description,comment
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $placement = $_POST['placement'];
    $identity = $_POST['identity'];
    $status = $_POST['status'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $comment = $_POST['comment'];
    $company = $_POST['company'];
    $product = $_POST['product'];
    if ($status == 'Rejected') {
        $sql = mysqli_query($lib, "UPDATE placed_order set status='$status',comment='$comment' where placement='$placement'");
        if ($sql) {
            mysqli_query($lib, "UPDATE quoted_order set quantity=(quantity+$quantity) where identity='$identity'");
            $response["success"] = 1;
            $response["message"] = "Product Rejected successfully";
            echo json_encode($response);
            mysqli_close($lib);
        } else {
            $response["success"] = 0;
            $response["message"] = " Failed to reject product";
            echo json_encode($response);
            mysqli_close($lib);
        }
    } else {
        $select = mysqli_query($lib, "SELECT image as img from placed_order where placement='$placement'");
        $myImage = mysqli_fetch_assoc($select);
        $sql = mysqli_query($lib, "UPDATE placed_order set status='$status',comment='$comment' where placement='$placement'");
        if ($sql) {
        $temple = "SELECT * FROM store WHERE product='$product'";
        $query = mysqli_query($lib, $temple);
        if (mysqli_num_rows($query) > 0) {
            mysqli_query($lib, "UPDATE store set quantity=(quantity+$quantity),image='$myImage[img]',price='$price' where product='$product'");
            $result["success"] = 1;
            $result["message"] = "Store updated successfully";
            echo json_encode($result);
            mysqli_close($lib);
        } else {
            mysqli_query($lib, "INSERT into store(placement,company,product,description,image,quantity,price)values('$placement','$company','$product','$description','$myImage[img]','$quantity','$price')");
            $response["success"] = 1;
            $response["message"] = "Product Approved successfully";
            echo json_encode($response);
            mysqli_close($lib);
        }
    }
}
}