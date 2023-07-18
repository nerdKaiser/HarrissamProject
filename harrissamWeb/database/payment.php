<?php
include('connector.php');

$sql = "CREATE TABLE payment(
    pay_id int auto_increment PRIMARY KEY,
    ref_id int,
    client_id varchar(50),
    fullname varchar(100),
    company varchar(50),
    address varchar(100),
    business_phone varchar(50),
    order_type varchar(250),
    scale text,
    bank text,
    account bigint,
    cheque float,
    amnt double,
    amount varchar(50),
    words varchar(250),
    date varchar(100),
    status varchar(50) default 'Pending',
    comment varchar(250)
    )";
//pay_id,ref_id,client_id,fullname,company,address,business_phone,order_type,scale,bank,account,cheque,amnt,amount,date,status,comment,payment
$result = mysqli_query($lib, $sql);
if (!$result) {
    die("Connection failed: " . $lib->connect_error);
} else {
    echo "table created";
}
mysqli_close($lib);
