<?php session_start() ;
include('connect/connection.php');
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="http://localhost/ARIOS%20CAFE%20WEBSITE/customerImages/Arios%20Cafe%20Logo.jpg">
    <link rel="icon" type="image/png" sizes="32x32" href="http://localhost/ARIOS%20CAFE%20WEBSITE/customerImages/Arios%20Cafe%20Logo.jpg">
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/ARIOS%20CAFE%20WEBSITE/customerImages/Arios%20Cafe%20Logo.jpg">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="resetpass.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <title>Reset Password</title>
</head>
<body>

<section class="w3l-mockup-form">
    <br>
    <br>
    <br>
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="alert-close">
                    <span><a href="http://localhost/ARIOS%20CAFE%20WEBSITE/CustomerEnd/index.php"><</a></span>
                    </div>
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                           
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>New Password</h2>
                        <p>Enter new password</p>
                        <form action="" method="post">
                        <input type="password" id="password" class="form-control" name="password" required autofocus>

                            <button  type="submit" value="Reset" name="reset">Reset</button>
                        </form>
                        
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>

</body>
</html>
<?php
    if(isset($_POST["reset"])){
        include('connect/connection.php');
        $psw = $_POST["password"];

        $token = $_SESSION['token'];
        $Email = $_SESSION['email'];

        // $hash = password_hash( $psw , PASSWORD_DEFAULT );

        $sql = mysqli_query($connect, "SELECT * FROM login WHERE email='$Email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if($Email){
            $new_pass = $psw;
            mysqli_query($connect, "UPDATE login SET password='$new_pass' WHERE email='$Email'");
            ?>
            <script>
                window.location.replace("index.php");
                alert("<?php echo "your password has been succesful reset"?>");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("<?php echo "Please try again"?>");
            </script>
            <?php
        }
    }

?>
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
