
<?php 
    include 'connect.php'; 

    $s=mysqli_query($conn,"select * from tblcategory");

    if(isset($_POST['saveproduct'])){
     $pid = $_POST['proid'];
    $pname = $_POST['prodname'];
    $cat = $_POST['category'];
    $desc = $_POST['description'];
    $prc = $_POST['price'];
    $qty = $_POST['quantity'];

    $sql = "insert into tblstock(prodname, category, description, price, quantity) 
            values('$pname','$cat','$desc','$prc','$qty')";
    $res = mysqli_query($conn,$sql);
    if($res) { ?>
            <div class="statusmessagesuccess" id="close">
                  <h2>Product Added Successfully!</h2>
                  <button class="icon"><span class="material-symbols-sharp">close</span></button>
            </div>
<?php 
    } 
    else {
        die(mysqli_error($conn));
        }
    }

    // UPDATE PRODUCT STATEMENT 
    if(isset($_POST['updateproduct'])){
        $pid = $_POST['proid'];
        $pname = $_POST['prodname'];
        $cat = $_POST['category'];
        $desc = $_POST['description'];
        $prc = $_POST['price'];
        $qty = $_POST['quantity'];

        $sql = "update tblstock set prodname ='$pname',
                category ='$cat', description='$desc', price='$prc', quantity='$qty'
                where proid= '$pid'";
        $res = mysqli_query($conn,$sql);
        if($res) {?>  
            <div class="statusmessagesuccess" id="close">
                <h2>Product Updated Successfully!</h2>
                <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
            </div>
            
        <?php  
        } 
        else {
            die(mysqli_error($conn));
        }
    }

    // archive statement
    if(isset($_POST['archiveproduct'])){
            $pid = $_POST['proid'];
            $pname = $_POST['prodname'];
            $cat = $_POST['category'];
            $desc = $_POST['description'];
            $prc = $_POST['price'];
            $qty = $_POST['quantity'];
        
        $sql = "insert into tblarcstock(proid, prodname, category, description, price, quantity) 
                values('$pid','$pname','$cat','$desc','$prc','$qty')";
        $res = mysqli_query($conn,$sql);
        if($res) {
            if ($pid = $_POST['proid']) {
                $sql = "delete from tblstock where proid= '$pid'";
                $res = mysqli_query($conn, $sql);
            }
            ?>  
            <div class="statusmessagesuccesslight" id="close">
                <h2>Product has been archived</h2>
                <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
            </div>
            
        <?php  
        } else {
            die(mysqli_error($conn));
        }
    }

    // restore statement
    if(isset($_POST['restoreproduct'])){
            $pid = $_POST['proid'];
            $pname = $_POST['prodname'];
            $cat = $_POST['category'];
            $desc = $_POST['description'];
            $prc = $_POST['price'];
            $qty = $_POST['quantity'];
        
        $sql = "insert into tblstock(proid, prodname, category, description, price, quantity) 
                values('$pid','$pname','$cat','$desc','$prc','$qty')";
        $res = mysqli_query($conn,$sql);
        if($res) {
            if ($pid = $_POST['proid']) {
                $sql = "delete from tblarcstock where proid= '$pid'";
                $res = mysqli_query($conn, $sql);
                ?>  
            <div class="statusmessagesuccess" id="close">
                <h2>Product has been restored!</h2>
                <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
            </div>
            
        <?php  
            }
        } 
        else {
            die(mysqli_error($conn));
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock and Add Stock</title>
    <!-- Materical Icons Link -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Stylesheet  -->
    <link rel="stylesheet" href="../css/stockandaddstock.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/aac.jpg"/>
</head>
<body>
    <div class="container">
        <?php  include 'aside.php'; ?>    

        <!--  Main Tag  -->
        <main>

            <!--  Start of Products Table   -->
            <section class="tableprofile">
            <div class="accrecsearch">
                    <h1>Products</h1>
                    <div class="searchbar">
                        <input type="text" placeholder="Search here" onkeyup="searchStock(this.value)" ><span class="material-symbols-sharp">search</span>
                    </div>
            </div>
            <div class="table-profile" >
               
                <div class="table-product" id="searchStock" >
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>ProductID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>        </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                    $sql = "Select * from tblstock";
                                    $res= mysqli_query($conn,$sql);

                                    if($res){
                                    while($row=mysqli_fetch_assoc($res)){
                                    $pid=$row['proid'];
                                    $pname=$row['prodname'];
                                    $cat=$row['category'];
                                    $desc=$row['description']; 
                                    $prc=$row['price'];
                                    $qty=$row['quantity'];
                                    echo '<tr>
                                    <td>'.$pid.'</td>
                                    <td>'.$pname.'</td>
                                    <td>'.$cat.'</td>
                                    <td>'.$desc.'</td>
                                    <td>'.$prc.'</td>
                                    <td>'.$qty.'</td>
                                    <td>
                                    <button class="modal-open showUpdateProduct" data-modal="modal1" value="'.$pid.'" ><span class="material-symbols-sharp edit" title="Edit this product">edit</span></button>
                                    <button class="modal-open showArchiveProduct" data-modal="modal2" value="'.$pid.'"><span class="material-symbols-sharp archive" title="Archive the record">archive</span></button>
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

            <section class="tableproduct">
                <h1>Add Product</h1>
                <div class="table-profile">
                    <form action="" method="POST" >
                        <div class="formprofile">
                            <div> 
                                <input type="text" name="proid" placeholder="Enter Product ID" required>
                                <span>Product ID</span>
                            </div>
                            <div> 
                                <input type="text" name="prodname" placeholder="Enter Item Name" required>
                                <span>Product Name</span>
                            </div>
                            <div>  
                                <select class="radiobtn" name="category" id="ut" required> 
                                    <option value="">Select Category</option>
                                <?php
                                        while ($r = mysqli_fetch_array($s)) {
                                ?>
                                        <option value="<?php echo $r['category']; ?>"><?php echo $r['category']; ?> </option>
                                        <?php
                                            }
                                        ?>
                                </select>Category
                            </div>

                            <div>
                                <input type="text" name="description" placeholder="Enter Description" required>
                                <span>Description</span>
                            </div>
                            <div>
                                <input type="text" name="price" placeholder="Enter Price" required>
                                <span>Price</span>
                            </div>
                            <div>
                                <input type="text" name="quantity" placeholder="Enter Quantity" required>
                                <span>Quantity</span>
                            </div>
                           
                        </div>
                            <div class="buttonflex">
                                <button name="saveproduct" type="submit" class="save" title="Save the record">Save</button>
                                <button class="cancel" title="Clear all inputs" onclick="clearBtnStock()" >Clear</button>
                            </div>
                    </form>
                </div>
            </section>
        </main>

        <!--  End of Main Tag  -->
        <?php   include 'systemaccountanddate.php'; ?>
        <!--  Start of Retrive section  -->
        <div class="rightbottom">
        <h2>Restore and Refresh Product</h2>
            <div>
                <div class="buttonmodify">
                    <button title="Restore archive Product" class="modal-open" data-modal="modal4"><span class="material-symbols-sharp">unarchive</span>Restore Product</button> 
                </div>
                <div class="buttonmodify">
                    <button title="Refresh Product"><span class="material-symbols-sharp">refresh</span>Refresh Product</button> 
                </div>
            </div>
        </div>
        
        <!-- Start of Modal --> 
        <!-- Modal of Edit Product -->
        <div class="modal" id="modal1">
            <div class="modal-content">
                <div class="modal-header"><h1>Edit Product</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="table-product" id="updateProduct">
                    
                </div>
            </section>              
            </div>
        </div>
        <!-- Modal of Archive Product MessageBox -->
        <div class="modal" id="modal2">
            <div class="modal-content">
                <div class="modal-header"><h1>Archive Product</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body" id="archiveProduct">
                </div>
                </div>
            </div>
        </div>
        <!-- Modal of Restore Product MessageBox -->
        <div class="modal" id="modal3">
            <div class="modal-content">
                <div class="modal-header"><h1>Unarchive Product</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body" id="restoreProduct">
                </div>
            </div>
        </div>

        <div class="modal" id="modal4">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Restore Product</h1>
                    <div class="accrecsearch">
                        <div class="searchbar">
                        <input type="text" placeholder="Search here"><span class="material-symbols-sharp">search</span>
                        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                        </div>
                    </div>
                </div> 
                   
                <div class="modal-body">
                    <section class="tableproduct">
                    <div class="table-product" id="searchresult">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>        </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $sql = "Select * from tblarcstock";
                                    $res= mysqli_query($conn,$sql);

                                    if($res){
                                    while($row=mysqli_fetch_assoc($res)){
                                    $pid=$row['proid'];
                                    $pname=$row['prodname'];
                                    $cat=$row['category'];
                                    $desc=$row['description']; 
                                    $prc=$row['price'];
                                    $qty=$row['quantity'];
                                    echo '<tr>
                                    <td>'.$pid.'</td>
                                    <td>'.$pname.'</td>
                                    <td>'.$cat.'</td>
                                    <td>'.$desc.'</td>
                                    <td>'.$prc.'</td>
                                    <td>'.$qty.'</td>
                                    <td>
                                    <button class="modal-open showRestoreProduct" data-modal="modal3" value="'.$pid.'" ><span class="material-symbols-sharp restore" title="Restore this product">unarchive</span></button>
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

    </div>

    <?php  include 'scriptingfiles.php';  ?>
    <script>
           $(document).ready(function() {
             // USERACCOUNT DOCUMENT FORMS
            $(".showUpdateProduct").click(function() {
                var productid = this.value;
                $("#updateProduct").load("submit.php", {
                    productID: productid
                })
            })
            $(".showArchiveProduct").click(function() {
                var proarchiveid = this.value;
                $("#archiveProduct").load("submit.php", {
                    proarchiveID: proarchiveid
                })
            })
            $(".showRestoreProduct").click(function() {
                var prorestoreid = this.value;
                $("#restoreProduct").load("submit.php", {
                    prorestoreID: prorestoreid
                })
            })
        })

    </script>

</body>
</html>