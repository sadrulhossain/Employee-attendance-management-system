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
	$l_id = $_GET['ids'];
	$emp_id = $_GET['ide'];
	$from_date = $_GET['idfd'];
	$to_date = $_GET['idtd'];
	if(isset($_GET['ids']) && isset($_GET['ide']) && isset($_GET['idfd']) && isset($_GET['idtd'])){
		
		$sqlchangestatus = mysql_query("UPDATE permit_leave
				SET l_status  = 1 WHERE l_id = '{$l_id}'");
		
		$startdate = strtotime($from_date);
		$enddate = strtotime($to_date);
		while ($startdate <=  $enddate) {
		   $date = date("Y-m-d", $startdate);
		   $status = 2;
		   $sqlsduration = mysql_query("INSERT INTO attendance (emp_id, date, status) VALUES ('$emp_id', '$date', '$status')");
		   $startdate = strtotime("+1 day", $startdate);
		}
		header("Location: permit_leave.php");
		exit;
	}