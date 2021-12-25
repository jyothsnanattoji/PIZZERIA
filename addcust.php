<?php

include 'connect.php';

if (isset($_POST['submit']))
{
        // $Cust_ID=$_POST['Cust_ID'];
        $Cust_First_name=$_POST['Cust_first_name'];
        $Cust_Last_name=$_POST['Cust_last_name'];
        $Ph_no=$_POST['Ph_no'];
        

        $sql="insert into customer (Cust_first_name,Cust_last_name,Ph_no)
        values('$Cust_First_name','$Cust_Last_name','$Ph_no')";
        $result=mysqli_query($con,$sql);
        if($result)
        {
            // echo"Data inserted Successfully";
            header('location:displaycustomer.php');
        }
        else{
            echo"Insertion Unsuccessful";
        }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Pizzeria</title>
    <link rel="stylesheet" type="text/css"href="css\bootstrap.min.css"></link> 
    <link rel="stylesheet" type="text/css"href="css\style.css"></link>   
</head>
<body>

<h2 class="text-center">Add new Customer!</h2>

<div class="container my-5">
<form  method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Customer First Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter First Name" autocomplete="off" name="Cust_first_name" >
  </div>

<div class="form-group">
    <label for="exampleFormControlInput1">Customer Last Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Last Name" autocomplete="off" name="Cust_last_name" >
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Phone Number</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="XXXXXXXXXX" name="Ph_no" autocomplete="off">
  </div>
<div>
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</form>

</div>


    <script type="text/javascript" src="js\all.min.js"></script>
    <script type="text/javascript" src="js\bootstrap.min.js"></script>
    <script type="text/javascript" src="js\jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js\popper.min.js"></script>
</body>
</html>