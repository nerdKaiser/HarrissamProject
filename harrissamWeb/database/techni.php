<?php
include('connector.php');
$sql = "CREATE TABLE planned(
  id int AUTO_INCREMENT primary key,
  reg_id int,
  field varchar(100),
  technique varchar(50),
  entry_date varchar(50) default 'Pending',
  status varchar(10) default 'Pending',
  end_time timestamp default current_timestamp on update current_timestamp
)";
//id,reg_id,field,technique,entry_date,status,end_time,planned
$result = mysqli_query($lib, $sql);
if (!$result) {
    die("Connection failed: " . $lib->connect_error);
} else {
    echo "created successfully";
}
mysqli_close($lib);