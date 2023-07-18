<?php
include('connector.php');

$sql = "CREATE TABLE request(
    reg_id int auto_increment PRIMARY KEY,
    field varchar(250),
    scale varchar(30),
    cst double,
    cost varchar(50),
    words varchar(250),
    description varchar(250),
    client_id varchar(50),
    fullname varchar(50),
    company varchar(50),
    business_phone varchar(50),
    business_email varchar(100),
    location varchar(250),
    mgrstatus varchar(50) default 'Pending',
    mgrcomment varchar(250),
    clistatus varchar(50) default 'Pending',
    finstatus varchar(250) default 'Pending',
    engserial varchar(50) default 'Pending',
    mgrstatus2 varchar(50) default 'Pending',
    assign_date varchar(50) default 'Pending',
    engstart varchar(50) default 'Pending',
    engcont varchar(50) default 'Pending',
    quantity float,
    engstatus varchar(50) default 'Pending',
    techserial varchar(50) default 'Pending',
    techname varchar(50) default 'Pending',
    techcont varchar(50) default 'Pending',
    begin varchar(50) default 'Pending',
    background varchar(250) default 'Pending',
    image varchar(250) default 'Pending',
    engineer varchar(50) default 'Pending',
    engend varchar(50) default 'Pending',
    manager varchar(50) default 'Pending',
    client varchar(50) default 'Pending',
    available varchar(50) default 'Pending',
    reg_date timestamp default current_timestamp ,
    up_date timestamp default current_timestamp on update current_timestamp
    )"; //reg_id,field,scale,description,client_id,fullname,company,business_phone,business_email,
//location,mgrstatus,clistatus,finstatus,
//engserial,mgrstatus2,engstart,engstatus,techserial,techname,begin,background,image,
//engineer,engend,manager,client,reg_date,up_date//request
$result = mysqli_query($lib, $sql);
if (!$result) {
    die("Connection failed: " . $lib->connect_error);
} else {
    echo "table created";
}
mysqli_close($lib);