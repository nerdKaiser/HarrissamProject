<?php
include 'connector.php';

$sql = "CREATE TABLE marketers(
  id int AUTO_INCREMENT PRIMARY KEY,
  username varchar(50) NOT NULL,
  password VARCHAR(50),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$result = mysqli_query($lib, $sql);
if (!$result) {
    die("Connection failed: " . $lib->connect_error);
} else {
    echo "table created successfully";
}
mysqli_close($lib);