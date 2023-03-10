<!--REGISTRATION -->
<?php
    session_start();
    include 'connect.php';

    if (isset($_POST['login'])) {
        $un = $_POST['username'];
        $pw = $_POST['password']; 

        $sql = "Select * from tbluseraccount where username = '$un'"; 
        $res = mysqli_query($conn, $sql);
    
        if ($res) {
                $fetch = mysqli_fetch_assoc($res);
                $hashpassword = $fetch["password"];

                if($fetch["status"] == 0){
                    ?>
                    <script>
                        alert("Please verify your email account before login.");
                    </script>
                    <?php
                }else if(password_verify($pw, $hashpassword)){
                    ?>
                    <script>
                        alert("You are now logged in successfully!");
                        window.location.replace('dashboard.php');
                    </script>
                    <?php
                } else {
                    ?>
                    <div class="statusmessageerror" id="close">
                    <h2>Username or Password Incorrect</h2>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                    </div> <?php
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
    <title>Login Account</title>
    <link rel="stylesheet" href="../css/loginform.css">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" 
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="shortcut icon" type="image/x-icon" href="../images/aac.jpg"/>
</head>

<body>  
        <!-- Login Form Section -->
    <main> 
        <section class = "glassloginform">
                <div class="signupleft"> 
                    <?php if (isset($_GET['error'])) {?>
                        <p class="error"><?php  echo $_GET['error'] ?></p>
                    <?php } ?> 
                    <h2 class="logintext">Login Account</h2>
                    <form action="" method="POST">
                        <div class="input-box space">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="username" required> 
                            <span>Username</span>
                        </div>
                        <div class="input-box space">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="password" id="password" required> 
                            <span>Password</span> 
                            <i class="fa-solid fa-eye show" aria-hidden="true" id="eye" onclick="toggle()"></i>
                            <p class="already fpright"><a href="registration.php">Forgot Password?</a></p>
                        </div> 
                        <div class="login">
                            <button name="login" type="submit" class="login-btn">Login</button>
                            <p class="already">Doesn't have an account? <a href="registration.php">Register Here!</a></p>
                        </div>
                        <div class="social-links">
                            <a href="mailto:angonoanimalclinic@gmail.com"><i class="fa-solid fa-envelope"></i></a>
                            <a href="https://www.facebook.com/AACPGC"><i class="fa-solid fa-user-group"></i></a>
                            <i class="fa-solid fa-phone" title="0921-502-2956"></i>
                        </div>
                        <p class="already faqs"><a href="faqs.php">FAQs</a> </p>
                    </form>
                </div>
            
                <div class="signupright">   
                    <div class="img">
                        <img src="../images/signin.png" alt="">
                    </div>
                    <div class="systemdescription">
                        <h2>Welcome to Web-Based Management Information System for Angono Animal Clinic</h2>
                        <p></p>
                    </div>
                </div>

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