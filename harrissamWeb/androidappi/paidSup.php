<?php

include("connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    $response=mysqli_query($lib,"SELECT * from disburse");
    if (mysqli_num_rows($response) > 0) {
        $results['trust'] = 1;
        $results['victory'] = array();//id,ind,bank,cheque,supplier,amount,reg_date//disburse
        while ($row = mysqli_fetch_array($response)) {
            $index['id'] = $row['id'];
            $index['ind'] = $row['ind'];
            $index['bank'] = $row['bank'];
            $index['cheque'] = $row['cheque'];
            $index['supplier'] = $row['supplier'];
            $index['amount'] = $row['amount'];
            $index['reg_date'] = $row['reg_date'];
            array_push($results['victory'], $index);
        }
    } else {
        $results['trust'] = 0;
        $results['mine'] = "No record was Found";
        echo json_encode($results);
    }
    echo json_encode($results);