<?php
session_start();
include 'connect.php';
$op = $_SESSION['ownersname'] ?? '';
$pname = $_SESSION['prodname'] ?? '';
$cat = $_SESSION['category'] ?? '';

$sql1 = "select * from tblstock where prodname = '$pname'";
$res1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($res1);

if (isset($_POST['saveaddtocart'])) {
    $qty = $_POST['quantity'];
    $prc = $row1['price'];
    $initialPrice = $qty * $prc;

    if ($initialPrice) {
        
        $currentQuantity = $row1['quantity'];
        // Check if the requested quantity is less than or equal to the available quantity in stock
        if ($qty <= $currentQuantity) {
            // Deduct the requested quantity from the available quantity in the stock table
            $sql3 = "insert into tblorder(transactionid, prodname, category, quantity, price, cart) 
                values(NULL,'$pname','$cat','$qty','$initialPrice','Yes')";
            $res3 = mysqli_query($conn, $sql3);
            if ($res3) {
?>
                <div class="statusmessagesuccess message-box" id="close">
                    <h2>Product Added to Cart!</h2>
                    <button class="icon"><span class="material-symbols-sharp">close</span></button>
                </div>
        <?php
            }
            $newQuantity = $currentQuantity - $qty;

            // Update the stock quantity in the database
            $sql2 = "UPDATE tblstock SET quantity = $newQuantity WHERE prodname = '$pname'";
            $res2 = mysqli_query($conn, $sql2);
        } else {
            // Display an error message to the user and do not add the item to the cart
            echo "<div class='statusmessageerror message-box' id='close'>
                <h2>Sorry, the requested quantity is not available in stock.</h2>
                <button class='icon'><span class='material-symbols-sharp'>close</span></button>
            </div>";
        }
    }
}

