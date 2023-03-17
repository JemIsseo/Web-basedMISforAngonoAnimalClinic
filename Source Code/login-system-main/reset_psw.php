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
    <title>New Password</title>
    <link rel="stylesheet" href="../css/otp.css">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" 
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" 
    crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="../images/aac.jpg"/>
</head>

<body>
        <!-- Login Form Section -->
    <main>
        <section class = "glassloginform">
            <img src="../images/petcare.png" alt="Login Portal Logo" class="center">
            <h2 class="logintext">New Password</h2>
    
            <form action="" method="POST">
                        <div class="input-box space">
                            <input type="password" name="password" id="password" required autofocus> 
                            <span>Password</span>
                        </div> 
                        <div class="show">
                            <i class="fa-solid fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
                        </div>
                        <div class="input-box">
                            <input type="password" name="confirmpassword" id="confirmpassword" required> 
                            <span>Confirm Password</span> 
                        </div>
                        <div class="showcp">
                            <i class="fa-solid fa-eye" aria-hidden="true" id="eye" onclick="togglecp()"></i>
                        </div>
                    <button name="reset" type="submit" class="login-btn">Reset</button>
            </form>
        </section>
    </main>
    <!--  CIRCLE SHAPES DESIGN  -->
    <div class="circle1"></div>
    <div class="circle2"></div>
    <div class="circle3"></div>
    <div class="circle4"></div>
    <div class="circle5"></div>
    <div class="circle6"></div>
    <?php include 'scriptingfiles.php'; ?>
</body>
</html>
<?php 
    if(isset($_POST["reset"])){
        $un = $_SESSION['username'];
        $pw = $_POST['password'];
        $cpw = $_POST['confirmpassword'];

        if($pw != $cpw){
            ?>
            <div class="statusmessageerror" id="close">
            <h2>Password didn't matched!</h2>
            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
            </div> <?php
        }else{
            mysqli_query($conn, "UPDATE tbluseraccount SET password = $pw WHERE email = '$un'");
            ?>
             <script>
                alert("Reset Password Successful! you may now login to the portal");
                window.location.replace("index.php");
             </script>
             <?php
        }

    }

?>