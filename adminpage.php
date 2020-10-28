<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <title>Admin panel</title>
    <style>
        *{
              margin-top:50px;
        }

        a{
            text-decoration: none;
            color:white;
        }
        

        h2{
            text-align: center;
            background-color: rgba(0, 0, 0, 0.8);
             width: 88.5%;
            color:white;
            margin:auto ;
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
        @media only screen and (max-width:480px){
           
        }
        
    </style>
</head>
<body>

<?php
echo "<h2>Booking Details</h2>";

//Db connection
  //$hostname='localhost';
  //$dbname='admin_db';
  //$username='root';
  //$password="mysql";

  $conn = new mysqli('localhost','root','mysql','admin_db');


  if($conn->connect_error){
      die('connection failed :'.$conn->connect_error);
  }else{
      $result=$conn->query("select * from room_booking");

    echo "<table>
    <tr>
         <th>Booking_Id</th> 
         <th>Name</th>
         <th>Room_type</th>
         <th>Check_in</th>
         <th>Check_out</th> 
         <th>No of Person</th> 
    </tr>";

    if($result->num_rows > 0){

while($row = $result->fetch_assoc())
{
    echo "<tr>";
    echo "<td>".$row['booking_id']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['room_type']."</td>";
    echo "<td>".$row['check_in']."</td>";
    echo "<td>".$row['check_out']."</td>";
    echo "<td>".$row['person']."</td>";
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


