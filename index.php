<?php

$host="localhost";
$user="root";
$password="";
$db="pizzeria";



$data=mysqli_connect($host ,$user,$password, $db);

if($data==false)
{
    die("Connection error");

}


if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $managerId=$_POST["managerId"];
    $PlaceId=$_POST["PlaceId"];

    session_start();
   $_SESSION['mgr'] = $managerId ;
   $_SESSION['plc'] = $PlaceId ;

    $sql="select * from employee where Emp_ID='".$managerId."' AND Place_ID='".$PlaceId."'";

    $result=mysqli_query($data,$sql);

    $row=mysqli_fetch_array($result);
   
    if($row["Role"]=="Manager")
    {
     
        header("location:manager.php");
    }

    else
    {
        echo"Manager Id or Place Id incorrect";
    }
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Login</title>
    <link rel="stylesheet" type="text/css"href="css\bootstrap.min.css"></link> 
    <link rel="stylesheet" type="text/css"href="css\style.css"></link>   
</head>
<body>
    <div class="row contain">
        <div class="com-md-6 ">
            <h2 class= "text-center">Welcome to Pizzeria!</h2>
            <h5 class= "text-center">Manager Login</h5>
            <hr class="center">
            <form action="#" method="POST">
                <div class="form-group">
                    <label >  Manager Id</label>
                    <input type=" " name="managerId" class="form-control"
                    placeholder="Enter ManagerId" autocomplete="off">
                </div>
                <div class="form-group">
                <label >Place Id</label>
                    <input type=" " name="PlaceId" class="form-control"
                    placeholder="Enter PlaceId" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="submit" name="btnLogin" class="btn btn-primary"
                    value="Login">

                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="js\all.min.js"></script>
    <script type="text/javascript" src="js\bootstrap.min.js"></script>
    <script type="text/javascript" src="js\jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js\popper.min.js"></script>
</body>
</html>