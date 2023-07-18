<?php
include("connection.php");
$count = mysqli_query($lib, "SELECT count(*) as jobb from request where available='Yes'");
$purpose = mysqli_fetch_assoc($count);
if (($purpose['jobb']) >= 1) {
    $results['trust'] = 1;
    $results['victory'] = array();
    $index['counter'] = $purpose['jobb'];
    array_push($results['victory'], $index);
} else {
    $results['trust'] = 0;
    $results['message'] = "No completed projects";
    echo json_encode($results);
}
echo json_encode($results);