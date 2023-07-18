<?php

include("connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $query = "SELECT * FROM store order by store_id desc";

    $response = mysqli_query($lib, $query);

    if (mysqli_num_rows($response) > 0) {
        $results['trust'] = 1;
        $results['victory'] = array();
        //store_id,placement,company,product,description,image,quantity,price,reg_date,storeHouse
        while ($row = mysqli_fetch_array($response)) {
            $index['store_id'] = $row['store_id'];
            $index['placement'] = $row['placement'];
            $index['company'] = $row['company'];
            $index['product'] = $row['product'];
            $index['description'] = $row['description'];
            $index['image'] = $row['image'];
            $index['quantity'] = $row['quantity'];
            $index['price'] = $row['price'];
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