<?php 
    include 'connect.php';
    
    $s=mysqli_query($conn,"select * from tblusertype");
  
    if (isset($_POST['login']))  {
        $un = $_POST['username'];
        $pw = $_POST['password'];
        $cpw = $_POST['confirmpassword'];
        $enpw = md5($pw);
        $ut = $_POST['usertype'];
        $ea = $_POST['email'];
                    $sqls = "Select * from tbluseraccount where username = '$un'"; 
                    $result = mysqli_query($conn, $sqls);
                    
                    if ($result) {
                        $num= mysqli_num_rows($result);
                        if ($num > 0) { ?> 
                            <div class="statusmessageerror" id="close">
                            <h2>Sorry username already exist!</h2>
                            <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                            </div>
                        <?php   
                        } else {
                            if ($pw === $cpw) {
                                   // Insert into database
                                    $sql = "insert into tbluseraccount(username,password,usertype,email) 
                                    values('$un','$enpw','$ut','$ea')";
                                    $res = mysqli_query($conn, $sql);
                                        if ($res) { 
                                            header("Location: loginform.php");
                                            }
                            } else { ?>
                                <div class="statusmessageerror" id="close">
                                <h2>Password didn't matched!</h2>
                                <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                                </div> <?php
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
    <title>Create An Account</title>
    <link rel="stylesheet" href="../css/registration.css">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" 
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="shortcut icon" type="image/x-icon" href="../images/aac.jpg"/>
</head>

<body>  
        <!-- Registration Form Section -->
    <main> 

        <section class = "glassloginform">
               
                <?php if (isset($_GET['error'])) {?>
                    <p class="error"><?php  echo $_GET['error'] ?></p>
                <?php } ?> 
                <div class="signupleft"> 
                    <h2 class="logintext">Create an Account</h2>
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
                        </div> 
                        <div class="show">
                            <i class="fa-solid fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
                        </div>
                        <div class="input-box">
                            <i class="fa-solid fa-check"></i>
                            <input type="password" name="confirmpassword" id="confirmpassword" required> 
                            <span>Confirm Password</span> 
                        </div>
                        <div class="showcp">
                            <i class="fa-solid fa-eye" aria-hidden="true" id="eye" onclick="togglecp()"></i>
                        </div>
                        <div class="input-box">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" name="email" required> 
                            <span>Email Address</span>
                        </div>
                            <select class="radiobtn" name="usertype">
                                <option value="">Choose</option>
                              <?php 
                                    while ($r = mysqli_fetch_array($s)) {
                              ?>
                                    <option value="<?php echo $r['usertype']; ?>"><?php echo $r['usertype']; ?> </option>
                                    <?php
                                        }
                                    ?>
                            </select>
                        <button name="login" type="submit" class="login-btn">Register</button>
                        <p class="already">Already have an account? <a href="loginform.php">Click Here!</a></p>
                    </form>
                </div>
            
                <div class="signupright">
                    <div class="img">
                        <img src="../images/signup.png" alt="">
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