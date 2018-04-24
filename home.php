<?php
include 'common.php';

if (isset($_SESSION['uid']))                              
      $m=$_SESSION['uid'];
?>
<!DOCTYPE html>
<html>
<title>vlib</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/vlib/css/w31.css">
<link rel="stylesheet" href="/vlib/css/w32.css">
<link rel="stylesheet" href="/vlib/css/f1.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://www.w3schools.com/lib/w3.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="./sty.css">

<style>

</style>
<body>


<!-- Header -->
<header class="w3-container w3-theme w3-padding" id="myHeader">
  <br><br>
  <div class="w3-center">
    <img src="/img/ih.jpg">
  <h4>Video Game Library Manager</h4>
  <h1 class="w3-xxxlarge w3-animate-bottom">Vlib</h1>
    <?php
      if (!isset($_SESSION['uid'])) {
      ?><div class="w3-padding-32">
      <button class="w3-btn w3-xlarge w3-dark-grey w3-hover-light-grey" onclick="document.getElementById('id01').style.display='block'" style="font-weight:900;">Login</button>
    </div><?php  }
      else{?>
        <div class="w3-padding-32">
      <button class="w3-btn w3-xlarge w3-dark-grey w3-hover-light-grey" onclick="document.getElementById('id02').style.display='block'" style="font-weight:900;"><?php printf("%s",$m); ?></button> <?php }
      ?>
  </div>
</header>

<!-- Modal -->
<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <form class="w3-container" action="" method="POST">
        <div class="w3-section">
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="Username" autocomplete="off" required>
          <label><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="submit">Login</button>
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
        <span class="w3-right w3-padding w3-hide-small">New User?<a href="/vlib/tempsign.php">Sign up</a></span>
        <span class="w3-right w3-padding w3-hide-small">Developer?<a href="/vlib/login.php">Sign In</a></span>
      </div>

    </div>
  </div>
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
        header("location:/vlib/home.php");
        exit();
      }
    else{
      $error="Incorrect Username or Password";
      echo "".$error."";
    }
}
}

mysqli_close($conn);
?>


<div id="id02" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
      <br>
      <br>
      <p>Change Password</p>
      <a href="/vlib/changep.php"><button class="w3-button w3-block w3-blue w3-section w3-padding"  name="cp">Here</button></a>
      <br><br>
      <p>Signout?</p>
      <a href="/vlib/b.php"><button class="w3-button w3-block w3-red w3-section w3-padding"  name="submit">Signout</button></a>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
      </div>
    </div>
</div>


<div class="w3-row-padding w3-center w3-margin-top">
<?php
   if (!isset($_SESSION['uid'])){
?>
<a href="/vlib/store.php">
  <div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
  <h3>Store</h3><br>
  <img src="/vlib/img/store.png">
<?php  //<i class="fa fa-desktop w3-margin-bottom w3-text-theme" style="font-size:120px"></i>?>
  <p>Steam</p>
  <p>Origin</p>
  <p>Battle.net</p>
  <p>GOG</p>
  </div>
</div>
</a>      <?php } ?>


<?php
  if (isset($_SESSION['uid'])){     ?>

<a href="/vlib/newstore.php">
  <div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
  <h3>Store</h3><br>
  <img src="/vlib/img/store.png">
<?php  //<i class="fa fa-desktop w3-margin-bottom w3-text-theme" style="font-size:120px"></i>?>
  <p>Steam</p>
  <p>Origin</p>
  <p>Battle.net</p>
  <p>GOG</p>
  </div>
</div>
</a>
<?php }   ?>


<?php 
  if (isset($_SESSION['uid'])){      ?>
<a href="/vlib/Games.php">
<div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
  <h3>My Games</h3><br>
  <img src="/vlib/img/gc.png">
 
  <p></p>
  <p></p>
  <p></p>
  <p></p>
  </div>
</div>
</a>

<?php }   ?>

<?php
    if (!isset($_SESSION['uid'])){    ?>
<div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
  <h3>My Games</h3><br>
  <img src="/vlib/img/gc.png">
  <p></p>
  <p>Please Login to</p>
  <p>access everything</p>
  <p></p>
  </div>
</div>
<?php }   ?>

<a href="/vlib/stats.php">
<div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
  <h3>Statistics</h3><br>
  <img src="/vlib/img/stats.png"
  <i class="fa fa-diamond w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
  <p>Most Played Games</p>
  <p>Most Owned Games</p>
  <p></p>
  <p></p>
  </div>
</div>
</div>
</a>

<!-- Script for Sidebar, Tabs, Accordions, Progress bars and slideshows -->
<script>
// Side navigation
function w3_open() {
    var x = document.getElementById("mySidebar");
    x.style.width = "100%";
    x.style.fontSize = "40px";
    x.style.paddingTop = "10%";
    x.style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}

// Tabs
function openCity(evt, cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  var activebtn = document.getElementsByClassName("testbtn");
  for (i = 0; i < x.length; i++) {
      activebtn[i].className = activebtn[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-dark-grey";
}

var mybtn = document.getElementsByClassName("testbtn")[0];
mybtn.click();

// Accordions
function myAccFunc(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

// Slideshows
var slideIndex = 1;

function plusDivs(n) {
slideIndex = slideIndex + n;
showDivs(slideIndex);
}

function showDivs(n) {
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

showDivs(1);

// Progress Bars
function move() {
  var elem = document.getElementById("myBar");   
  var width = 5;
  var id = setInterval(frame, 10);
  function frame() {
    if (width == 100) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
      elem.innerHTML = width * 1  + '%';
    }
  }
}
</script>

</body>
</html>

