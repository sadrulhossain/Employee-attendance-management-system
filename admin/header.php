<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Employee Attendance System</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

	<!--  CSS for ont Awesome, don't include it in your project     -->
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" />
	
	<!--  CSS for Google font, don't include it in your project     -->
    <link href="../assets/css/font-google.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	<link href="../assets/css/jasny-bootstrap.min.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    Golden Dream Software Corp.
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
				<li>
                    <a href="../user/dashboard.php">
                        <i class="fa fa-eye"></i>
                        <p>User</p>
                    </a>
                </li>
                <li>
                    <a href="add_employee.php">
                        <i class="fa fa-plus"></i>
                        <p>Add Employee</p>
                    </a>
                </li>
				<li>
                    <a href="show_employee.php">
                        <i class="fa fa-list"></i>
                        <p>Employee List</p>
                    </a>
                </li>
				<li>
                    <a href="permit_leave.php">
                        <i class="fa fa-eye"></i>
                        <p>Manage Leave</p>
                    </a>
                </li>
				<li>
                    <a href="attendance_sheet.php">
                        <i class="fa fa-calendar"></i>
                        <p>Attendance Sheet</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

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

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="../logout.php">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
		




