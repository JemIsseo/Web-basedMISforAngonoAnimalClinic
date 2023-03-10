<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <!-- Materical Icons Link -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Stylesheet  -->
    <link rel="stylesheet" href="../css/reports.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/aac.jpg"/>
</head>
<body>
    <div class="container">
        <?php  include 'aside.php'; ?>    

        <!--  Main Tag  -->
        <main>
           
            <section class="tableaudittrail">
                <div class="accrecsearch">
                    <h1>Reports</h1>
                    <div class="searchbar">
                        <select name="" id="filterby">
                        <option value="filter">Filter By:</option>
                        <option value="date">Date</option>
                        </select>
                    </div>
                </div>
                <div class="table-profile">

                </div>
            </section>
        </main>
        <!--  End of Main Tag  -->
    
        <?php   include 'systemaccountanddate.php'; ?>
         
        <!--  Start of Retrive section  -->
        <h1>Refresh Table</h1>
    
        <div class="buttons">
            <div class="buttonmodify">
                <button class="modal-open" data-modal="modal5" title="View Stocks"><span class="material-symbols-sharp">person_search</span>User Account</button> 
            </div> 
            <div class="buttonmodify">
                <button title="Restore archive stock" class="modal-open" data-modal="modal4"><span class="material-symbols-sharp">inventory</span>Stocks</button> 
            </div>
            <div class="buttonmodify">
                <button title="Refresh stock"><span class="material-symbols-sharp">shopping_cart</span>Products and Services</button> 
            </div>
        </div>
        
        
    </div>

    <?php include 'scriptingfiles.php'; ?>
</body>
</html>

