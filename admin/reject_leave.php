<?php

    ob_start();
	session_start();
	if($_SESSION['name']!='admin')
	{
		header('location: login.php');
	}

?>
<?php 
	include_once('../database.php');
	$l_id = $_GET['idss'];
	if(isset($_GET['idss'])){
		
		$sqlchangestatus = mysql_query("UPDATE permit_leave
				SET l_status  = 2 WHERE l_id = '{$l_id}'");
		header("Location: permit_leave.php");
		exit;
	}