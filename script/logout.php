<?php
	session_start();
	if(!empty($_SESSION['username'])){
		unset($_SESSION["username"]);
		unset($_SESSION["isAdmin"]);
		header("location: ../site/index.php");
	}
?>