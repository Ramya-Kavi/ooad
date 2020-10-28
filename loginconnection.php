<?php
   $email=$_POST['email'];
  
   $password=$_POST['password'];

  //Db connection
  //$hostname='localhost';
  //$dbname='admin_db';
  //$username='root';
  //$password="mysql";

  $conn = new mysqli('localhost','root','mysql','admin_db');

  
  if($conn->connect_error){
      die('connection failed :'.$conn->connect_error);
  }else{
      $stmt= $conn->prepare("select * from signup_details where email=?");
      $stmt->bind_param("s",$email);
      $stmt->execute();
      $stmt_result=$stmt-> get_result();
      if($stmt_result->num_rows > 0){
        $data=$stmt_result->fetch_assoc();
        if($data['password']=== $password){
            echo "login successfully";
        }else{
            echo "invalid";
        }

      }else{
          echo "invalid";
      }
  }

  ?>
