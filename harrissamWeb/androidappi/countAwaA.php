<?php
include("connection.php");
$count = mysqli_query($lib, "SELECT count(*) as jobb from gallery_a");
$purpose = mysqli_fetch_assoc($count);
$yes = mysqli_query($lib, "SELECT count(*) as jobber from gallery_p");
$mann = mysqli_fetch_assoc($yes);

if (($purpose['jobb'] || $mann["jobber"]) >= 1) {
    $results['trust'] = 1;
    $results['victory'] = array();
    $index['counter'] = $purpose['jobb'] + $mann["jobber"];
    array_push($results['victory'], $index);
} else {
    $results['trust'] = 0;
    $results['message'] = "No Entry was Found";
    echo json_encode($results);
}
echo json_encode($results);