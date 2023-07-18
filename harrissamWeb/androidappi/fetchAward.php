<?php

include("connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $query = "SELECT * FROM gallery_a order by reg_date desc";

    $response = mysqli_query($lib, $query);

    if (mysqli_num_rows($response) > 0) {
        $results['trust'] = 1;
        $results['victory'] = array();
        //id,description,image,reg_date,gallery_a
        while ($row = mysqli_fetch_array($response)) {
            $index['id'] = $row['id'];
            $index['description'] = $row['description'];
            $index['image'] = $row['image'];
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