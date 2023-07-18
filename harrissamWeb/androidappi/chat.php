<?php
include("connection.php");
//id,rate,message,receiver,sender,name,phone,post,send_date,reply,reply_date//chat
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rate = $_POST["rate"];
    $message = $_POST["message"];
    $receiver=$_POST["receiver"];
    $sender = $_POST["sender"];
    $phone = $_POST["phone"];
    $name = $_POST["name"];
    $post = $_POST["post"];
    $sql = mysqli_query($lib,"INSERT into chat(rate,message,receiver,sender,name,phone,post)
        values('$rate','$message','$receiver','$sender','$name','$phone','$post')");
      if ($sql) { 
       $response["success"] = 1;
        $response["message"] = "Your message was delivered";
        echo json_encode($response);
        mysqli_close($lib);
    } else {
        $response["success"] = 0;
        $response["message"] = "Could not send message";
        echo json_encode($response);
        mysqli_close($lib);
    }
}