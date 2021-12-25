<?php
include 'connect.php';
if(isset($_GET['deleteid']))
{
    $Emp_=$_GET['deleteid'];


    $sql= "DELETE FROM `employee` WHERE `employee`.`Emp_ID` like '%$Emp_%'";
    $result=mysqli_query($con,$sql);

    if($result)
    {
        header("location:displayemp.php");
    }
    else 
    {
        die(mysqli_error($con));
    }
}
?>