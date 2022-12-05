<?php
    session_start();
    include("connect/connection.php");
    if(isset($_POST["Donate_amt"]))
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phno = $_POST["contactno"];
        $amount = $_POST["amount"];

        mysqli_query($connect, "INSERT INTO `donator_form`(`name`, `mail_id`, `contact_no`, `payment_amount`) VALUES ('$name','$email','$phno','$amount')");
        ?>
        <script>
        alert("<?php echo 'We received your donation of: ' . $amount . ' Rs.!!' ?>");
        window.location.replace('viewform.php');
        </script>
        <?php
    }
    else if(isset($_POST["donate_food"]))
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phno = $_POST["contactno"];
        $address = $_POST["address"];
        $date = $_POST["date"];
        $time = $_POST["time"];

        mysqli_query($connect, "INSERT INTO `donator_form`(`name`, `mail_id`, `contact_no`, `address`, `date`, `time`) VALUES ('$name','$email','$phno','$address','$date','$time')");
        ?>
        <script>
        alert("<?php echo 'We will pickup the delivery on: ' . $date . ': ' . $time  ?>");
        window.location.replace('viewform.php');
        </script>
        <?php
    }
?>

<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/vector-map/jqvmap.css">
    <link rel="stylesheet" href="assets/vendor/jvectormap/jquery-jvectormap-2.0.2.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'><link rel="stylesheet" href="./style2.css">
    <title>Food Donation Services</title>
    <style>
        ul.navbar-nav li a{
            color: rgb(137, 175, 17) !important;
        }
        ul.navbar-nav li a i{
            color: rgb(137, 175, 17) !important;
        }
        .navbar-brand{
            color: rgb(255, 55, 0) !important;
        }
        a
        {
            margin: 0px;
        }
    </style>
</head>

<body>

    <div class="dashboard-main-wrapper">

        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">Food Donation Services</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar.png" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info" style="background-color: rgb(255, 55, 0);">
                                    <h5 class="mb-0 text-white nav-user-name">Mayank Kulkarni </h5>
                                    <span class="status"></span><span class="ml-2">User</span>
                                </div>
                                <a class="dropdown-item" href="http://localhost/Mini-Project/profile.php"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="http://localhost/Mini-Project/login.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="nav-left-sidebar sidebar-dark" style="background-color: rgb(249, 242, 112);">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="http://localhost/Mini-Project/dashboard.php">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggdonatele="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                <a href="index.html"><img class="logo-img" src="assets/images/logo.png" alt="logo"></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="http://localhost/Mini-Project/dashboard.php"><i class="fa fa-fw fa-tachometer-alt"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="http://localhost/Mini-Project/donationform.php" style="background-color: rgb(241, 185, 14);"><i class="fa fa-fw fa-hand-holding-heart"></i>Donation  <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="http://localhost/Mini-Project/viewform.php"><i class="fa fa-fw fa-users"></i>View Donation <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="grievance.php"><i class="fa fa-fw fa-hands-helping"></i>Grievance  <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="contactus.php"><i class="fa fa-fw fa-chart-pie"></i>Contact Us <span class="badge badge-success">6</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                        <h2 class="pageheader-title" style="text-align:left; margin-top:3%;"><i class="fa fa-fw fa-tachometer-alt"></i> Donate Now </h2><div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Donation</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

    <div class="container" id="container">
	<div class="form-container amount-container">
		<form action="donationform.php" method="POST">
			<h1>Donate Amount</h1>
			<input type="text" name="name" placeholder="Name" />
			<input type="email" name="email" placeholder="Email"  />
			<input type="text" name="contactno" placeholder="Contact No" />
            <input type="text" name="amount" placeholder="Amount (Rs.)" />
			<button type="submit" name="Donate_amt">Pay</button>
		</form>
	</div>
	<div class="form-container food-container">
		<form action="donationform.php" method="POST">
			<h1>Donate Food</h1>
			<input type="text" name="name" placeholder="Name" />
			<input type="email"name="email" placeholder="Email" />
			<input type="text" name="contactno" placeholder="Contact No" />
            <input type="text" name="address" placeholder="Address" />
            <input type="date" name="date" />
            <input type="time" name="time" />
            <button type="submit" name="donate_food">Donate</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Donate Food!!!</h1>
				<p>Do you want to donate by distributing food?</p>
				<button class="ghost" id="donatefood">Donate Food</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Donate Amount!!!</h1>
				<p>Do you want to donate by paying amount?</p>
				<button class="ghost" id="donateamount">Donate Amount</button>
			</div>
		</div>
	</div>
</div>
            </div>
        </div>

    </div>

    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstrap bundle js-->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- chartjs js-->
    <script src="assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
    <script src="assets/vendor/charts/charts-bundle/chartjs.js"></script>
   
    <!-- main js-->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- sparkline js-->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <script src="assets/vendor/charts/sparkline/spark-js.js"></script>
     <!-- dashboard sales js-->
    <script src="assets/libs/js/dashboard-sales.js"></script>
    <script src="script.js"></script>
</body>
 
</html>
