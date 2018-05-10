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
<




        <div class="content">
            <div class="container-fluid">
				<form action="" name="attendance" method="POST">
				
					<div class="row">
						<div class="col-md-8">
							<div class="content">
									<div class="row">
										<div class="col-md-4">  
										</div>
										<div class="col-md-5">
											<div class="form-group">
												<label></label>
												<input type="date" name="attend_date" class="form-control" value="<?php echo date("Y-m-d");?>"/>
											</div> 
										</div>
									</div>
							</div>						
							<div class="form-group text-center">
								<label>Attendence</label>
									<input type="text" name="attend_id" class="form-control" placeholder="Enter ID for attendence" />
							</div>
							<div class="row">
								<div class="col-md-5"></div>
								<div class="col-md-5">
									<input type="submit" class="btn btn-primary btn-fill pull-right" name="present" value="Present"/>
								</div>
							</div>
							<?php
					if(isset($_POST['present'])){
						$emp_id = $_POST['attend_id'];
						$date = $_POST['attend_date'];
						$status = 1;
						$sql = mysql_query("SELECT * FROM attendance WHERE emp_id = '$emp_id' AND date = '$date'");
						if(mysql_num_rows($sql) > 0){
							?>
							<div class="alert">
								<?php echo "Attendance is already given.";?>
							</div>
							<?php
						}
						else{
							$attend = mysql_query("INSERT INTO attendance (emp_id, date, status) VALUES ('$emp_id', '$date', '$status') ");
						}
					}
				?>
							
						</div>
					</div>
				</form>
            </div>
        </div>



<?php include('footer.php');?>