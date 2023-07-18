<?php
include("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $count = mysqli_query($lib, "SELECT count(*) as jobb from request where client_id='$id'");
    $purpose = mysqli_fetch_assoc($count);
    if (($purpose['jobb']) >= 1) {
        $results['trust'] = 1;
        $results['victory'] = array();
        $index['counter'] = $purpose['jobb'];
        array_push($results['victory'], $index);
    } else {
        $results['trust'] = 0;
        $results['message'] = "No Entry was Found";
        echo json_encode($results);
    }
    echo json_encode($results);
}