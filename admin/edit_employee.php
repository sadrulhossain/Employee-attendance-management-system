<?php

    ob_start();
	session_start();
	if($_SESSION['name']!='admin')
	{
		header('location: login.php');
	}

?>

<?php include_once('../database.php'); ?>
<?php include('header.php'); ?>	


<?php
	
	$emp_id = $_GET['ide'];
	if(isset($_GET['ide']))
	{
		$sql = mysql_query("SELECT * FROM emp_tbl WHERE emp_id = '{$emp_id}'");
		$row = mysql_fetch_object($sql);
		$picture = $row->photo;
	}
	
	
	if(isset($_POST['save']))
	{
		$newpicture = $_FILES['file']['name'];
		if($newpicture)
		{
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
					unlink('../upload/'.$picture);
					$sqledit = "UPDATE emp_tbl
								SET fullname       = '{$_POST['fullname']}',
								    username       = '{$_POST['username']}',							
									designation    = '{$_POST['designation']}',
									emp_id         = '{$_POST['emp_id']}',
									gender         = '{$_POST['gender']}',
								    nationality    = '{$_POST['nationality']}',
									dob            = '{$_POST['dob']}',
									contact        = '{$_POST['contact']}',
									email          = '{$_POST['email']}',
									address        = '{$_POST['address']}',
									photo          = '$newpicture'
								WHERE emp_id = '{$emp_id}'";
					$re = mysql_query($sqledit);
					if($re)
					{
						header('location:show_employee.php');	
					}	
				}
		}
	}
	else
		{
			$sqlnophoto = "UPDATE emp_tbl
								SET fullname       = '{$_POST['fullname']}',
								    username       = '{$_POST['username']}',		
									designation    = '{$_POST['designation']}',
									emp_id         = '{$_POST['emp_id']}',
									gender         = '{$_POST['gender']}',
								    nationality    = '{$_POST['nationality']}',
									dob            = '{$_POST['dob']}',
									contact        = '{$_POST['contact']}',
									email          = '{$_POST['email']}',
									address        = '{$_POST['address']}'
								WHERE emp_id = '{$emp_id}'";
					$res = mysql_query($sqlnophoto);
					if($res)
					{
						header('location:show_employee.php');	
					}	
		}
	}
?>


   <div class="content">
            <div class="container-fluid">
                <div class="row">
				 <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Update Profile</h4>
                            </div>
                            <div class="content">
                               
                                	<div class="row">
											<div class="col-md-5">
												<div class="form-group">
													<label>First Name</label>
													<input type="text" name="fullname" class="form-control" placeholder="" value="<?php echo  $row->fullname; ?>">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Last Name</label>
													<input type="text" name="username" class="form-control" placeholder="" value="<?php echo  $row->username; ?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Designation</label>
													<input type="text" name="designation" class="form-control" placeholder="" value="<?php echo $row->designation; ?>">
												</div>
											</div>
										</div>

                                  <div class="row">
											<div class="col-md-5">
												<div class="form-group">
													<label>Employee Id</label>
													<input type="text" name="emp_id" class="form-control" placeholder="" value="<?php echo  $row->emp_id; ?>">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Gender</label>
														<select name="gender" class="form-control">
															<option value="0"
															<?php echo ($row->gender==0)?'selected="selected"':'';?>>Male</option>
															<option value="1"
															<?php echo ($row->gender==1)?'selected="selected"':'';?>>Female</option>
														</select>
												</div>
											</div>
											 <div class="col-md-4">
												<div class="form-group">
													<label>Nationality</label>
													<input type="text" name="nationality" class="form-control" placeholder="" value="<?php echo $row->nationality; ?>">
												</div>
											</div>
										</div>

                                	<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>DOB</label>
													<input type="date" name="dob" class="form-control" placeholder="" value="<?php echo $row->dob; ?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Contact No</label>
													<input type="text" name="contact" class="form-control" placeholder="" value="<?php echo $row->contact; ?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Personal Email</label>
													<input type="text" name="email" class="form-control" placeholder="" value="<?php echo $row->email; ?>">
												</div>
											</div>
										</div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
													<label>Address</label>
													<input type="text" name="address" class="form-control" placeholder="Home Address" value="<?php echo $row->address; ?>">
											</div>
											<div class="form-group">
													<img class="avatar border-gray" src="<?php echo '../upload/'.$picture; ?>" style="width:250px; height:250px;" alt="..."/>
													<input type="file" name="file" />
											</div>
                                        </div>
                                    </div>
                              
                            </div>
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

<?php include('footer.php');?>
