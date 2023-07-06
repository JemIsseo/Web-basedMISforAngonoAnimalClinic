<?php
session_start();
include 'connect.php';
?>
<?php $msg = ""; ?>
<!--MAILER-->
<?php
if (isset($_POST["verifyemail"])) {
    include 'connect.php';

    $ea = $_POST["email"];

    $sql = mysqli_query($conn, "SELECT * FROM tbluseraccount WHERE email='$ea'");
    $query = mysqli_num_rows($sql);
    $fetch = mysqli_fetch_assoc($sql);

    if (mysqli_num_rows($sql) <= 0) {
?>
        <?php $msg = "<div class='alert alert-danger'>Sorry, no emails exists .</div>"; ?>
    <?php
    } else {
        // Insert into database

        if ($sql) {
            $otp = rand(100000, 999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['mail'] = $ea;
            require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer(true);

            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';     
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
                            
            $mail->Username = 'angonoanimalclinic.mail2@gmail.com';
            $mail->Password = 'sfbsjeeovkyxokqv';

            $mail->setFrom('angonoanimalclinicmail@gmail.com', 'Angono Animal Clinic');
            $mail->addAddress($_POST["email"]);

            $mail->isHTML(true);
            $mail->Subject = "Your verification code";
            $mail->Body = "<p>Hello good day! $ea, </p> <h3>Your one-time-passcode is $otp <br></h3><p>use this to verify your account.</p>
                           <br><br>
                           <h1>Thank you,</h1>
                           <h2><b>NON-TECHNOPHOBICS</b></h2>";

            if (!$mail->send()) {
        ?>
                <script>
                    alert("Recovery Failed, Invalid Email");
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert(" <?php echo "We've send a verification code to " . $ea; ?>");
                    window.location.replace('otp.php');
                </script>
<?php
            }
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Account</title>
    <link rel="stylesheet" href="../css/otp.css">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="../images/aac.jpg" />
</head>

<body>
    <!-- Login Form Section -->
    <main>
        <section class="glassloginform">
            <img src="../images/petcare.png" alt="Login Portal Logo" class="center">
            <h2 class="logintext">Verify Account</h2>
            <p class="lightgreen">Enter your email to verify your account.</p>

            <form action="" method="POST">
                <div class="input-box space">
                    <input type="text" id="email" name="email" required autofocus>
                    <span>Enter Email</span>
                    <i class="fa-solid fa-check-to-slot"></i>
                </div>
                <button name="verifyemail" type="submit" class="login-btn">Send OTP</button>
            </form>
        </section>
    </main>
   <!--  CIRCLE SHAPES DESIGN  -->
   <div class="circle">
        <div class="circle1"></div>
        <div class="circle2"></div>
        <div class="circle3"></div>
        <div class="circle4"></div>
        <div class="circle5"></div>
        <div class="circle6"></div>
    </div>

</body>

</html>