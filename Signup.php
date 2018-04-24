<!DOCTYPE html>
<html lang="en">
<head>
  <title>vlib</title>
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
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    label{
display:inline-block;
width:200px;
margin-right:30px;
text-align:right;
}

input{

}

fieldset{
border:none;
width:500px;
margin:0px auto;
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

<h1>Signup</h1>

	<form action="" method="POST">
		<fieldset>
			<label for="uname">Username:</label><input type="text" name="uname" size="20">
			<label for="email">Email:</label><input type="email" name="email" size="20">
			<label for="password">Password:</label><input type="password" name="password" size="20"><br>
			<input type="submit" value="Sign Up" name="signup" style="position:relative; top:25px; left: 50%;">
		</fieldset>
	</form>
</html>



<?php
include 'common.php';

if(isset($_POST['signup'])){ // Fetching variables of the form which travels in URL
$un = $_POST['uname'];
$email = $_POST['email'];
$pwd = $_POST['password'];
		if($un !=''||$email !=''){
				//Insert Query of SQL
				$sql = "insert into user(uid,email,pass) values ('$un', '$email', '$pwd')";

				if ($conn->query($sql) === TRUE) {
				    echo "Signed Up Sucessfully";
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
		}}
$conn->close();

?>