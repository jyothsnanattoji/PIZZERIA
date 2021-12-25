<?php

include 'connect.php';
session_start();
$plc=$_SESSION['plc'];
$Emp_ID=$_GET['updateid'];
$sql="Select * from`employee` where EMP_ID='$Emp_ID'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$Emp_fname=$row['Emp_fname'];
$Emp_lname=$row['Emp_lname'];
$Gender=$row['Gender'];
$DOB=$row['DOB'];
$Role=$row['Role'];
// $Place_ID=$row['Place_ID'];


if (isset($_POST['submit']))
{
        $Emp_ID=$_POST['Emp_ID'];
        $Emp_fname=$_POST['Emp_fname'];
        $Emp_lname=$_POST['Emp_lname'];
        $Gender=$_POST['Gender'];
        $DOB=$_POST['DOB'];
        $Role=$_POST['Role'];

        $sql="update `employee` set Emp_ID='$Emp_ID',Emp_fname='$Emp_fname',Emp_lname='$Emp_lname',Gender='$Gender',DOB='$DOB',Role='$Role',Place_ID='$plc'
        where Emp_ID='$Emp_ID'";
        $result=mysqli_query($con,$sql);
        if($result)
        {
           
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

<h2 class="text-center">Update Employee!</h2>

<div class="container my-5">
<form  method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Empolyee ID</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="EMP00" autocomplete="off" name="Emp_ID" value=<?php echo $Emp_ID; ?> >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Empolyee First Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter First Name" name="Emp_fname" autocomplete="off" value=<?php echo $Emp_fname; ?>>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Empolyee Last Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Last Name" name="Emp_lname" autocomplete="off" value=<?php echo $Emp_lname; ?>>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Gender</label>
    <select class="form-control" id="exampleFormControlSelect1" name="Gender" value=<?php echo $Gender; ?>>
      <option>Male</option>
      <option>Female</option>
      <option>Others</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Date Of Birth</label>
    <input type="text" class="form-control" placeholder="YYYY-MM-DD" autocomplete="off" name="DOB" value=<?php echo $DOB; ?>>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Role</label>
    <select class="form-control" id="exampleFormControlSelect1" name="Role" value=<?php echo $Role; ?>>
      <option>Manager</option>  
      <option>Chef</option>
      <option>Waiter</option>
      <option>Cashier</option>
    </select>
  </div>
  
<div>

<button type="submit" name="submit" class="btn btn-primary">Update</button>

</div>
</form>

</div>

    <script type="text/javascript" src="js\all.min.js"></script>
    <script type="text/javascript" src="js\bootstrap.min.js"></script>
    <script type="text/javascript" src="js\jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js\popper.min.js"></script>
</body>
</html>