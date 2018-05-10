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
	if(isset($_POST['apply']))
		{
					$l_status = 0;
					$emp_id = $_POST['emp_id'];
					$from_date = $_POST['from_date'];
					$to_date = $_POST['to_date'];
					$fdate = strtotime($from_date);
					$d1 = date("d", $fdate);
					$m1 = date("m", $fdate);
					$y1 = date("Y", $fdate);
					$tdate = strtotime($to_date);
					$d2 = date("d", $tdate);
					$m2 = date("m", $tdate);
					$y2 = date("Y", $tdate);
					$dy = ($y2 - $y1);
					$dm1 = ($m2 - $m1);
					if($dy == 0){
						if($dm1 == 0){
							$dd = $d2-$d1+1;
						}
						else{
							if($m1 == 4 || $m1 == 6 || $m1 == 9 || $m1 == 11){
								$dd = (31*$dm1)+$d2-$d1;
							}
							else{
								$dd = (32*$dm1)+$d2-$d1;
							}
						}
					}
					else{
						if($dm1 == 0){
							$dd = $d2-$d1+($dy*366);
						}
						else{
							$dm2 = $dm1+12;
							if($m1 == 4 || $m1 == 6 || $m1 == 9 || $m1 == 11){
								$dd = (31*$dm2)+$d2-$d1;
							}
							else{
								$dd = (32*$dm2)+$d2-$d1;
							}
						}
					}
					//echo $d1." ".$m1." ".$y1." ".$d2." ".$m2." ".$y2." ".$dd;	
					$duration = $dd;
					
					$sqlcduration = mysql_query("SELECT SUM(duration) as totalduration FROM permit_leave WHERE emp_id = '{$emp_id}'");
					while($row = mysql_fetch_assoc($sqlcduration)){
						$totalduration = $row->totalduration;
					}
					if(($duration+$totalduration) >= 20){
						$acced .= "you have already got 20 leave";
					}
					else{
												$sql = mysql_query("INSERT INTO permit_leave(l_id, emp_id, cause, from_date, to_date, duration, l_status)
										   VALUES(NULL,
												  '{$_POST['emp_id']}',
												  '{$_POST['cause']}',
												  '{$_POST['from_date']}',
												  '{$_POST['to_date']}',
												  '{$duration}',
												  '{$l_status}')");
						if($sql)
						{
							$success =  "successfully applied for leave.";
						}

					}
		}
		function duration($from_date, $to_date){
		}
								
?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
					<form action="" method="post" enctype="multipart/form-data">
						<div class="col-md-8">
							<div class="card">
								<div class="header">
									<h4 class="title">Leave Application</h4>
								</div>
								<div class="content">
										<div class="row">
											<div class="col-md-5">
												<div class="form-group">
													<label>Employee ID</label>
													<input type="text" name="emp_id" class="form-control" placeholder="Enter ID...">
												</div>
											</div>
											<div class="col-md-5">
												<div class="form-group">
													<label>Cause</label>
														<select name="cause" class="form-control">
															<option value=" ">--Select Cause--</option>
															<option value="Sickness">Sickness</option>
															<option value="Family Program">Family Program</option>
															<option value="Marriage (Own)">Marriage (Own)</option>
															<option value="Others....">Others....</option>
														</select>
												</div>
											</div>
											 
										</div>
										<div class="row">
											<div class="col-md-5">
												<div class="form-group">
													<label>From The Date</label>
													<input type="date" name="from_date" class="form-control" placeholder="">
												</div>
											</div>
											<div class="col-md-5">
												<div class="form-group">
													<label>To The Date</label>
													<input type="date" name="to_date" class="form-control" placeholder="">
												</div>
											</div>
											
										</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							
						</div>
				</div>
						<div class="col-md-8">
							<button name="apply" type="submit" class="btn btn-info btn-fill pull-right">Submit Application</button>
							<div class="clearfix"></div>
							<div><?php echo $success; ?></div>
							<div><?php echo $acced; ?></div>
						</div>
					</form>						
            </div>
        </div>
        
		
<?php include('user_footer.php'); ?>		
		
        