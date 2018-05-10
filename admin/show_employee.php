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

<style type="text/css">

.table > thead > tr > th, 
.table > tbody > tr > th, 
.table > tfoot > tr > th, 
.table > thead > tr > td, 
.table > tbody > tr > td, 
.table > tfoot > tr > td {
        padding: 0px 0px;
        padding-top: 8px;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 0px;
        vertical-align: middle;
}
</style>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Employee List</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
									    <th>#</th>
                                    	<th>Full Name</th>
                                    	<th>Employee ID</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
										<?php 
					include_once('DB.php');
					$serial = 0;
					$sql = mysql_query("SELECT * FROM emp_tbl");
					while($row = mysql_fetch_object($sql))
						{
							$serial++;	
							$gender = $row->gender;
							if($gender == '0')
								{
									$gender = "Male";
								}
							else
								{
									$gender = "Female";
								}
							echo "<tr>
									<td>$serial</td>
									<td><img style='border-radius: 50%; width:40px; height:40px;' src='../upload/$row->photo'/> &nbsp;&nbsp;$row->fullname</td>
									<td>$row->emp_id</td>
									<td>
										
										<a data-toggle='tooltip' data-placement='left' title='Detail' class='btn btn-info btn-sm'  href='detail_employee.php?ids=$row->emp_id'><i class='fa fa-info'></i></a>
										<a data-toggle='tooltip' data-placement='top' title='Edit' class='btn btn-info btn-sm' href='edit_employee.php?ide=$row->emp_id'><i class='fa fa-pencil'></i></a>
										<a data-toggle='tooltip' data-placement='right' title='Delete' class='btn btn-danger btn-sm' onclick='return confirm_delete();' href='delete.php?idd=$row->emp_id'><i class='fa fa-trash-o fa-lg'></i></a>
									
									</td>
									
								  </tr>";	
						}
					
				?>
                                    </tbody>
                                </table>

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

<script>
	function confirm_delete(){
			return confirm("Are you sure to delete thid data.");
		}
</script>

<?php include('footer.php'); ?>