<?php 
include 'connect.php';

// Cascading Dropdown in Customer's Module
if (isset($_POST['cusid'])) {
    $cusid = $_POST['cusid'];
    $result = $conn->query("SELECT * FROM tblpet WHERE archive = 'false' AND cusid = '$cusid' ORDER BY petname");

    if (mysqli_num_rows($result) > 0) {
        echo '<option disabled selected style="display: none" value="">Choose Pet</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['petname'] . '">' . $row['petname'] . '</option>';
            $petidd = $row['petid'];
            $_SESSION['petidd'] = $petidd;
        }
    }
}

if (isset($_POST['pettypeid'])) {
    $pettypeid = $_POST['pettypeid'];
    $result = $conn->query("SELECT * FROM tblbreed WHERE pettypeid = $pettypeid ORDER BY breed");

    if (mysqli_num_rows($result) > 0) {
        echo '<option disabled selected style="display: none" value="">Select Breed</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['breed'] . '">' . $row['breed'] . '</option>';
        }
    }
}




include 'scriptingfiles.php';



?>