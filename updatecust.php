<?php

include 'connect.php';
$Cust_ID=$_GET['updateid'];
$sql="Select * from`customer` where Cust_ID='$Cust_ID'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$Cust_first_name=$row['Cust_first_name'];
$Cust_last_name=$row['Cust_last_name'];
$Ph_no=$row['Ph_no'];

if (isset($_POST['submit']))
{
        $Cust_first_name=$_POST['Cust_first_name'];
        $Cust_last_name=$_POST['Cust_last_name'];
        $Ph_no=$_POST['Ph_no'];

        $sql="update `customer` SET Cust_first_name='$Cust_first_name',Cust_last_name='$Cust_last_name',Ph_no='$Ph_no'
        where  Cust_ID='$Cust_ID'";
        $result=mysqli_query($con,$sql);
        if($result)
        {
           
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
  <!-- <div class="form-group">
    <label for="exampleFormControlInput1">Customer ID</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="EMP00" autocomplete="off" name="Cust_ID" value=< ?php echo $Cust_ID; ?> >
  </div> -->
  <div class="form-group">
    <label for="exampleFormControlInput1">Customer First Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter First Name" name="Cust_first_name" autocomplete="off" value=<?php echo $Cust_first_name; ?>>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Customer Last Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Last Name" name="Cust_last_name" autocomplete="off" value=<?php echo $Cust_last_name; ?>>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Phone number</label>
    <input type="text" class="form-control" placeholder="xxxxxxxxxx" autocomplete="off" name="Ph_no" value=<?php echo $Ph_no; ?>>
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