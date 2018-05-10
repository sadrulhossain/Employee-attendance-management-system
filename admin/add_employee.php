<?php

    ob_start();
	session_start();
	if($_SESSION['name']!='admin')
	{
		header('location: login.php');
	}

?>

<?php include('header.php'); ?>
<?php 
 include_once("../database.php"); 

   //make code insert image to database
	if(isset($_POST['save']))
		{
			if($_POST['pass'] == $_POST['cpass']){
				$password = $_POST['pass'];
			}
			if(($_FILES['file']['type'] == 'image/gif')
			|| ($_FILES['file']['type'] == 'image/jpeg')	
			|| ($_FILES['file']['type'] == 'image/pjpeg')
			&& ($_FILES['file']['size'] < 200000))
			{
				if($_FILES['file']['error'] > 0)
				{
					echo "return code:" . $_FILES['file']['error'];
				} 
				else if(file_exists('upload/'.$_FILES['file']['name']))
				{
					echo $_FILES['file']['name']."Already Exit";
				}
				else if(move_uploaded_file($_FILES['file']['tmp_name'],'../upload/'.$_FILES['file']['name']))
				{
					$part = $_FILES['file']['name'];
					$sql = mysql_query("INSERT INTO emp_tbl(emp_id, fullname, designation, username, password, gender, dob, nationality, contact, email, address, photo)
									   VALUES('{$_POST['emp_id']}',
											  '{$_POST['fullname']}',
											  '{$_POST['designation']}',
											  '{$_POST['username']}',
											  '{$password}',   
											  '{$_POST['gender']}',
											  '{$_POST['dob']}',
											  '{$_POST['nationality']}',
											  '{$_POST['contact']}',
											  '{$_POST['email']}',
											  '{$_POST['address']}',
											  '{$part}')");
					if($sql)
					{
						$success =  "successfully insert this record";
					}
				
				}
			}
		}	
?>

    <link href="assets/css/jasny-bootstrap.min.css" rel="stylesheet" />
    
        <div class="content">
            <div class="container-fluid">
                <div class="row">
					<form action="" method="post" enctype="multipart/form-data">
						<div class="col-md-8">
							<div class="card">
								<div class="header">
									<h4 class="title">Profile</h4>
								</div>
								<div class="content">
										<div class="row">
											<div class="col-md-5">
												<div class="form-group">
													<label>Full Name</label>
													<input type="text" name="fullname" class="form-control" placeholder="">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Employee Id</label>
													<input type="text" name="emp_id" class="form-control" placeholder="">
												</div>
											</div>
											
											<div class="col-md-4">
												<div class="form-group">
													<label>Designation</label>
													<input type="text" name="designation" class="form-control" placeholder="">
												</div>
											</div>
											
										</div>
										<div class="row">
											
											<div class="col-md-3">
												<div class="form-group">
													<label>Gender</label>
														<select name="gender" class="form-control">
															<option value="0">Male</option>
															<option value="1">Female</option>
														</select>
												</div>
											</div>
											 <div class="col-md-4">
												<div class="form-group">
													<label>Nationality</label>
													<input type="text" name="nationality" class="form-control" placeholder="">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>DOB</label>
													<input type="date" name="dob" class="form-control" placeholder="">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Contact No</label>
													<input type="text" name="contact" class="form-control" placeholder="">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Personal Email</label>
													<input type="email" name="email" class="form-control" placeholder="">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Address</label>
													<input type="text" name="address" class="form-control" placeholder="Home Address">
												</div>
												<div class="form-group">
													<div class="fileinput fileinput-new" data-provides="fileinput">
														<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
														<div>
															<span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span> <span class="fileinput-exists">Change</span> 
																<input type="file" name="file">
															 </span> 
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>User Name</label>
													<input type="text" name="username" class="form-control" placeholder="">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Password</label>
													<input type="password" name="pass" class="form-control" placeholder="">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Confirm Password</label>
													<input type="password" name="cpass" class="form-control" placeholder="">
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
							<button name="save" type="submit" class="btn btn-info btn-fill pull-right">Save</button>
							<div class="clearfix"></div>
							<div><?php echo $success; ?></div>
						</div>
					</form>						
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 <a href="">Creative Uzzal</a>, made with love for a better web
                </p>
            </div>
        </footer>
    <!--jQuery -->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/jasny-bootstrap.min.js" type="text/javascript"></script>
    
<?php include('footer.php'); ?>
