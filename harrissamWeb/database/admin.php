<?php
include 'connector.php';

$sql = "CREATE TABLE admin(
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username varchar(500) NOT NULL,
  email varchar(30) NOT NULL,
  password varchar(250) NOT NULL,
  fname varchar(50) NOT NULL,
  lname varchar(500) NOT NULL,
  gender varchar(500) NOT NULL,
  dob text NOT NULL,
  contact text NOT NULL,
  address varchar(500) NOT NULL,
  image varchar(2000) NOT NULL,
  created_on date NOT NULL,
  group_id int(11) NOT NULL,
  status int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

$result = mysqli_query($lib, $sql);
if (!$result) {
    die("Connection failed: " . $lib->connect_error);
} else {
    echo "admin table created successfully";
}
mysqli_close($lib);
?>