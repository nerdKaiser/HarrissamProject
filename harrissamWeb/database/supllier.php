<?php
include('connector.php');

$sql = "CREATE TABLE supplier(
    id VARCHAR(50) PRIMARY KEY,
    fname TEXT,
    lname TEXT,
    company varchar(50),
    business_phone VARCHAR(20),
    business_email VARCHAR(250),
    country varchar(50),
    address VARCHAR(50),
    product varchar(50),
    password VARCHAR(250),
    status int default 0,
    comment text,
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