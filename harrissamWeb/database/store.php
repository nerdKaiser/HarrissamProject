<?php
include('connector.php');

$sql = "CREATE TABLE store(
    store_id int auto_increment PRIMARY KEY,
    placement int,
    company varchar(250),
    product varchar(250),
    description VARCHAR(250),
    image varchar(250),
    quantity float,
    price float,
    reg_date timestamp default current_timestamp 
    )"; //store_id,placement,company,product,description,image,quantity,price,reg_date
$result = mysqli_query($lib, $sql);
if (!$result) {
    die("Connection failed: " . $lib->connect_error);
} else {
    echo "table created";
}
mysqli_close($lib);