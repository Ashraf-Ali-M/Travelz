<?php

  $name = $_POST['name'];
  $email= $_POST['email'];
  $number = $_POST['number'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  //database connection
  $conn = new mysqli('localhost','root','','booking',3307);
  if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
  }else{
    $stmt = $conn->prepare("insert into contact(name,email,number,subject,message)
    values(?,?,?,?,?)");
    $stmt->bind_param("ssiss", $name, $email, $number, $subject, $message);
    $stmt->execute();
    echo "contacted successfully...";
    $stmt->close();
    $conn->close();
  }
?>