<?php 

    $conn = new mysqli('localhost','root','','db_angonoanimalclinic');

    if (!$conn) {
        die(mysqli_error($conn));
    }   
    
?>