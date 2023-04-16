<?php 
    if (!isset($_SESSION['usertype'])) {
        header("Location: index.php");
    }

    if ($_SESSION['usertype'] == 'Secretary') {
        $display_style = 'none';
    } else {
        $display_style = 'flex';
    }

    if ($_SESSION['usertype'] == 'Assistant') {
        $display_stylea = 'none';
    } else {
        $display_stylea = '';
    }
?>