<?php 
	ob_start();
	session_start();
	if($_SESSION['name']!='admin')
	{
		header('location: login.php');
	}

?>
<?php include('header.php'); ?>
<?php include('../database.php'); ?>
        
         
   
		
		
		
		
  
<?php include('footer.php'); ?>