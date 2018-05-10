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
		$sql = mysql_query("SELECT * FROM emp_tbl WHERE username = '{$_SESSION['name']}'");
					while($row = mysql_fetch_object($sql))
						{
							$gender = $row->gender;
							if($gender == '0')
								{
									$gender = "Male";
								}
							else
								{
									$gender = "Female";
						        }
							
							$fullname       = $row->fullname;
							$username       = $row->username;
							$designation    = $row->designation;
							$emp_id         = $row->emp_id;
							//$gender       = $row->gender;
							$nationality    = $row->nationality;
							$dob            = $row->dob;
							$contact        = $row->contact;
							$email          = $row->email;
							$address        = $row->address;
							$photo          = $row->photo;
						}
						
						/* echo "<tr> <td>$fname</td>
						           <td>$lname</td>
								   <td><img style='width:100px; height:80px;' src='../upload/$photo'/></td>
						</tr>"; */

?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><?php echo $fullname; ?></h4>
                            </div>
                            <div class="content">
									<div class="row">
										<div class="col-md-3 col-sm-3"><label>Employee Id :</label></div><div class="col-md-9 col-sm-9"><span><?php echo $emp_id; ?></span></div>
									</div>
									<div class="row">
										<div class="col-md-3 col-sm-3"><label>Designation :</label></div><div class="col-md-9 col-sm-9"><span><?php echo $designation; ?></span></div>
									</div>
									<div class="row">
										<div class="col-md-3 col-sm-3"><label>gender :</label></div><div class="col-md-9 col-sm-9"><span><?php echo $gender; ?></span></div>
									</div>
									<div class="row">
										<div class="col-md-3 col-sm-3"><label>Nationality :</label></div><div class="col-md-9 col-sm-9"><span><?php echo $nationality; ?></span></div>
									</div>
                                	<div class="row">
										<div class="col-md-3 col-sm-3"><label>Date of Birth :</label></div><div class="col-md-9 col-sm-9"><span><?php echo $dob; ?></span></div>
									</div>
									<div class="row">
										<div class="col-md-3 col-sm-3"><label>Contact :</label></div><div class="col-md-9 col-sm-9"><span><?php echo $contact; ?></span></div>
									</div>
									<div class="row">
										<div class="col-md-3 col-sm-3"><label>Email :</label></div><div class="col-md-9 col-sm-9"><span><?php echo $email; ?></span></div>
									</div>
									<div class="row">
										<div class="col-md-3 col-sm-3"><label>Address :</label></div><div class="col-md-9 col-sm-9"><span><?php echo $address; ?></span></div>
									</div>
									<div class="row">
										<div class="col-md-3 col-sm-3"><label>User Name :</label></div><div class="col-md-9 col-sm-9"><span><?php echo $username; ?></span></div>
									</div>
                                </form>
                            </div>
                        </div>
						
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="" alt=""/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="<?php echo '../upload/'.$photo; ?>" style="width:250px; height:250px;"  alt="..."/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>			
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
   
		
		
		
		
  
<?php include('footer.php'); ?>