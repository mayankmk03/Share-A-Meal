<?php session_start() ?>

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

    <title>Forgot Password</title>

    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                <form method="POST" action="recover_psw.php">
                    <div class="form-group">
                        <input class="form-control form-control-lg inp" name="mail" type="text" placeholder="Email Id" autocomplete="off">
                    </div>
                    <button type="submit" name="recover" href="admin" class="btn btn-lg btn-block" style="background-color:rgb(255, 55, 0) !important;
                    color: rgb(137, 175, 17) !important;">Submit</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
            <div class="card-footer-item card-footer-item-bordered">
                    <a href="http://localhost/food_donation_portal/login.php" class="footer-link">Sign-in</a></div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>

<?php 
    if(isset($_POST["recover"])){
        include('connect/connection.php');
        $email = $_POST["mail"];

        $sql = mysqli_query($connect, "SELECT * FROM login_donator WHERE mail_id='$email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if(mysqli_num_rows($sql) <= 0){
            ?>
            <script>
                alert("<?php  echo "Sorry, No Emails exists "?>");
            </script>
            <?php
        }else if($fetch["status"] == 0){
            ?>
               <script>
                   alert("Sorry, your account must be verified first, before you recover your password !");
                   window.location.replace("register.php");
               </script>
           <?php
        }else{
            // generate token by binaryhexa 
            $token = bin2hex(random_bytes(50));

            //session_start ();
            $_SESSION['token'] = $token;
            $_SESSION['email'] = $email;

            require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            // developer's account
            $mail->Username='mayank.kulkarni@somaiya.edu';
            $mail->Password='mayank@123';

            // send by developer's email
            $mail->setFrom('mayank.kulkarni@somaiya.edu', 'Password Reset');
            // get email from input
            $mail->addAddress($_POST["mail"]);

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Recover your password";
            $mail->Body="<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly click the below link to reset your password</p>
            http://localhost/food_donation_portal/reset_psw.php
            <br><br>
            <p>With regrads,</p>
            <b>Mayank Kulkarni</b>";

            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo " Invalid Email "?>");
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        window.location.replace("notification.html");
                    </script>
                <?php
            }
        }
    }


?>
