<?php
include("connection.php");
$supplier = $_POST['supplier'];
$find = mysqli_query($lib, "SELECT SUM(quantity*price) as pesa from placed_order where supplier='$supplier' and status='Approved'");
$dotUs = mysqli_fetch_assoc($find);
$query = "SELECT * FROM placed_order WHERE supplier='$supplier' and status='Approved'";
$response = mysqli_query($lib, $query);
if (mysqli_num_rows($response) > 0) {
    $results['trust'] = 1;
    $results['victory'] = array();
    while ($row = mysqli_fetch_array($response)) {
        $index['product'] = $row['product'];
        $index['quantity'] = $row['quantity'];
        $index['price'] = $row['price'];
        $index['supply'] = $row['quantity'] * $row['price'];
        $index['all_pay'] = $dotUs['pesa'];
        $index['image'] = $row['image'];
        array_push($results['victory'], $index);
    }
} else { //product,quantity,price,supply,all_pay,image,myPay
    //placement,identity,supplier,company,product,price,quantity,description,image,status,comment,reg_date,placed_order
    $results['trust'] = 0;
    $results['mine'] = "No Record Found";
    echo json_encode($results);
}
echo json_encode($results);