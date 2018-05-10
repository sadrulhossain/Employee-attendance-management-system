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
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8">
					<div class="card">
						<div class="header"><h3><center>Attendance List</center></h3></div>
						<table class="table table-bordered table-responsive">
							<tr class="success">
								<th>#</th>
								<th>Employee ID</th>
								<th>Name</th>
								<th>Attendance(days)</th>
								<th>Leave(days)</th>
							</tr>
							<?php 
								$serial = 0;
								$sqlattendList = mysql_query("SELECT fullname, emp_id FROM emp_tbl");
								while($row = mysql_fetch_object($sqlattendList)){
									$serial++;
									$emp_id = $row->emp_id;
									$name = $row->fullname;
									$sqltotalattend = mysql_query("SELECT COUNT(*) as totalAttend FROM attendance WHERE emp_id ='$emp_id' AND status = '1'");
									while($row = mysql_fetch_object($sqltotalattend))
									{
										$totalAttend = $row->totalAttend;
									}
									$sqltotalleave = mysql_query("SELECT COUNT(*) as totalLeave FROM permit_leave WHERE emp_id ='$emp_id' AND l_status = '1'");
									while($row = mysql_fetch_object($sqltotalleave))
									{
										$totalLeave = $row->totalLeave;
									}
							?>	
							<tr>
								<td><?php echo $serial;?></td>
								<td><?php echo $emp_id;?></td>
								<td><?php echo $name;?></td>
								<td><?php echo $totalAttend;?></td>
								<td><?php echo $totalLeave;?></td>
							</tr>
							<?php
								}
							?>
							
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include('footer.php');?>