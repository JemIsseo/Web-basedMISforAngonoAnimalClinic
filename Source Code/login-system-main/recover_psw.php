<?php session_start() ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<?php  $msg = ""; ?>

<!--MAILER-->
<?php 
    if(isset($_POST["recover"])){
        include('connect/connection.php');
      
        $email = $_POST["email"];

        $sql = mysqli_query($connect, "SELECT * FROM login WHERE email='$email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if(mysqli_num_rows($sql) <= 0){
            ?>
                <?php $msg = "<div class='alert alert-danger'>Sorry, no emails exists .</div>"; ?>
            <?php
        }else if($fetch["status"] == 0){
            ?>
                <?php $msg = "<div class='alert alert-info'>Sorry, your account must verify first, before you recover your password !.</div>"; ?>
                    
               <script>
                   window.location.replace("index.php");
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

            // h-hotel account
            $mail->Username='imepogi23@gmail.com';
            $mail->Password='czcrehlfaekvazco';

            // send by h-hotel email
            $mail->setFrom('email', 'Password Reset');
            // get email from input
            $mail->addAddress($_POST["email"]);
            //$mail->addReplyTo('lamkaizhe16@gmail.com');

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Recover your password";
            $mail->Body="<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly click the below link to reset your password</p>
            http://localhost/ARIOS%20CAFE%20WEBSITE/login-system-main/reset_psw.php
            <br><br>
            <h1>I-TEAM</h1>
            <b>BSIT 3-1B</b>";

            if(!$mail->send()){
                ?>
          
                        <?php $msg = "<div class='alert alert-info'>Invalid Email.</div>"; ?>
                      
                 
                <?php
            }else{
                ?><?php
                $msg = "<div class='alert alert-info'> We sent a email to {$email} kindly check your email box.</div>";
                ?>
                <?php
            }
        }
    }


?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Reset Password</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Login Form" />
    <!-- //Meta tag Keywords -->
    <link rel="apple-touch-icon" sizes="180x180" href="http://localhost/ARIOS%20CAFE%20WEBSITE/customerImages/Arios%20Cafe%20Logo.jpg">
    <link rel="icon" type="image/png" sizes="32x32" href="http://localhost/ARIOS%20CAFE%20WEBSITE/customerImages/Arios%20Cafe%20Logo.jpg">
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/ARIOS%20CAFE%20WEBSITE/customerImages/Arios%20Cafe%20Logo.jpg">
    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="..//login-system-main/forgotpassword.css">
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>

    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <br>
            <br>
            <br>
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    
                    <div class="w3l_form align-self">
                        
                    </div>
                    <div class="content-wthree">
                    <div class="alert-close">
                        <span><a href="http://localhost/ARIOS%20CAFE%20WEBSITE/CustomerEnd/index.php"><</a></span>
                    </div>
                        <h2>Reset Password</h2>
                        <p>Enter your email to verify and reset password. </p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" required>
                            <button name="recover" class="btn" type="submit">Reset</button>
                        </form>
                        <div class="social-icons">
                            <p>Back to! <a href="http://localhost/ARIOS%20CAFE%20WEBSITE////login-system-main/index.php">Login</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    

</body>

</html>

