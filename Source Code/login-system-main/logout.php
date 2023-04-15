<?php
session_start();
include 'connect.php';
    // Destroy the session 
            $ipaddress = $_SERVER['REMOTE_ADDR'];
            $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) VALUES ('".$_SESSION['username']."','$ipaddress','Logged Out')");
            session_destroy();

    // Redirect the user to the login page
    header("Location: index.php");
    exit;
?>