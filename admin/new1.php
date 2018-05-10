<?php 
		
		
		
		$startdate = strtotime("1 january 2016");
		$enddate = strtotime(date("d-m-Y"));
		while ($startdate <=  $enddate) {
		   $date = date("m", $startdate);
		   echo $date." ";
		   /* $status = 2;
		   $sqlsduration = mysql_query("INSERT INTO attendance (emp_id, date, status) VALUES ('$emp_id', '$date', '$status')"); */
		   $startdate = strtotime("+1 month", $startdate);
		}