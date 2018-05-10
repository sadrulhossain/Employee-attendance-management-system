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
        <div class="bootstrap-iso">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
						<div class="card">
							<form action="" method="POST" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-3">
										<select name="month" class="form-control" aria-describedby="basic-addon2" required>
											<option>-- Month -- </option>
										<?php 														
											$mf = strtotime("january");
											$ml = strtotime("december");
											while($mf <= $ml){
												$month = date("M", $mf);
												$mf = strtotime("+1 month", $mf);
											
										?>
											<option value="<?php echo $month; ?>"><?php echo $month ;?></option>
										<?php 
											}
										?>
										</select>
									</div>
									<div class="col-md-3">
										<select name="year" class="form-control" aria-describedby="basic-addon2" required>
											<option>-- Year --</option>
										<?php 														
											$yf = strtotime(date("Y"));
											$yl = strtotime("1971");
											while($yf >= $yl){
												$year = date("Y", $yf);
												$yf = strtotime("-1 year", $yf);
											
										?>
											<option value="<?php echo $year; ?>"><?php echo $year ;?></option>
										<?php 
											}
										?>
										</select>
									</div>
									<div class="col-md-1">
										<button type="submit" class="btn btn-info btn-fill btn-form-control" name="search_monthly_sheet"><span class="fa fa-search"></span></button>
										
									</div>
								</div>
							</form>
						</div>
					</div>
                </div>
				<div class="row">
                    <div class="col-md-12">
						<div class="card">
							<form action="" method="POST" enctype="multipart/form-data">
										<?php 
											if(isset($_POST['search_monthly_sheet'])){
												$month = $_POST['month'];
												$year = $_POST['year'];
												//$date = $_POST['date'];
												//echo $department;
												$c = 0;
												$datearr = array();
												$datear = array();
												$startdate = strtotime("1 january 1971");
												$enddate = strtotime(date("d-m-Y"));
												while($startdate <= $enddate){
													$m = strtotime(date("M", $startdate));
													$y = strtotime(date("Y", $startdate));
													$d = strtotime(date("D", $startdate));
													if($y == strtotime($year) && $m == strtotime($month) && $d != strtotime("Fri")){
														$datear[] = date("d", $startdate);
														$datearr[] = date("Y-m-d", $startdate);
														$c++;
													}
													$startdate = strtotime("+1 day", $startdate);
												}
										?>
								
								<div class="row">
									<div class="col-md-5"></div>
									<div class="col-md-5">
										<h3><?php echo $month." ".$year;?></h3>
									</div>
									<div class="col-md-2"></div>
								</div>
								
									<table class="table table-responsive table-bordered" >
										
											<tr class="info"style="text-align:center">
												<th style="text-align:center">#</th>
												<th style="text-align:center">Name</th>
											<?php 
												for($i = 0; $i < $c; $i++){
											?>
													<th colspan="0.5"style="text-align:center"><?php echo $datear[$i];?></th>
											<?php
												}
											?>
												
											</tr>
										
										<?php
												$serial = 0;
												$sqlList = mysql_query("SELECT * FROM emp_tbl  ");
												while($row_list = mysql_fetch_object($sqlList)){
													$serial++;
													$emp_id = $row_list->emp_id;
													$fullname = $row_list->fullname;
													$designation = $row_list->designation;
													
													
													
										?>
											<tr >
												<td><?php echo $serial; ?></td>
												<td><?php echo $fullname; ?> </td>
												
										<?php 
													for($j = 0; $j < $c; $j++){
														$sqlst = mysql_query("SELECT * FROM attendance 
														WHERE emp_id = '{$emp_id}' AND date = '{$datearr[$j]}'");
														if(mysql_num_rows($sqlst) > 0){
															while($row_st = mysql_fetch_object($sqlst)){
																$st = $row_st->status;
																if($st == 1){
																	$status = "P";
																}
																if($st == 2){
																	$status = "L";
																}
															}
														}
														else{
															$status = "<strong> .</strong>";
														}
														
														
										?>
												<td colspan="0.5" style="text-align:center"><?php echo $status;?></td>
										<?php 		} ?>
												
											</tr>
									
										<?php
												}
										?>
										
									</table>
										<?php
											}
										?>
							</form>
						</div>
					</div>
                </div>
				
            </div>
        </div>



<?php include('footer.php'); ?>