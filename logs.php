<?php

include 'connect.php';
session_start();
$plc=$_SESSION['plc'];
$sql ="SELECT * FROM `logs` order by Cdate desc";
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
           <button class="btn btn-primary my-5 mx-5"><a href="manager.php" class="text-light"> Main menu</a>
</button>
           <div class="container" style="width:1000px;">  
                <h3 align="">Logs</h3><br />                 
                <div class="table-responsive">  
                     <table class="table table-striped">  
                          <tr>  
                            <th>ID</th>
                            <th>Employee ID</th>
                            <th>Action</th>
                            <th>Timestamp</th>
                          </tr>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                          ?>  
                          <tr>  
                            <td><?php echo $row["ID"]; ?></td>
                            <td><?php echo $row['Emp_ID'];?></td>
                            <td><?php echo $row['Action'];?></td>
                            <td><?php echo $row['Cdate'];?></td>
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