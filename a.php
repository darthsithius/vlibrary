<?php
require "common.php";
if(isset($_SESSION['uid'])){
  header("location:/home.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>vlib/login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f2f2f2;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    .bg-primary {
    background-color: #272b30;
    }

    fieldset{
border:none;
width:500px;
margin:0px auto;
}
    label{
display:inline-block;
width:200px;
margin-right:30px;
text-align:right;
}
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<h1>Login</header>
    <form action="" method="POST">
      <fieldset>
        <label for="Username">Username:</label><input type="text"  name="Username" size="20">
        <label for="Password">Password:</label><input type="password"  name="password" size="20">
        <input type="submit" value="submit" name="submit" style="position:relative; top:25px; left: 50%;">
        <p style="position:relative; top:25px; left: 50%;">New User ? <a href="/Signup.php">Signup</a></p>
        <p style="position:relative; top:25px; left: 50%;">Developer? <a href="/dev.php">Sign In Here</a></p>
    </fieldset>
  </form>

<?php
if(isset($_POST['submit'])){
echo "hi";
if (empty($_POST['Username']) || empty($_POST['password'])) {
  $error = "Username or Password is invalid";
  echo "".$error."";
  }
  else{
    $x=$_POST['Username'];
    $y=$_POST['password'];
    //$x = stripslashes($x);
    //$y = stripslashes($y);
    $x = mysqli_real_escape_string($conn,$x);
    $y = mysqli_real_escape_string($conn,$y);

    $query ="select * from user where pass='$y' AND uid='$x'";
    $result=mysqli_query($conn,$query);


    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck == 1) {
        $_SESSION['uid']=$x;
        session_name($_SESSION['uid']);
        header("location:/home.php");
        exit();
      }
    else{
      $error="Incorrect Username or Password";
      echo "".$error."";
    }
}
}

mysqli_close($conn);

header("Cache-Control: private, must-revalidate, max-age=0");
header("Pragma: no-cache");



?>
