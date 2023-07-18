<?php

include("connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $engineer = $_POST["engineer"];
    $query = "SELECT * from personnel where id='$engineer'";
    $response = mysqli_query($lib, $query);
    if (mysqli_num_rows($response) > 0) {
        $results['trust'] = 1;
        $results['victory'] = array();
        while ($row = mysqli_fetch_array($response)) {
            $index['id'] = $row['id'];
            $index['fullname'] = $row['fname'] . ' ' . $row['lname'];
            $index['contact'] = $row['contact'];
            $index['email'] = $row['email'];
            $index['office'] = $row['address'];
            $index['field'] = $row['field'];
            array_push($results['victory'], $index);
        }
    } else {
        $results['trust'] = 0;
        $results['mine'] = "Failed to fetch record";
        echo json_encode($results);
    }
    echo json_encode($results);
}