<?php
include 'connect.php';
if (isset($_GET["searchUserAccount"])) {
    $search = $_GET["searchUserAccount"];
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
        <tbody>
            <?php
            $sql = "Select * from tbluseraccount where username like '%$search%'";
            $res = mysqli_query($conn, $sql);

            if ($res) {
                while ($row = mysqli_fetch_assoc($res)) {
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
                                        <button class="modal-open showUpdateAccount" data-modal="modal1" value="' . $un . '" ><span class="material-symbols-sharp edit" title="Edit this account">edit</span></button>
                                        <button class="modal-open showArchiveAccount" data-modal="modal2" value="' . $un . '"><span class="material-symbols-sharp archive" title="Archive the record">archive</span></button>
                                    </td>';   ?>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
<?php
} 

if (isset($_GET["searchStock"])) {
    $searchstock = $_GET["searchStock"];
?>
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
                                    $sql = "Select * from tblstock where prodname like '%$searchstock%'";
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
<?php
}



?>
