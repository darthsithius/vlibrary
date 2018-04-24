<?php
include 'common.php';

if (isset($_SESSION['devid']))                              
      $m=$_SESSION['devid'];
else
  header("location:/vlib/login.php");
?>
<!DOCTYPE html>
<html>
<title>vlib</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/vlib/css/w31.css">
<link rel="stylesheet" href="/vlib/css/w32.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://www.w3schools.com/lib/w3.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="./sty.css">


<div class="w3-card-4" style="max-width:600px">

      <form class="w3-container" action="" method="POST">
        <div class="w3-section">
          <label><b>Game-ID</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="gameid" name="gid" required>
          <label><b>title</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="title" name="title" required>
          <label><b>Released</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="yyyy-mm-dd" name="released" required>
          <label><b>Client</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Steam/Battle.net/Origin/GOG" name="client" required>
          <label><b>Path</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="/vlib/img/yourfile.extension" name="path" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="submit">Add Game</button>
        </div>
      </form>
    </div>

    <p><a href="delete.php">Delete a Game?</a></p>

<?php

  $sql1="select devname from developer where devid='$m'";
  $result=mysqli_query($conn,$sql1);
  $dname=mysqli_fetch_array($result);

  if(isset($_POST['submit'])){
    $g=$_POST['gid'];
    $t=$_POST['title'];
    $r=$_POST['released'];
    $c=$_POST['client'];
    $p=$_POST['path'];
    if($g !=''||$t !='' ||$r !='' ||$c !='' || $p!='' ){
        //Insert Query of SQL
        $sql = "INSERT into game(gid,title,dev,released,client,players) values ('$g', '$t', '$dname[0]','$r','$c','0')";
        $conn->query($sql);

        $sql1="INSERT into imager values('$g','$p')";
        $conn->query($sql1);

        header("location:/vlib/home.php");
    }}
$conn->close();

?>

