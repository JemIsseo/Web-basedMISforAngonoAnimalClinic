<?php
session_start();
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP</title>
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
            <h2 class="logintext">Verification</h2>
            <p class="lightgreen">Please enter the code sent to your email</p>

            <form action="" method="POST">
                <div class="input-box space">
                    <input type="text" id="otp" name="otp_code" required autofocus>
                    <span>Enter Code</span>
                    <i class="fa-solid fa-check-to-slot"></i>
                    <p class="already fpright"><a href="index.php">Resend Code</a></p>
                </div>
                <button name="verify" type="submit" class="login-btn">Verify</button>
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
<?php
if (isset($_POST["verify"])) {
    $otp = $_SESSION['otp'];
    $ea = $_SESSION['mail'];
    $otp_code = $_POST['otp_code'];

    if ($otp != $otp_code) {
?>
        <script>
            alert("Invalid OTP code");
        </script>
    <?php
    } else {
        mysqli_query($conn, "UPDATE tbluseraccount SET status = 1 WHERE email = '$ea'");
    ?>
        <script>
            alert("Account Verified, you can now login to the portal");
            window.location.replace("index.php");
        </script>
<?php
    }
}

?>