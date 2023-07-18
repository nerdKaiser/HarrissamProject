<?php
include('connector.php');

$sql = "CREATE TABLE quoted_order(
    identity int auto_increment PRIMARY KEY,
    supplier varchar(50),
    company varchar(250),
    product varchar(250),
    origin float,
    quantity float,
    reg_date timestamp default current_timestamp 
    )";
//id,fname,lname,company,business_phone,business_email,country,address,product,password
$result = mysqli_query($lib, $sql);
if (!$result) {
    die("Connection failed: " . $lib->connect_error);
} else {
    echo "table created";
}
mysqli_close($lib);