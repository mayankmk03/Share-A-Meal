<?php session_start(); ?>

<?php
    include('connect/connection.php');

    function validEmail()
        {  if (isset($_POST) && count($_POST)>1) {
            if (filter_var($_POST[' ail'], FILTER_VALIDATE_EMAIL)) {
                $GLOBALS['emailValid'] = true;
            } else {
                echo "<p>Email Error:</p>Email is Invalid<br>";
            }
        }
        }

        function validPass()
        {
            if (isset($_POST) && count($_POST)>1) {
            $uppercase = preg_match('@[A-Z]@', $_POST['password']);
            $lowercase = preg_match('@[a-z]@', $_POST['password']);
            $number    = preg_match('@[0-9]@', $_POST['password']);
            $specialChars = preg_match('@[^\w]@', $_POST['password']);
            if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['password']) < 8) {
                echo '<p>Password Error:</p>Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.<br>';
            } else {
                $GLOBALS['passValid'] = true;
            }
        }
        }

        function validPhoneNo()
        { if (isset($_POST) && count($_POST)>1) {
            if (!preg_match("/^[0-9]*$/", $_POST['phoneno'])) {
                echo '<p>Phone Number Error:</p>Phone Number should have 10 digits.<br>';
            }
            else {
                $GLOBALS['phonenoValid'] = true;
            }
        }
        }




    if(isset($_POST["register"])){
        $name = $_POST["name"];
        $phno = $_POST["phoneno"];
        $add = $_POST["address"];
        $city = $_POST["city"];
        $state = $_POST["state"];

        $email = mysqli_real_escape_string($connect, trim($_POST['mail']));
        $password = mysqli_real_escape_string($connect, trim($_POST['password']));

        $email = stripcslashes($email);  
        $password = stripcslashes($password);  

        $check_query = mysqli_query($connect, "SELECT * FROM signup_donator where mail_id ='$email'");
        $rowCount = mysqli_num_rows($check_query);

                
        if(!empty($email) && !empty($password)){
            if($rowCount > 0){
                ?>
                <script>
                    alert("User with email already exist!");
                </script>
                <?php
            }else{
                $password_hash = password_hash($password, PASSWORD_BCRYPT);
                $r = mysqli_query($connect, "INSERT INTO `signup_donator`(`name`,`mail_id`, `phone_no`, `password`, `state_`, `city`, `address`) VALUES ('$name','$email','$phno','$password_hash','$state','$city','$add')");
                $result = mysqli_query($connect, "INSERT INTO login_donator (mail_id, password, status) VALUES ('$email', '$password_hash', 0)");
    
                if($result){
                    $otp = rand(100000,999999);
                    $_SESSION['otp'] = $otp;
                    $_SESSION['mail'] = $email;
                    require "Mail/phpmailer/PHPMailerAutoload.php";
                    $mail = new PHPMailer;
    
                    $mail->isSMTP();
                    $mail->Host='smtp.gmail.com';
                    $mail->Port=587;
                    $mail->SMTPAuth=true;
                    $mail->SMTPSecure='tls';
    
                    $mail->Username='mayank.kulkarni@somaiya.edu';
                    $mail->Password='mayank@123';
    
                    $mail->setFrom('mayank.kulkarni@somaiya.edu', 'OTP Verification');
                    $mail->addAddress($_POST["mail"]);
    
                    $mail->isHTML(true);
                    $mail->Subject="Your verify code";
                    $mail->Body="<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
                    <br><br>
                    <p>With regrads,</p>
                    <b>Mayank kulkarni</b>";
    
                            if(!$mail->send()){
                                ?>
                                    <script>
                                        alert("<?php echo "Register Failed, Invalid Email "?>");
                                    </script>
                                <?php
                            }else{
                                ?>
                                <script>
                                    alert("<?php echo "Register Successfully, OTP sent to " . $email ?>");
                                    window.location.replace('verification.php');
                                </script>
                                <?php
                            }
                }
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

    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

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
            <div class="card-header text-center"><a href="index.html"><img class="logo-img" src="assets/images/logo.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form action="register.php" method="POST">
                    <div class="form-group">
                        <input class="form-control form-control-lg inp" name="name" type="text" placeholder="Name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg inp" name="mail" type="text" placeholder="Email-ID" autocomplete="off">
                        <?php validEmail() ?>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg inp" name="password" type="password" placeholder="Password">
                        <?php validPass()?>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg inp" name="phoneno" type="text" placeholder="Phone Number">
                        <?php validPhoneNo()?>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg inp" name="address" type="text" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg inp" name="city" type="text" placeholder="City">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg inp" name="state" type="text" placeholder="State">
                    </div>
                    
                    <button type="submit" name="register" class="btn btn-lg btn-block" style="background-color:rgb(255, 55, 0) !important;
                    color: rgb(137, 175, 17) !important;">Sign Up</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="http://localhost/Mini-Project/login.php" class="footer-link">Sign-in</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="http://localhost/Mini-Project/recover_psw.php" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
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

