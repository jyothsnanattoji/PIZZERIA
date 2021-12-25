<?php

include 'connect.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <link rel="stylesheet" type="text/css"href="css\bootstrap.min.css"></link> 
    <link rel="stylesheet" type="text/css"href="css\style.css"></link>   
</head>
<body>
    
<div class="container">
    <button class="btn btn-primary my-5 mx-5"><a href="addcust.php" class="text-light"> Add Customer</a>
    </button>
    <button class="btn btn-primary my-5 mx-5"><a href="manager.php" class="text-light"> Main menu</a>
    </button>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Customer ID</th>
      <th scope="col">Customer First Name</th>
      <th scope="col">Customer Last Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>


  <?php
        $sql ="Select * from `customer`";
        $result=mysqli_query($con,$sql);
        if($result)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $Cust_ID=$row['Cust_ID'];
                $Cust_first_name=$row['Cust_first_name'];
                $Cust_last_name=$row['Cust_last_name'];
                $Phone_no=$row['Ph_no'];

                echo'<tr>
                <th scope="row">'.$Cust_ID.'</th>
                <td>'.$Cust_first_name.'</td>
                <td>'.$Cust_last_name.'</td>
                <td>'.$Phone_no.'</td>
                <td>
                
                <button class="btn btn-primary my-1"><a href="updatecust.php?
                updateid='.$Cust_ID.'" 
                class="text-light">Update</a></button>
                

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