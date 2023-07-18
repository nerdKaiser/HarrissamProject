<?php
include('connector.php');

$sql = "CREATE TABLE personnel(
    id VARCHAR(50) PRIMARY KEY,
    fname TEXT,
    lname TEXT,
    gender varchar(10),
    contact VARCHAR(20),
    address VARCHAR(250),
    email VARCHAR(250),
    password VARCHAR(250),
    date_added varchar(50),
    role text,
    field text,
    status int default 0,
    comment text,
    reg_date timestamp default current_timestamp 
    )";
//id,fname,lname,dob,gender,contact,address,email,password,role,status,comment
$result = mysqli_query($lib, $sql);
if (!$result) {
    die("Connection failed: " . $lib->connect_error);
} else {
    echo "table created";
}
mysqli_close($lib);