<?php
include("connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $query = "SELECT * FROM feedback order by reg_date desc";

    $response = mysqli_query($lib, $query);
//reg_id,client,phone,company,message,rate,reg_date
    if (mysqli_num_rows($response) > 0) {
        $results['trust'] = 1;
        $results['victory'] = array();
        while ($row = mysqli_fetch_array($response)) {
            $index['reg_id'] = $row['reg_id'];
            $index['client'] = $row['client'];
            $index['phone'] = $row['phone'];
            $index['company'] = $row['company'];
            $index['message'] = $row['message'];
            $index['rate'] = $row['rate'];
            $index['reg_date'] = $row['reg_date'];
            array_push($results['victory'], $index);
        }
    } else {

        $results['trust'] = 0;
        $results['mine'] = "No comment was found";
        echo json_encode($results);
    }
    echo json_encode($results);
}