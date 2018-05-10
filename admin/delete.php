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
	
	$emp_id = $_GET['idd'];
	if(isset($_GET['idd']))
	{
		$sql = mysql_query("select photo from emp_tbl where emp_id = '{$emp_id}'");
		$row = mysql_fetch_object($sql);
		$pic = $row->photo;
		$part = 'upload/';
		if(unlink($part.$pic))
		{
			$sqlq = mysql_query("DELETE FROM emp_tbl WHERE emp_id = '{$emp_id}'");
			if($sqlq)
			{
				header('location:show_employee.php');
			}
		}
	}
	
?>