<?php
include 'common.php';
if (isset($_SESSION['uid']))                              
      $m=$_SESSION['uid'];
else
  header("location:/vlib/home.php");
?>

<!DOCTYPE html>
<html>
<title>vlib/mygames</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/vlib/css/w31.css">
<link rel="stylesheet" href="/vlib/css/f1.css">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-quarter img{margin-bottom: -6px; cursor: pointer}
.w3-quarter img:hover{opacity: 0.6; transition: 0.3s}
</style>
<body class="w3-light-grey">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-black w3-animate-right w3-top w3-text-light-grey w3-large" style="z-index:3;width:250px;font-weight:bold;display:none;right:0;" id="mySidebar">
  <a href="javascript:void()" onclick="w3_close()" class="w3-bar-item w3-button w3-center w3-padding-32">CLOSE</a> 
  <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-center w3-padding-16">PORTFOLIO</a> 
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-center w3-padding-16">ABOUT ME</a> 
  <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-center w3-padding-16">CONTACT</a>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-white w3-xlarge w3-padding-16">
  <span class="w3-left w3-padding">MY GAMES</span>
  <a href="/vlib/home.php" class="w3-right w3-button w3-white" onclick="w3_open()">HOME</a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content" style="max-width:1600px;margin-top:83px">
    <?php
    $sql=("SELECT owns.gid,title FROM game,owns WHERE owns.uid='$m' AND (owns.gid=game.gid)");

    if ($result=mysqli_query($conn,$sql))
          {
          // Fetch one and one row
          while ($row=mysqli_fetch_row($result))
            {
              $sql1="select path from imager where gid='$row[0]'";
              $result1=mysqli_query($conn,$sql1);
              $image=mysqli_fetch_row($result1);
              printf("%s",$row[1]);
              printf("%s",$image[0]);  ?>
              <div class="w3-row w3-grayscale-min">
                <div class="w3-quarter">
                <img src=<?php echo $image[0]; ?> style="width:100%" onclick="onClick(this)" alt=<?php echo $row[1]; ?>>
                </div>
              </div>
            </div>
<?php     }
          // Free result set
          mysqli_free_result($result);
       }
?>
</div>
  <!-- Modal for full size images on click-->
  <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
    <span class="w3-button w3-black w3-xlarge w3-display-topright">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image">
      <p id="caption"></p>
    </div>
  </div>
<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

</script>


</body>
</html>
