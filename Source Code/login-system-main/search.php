

<?php
include 'connect.php';

if (isset($_POST['query'])) {
    $query = $_POST['query'];

$sql = "SELECT * FROM tbluseraccount WHERE username LIKE '%".$query."%'";
$result = mysqli_query($conn, $sql);

// display the results in tables
if (mysqli_num_rows($result) > 0) {
    ?>
    <table class="content-table table-fixed">
        <thead>
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Usertype</th>
            <th>Email Address</th>
            <th>Image</th>
            <th> </th>
        </tr>
    </thead> 
    <?php
    while ($row = mysqli_fetch_assoc($result)) { 
    ?>
    <tbody>
        <?php
                $un = $row['username'];
                $pw = $row['password'];
                $ut = $row['usertype'];
                $ea = $row['email'];
                $img = $row['image'];
        ?>
                <tr>
                    <td><?php echo $un; ?></td>
                    <td><?php echo $pw; ?></td>
                    <td><?php echo $ut; ?></td>
                    <td><?php echo $ea; ?></td>
                    <td>
                        <div class="profile-photo">
                            <img src="uploads/<?php echo $img; ?>">
                        </div>
                    </td>
                    <?php echo '
                                <td>
                                    <button class="modal-open showUpdateAccount" data-modal="modal1" value="'.$un.'" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
                                    <button class="modal-open showArchiveAccount" data-modal="modal2" value="'.$un.'"><span class="material-symbols-sharp archive" title="Archive the record">archive</span></button>
                                </td>';   ?>
                </tr>
            </tbody>
        <?php
            }
        ?>
    </table>

<?php
            
        } else {
            echo "<h2 style='text-align: center'>No results found</h2>";
        }
    }


        if (isset($_POST['querystock'])) {
            $querystock = $_POST['querystock'];
        
        $sql = "SELECT * FROM tblstock WHERE prodname LIKE '%".$querystock."%'";
        $result = mysqli_query($conn, $sql);
        
        // display the results in tables
        if (mysqli_num_rows($result) > 0) {
            ?>
            <table class="content-table table-fixed">
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
            <?php
            while ($row = mysqli_fetch_assoc($result)) { 
            ?>
                        <tbody>
                            <?php
                                $pid=$row['proid'];
                                $pname=$row['prodname'];
                                $cat=$row['category'];
                                $desc=$row['description']; 
                                $prc=$row['price'];
                                $qty=$row['quantity'];
                            ?>
                            <tr>
                            <td><?php echo $pid; ?></td>
                            <td><?php echo $pname; ?></td>
                            <td><?php echo $cat; ?></td>
                            <td><?php echo $desc; ?></td>
                            <td><?php echo $prc; ?></td>
                            <td><?php echo $qty; ?></td>
                            <?php echo '
                                <td>
                                <button class="modal-open showUpdateProduct" data-modal="modal1" value="'.$pid.'" ><span class="material-symbols-sharp edit" title="Edit this product">edit</span></button>
                                <button class="modal-open showArchiveProduct" data-modal="modal2" value="'.$pid.'"><span class="material-symbols-sharp archive" title="Archive the record">archive</span></button>
                                </td>';  ?>
                            </tr>

                        </tbody>
                <?php
                    }
                ?>
            </table>
        
        <?php
                    
                } else {
                    echo "<h2 style='text-align: center'>No results found</h2>";
                }

            }
                // close the database connection
                mysqli_close($conn);
         
?>

<?php 
    include 'scriptingfiles.php';
?>