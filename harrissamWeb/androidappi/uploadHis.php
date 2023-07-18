<?php

include("connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sup = $_POST["supplier"];
    $query = "SELECT * FROM placed_order where supplier='$sup' order by reg_date desc";

    $response = mysqli_query($lib, $query);

    if (mysqli_num_rows($response) > 0) {
        $results['trust'] = 1;
        $results['victory'] = array();
        //placement,identity,supplier,company,product,price,quantity,description,image,status,comment,reg_date,uploadHis
        while ($row = mysqli_fetch_array($response)) {
            $index['placement'] = $row['placement'];
            $index['identity'] = $row['identity'];
            $index['supplier'] = $row['supplier'];
            $index['company'] = $row['company'];
            $index['product'] = $row['product'];
            $index['price'] = $row['price'];
            $index['quantity'] = $row['quantity'];
            $index['description'] = $row['description'];
            $index['image'] = $row['image'];
            $index['status'] = $row['status'];
            $index['comment'] = $row['comment'];
            $index['reg_date'] = $row['reg_date'];
            array_push($results['victory'], $index);
        }
    } else {

        $results['trust'] = 0;
        $results['mine'] = "No Entry was Found";
        echo json_encode($results);
    }
    echo json_encode($results);
}