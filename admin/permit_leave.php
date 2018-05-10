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
	//$st = "";
									


?>
<?php include('header.php'); ?>	
	<div class="content">
		<div class="container-fluid">
			<form action="permit_leave.php" method="post">
				<div class="row">
					<div class="col-md-10">
						<div class="card">
							<div class="header"><h3><center>Leave List</center></h3></div>
							<table class="table table-responsive" >
								<tr class="success"">
									<th>#</th>
									<th>Employee ID</th>
									<th>Cause</th>
									<th>From the Date</th>
									<th>To the Date</th>
									<th>Duration</th>
									<th>Status</th>
									<th></th>
									<th></th>
								</tr>
								<?php
									
									$status = $l_id = $emp_id = "";
																
									$serial = 0;
									$sqlleaveList = mysql_query("SELECT * FROM permit_leave");
									while($row = mysql_fetch_object($sqlleaveList)){
										$serial++;
										$l_id = $row->l_id;
										$emp_id = $row->emp_id;
										$cause = $row->cause;
										$from_date = $row->from_date;
										$to_date = $row->to_date;
										$duration = $row->duration;
										$l_status = $row->l_status;
										if($l_status == 0){
											$st = "Pending";
										}
										if($l_status == 1){
											$st = "Granted";
										}
										if($l_status == 2){
											$st = "Rejected";
										}
										
								?>	
								<tr>
									<td><?php echo $serial;?></td>
									<td><?php echo $emp_id;?></td>
									<td><?php echo $cause;?></td>
									<td><?php echo $from_date;?></td>
									<td><?php echo $to_date;?></td>
									<td><?php echo $duration;?></td>
									<td><?php echo $st;?></td>
									<td><a name='grant' href='grant_leave.php?ids=<?php echo $l_id;?>&&ide=<?php echo $emp_id;?>&&idfd=<?php echo $from_date;?>&&idtd=<?php echo $to_date;?>' class='btn btn-primary btn-sm pull-right'><span class='fa fa-thumbs-o-up'></span></a></td>
									<td><a name='reject' href='reject_leave.php?idss=<?php echo $l_id;?>' class='btn btn-danger btn-sm pull-right'><span class='fa fa-ban'></span></a></td>
								</tr>
								<?php
									
									} 
									
								?>
								
							</table>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

<?php include('footer.php'); ?>	