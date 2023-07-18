<?php
include('connector.php');

$sql = "CREATE TABLE gallery_a(
    id int auto_increment PRIMARY KEY,
    description varchar(250),
    image varchar(250),
    reg_date varchar(100)
    )";
//id,description,image,reg_date,gallery_a

$result = mysqli_query($lib, $sql);
if (!$result) {
    die("Connection failed: " . $lib->connect_error);
} else {
    echo "table created";
}
mysqli_close($lib);