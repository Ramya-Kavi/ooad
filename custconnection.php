<?php
  $name=$_POST['name'];
  $gender=$_POST['gender'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $confirmpassword=$_POST['confirm-password'];
  $mobilenumber=$_POST['mobilenumber'];
  
 //Db connection
  //$hostname='localhost';
  //$dbname='admin_db';
  //$username='root';
  //$password="mysql";

  $conn = new mysqli('localhost','root','mysql','admin_db');


  if($conn->connect_error){
      die('connection failed :'.$conn->connect_error);
  }else{
      $stmt= $conn->prepare("insert into signup_details(name,gender,email,password,confirmpassword,mobilenumber) values(?,?,?,?,?,?)");
      $stmt->bind_param("sssssi",$name,$gender,$email,$password,$confirmpassword,$mobilenumber);
    
    if($stmt->execute()){
      echo "Registration successfull..";
     echo '<a href="index.html">back to home</a>';
    }else{
        echo "failed";
    }
      $stmt->close();
      $conn->close();
  }

  ?>
