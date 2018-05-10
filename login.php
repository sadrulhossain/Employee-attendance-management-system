<?php

   include('database.php');
  $failed = "";
  if(isset($_POST['save']))
	{
		$username = $_POST['username'];
		$admin_pass = "admin";
		$num = 0;
		$admin = mysql_query("select * from emp_tbl where username='$username' and password = '$admin_pass'");
		$num = mysql_num_rows($admin);
		
		 if($num>0)
			{
				session_start();
				$_SESSION['name'] = "admin";
				header('location: admin/dashboard.php?idem=admin');
				exit;
			}
		else
			{
				$failed = "Invalid username or Password"; 
				header('location: login.php');
			}

		 
		$num = 0;
		$result = mysql_query("select * from emp_tbl where username='$username' and password ='$_POST[password]' ");
		$num = mysql_num_rows($result);
		
		if($num>0)
			{
				session_start();
				$_SESSION['name'] = $username;
				header('location: user/dashboard.php?idem='.$username);
				exit;
			}
		else
			{
				$failed = "Invalid username or Password"; 
				header('location: login.php');
			}

  }

?>



<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Attendance Management System</title>
	<!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
</head>
<body>
	  <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="dashboard.php">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                    </ul>
                </div>
            </div>
        </nav>
	</div>
<div class="content">
        <div class="container-fluid">
            <div class="row">
				<div class="col-md-4">
				</div>
				<form action="" method="post">
				<div class="col-md-4">
					<div class="card">
						<div class="header">
							<h4 class="title text-center">LOG IN</h4><hr>
						</div>
						<div class="content">
							<div class="form-group">
								<label>User Name :</label>
								<input type="text" name="username" class="form-control" placeholder="Enter User Name">
							</div>
							<div class="form-group">
								<label>Password :</label>
								<input type="password" name="password" class="form-control" placeholder="Enter Password">
							</div>	
							<button name="save" type="submit" class="btn btn-info btn-fill pull-right">Login</button>
							<?php echo $failed;?>			
						</div>				
					</div>					
				</div>
				</form>				
			</div>			
	</div>										
</div>		
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/jasny-bootstrap.min.js" type="text/javascript"></script>		
</body>
</html>

	
  
		
	
		
		
  

