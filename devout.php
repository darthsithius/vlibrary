<?php
require "common.php"; // Is Used To Destroy All Sessions
//Or

if (isset($_SESSION['devid'])) {
	session_start();
	session_unset();
	session_destroy();
	header("location:/vlib/home.php");
	exit();
}

header("location:/vlib/login.php");
exit();
?>