if (isset($_POST['checkout'])) {
    $resultID = $conn->query("SELECT MAX(transactionid) AS max FROM tbltransaction");
    $rowID = $resultID->fetch_assoc();
    $max = $rowID['max'];

    $resultSumTotal = $conn->query("SELECT SUM(price) AS totalprice FROM tblorder WHERE cart = 'Yes'");
    $rowSumTotal = $resultSumTotal->fetch_assoc();
    $totalprice = $rowSumTotal['totalprice'];

    $sql = "UPDATE tblorder SET cart = 'Checkout', transactionid = $max + 1 WHERE cart='Yes'";
    $result = mysqli_query($conn, $sql);

    $sql1 = "INSERT INTO tbltransaction (username, ownersname, totalprice, date) VALUES('" . $_SESSION['username'] . "', '$op', '$totalprice', NOW())";
    $result1 = mysqli_query($conn, $sql1);

    if ($result1) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
        $result = mysqli_query($conn, "INSERT INTO tblaudittrail (username, ipaddress, actionmode) 
        VALUES ('" . $_SESSION['username'] . "','$ipaddress','Successful Transaction of product in transaction module')");
        ?>
        <div class="statusmessagesuccess message-box" id="close">
            <h2>Transaction has been completed!</h2>
            <button class="icon"><span class="material-symbols-sharp">close</span></button>
        </div>
    <?php
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <!-- Materical Icons Link -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Stylesheet  -->
    <link rel="stylesheet" href="../css/productsandservices.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/aac.jpg" />
</head>

<body>
    <div class="container">
        <?php include 'aside.php'; ?>

        <!--  Main Tag  -->
        <main>
            <section class="tableprofile">
                <h1>Products Available</h1>
                <div class="table-profile">
                    <form action="" method="POST">
                        <div class="formprofile">
                            <div>
                                <input type="text" name="category" value="<?php echo $cat; ?>" disabled required>
                                <span>Category</span>
                            </div>
                            <div>
                                <input type="text" name="prodname" value="<?php echo $pname; ?>" disabled required>
                                <span>Product Name</span>
                            </div>
                            <div>
                                <input type="text" value="<?php echo $op; ?>" disabled required>
                                <span>Owner's Name</span>
                            </div>
                            <div>
                                <input type="number" name="quantity" required>
                                <span>Quantity</span>
                            </div>
                        </div>
                        <div class="buttonflex">
                            <button name="saveaddtocart" class="save" title="Add to order cart">Add</button>
                            <button class="cancel" title="Clear all inputs" id="clear-button">Clear</button>
                        </div>

                    </form>
                    <div class="buttonscart">
                        <div class="buttonmodify">
                            <button class="modal-open" data-modal="modal5" title="View list of products"><span class="material-symbols-sharp">place_item</span>
                                <h3>View Products</h3>
                            </button>
                            <button class="modal-open" data-modal="modal4" title="View list of profile"><span class="material-symbols-sharp">person</span>
                                <h3>View Profile</h3>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <!--  End of profile   -->

            <section class="tableprofile">
                <div class="accrecsearch">
                    <h1>Order Cart</h1>
                    <div class="searchbar">
                        <input type="text" placeholder="Search here" id="search-boxcart"><span class="material-symbols-sharp">search</span>
                    </div>
                </div>
                <form action="" method="POST">
                    <div class="table-profile table-checkout">
                        <div class="formcart">
                            <div class="formprofile inputspan">
                                <input type="hidden" name="ownersname" value="<?php echo $op; ?>" disabled required>
                            </div>
                        </div>
                        <table class="content-table tblcart" id="searchCart">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Category</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "Select * from tblorder where cart = 'Yes' order by orderid desc";
                                $res = mysqli_query($conn, $sql);

                                if ($res) {
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $oid = $row['orderid'];
                                        $cat = $row['category'];
                                        $pname = $row['prodname'];
                                        $prc = $row['price'];
                                        $qty = $row['quantity'];
                                        echo '<tr>
                                    <td>' . $oid . '</td>
                                    <td>' . $cat . '</td>
                                    <td>' . $pname . '</td>
                                    <td>' . $qty . '</td>
                                    <td>' . number_format($prc, 2) . '</td>
                                    <td>
                                        <button class="modal-open showRemoveCart" data-modal="modal7" value="' . $oid . '" ><span class="material-symbols-sharp remove" title="Remove this product">delete</span></button>
                                    </td>
                                    </tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="buttonmodify checkoutright">
                            <button name="checkout" title="View list of profile"><span class="material-symbols-sharp">shopping_cart_checkout</span>
                                <h3>Proceed Checkout</h3>
                            </button>
                        </div>
                </form>
    </div>
    </section>
    </main>

    <!--  End of Main Tag  -->
    <?php include 'systemaccountanddate.php'; ?>
    <!--  Start of Transaction History  -->
    <h1>Transaction History</h1>
    <div class="buttonmodify checkhistorystyle">
        <button class="modal-open" data-modal="modal8" title="View and Restore Account"><span class="material-symbols-sharp">table_view</span>Check History</button>
    </div>



    <!-- Start of Modal -->

    <!-- Modal of Restore Stock MessageBox -->
    <div class="modal" id="modal3">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Unarchive Stock</h1>
                <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
            </div>
            <div class="modal-body">
                <h3>THIS IS TABLE TRANSACTION HISTORY</h3>
            </div>
            <div class="modal-footer">
                <div class="buttonflexright">
                    <button name="savearchiveprofile" type="submit" class="yes">Yes</button>
                    <button type="submit" class="cancel no modal-close">No</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal of Select Profile -->
    <div class="modal" id="modal4">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Select Profile</h1>
                <div class="accrecsearch">
                    <div class="searchbar">
                        <input type="text" placeholder="Search here" id="search-box"><span class="material-symbols-sharp">search</span>
                        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <section class="tableprofile">
                    <div class="table-profile">
                        <table class="content-table" id="ownersName">
                            <thead>
                                <tr>
                                    <th>Owner's Name</th>
                                    <th>Contact No.</th>
                                    <th>Address</th>
                                    <th>Email Address</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "Select * from tblownersprofile where archive = 'false' order by ownersname";
                                $res = mysqli_query($conn, $sql);

                                if ($res) {
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $op = $row['ownersname'];
                                        $cn = $row['contactno'];
                                        $add = $row['address'];
                                        $emailadd = $row['emailaddress'];
                                        echo '<tr>
                                        <td>' . $op . '</td>
                                        <td>' . $cn . '</td>
                                        <td>' . $add . '</td>
                                        <td>' . $emailadd . '</td>
                                        <td>
                                            <button name="selectprofile" data-modal="modal2" class="modal-open showSelectProfile" value="' . $op . '"><span class="material-symbols-sharp archive">done</span></button>
                                        </td>
                                        </tr>';
                                    }
                                }
                                ?>

                            </tbody>

                        </table>
                    </div>
                </section>
                <div class="modal-footer">
                    <div class="buttonflexright">
                        <button type="submit" class="cancel modal-close" title="Cancel">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal of  Select Profile MessageBox -->
    <div class="modal" id="modal2">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Selecting Profile</h1>
                <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
            </div>
            <div class="modal-body" id="selectProfile">

            </div>
        </div>
    </div>

    <!-- Modal of Select Profile -->
    <div class="modal" id="modal5">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Select Product</h1>
                <div class="accrecsearch">
                    <div class="searchbar">
                        <input type="text" placeholder="Search here" id="search-boxstock"><span class="material-symbols-sharp">search</span>
                        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <!--  Start of Products Table   -->
                <section class="tableprofile">
                    <div class="table-profile">

                        <div class="table-product" id="searchStock">
                            <table class="content-table">
                                <thead>
                                    <tr>
                                        <th>ProductID</th>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "Select * from tblstock where archive = 'false' order by proid desc";
                                    $res = mysqli_query($conn, $sql);

                                    if ($res) {
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            $pid = $row['proid'];
                                            $pname = $row['prodname'];
                                            $cat = $row['category'];
                                            $desc = $row['description'];
                                            $prc = $row['price'];
                                            $qty = $row['quantity'];
                                            echo '<tr>
                                            <td>' . $pid . '</td>
                                            <td>' . $pname . '</td>
                                            <td>' . $cat . '</td>
                                            <td>' . $desc . '</td>
                                            <td>' . number_format($prc, 2) . '</td>
                                            <td>' . $qty . '</td>
                                            <td>
                                            <button name="selectprofile" data-modal="modal6" class="modal-open showSelectProduct" value="' . $pid . '"><span class="material-symbols-sharp archive">done</span></button>
                                            </td>
                                            </tr>';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <div class="modal-footer">
                    <div class="buttonflexright">
                        <button type="submit" class="cancel modal-close" title="Cancel">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal of Transaction History -->
    <div class="modal" id="modal8">
        <div class="modal-content">
            <div class="modal-header">
                <h1>View Transaction</h1>
                <div class="accrecsearch">
                    <div class="searchbar">
                        <input type="text" placeholder="Search here" id="search-boxtransact"><span class="material-symbols-sharp">search</span>
                        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <section class="tableprofile">
                    <div class="table-profile">
                        <table class="content-table tblhistory" id="searchTransaction">
                            <thead>
                                <tr>
                                    <th>Transaction ID</th>
                                    <th>Username</th>
                                    <th>Owner's Name</th>
                                    <th>Total Price</th>
                                    <th>Date</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "Select * from tbltransaction order by transactionid desc";
                                $res = mysqli_query($conn, $sql);

                                if ($res) {
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $tid = $row['transactionid'];
                                        $un = $row['username'];
                                        $op = $row['ownersname'];
                                        $tprc = $row['totalprice'];
                                        $date = $row['date'];
                                        echo '<tr>
                                        <td>' . $tid . '</td>
                                        <td>' . $un . '</td>
                                        <td>' . $op . '</td>
                                        <td>' . number_format($tprc, 2) . '</td>
                                        <td>' . $date . '</td>
                                        <td>
                                            <button name="printreceipt" data-modal="modal9" class="modal-open showPrintReceipt" value="' . $tid . '"><span class="material-symbols-sharp print">print</span></button>
                                        </td>
                                        </tr>';
                                    }
                                }
                                ?>

                            </tbody>

                        </table>
                    </div>
                </section>
                <div class="modal-footer">
                    <div class="buttonflexright">
                        <button type="submit" class="cancel modal-close" title="Cancel">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal of  Select Profile MessageBox -->
    <div class="modal" id="modal6">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Selecting Product</h1>
                <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
            </div>
            <div class="modal-body" id="selectProduct">

            </div>
        </div>
    </div>

    <!-- Modal of  Select Profile MessageBox -->
    <div class="modal">
        <div class="modal-content">
            <div class="modal-body" id="removeCart">

            </div>
        </div>
    </div>

    <!-- Modal of  Select Profile MessageBox -->
    <div class="modal" id="modal9">
        <div class="modal-content">
            <div class="centerreceipt">
                <h1><b>ANGONO ANIMAL CLINIC AND PET GROOMING CENTER</b></h1>
                <p>173 Ingal Bldg. M. L. Quezon Ave. </p>
                <p>San Isidro Angono, Rizal </p>
                <p>Cell. No.: 0921-502-2956 / 0966-456-8460</p>
            </div>
            <div class="modal-body" id="printReceipt">

            </div>
            <div class="buttonflex printreceipt-center" id="PrintButton">
                <button onclick="window.print()" class="savechanges" title="Print the receipt">Print</button>
                <button class="cancel modal-close" title="Cancel activity">Cancel</button>
            </div>
        </div>
    </div>

    </div>

    <?php include 'scriptingfiles.php'; ?>
    <script>
        $(document).ready(function() {
            // SELECT PROFILE DOCUMENT FORMS
            $(".showSelectProfile").click(function() {
                var selectprofileid = this.value;
                $("#selectProfile").load("submit.php", {
                    selectprofileID: selectprofileid
                })
            })
            $(".showSelectProduct").click(function() {
                var selectproductid = this.value;
                $("#selectProduct").load("submit.php", {
                    selectproductID: selectproductid
                })
            })
            $(".showRemoveCart").click(function() {
                var removecartid = this.value;
                $("#removeCart").load("submit.php", {
                    removecartID: removecartid
                })
            })
            $(".showPrintReceipt").click(function() {
                var printreceiptid = this.value;
                $("#printReceipt").load("submit.php", {
                    printreceiptID: printreceiptid
                })
            })
        })
        $(document).ready(function() {
            $('#search-box').on('keyup', function() {
                var queryselectprofile = $(this).val();
                $.ajax({
                    url: 'search.php',
                    method: 'POST',
                    data: {
                        search: 1,
                        queryselectprofile: queryselectprofile
                    },
                    success: function(data) {
                        $('#ownersName').html(data);
                    }
                });
            });
        });
        $(document).ready(function() {
            $('#search-boxstock').on('keyup', function() {
                var queryselectproduct = $(this).val();
                $.ajax({
                    url: 'search.php',
                    method: 'POST',
                    data: {
                        search: 1,
                        queryselectproduct: queryselectproduct
                    },
                    success: function(data) {
                        $('#searchStock').html(data);
                    }
                });
            });
        });
        $(document).ready(function() {
            $('#search-boxtransact').on('keyup', function() {
                var querytransaction = $(this).val();
                $.ajax({
                    url: 'search.php',
                    method: 'POST',
                    data: {
                        search: 1,
                        querytransaction: querytransaction
                    },
                    success: function(data) {
                        $('#searchTransaction').html(data);
                    }
                });
            });
        });
        $(document).ready(function() {
            $('#search-boxcart').on('keyup', function() {
                var queryaddtocart = $(this).val();
                $.ajax({
                    url: 'search.php',
                    method: 'POST',
                    data: {
                        search: 1,
                        queryaddtocart: queryaddtocart
                    },
                    success: function(data) {
                        $('#searchCart').html(data);
                    }
                });
            });
        });
    </script>

</body>

</html>