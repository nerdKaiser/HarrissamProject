<?php

include("connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $client_id = $_POST["client_id"];
    $query = "SELECT * FROM request where client_id='$client_id' order by reg_date desc";

    $response = mysqli_query($lib, $query);

    if (mysqli_num_rows($response) > 0) {
        $results['trust'] = 1;
        $results['victory'] = array();
        //reg_id,field,description,client_id,fullname,company,business_phone,business_email,location,mgrstatus,clistatus,finstatus,
        //engserial,mgrstatus2,engstart,engstatus,engimage,engend,engstatus2,clirate,clicomme,clistatus2,reg_date,up_date//request
        while ($row = mysqli_fetch_array($response)) {
            $index['reg_id'] = $row['reg_id'];
            $index['field'] = $row['field'];
            $index['scale'] = $row['scale'];
            $index['cst'] = $row['cst'];
            $index['cost'] = $row['cost'];
            $index['words'] = $row['words'];
            $index['description'] = $row['description'];
            $index['client_id'] = $row['client_id'];
            $index['fullname'] = $row['fullname'];
            $index['company'] = $row['company'];
            $index['business_phone'] = $row['business_phone'];
            $index['business_email'] = $row['business_email'];
            $index['location'] = $row['location'];
            $index['mgrstatus'] = $row['mgrstatus'];
            $index['mgrcomment'] = $row['mgrcomment'];
            $index['clistatus'] = $row['clistatus'];
            $index['finstatus'] = $row['finstatus'];
            $index['engserial'] = $row['engserial'];
            $index['mgrstatus2'] = $row['mgrstatus2'];
            $index['assign_date'] = $row['assign_date'];
            $index['engstart'] = $row['engstart'];
            $index['engcont'] = $row['engcont'];
            $index['engstatus'] = $row['engstatus'];
            $index['quantity'] = $row['quantity'];
            $index['techserial'] = $row['techserial'];
            $index['techname'] = $row['techname'];
            $index['techcont'] = $row['techcont'];
            $index['begin'] = $row['begin'];
            $index['background'] = $row['background'];
            $index['image'] = $row['image'];
            $index['engineer'] = $row['engineer'];
            $index['engend'] = $row['engend'];
            $index['manager'] = $row['manager'];
            $index['client'] = $row['client'];
            $index['available'] = $row['available'];
            $index['reg_date'] = $row['reg_date'];
            $index['up_date'] = $row['up_date'];
            array_push($results['victory'], $index);
        }
    } else {

        $results['trust'] = 0;
        $results['mine'] = "No Entry was Found";
        echo json_encode($results);
    }
    echo json_encode($results);
}