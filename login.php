<?php
include "common.php";
if(isset($_SESSION['uid'])){
  header("location:/home.php");
}
 ?>
<html lang="en">

      <head>
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title>Developer Login</title>
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

    background-image: url("/vlib/img/devlog.png");
	 background-size: 100% 100%;
}</style>
      </head>
     <body>
          <div style="margin-top:130px;" class="content">
              <div class="container-fluid decor_bg" id="login-panel">
                  <div class="row">
                      <div class="col-md-4 col-md-offset-4">
                          <div class="panel panel-success" style="position: center">
                              <div class="panel-heading">
                                  <h4>DEV LOGIN</h4>
                              </div>
                              <div class="panel-body">
									<font color="red">
								</font>
                                  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                      <div class="form-group">
                                          <input type="text" class="form-control" placeholder="Username" name="Username" autocomplete="off" required>
                                      </div>
                                      <div class="form-group">
                                          <input type="password" class="form-control" placeholder="Password" name="password" required>
                                      </div>
                                      <button type="submit" name="submit" class="btn btn-success">Login</button><br><br>
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

    $query ="select * from developer where devpass='$y' AND devid='$x'";
    $result=mysqli_query($conn,$query);


    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck == 1) {
        $_SESSION['devid']=$x;
        session_name($_SESSION['uid']);
        header("location:/vlib/add.php");
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