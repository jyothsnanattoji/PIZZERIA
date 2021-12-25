<?php

include 'connect.php';
session_start();
$plc=$_SESSION['plc'];


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <link rel="stylesheet" type="text/css"href="css\bootstrap.min.css"></link> 
    <link rel="stylesheet" type="text/css"href="css\style.css"></link>   
</head>
<body>
    
<div class="container">
    <button class="btn btn-primary my-5 mx-5"><a href="addemp.php" class="text-light"> Add Employee</a>
    </button>
    <button class="btn btn-primary my-5 mx-5"><a href="manager.php" class="text-light"> Main menu</a>
    </button>
    <button class="btn btn-primary my-5 mx-5"><a href="logs.php" class="text-light"> Logs</a>
    </button>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Employee ID</th>
      <th scope="col">Employee First Name</th>
      <th scope="col">Employee Last Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Date Of Birth</th>
      <th scope="col">Role </th>
      <th scope="col">Place ID</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>


  <?php
        $sql ="Select * from `employee` where Place_ID= '$plc'";
        $result=mysqli_query($con,$sql);
        if($result)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $Emp_ID=$row['Emp_ID'];
                $Emp_fname=$row['Emp_fname'];
                $Emp_lname=$row['Emp_lname'];
                $Gender=$row['Gender'];
                $DOB=$row['DOB'];
                $Role=$row['Role'];
                $Place_ID=$row['Place_ID'];

                echo'<tr>
                <th scope="row">'.$Emp_ID.'</th>
                <td>'.$Emp_fname.'</td>
                <td>'.$Emp_lname.'</td>
                <td>'.$Gender.'</td>
                <td>'.$DOB.'</td>
                <td>'.$Role.'</td>
                <td>'.$Place_ID.'</td>
                <td>
                
                <button class="btn btn-primary my-1"><a href="updateemp.php?
                updateid='.$Emp_ID.'" 
                class="text-light">Update</a></button>
                
                <button class="btn btn-danger"><a href="deleteemp.php?
                deleteid='.$Emp_ID.'"class="text-light">Delete</a></button> 
                

                 </td>
              </tr>';
            }
        }
  ?>

  </tbody>
</table>

</div>

<!-- -->
                

    <script type="text/javascript" src="js\all.min.js"></script>
    <script type="text/javascript" src="js\bootstrap.min.js"></script>
    <script type="text/javascript" src="js\jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js\popper.min.js"></script>
</body>
</html>