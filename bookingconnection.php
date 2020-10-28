<?php
  $name=$_POST['name'];
  $room_type=$_POST['room_type'];
  $check_in=$_POST['check_in'];
  $check_out=$_POST['check_out'];
  $person=$_POST['person'];
  
 //Db connection
  //$hostname='localhost';
  //$dbname='admin_db';
  //$username='root';
  //$password="mysql";

  $conn = new mysqli('localhost','root','mysql','admin_db');


  if($conn->connect_error){
      die('connection failed :'.$conn->connect_error);
  }else{
      $stmt= $conn->prepare("insert into room_booking(name,room_type,check_in,check_out,person) values(?,?,?,?,?)");
      $stmt->bind_param("ssssi",$name,$room_type,$check_in,$check_out,$person);
  
    if($stmt->execute()){
        header('location:custdetails.html');
    }else{
        echo "failed";
    }
    
      $stmt->close();
      $conn->close();
  }

  ?>
