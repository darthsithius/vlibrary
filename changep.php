<?php
include "common.php";
if(isset($_SESSION['uid'])){
  $m=$_SESSION['uid'];
}
 ?>
<html lang="en">

      <head>
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title>Change Password</title>
				<script src="https://www.w3schools.com/lib/w3.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./sty.css">
		<style>

    .centeredPanel{
    width:25%;
    height:25%;
    min-width:100px;
    min-height:100px;
    padding-top: 20px;
    align-content: center;
    position: center;
    left:50%;
    top:50%;
}​
.content{
  margin-top: 50px;
}
body {

    background-image: url("");
	 background-size: 100% 100%;
}</style>
      </head>
     <body>
          <div style="margin-top:130px;" class="content">
              <div class="container-fluid decor_bg" id="login-panel">
                  <div class="row">
                      <div class="col-md-4 col-md-offset-4">
                          <div class="panel panel-primary" style="position: center">
                              <div class="panel-heading">
                                  <h4>Change Password</h4>
                              </div>
                              <div class="panel-body">
									<font color="red">
								</font>
                                  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                      <div class="form-group">
                                          <input type="password" class="form-control" placeholder="Old Password" name="pass" autocomplete="off" required>
                                      </div>
                                      <div class="form-group">
                                          <input type="password" class="form-control" placeholder="New Password" name="newpass" required>
                                      </div>
                                      <div class="form-group">
                                          <input type="password" class="form-control" placeholder="Confirm New Password" name="newpass1" required>
                                      </div>
                                      <button type="submit" name="submit" class="btn btn-primary">Change</button><br><br>
                                  </form><br/>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
       
      </body>
  </html>
<?php
if(isset($_POST['submit'])){

  $sql1="SELECT pass from user where uid='$m'";
  $result1=mysqli_query($conn,$sql1);
  $row=mysqli_fetch_row($result1);
if (empty($_POST['pass']) || empty($_POST['newpass'] || empty($_POST['newpass1']))) {
  $error = "Please fill out all fields";
  echo "".$error."";
  }

else if($_POST['pass'] != $row[0]){
    $error="Incorrect Password.Please try again.";
    echo "".$error."";
  }
  else{
    $x=$_POST['pass'];
    $y=$_POST['newpass'];
    $z=$_POST['newpass1'];
    //$x = stripslashes($x);
    //$y = stripslashes($y);
    $x = mysqli_real_escape_string($conn,$x);
    $y = mysqli_real_escape_string($conn,$y);
    $z = mysqli_real_escape_string($conn,$z);

    if($y!=$z){
      echo "Passwords dont match.";
    }
    else{
    $query ="UPDATE user SET pass='$y' where uid='$m' AND pass='$x'";
    $conn->query($query);
    header("location:/vlib/home.php");
}
}
}

mysqli_close($conn);

header("Cache-Control: private, must-revalidate, max-age=0");
header("Pragma: no-cache");



?>