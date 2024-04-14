<?php 

  $place_name = $_POST['place_name'];
  $no_of_guests= $_POST['no_of_guests'];
  $arrival = $_POST['arrival'];
  $leaving = $_POST['leaving'];


  //database connection
  $conn = new mysqli('localhost','root','','booking',3307);
  if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
  }else{
    $stmt = $conn->prepare("insert into book(place_name,no_of_guests,arrival,leaving)
    values(?,?,?,?)");
    $stmt->bind_param("siss",$place_name, $no_of_guests, $arrival, $leaving);
    $stmt->execute();
    echo "booked successfully...";
    $stmt->close();
    $conn->close();
  }


?>