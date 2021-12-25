<?php

include 'connect.php';
session_start();
$plc=$_SESSION['plc'];

if (isset($_POST['submit']))
{
        $Emp_ID=$_POST['Emp_ID'];
        $Emp_fname=$_POST['Emp_fname'];
        $Emp_lname=$_POST['Emp_lname'];
        $Gender=$_POST['Gender'];
        $DOB=$_POST['DOB'];
        $Role=$_POST['Role'];

        $sql="insert into employee (Emp_ID,Emp_fname,Emp_lname,Gender,DOB,Role,Place_ID)
        values('$Emp_ID','$Emp_fname','$Emp_lname','$Gender','$DOB','$Role','$plc')";
        $result=mysqli_query($con,$sql);
        if($result)
        {
            // echo"Data inserted Successfully";
            header('location:displayemp.php');
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

<h2 class="text-center">Add new Employee!</h2>

<div class="container my-5">
<form  method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Empolyee ID</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="EMP00" autocomplete="off" name="Emp_ID" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Empolyee First Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter First Name" name="Emp_fname" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Empolyee Last Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Last Name" name="Emp_lname" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Gender</label>
    <select class="form-control" id="exampleFormControlSelect1" name="Gender">
      <option>Male</option>
      <option>Female</option>
      <option>Others</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Date Of Birth</label>
    <input type="text" class="form-control" placeholder="YYYY-MM-DD" autocomplete="off" name="DOB">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Role</label>
    <select class="form-control" id="exampleFormControlSelect1" name="Role">
      <option>Chef</option>
      <option>Waiter</option>
      <option>Cashier</option>
    </select>
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