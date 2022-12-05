<?php

    session_start();
    include('connect/connection.php');

    if(isset($_POST["login"])){

        $email = mysqli_real_escape_string($connect, trim($_POST['mail']));
        $password = mysqli_real_escape_string($connect, trim($_POST['password']));

        $email = stripcslashes($email);  
        $password = stripcslashes($password);  

        $_SESSION["mail"] = $email;

        $sql = mysqli_query($connect, "SELECT * FROM login_donator where mail_id = '$email'");
        $count = mysqli_num_rows($sql);

            if($count > 0){
                $fetch = mysqli_fetch_assoc($sql);
                $hashpassword = $fetch["password"];
                $password_hash = password_hash($password, PASSWORD_BCRYPT);
    
                if($fetch["status"] == 0){
                    ?>
                    <script>
                        alert("Please verify email account before login.");
                        header("location:register.php");
                    </script>
                    <?php
                }else if(strcmp($hashpassword,$password_hash)){
                    ?>
                    <script>
                        alert("Login in successful!!");
                        window.location.replace('dashboard.php');
                    </script>
                    <?php
                }else{
                    ?>
                    <script>
                        alert("email or password invalid, please try again.");
                    </script>
                    <?php
                }
            }
                
    }

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Login Form</title>

    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .inp, input::placeholder {
        font-size: 15px;
    }
    </style>
</head>
<body>

<div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="dashboard.php"><img class="logo-img" src="assets/images/logo.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <input class="form-control form-control-lg inp" id="mail" name="mail" type="text" placeholder="Email Id" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg inp" id="password" name="password" type="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" name="login" class="btn btn-lg btn-block" style="background-color:rgb(255, 55, 0) !important;
                    color: rgb(137, 175, 17) !important;">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="http://localhost/food_donation_portal/register.php" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="http://localhost/food_donation_portal/recover_psw.php" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>
