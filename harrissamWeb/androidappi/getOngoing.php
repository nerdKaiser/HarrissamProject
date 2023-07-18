<?php

include("connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];
    $field = $_POST["field"];
    /*$f1 = "00:00:00";
    $from = date('Y-m-d') . " " . $f1;
    $t1 = "23:59:59";
    $to = date('Y-m-d') . " " . $t1;
    //id,reg_id,field,technique,entry_date,status,end_time,planned
    $check = "SELECT * from planned where technique='$id' and status='Pending' and planned.entry_date  Between '$from' and '$to'";
    $mover = mysqli_query($lib, $check);
    if (mysqli_num_rows($mover) > 0) {
        $results['trust'] = 0;
        $results['mine'] = "Tasks are yet";
        echo json_encode($results);
    } else {*/
        $query = "SELECT * FROM request where field='$field' and techserial='$id' and begin!='Pending' and background='Pending' order by reg_date desc";
        $response = mysqli_query($lib, $query);
        if (mysqli_num_rows($response) > 0) {
            $results['trust'] = 1;
            $results['victory'] = array();
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
            $results['mine'] = "No record was Found";
            echo json_encode($results);
        }
        echo json_encode($results);
    }