<?php
include 'common.php';

$m=$_SESSION['uid'];

$g=$_REQUEST['id'];
addgame($g);

function addgame($a){
	global $m,$conn;
  $sql0="SELECT gid from game where title='$a'";
  $result0=mysqli_query($conn,$sql0);
  $row0= mysqli_fetch_array($result0);
  $sql1="SELECT client from game where title='$a'";
  $result1=mysqli_query($conn,$sql1);
  $row1= mysqli_fetch_array($result1);
  $sql2="INSERT into vlib.owns values('$m','$row0[0]','$row1[0]')";
  mysqli_query($conn,$sql2);
  //printf("%s%d%s",$m,$row0[0],$row1[0]);
  header("location:/vlib/cart.php");
}

?>