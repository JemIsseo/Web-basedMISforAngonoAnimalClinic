<?php 
    session_start();
    $uname = $_POST['username'];
    $pword = $_POST['password']; 

    // Database Connection
    include 'connect.php';
    
    $sql = "SELECT * FROM tbluseraccount WHERE username =''";
    
    if ($conn->connect_error) {
        die("Failed to connect : " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("SELECT * FROM tbluseraccount WHERE username = ?");
        $stmt->bind_param("s", $uname);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if ($data['password'] === $pword) {
            } else {
                header("Location: loginform.php?error=Password Incorrect");
                die();
            } 
        } else {
            header("Location: loginform.php?error=Invalid Input Please Try Again");
            die();  
        }
    }

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" 
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" 
    crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="../images/aac.jpg"/>
</head>

<body>
        <!-- Login Form Section -->
    <main>
        <section class = "glassloginform">
            <img src="../Images/petcare.png" alt="Login Portal Logo" class="center">
            <h2 class="logintext">Verification</h2>
    
            <form action="" method="POST">
                    <div class="input-box space">
                        <input type="text" name="code" required> 
                        <span>Enter Code</span>
                        <i class="fa-solid fa-check-to-slot"></i>
                        <p class="already fpright"><a href="loginform.php">Resend Code</a></p>
                    </div>
                    <button name="ver" type="submit" class="login-btn" value="otp">Verify</button>
            </form>


                            <select class="radiobtn" name="usertype">
                              <?php
                                    while ($r = mysqli_fetch_array($s)) {
                              ?>
                                    <option value="<?php echo $r['email']; ?>"><?php echo $r['email']; ?> </option>
                                    <?php
                                        }
                                    ?>
                            </select>
        </section>
    </main>
    <!--  CIRCLE SHAPES DESIGN  -->
    <div class="circle1"></div>
    <div class="circle2"></div>
    <div class="circle3"></div>
    <div class="circle4"></div>
    <div class="circle5"></div>
    <div class="circle6"></div>

</body>
</html>