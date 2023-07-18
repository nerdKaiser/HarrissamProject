<?php

include("connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
$try=mysqli_query($lib,"SELECT distinct supplier as sup from placed_order where status='Approved'");
$y=mysqli_fetch_assoc($try);
            $huge=mysqli_query($lib,"SELECT sum(quantity*price) as tot from placed_order where supplier='$y[sup]' and status='Approved'");
            $yes=mysqli_fetch_assoc($huge);
            $blog=mysqli_query($lib,"SELECT disburse as dis from placed_order where supplier='$y[sup]' and status='Approved'");
            $lg=mysqli_fetch_assoc($blog);
    $response=mysqli_query($lib,"SELECT distinct supplier from placed_order where status='Approved'");
    if (mysqli_num_rows($response) > 0) {
        $results['trust'] = 1;
        $results['victory'] = array();//supplier,payment,disburse
        while ($row = mysqli_fetch_array($response)) {
            $index['supplier'] = $row['supplier'];
            $index['payment'] = $yes['tot'];
            $index['disburse'] = $lg['dis'];
            array_push($results['victory'], $index);
        }
    } else {
        $results['trust'] = 0;
        $results['mine'] = "No record was Found";
        echo json_encode($results);
    }
    echo json_encode($results);