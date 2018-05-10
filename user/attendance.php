<?php

    ob_start();
	session_start();
	
	if(!isset($_SESSION['name']))
	{
		header('location: login.php');
	}

?>
<?php
	if($_SESSION['name'] == "admin"){
		include('adminheader.php');
	}
	else{
		include('header.php');
	}
?>
<?php include('../database.php'); ?>
<?php 
	
	if(isset($_POST['present'])){
		$emp_id = $_GET['attend_id'];
		$date = $_GET['attend_date'];
		$status = 1;
		$attend = mysql_query("INSERT INTO attendance (emp_id, date, status) VALUES ('$emp_id', '$date', '$status') ");
		
		header("location : user_index.php");
		exit;
	}
	