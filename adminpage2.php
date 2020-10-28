<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer-Details</title>
    <style>
        *{
              margin-top:50px;
        }

        a{
            text-decoration: none;
            color:white;
        }

        h2,h4{
            text-align: center;
            background-color: rgba(0, 0, 0, 0.8);
             width: 88.5%;
            color:white;
            margin:auto;
            padding: 10px;
        }
        table{
            width:90%;
            color :  rgba(0, 0, 0, 0.8);
            font-size:20px;
            text-align:left;
            margin:auto;
            border: 1px solid  rgba(0, 0, 0, 0.8);
        }

         th{
            background-color: rgba(0, 0, 0, 0.8);
            color:white;
        }
        tr:nth-child(even){
            background-color:#f2f2f2;
        }

    </style>
</head>
<body>

<?php
echo "<h2>Customer Details</h2>";

//Db connection
  //$hostname='localhost';
  //$dbname='admin_db';
  //$username='root';
  //$password="mysql";

  $conn = new mysqli('localhost','root','mysql','admin_db');


  if($conn->connect_error){
      die('connection failed :'.$conn->connect_error);
  }else{
      $result=$conn->query("select * from signup_details");

    echo "<table>
    <tr>
         <th>Id</th> 
         <th>Name</th>
         <th>Gender</th>
         <th>Email</th> 
         <th>Password</th>
         <th>Confirm Password</th> 
         <th>Mobile number</th> 

    </tr>";

    if($result->num_rows > 0){

while($row = $result->fetch_assoc())
{
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['gender']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['password']."</td>";
    echo "<td>".$row['confirmpassword']."</td>";
    echo "<td>".$row['mobilenumber']."</td>";
    echo "</tr>";
}
echo "</table>";
}else{
    echo "error";
}
$conn->close();
}

?>



</body>
</html>


