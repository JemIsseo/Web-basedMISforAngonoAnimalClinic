<?php
session_start();
include 'connect.php';
?>
<?php $msg = ""; ?>
<!--MAILER-->
<?php
if (isset($_POST["recover"])) {
    include 'connect.php';

    $ea = $_POST["email"];

    $sql = mysqli_query($conn, "SELECT * FROM tbluseraccount WHERE email='$ea'");
    $query = mysqli_num_rows($sql);
    $fetch = mysqli_fetch_assoc($sql);

    if (mysqli_num_rows($sql) <= 0) {
?>
        <?php $msg = "<div class='alert alert-danger'>Sorry, no emails exists .</div>"; ?>
    <?php
    } else if ($fetch["status"] == 0) {
    ?>
        <?php $msg = "<div class='alert alert-info'>Sorry, your account must verify first, before you recover your password !.</div>"; ?>

        <script>
            window.location.replace("index.php");
        </script>
        <?php
    } else {
        // Insert into database

        if ($sql) {
            $otp = rand(100000, 999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['mail'] = $ea;
            require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';

            $mail->Username = 'angonoanimalclinicmail@gmail.com';
            $mail->Password = 'dbcbbkszgonbkitt';

            $mail->setFrom('imepogi23@gmail.com', 'Angono Animal Clinic');
            $mail->addAddress($_POST["email"]);

            $mail->isHTML(true);
            $mail->Subject = "Your verification code";
            $mail->Body = "<p>Hello good day! $ea, </p> <h3>Your one-time-passcode is $otp <br></h3><p>use this to verify and reset password</p>
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
                    window.location.replace('verifyrecoverypassword.php');
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
    <title>Recover Account</title>
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
            <h2 class="logintext">Recover Password</h2>
            <p class="lightgreen">Enter your email to verify and reset password.</p>

            <form action="" method="POST">
                <div class="input-box space">
                    <input type="text" id="email" name="email" required autofocus>
                    <span>Enter Email</span>
                    <i class="fa-solid fa-check-to-slot"></i>
                </div>
                <button name="recover" type="submit" class="login-btn">Recover</button>
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