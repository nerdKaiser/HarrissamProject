<?php

include("connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $query = "SELECT * FROM supplier where status=1 order by id ASC";

    $response = mysqli_query($lib, $query);

    if (mysqli_num_rows($response) > 0) {
        $results['trust'] = 1;
        $results['victory'] = array();
        //id,fname,lname,company,product,business_phone,business_email,country,address,reg_date
        while ($row = mysqli_fetch_array($response)) {
            $index['id'] = $row['id'];
            $index['fname'] = $row['fname'];
            $index['lname'] = $row['lname'];
            $index['company'] = $row['company'];
            $index['product'] = $row['product'];
            $index['business_phone'] = $row['business_phone'];
            $index['business_email'] = $row['business_email'];
            $index['country'] = $row['country'];
            $index['address'] = $row['address'];
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