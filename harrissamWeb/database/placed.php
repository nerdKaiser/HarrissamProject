<?php
include('connector.php');

$sql = "CREATE TABLE placed_order(
    placement int auto_increment PRIMARY KEY,
    identity int,
    supplier varchar(50),
    company varchar(250),
    product varchar(250),
    price float,
    quantity float,
    description varchar(250),
    image varchar(250),
    status varchar(50) default 'Pending',
    disburse varchar(50) default 'Pending',
    comment varchar(250),
    reg_date timestamp default current_timestamp 
    )";
//placement,identity,supplier,company,product,price,quantity,description,image,status,comment,reg_date,placed_order

$result = mysqli_query($lib, $sql);
if (!$result) {
    die("Connection failed: " . $lib->connect_error);
} else {
    echo "table created";
}
mysqli_close($lib);