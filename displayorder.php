<?php

include 'connect.php';
session_start();
$plc=$_SESSION['plc'];

$sql ="SELECT * FROM `detailedorder` where Place_ID='$plc' order by Order_no";
$result=mysqli_query($con,$sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <link rel="stylesheet" type="text/css"href="css\bootstrap.min.css"></link> 
    <link rel="stylesheet" type="text/css"href="css\style.css"></link>   
</head>
<body>  
           <br />  
           <div class="container" >  
                <h3 align="">Detailed Order Details</h3><br />                 
                <div class="table-responsive">  
                     <table class="table table-striped">  
                          <tr>  
                            <th>Place Id</th>
                            <th>Order Number</th>
                            <th>Date</th>
                            <th>Emp First name</th>
                            <th>Customer First Name</th>
                            <th>Pizza Name</th>
                            <th>Quantity</th>
                            <th>Crust</th>
                            <th>Payment</th>
                          </tr>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                          ?>  
                          <tr> 
                          <td><?php echo $row['Place_ID'];?></td> 
                            <td><?php echo $row["Order_no"]; ?></td>
                            <td><?php echo $row['Date'];?></td>
                            <td><?php echo $row['Emp_fname'];?></td>
                            <td><?php echo $row['Cust_first_name'];?></td>
                           
                            
                            <td><?php echo $row['Pizza_name'];?></td>
                            <td><?php echo $row['Quantity'];?></td>
                            <td><?php echo $row['Crust'];?></td>
                            
                            <td><?php echo $row['Payment_details'];?></td>
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br />  
      </body>  
<body>
    <div >
    <table>
        <tr>
        <button class="btn btn-primary my-5 mx-5"><a href="manager.php" class="text-light"> Main menu</a>
    </button>


    </tr>
    </table>
    </div>  


<!-- -->
                

<script type="text/javascript" src="js\all.min.js"></script>
    <script type="text/javascript" src="js\bootstrap.min.js"></script>
    <script type="text/javascript" src="js\jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js\popper.min.js"></script>
</body>
</html>