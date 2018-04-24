<?php
require "common.php";
 ?>
<html lang="en">

      <head>
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title>Login</title>
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

    background-image: url("/vlib/img/ih.jpg");
	 background-size: 100% 100%;
}</style>
      </head>
     <body>
          <div style="margin-top:130px;" class="content">
              <div class="container-fluid decor_bg" id="login-panel">
                  <div class="row">
                      <div class="col-md-4 col-md-offset-4">
                          <div class="panel panel-warning" style="position: center">
                              <div class="panel-heading">
                                  <h4>REGISTER</h4>
                              </div>
                              <div class="panel-body">
									<font color="red">
								</font>
                                  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                      <div class="form-group">
                                          <input type="text" class="form-control" placeholder="Username" name="uname" autocomplete="off" required>
                                      </div>
                                      <div class="form-group">
                                          <input type="email" class="form-control" placeholder="E-Mail" name="email" autocomplete="off" required>
                                      </div>
                                      <div class="form-group">
                                          <input type="password" class="form-control" placeholder="Password" name="password" required>
                                      </div>
                                      <button type="submit" name="signup" class="btn btn-warning">Signup</button><br><br>
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
include 'common.php';

if(isset($_POST['signup'])){ // Fetching variables of the form which travels in URL
$un = $_POST['uname'];
$email = $_POST['email'];
$pwd = $_POST['password'];
    if($un !=''||$email !='' || $pwd=''){
        //Insert Query of SQL
        $sql = "insert into user(uid,email,pass) values ('$un', '$email', '$pwd')";

        if ($conn->query($sql) === TRUE) {
            echo "Signed Up Sucessfully";
            header("location:/vlib/home.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }}
$conn->close();

?>