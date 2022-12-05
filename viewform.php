<?php
    include('connect/connection.php');
    $query = "SELECT * FROM donator_form";
?>

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Food Donation Services</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
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

<body>
    <div class="dashboard-main-wrapper">
      <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="dashboard.php">Food Donation Services</a>
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
                                <a class="dropdown-item" href="http://localhost/food_donation_portal/login.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

       <div class="nav-left-sidebar sidebar-dark" style="background-color: rgb(249, 242, 112);">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                <a href="dashboard.php"><img class="logo-img" src="assets/images/logo.png" alt="logo"></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="http://localhost/food_donation_portal/dashboard.php"><i class="fa fa-fw fa-tachometer-alt"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="donationform.php"><i class="fa fa-fw fa-hand-holding-heart"></i>Donation <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="http://localhost/food_donation_portal/viewform.php" style="background-color: rgb(241, 185, 14);"><i class="fa fa-fw fa-users"></i>View Donation  <span class="badge badge-success">6</span></a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="grievance.php"><i class="fa fa-fw fa-hands-helping"></i>Grievance <span class="badge badge-success">6</span></a>
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
                             <h2 class="pageheader-title"><i class="fa fa-fw fa-users"></i> Recipients </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Recipients</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
               
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Previous Donations</h5>
                                <div class="card-body">
                                    <div class="table-responsive ">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Full Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Contact</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">Payment Amount</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <?php
                                                if ($result = $connect->query($query)) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        $field1name = $row["name"];
                                                        $field2name = $row["mail_id"];
                                                        $field3name = $row["contact_no"];
                                                        $field6name = $row["address"]; 
                                                        $field4name = $row["payment_amount"];
                                                        $field5name = $row["date"];
                                                        $field7name = $row["time"];

                                                        if(is_null($field7name))
                                                            {$field7name = "N/A";}
                                                        if(is_null($field5name))
                                                            {$field5name = "N/A";}
                                                        if($field4name==0)
                                                            {$field4name = "N/A";}
                                                        if($field6name=="-")
                                                            {$field6name = "N/A";}

                                                        echo '<tr> 
                                                                <td>'.$field1name.'</td> 
                                                                <td>'.$field2name.'</td> 
                                                                <td>'.$field3name.'</td> 
                                                                <td>'.$field6name.'</td> 
                                                                <td>'.$field4name.'</td> 
                                                                <td>'.$field5name.'</td> 
                                                                <td>'.$field7name.'</td> 
                                                            </tr>';
                                                    }
                                                    $result->free();
                                                } 
                                                ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               
            </div>
            
        </div>
    </div>

    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/custom-js/jquery.multi-select.html"></script>
    <script src="assets/libs/js/main-js.js"></script>
</body>
 
</html>