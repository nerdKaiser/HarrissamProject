<?php

include("connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $client_id = $_POST["client_id"];
    $query = "SELECT * FROM payment where client_id='$client_id' and status='Approved' order by date asc";
    $response = mysqli_query($lib, $query);
    if (mysqli_num_rows($response) > 0) {
        $results['trust'] = 1;
        $results['victory'] = array();
        //pay_id,ref_id,client_id,fullname,company,address,business_phone,order_type,scale,bank,account,cheque,amnt,amount,date,status,comment
        //pay_id,ref_id,client_id,fullname,company,address,business_phone,order_type,scale,bank,account,cheque,amnt,amount,date,status,comment//getPayment
        while ($row = mysqli_fetch_array($response)) {
            $index['pay_id'] = $row['pay_id'];
            $index['ref_id'] = $row['ref_id'];
            $index['client_id'] = $row['client_id'];
            $index['fullname'] = $row['fullname'];
            $index['company'] = $row['company'];
            $index['address'] = $row['address'];
            $index['business_phone'] = $row['business_phone'];
            $index['order_type'] = $row['order_type'];
            $index['scale'] = $row['scale'];
            $index['bank'] = $row['bank'];
            $index['account'] = $row['account'];
            $index['cheque'] = $row['cheque'];
            $index['amnt'] = $row['amnt'];
            $index['amount'] = $row['amount'];
            $index['words'] = $row['words'];
            $index['date'] = $row['date'];
            $index['status'] = $row['status'];
            $index['comment'] = $row['comment'];
            array_push($results['victory'], $index);
        }
    } else {

        $results['trust'] = 0;
        $results['mine'] = "No Approved Payments";
        echo json_encode($results);
    }
    echo json_encode($results);
}
