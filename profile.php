<?php
	session_start();
	include("connect/connection.php");
	$email = $_SESSION["mail"];
	$query = "SELECT * FROM signup_donator where mail_id='$email'";
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
    </style>
</head>

<?php

// include('connect/connection.php');

// $object = new connect;

// $object->query = "
// SELECT * FROM signup_donator
// WHERE mail_id = '".$_SESSION["mail_id"]."'
// ";

// $result = $object->get_result();
// include('header.php');

?>


<body>

    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="dashboard.html">Food Donation Services</a>
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
                                <a class="dropdown-item" href="http://localhost/food_donation_portal/profile.php"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="destroy.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="nav-left-sidebar sidebar-dark" style="background-color: rgb(249, 242, 112);">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="http://localhost/food_donation_portal/dashboard.php">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                <a href="http://localhost/food_donation_portal/dashboard.php"><img class="logo-img" src="assets/images/logo.png" alt="logo"></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="dashboard.php" style="background-color: rgb(241, 185, 14);"><i class="fa fa-fw fa-tachometer-alt"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="donation.html"><i class="fa fa-fw fa-hand-holding-heart"></i>Donation <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="viewdonation.html"><i class="fa fa-fw fa-hand-holding-heart"></i>View Donation <span class="badge badge-success">6</span></a>
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

            <div class="container-fluid">
	<?php 
    // include('navbar.php');
     ?>

	<div class="row justify-content-md-center">
		<div class="col col-md-6">
			<br />
			<?php
			if(isset($_GET['action']) && $_GET['action'] == 'edit')
			{
			?>
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-md-6">
							Edit Profile Details
						</div>
						<div class="col-md-6 text-right">
							<a href="profile.php" class="btn btn-secondary btn-sm">View</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form method="post" id="edit_profile_form">
						<div class="form-group">
							<label>Email Address<span class="text-danger">*</span></label>
							<input type="text" name="email" id="email" class="form-control" required autofocus data-parsley-type="email" data-parsley-trigger="keyup" readonly value= "<?php echo $_SESSION['mail']; ?>" disabled	/>
						</div>
						<div class="form-group">
							<label>Password<span class="text-danger">*</span></label>
							<input type="password" name="password" id="password" class="form-control" required  data-parsley-trigger="keyup" />
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>First Name<span class="text-danger">*</span></label>
									<input type="text" name="firstname" id="firstname" class="form-control" required  data-parsley-trigger="keyup" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Last Name<span class="text-danger">*</span></label>
									<input type="text" name="lastname" id="lastname" class="form-control" required  data-parsley-trigger="keyup" />
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Contact No.<span class="text-danger">*</span></label>
									<input type="text" name="contactno" id="contactno" class="form-control" required  data-parsley-trigger="keyup" />
								</div>
							</div>
				
						</div>
						<div class="form-group">
							<label>Address<span class="text-danger">*</span></label>
							<textarea name="address" id="address" class="form-control" required data-parsley-trigger="keyup"></textarea>
						</div>
                        <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>City<span class="text-danger">*</span></label>
									<input type="text" name="city" id="city" class="form-control" required  data-parsley-trigger="keyup" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>State<span class="text-danger">*</span></label>
                                    <select name="state" id="state" class="form-control">
                                        <option value="choose">Choose</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chandigarh">Chandigarh</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                        <option value="Daman and Diu">Daman and Diu</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Lakshadweep">Lakshadweep</option>
                                        <option value="Puducherry">Puducherry</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="West Bengal">West Bengal</option>
                                        </select>
								</div>
							</div>
						</div>

						<div class="form-group text-center">
							<input type="hidden" name="action" value="edit_profile" />
							<input type="submit" name="edit_profile_button" id="edit_profile_button" class="btn btn-primary" value="Edit" />
						</div>
					</form>
				</div>
			</div>

			<br />
			<br />
			

			<?php
			}
			else
			{

				if(isset($_SESSION['success_message']))
				{
					echo $_SESSION['success_message'];
					unset($_SESSION['success_message']);
				}
			?>

			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-md-6">
							Profile Details
						</div>
						<div class="col-md-6 text-right">
							<a href="profile.php?action=edit" class="btn btn-secondary btn-sm">Edit</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<table class="table table-striped">
					<?php
						if ($result = $connect->query($query)) {
							while ($row = $result->fetch_assoc()) {
								$field1name = $row["Name"];
								$field2name = $row["mail_id"];
								$field3name = $row["phone_no"];
								$field4name = $row["state_"];
								$field5name = $row["city"];
								$field6name = $row["address"];

								echo '<br><h4>Name: </h4>'. $field1name.'<br>
										<br><h4>Email-ID: </h4>'. $field2name.'<br>
										<br><h4>Contact No: </h4>'. $field3name.'<br>
										<br><h4>State: </h4>'. $field4name.'<br>
										<br><h4>City: </h4>'. $field5name.'<br>
										<br><h4>Address: </h4>'. $field6name.'<br>';
							}
							$result->free();
						} 
					?>
					</table>					
				</div>
			</div>
			<br />
			<br />
			<?php
			}
			?>
		</div>
	</div>
</div>

<?php

// include('footer.php');


?>

<script>

$(document).ready(function(){

	$('#patient_date_of_birth').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });

<?php
	foreach($result as $row)
	{

?>
$('#email').val("<?php echo $row['email']; ?>");
$('#password').val("<?php echo $row['password']; ?>");
$('#firstname').val("<?php echo $row['firstname']; ?>");
$('#lastname').val("<?php echo $row['lastname']; ?>");
$('#contactno').val("<?php echo $row['contactno']; ?>");
$('#address').val("<?php echo $row['address']; ?>");
$('#city').val("<?php echo $row['city']; ?>");
$('#state').val("<?php echo $row['state']; ?>");

<?php

	}

?>

	$('#edit_profile_form').parsley();

	$('#edit_profile_form').on('submit', function(event){

		event.preventDefault();

		if($('#edit_profile_form').parsley().isValid())
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:$(this).serialize(),
				beforeSend:function()
				{
					$('#edit_profile_button').attr('disabled', 'disabled');
					$('#edit_profile_button').val('wait...');
				},
				success:function(data)
				{
					window.location.href = "profile.php";
				}
			})
		}

	});

});

</script>
                
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
</body>
 
</html>


