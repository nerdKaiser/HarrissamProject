<?php

include("connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sup = $_POST["supplier"];
    $query = "SELECT * FROM quoted_order where supplier='$sup' and quantity!=0 order by reg_date ASC";

    $response = mysqli_query($lib, $query);

    if (mysqli_num_rows($response) > 0) {
        $results['trust'] = 1;
        $results['victory'] = array();
        //identity,company,product,origin,quantity,reg_date//supplyOrder
        while ($row = mysqli_fetch_array($response)) {
            $index['identity'] = $row['identity'];
            $index['company'] = $row['company'];
            $index['product'] = $row['product'];
            $index['origin'] = $row['origin'];
            $index['quantity'] = $row['quantity'];
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