

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

<h2 class="text-center  mt-10 my-5 ">Welcome Manager!</h2>

<?php

$host="localhost";
$user="root";
$password="";
$db="pizzeria";



$data=mysqli_connect($host ,$user,$password, $db);
// $empid= $_GET['managerId'];
session_start();
$mgr=$_SESSION['mgr'];
$sql="CALL `MngDetails`('$mgr');";



if($result=mysqli_query($data,$sql)){
  while($row=mysqli_fetch_assoc($result)){
  echo  $row['Emp_ID']."<br/>";
  echo $row['Emp_fname']."<br/>";
  echo $row['Emp_lname']."<br/>";
  echo $row['Gender']."<br/>";
  echo $row['DOB']."<br/>";
  echo $row['Role']."<br/>";
  echo $row['Place_ID'];
  
  }

}
?>
<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">Info</th>
      <th scope="col">Operations</th>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Edit and Alter Employee Details</td>
      <td>  </div>
    <button class="btn btn-primary my-5 mx-5"><a href="displayemp.php" class="text-light"> Employee Details</a>
    </button>
</div>
</td>
<hr>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Edit and Alter Customer Details</td>
      <td>
      </div>
    <button class="btn btn-primary my-5 mx-5"><a href="displaycustomer.php" class="text-light"> Customer Details</a>
    </button>
      </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>View Order Details</td>
      <td>
      </div>
    <button class="btn btn-primary my-5 mx-5"><a href="displayorder.php" class="text-light"> Order Details</a>
    </button>
      </td>
    </tr>
    <tr>
      <td>
      <button class="btn btn-dark float-left mx-auto"> <a href="logout.php" class="text-light">Logout</a></button>
      </td>
    </tr>
  </tbody>
</table>
  
    <br><br>



    <script type="text/javascript" src="js\all.min.js"></script>
    <script type="text/javascript" src="js\bootstrap.min.js"></script>
    <script type="text/javascript" src="js\jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js\popper.min.js"></script>
</body>
</html>