<?php

include("connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $field = $_POST['field'];
    $query = "SELECT * FROM personnel WHERE field='$field' and role='Engineer' and status=1";
    $response = mysqli_query($lib, $query);
    if (mysqli_num_rows($response) > 0) {
        $results['trust'] = 1;
        $results['victory'] = array();
        while ($row = mysqli_fetch_array($response)) {
            $index['field'] = $row['field'];
            $index['id'] = $row['id'];
            array_push($results['victory'], $index);
        }
    } else {
        $results['trust'] = 0;
        $results['mine'] = "No Matching Engineer";
        echo json_encode($results);
    }
    echo json_encode($results);
}