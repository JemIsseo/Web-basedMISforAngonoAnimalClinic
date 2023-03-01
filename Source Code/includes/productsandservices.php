
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
    <link rel="shortcut icon" type="image/x-icon" href="../images/aac.jpg"/>
</head>
<body>
    <div class="container">
        <?php  include 'aside.php'; ?>    

        <!--  Main Tag  -->
        <main>
            <section class="tableprofile">
                <h1>Products Available</h1>
                <div class="table-profile">
                    <form action="" method="POST" >
                        <div class="formprofile">
                            <div> 
                                <input type="text" name="petname">
                                <span>Owner's Name</span>
                            </div>
                            <div> 
                                <span class="material-symbols-sharp markdown">expand_more</span>
                                <select name="usertype" id="ut" >
                                <option value="Choose">...</option>
                                <option value="Admin">Medicine</option>
                                <option value="Secretary">Food</option>    
                                <option value="Secretary">Accessories</option> 
                                </select>
                                <span>Category</span>
                            </div>

                            <div>
                                <input type="text" name="description">
                                <span>Item Name</span>
                            </div>
                            <div>
                                <input type="text" name="quantity">
                                <span>Quantity</span>
                            </div>
                        </div>
                            <div class="buttonflex">
                                <button name="saveprofile" type="submit" class="save" title="Add to order cart">Add</button>
                                <button name="saveprofile" type="submit" class="cancel" title="Clear all inputs">Clear</button>
                            </div>

                    </form>
                    <div class="buttonscart">
                                <div class="buttonmodify">
                                    <button class="modal-open" data-modal="modal4" title="View list of profile"><span class="material-symbols-sharp">person</span><h3>View Profile</h3></button> 
                                </div>
                                <div class="buttonmodify">
                                    <button class="modal-open" data-modal="modal5" title="View list of products"><span class="material-symbols-sharp">place_item</span><h3>View Products</h3></button> 
                                </div>
                    </div>
                </div>
            </section>

            <!--  End of profile   -->
            <section class="tableprofile">
                <div class="accrecsearch">
                    <h1>Order Cart</h1>
                    <div class="searchbar">
                        <input type="text" placeholder="Search here"><span class="material-symbols-sharp">search</span>
                    </div>
                </div>
                <div class="table-profile">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Owner's Name</th>
                                    <th>Item Name</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Item Name</td>
                                    <td>Category</td>
                                    <td>150</td>
                                    <td>Category</td>
                                    <td>150</td>
                                    <td>11/30/22</td>
                                    <td>
                                    <button class="modal-open" name="savechanges" data-modal="modal1"><span class="material-symbols-sharp remove">delete</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Item Name</td>
                                    <td>Category</td>
                                    <td>150</td>
                                    <td>Category</td>
                                    <td>150</td>
                                    <td>11/30/22</td>
                                    <td>
                                    <button class="modal-open" name="savechanges" data-modal="modal1"><span class="material-symbols-sharp remove">delete</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Item Name</td>
                                    <td>Category</td>
                                    <td>150</td>
                                    <td>Category</td>
                                    <td>150</td>
                                    <td>11/30/22</td>
                                    <td>
                                    <button class="modal-open" name="savechanges" data-modal="modal1"><span class="material-symbols-sharp remove">delete</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Item Name</td>
                                    <td>Category</td>
                                    <td>150</td>
                                    <td>Category</td>
                                    <td>150</td>
                                    <td>11/30/22</td>
                                    <td>
                                    <button class="modal-open" name="savechanges" data-modal="modal1"><span class="material-symbols-sharp remove">delete</span></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </section>
        </main>

        <!--  End of Main Tag  -->
        <?php   include 'systemaccountanddate.php'; ?>
        <!--  Start of Retrive section  -->
        <div class="schedule">
                <div class="schedule-header">
                <h2>Services Offer</h2>
                  <div class="buttonmodify">
                     <button class="modal-open" data-modal="modal3" title="Check transaction history"><span class="material-symbols-sharp">history</span><h3>History</h3></button> 
                 </div>
                </div>
                <div class="schedinfo">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>SID</th>
                                    <th>Service</th>
                                    <th>Price</th>
                                    <th>  </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Consultation</td>
                                    <td>600</td>
                                     <td>
                                    <button name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp archive">add</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Grooming</td>
                                    <td>600</td>
                                     <td>
                                    <button name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp archive">add</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Vaccination</td>
                                    <td>600</td>
                                     <td>
                                    <button name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp archive">add</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Boarding</td>
                                    <td>600</td>
                                     <td>
                                    <button name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp archive">add</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Deworming</td>
                                    <td>600</td>
                                     <td>
                                    <button name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp archive">add</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Surgery</td>
                                    <td>2000</td>
                                     <td>
                                    <button name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp archive">add</span></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="buttonflex">
                                <button name="saveprofile" type="submit" class="save" title="Proceed to save">Save</button>
                                <button name="saveprofile" type="submit" class="cancel" title="Clear checked services">Clear</button>
                        </div>
                </div>
            </div>
        </div>
        
        <!-- Start of Modal --> 
        <!-- Modal of Edit Stock -->
        <div class="modal" id="modal1">
            <div class="modal-content">
                <div class="modal-header"><h1>Edit Profile</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                    <div class="modal-body">
               
                        <section class="tableprofile">
                            <div class="table-profile">
                        <form action="" method="POST" >
                            <div class="formprofile">
                                <div> 
                                    <input type="text" name="petname" placeholder="Enter Item Name" >
                                    <span>Item Name</span>
                                </div>
                                <div> 
                                    <span class="material-symbols-sharp markdown">expand_more</span>
                                    <select name="usertype" id="ut" >
                                    <option value="Choose">Choose...</option>
                                    <option value="Admin">Medicine</option>
                                    <option value="Secretary">Food</option>    
                                    <option value="Secretary">Accessories</option> 
                                    </select>
                                    <span>Category</span>
                                </div>

                                <div>
                                    <input type="text" name="description" placeholder="Enter Description" >
                                    <span>Description</span>
                                </div>
                                <div>
                                    <input type="text" name="quantity" placeholder="Enter Quantity">
                                    <span>Quantity</span>
                                </div>
                           
                            </div>
                        </form>
                </div>
            </section>

                </div>
                    <div class="modal-footer">
                        <div class="buttonflexright">
                            <button name="updateprofile" type="submit" class="savechanges" title="Save Record">Save Changes</button>
                            <button type="submit" class="cancel modal-close" title="Cancel">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal of  Select Profile MessageBox -->
        <div class="modal" id="modal2">     
            <div class="modal-content">
                <div class="modal-header"><h1>Selecting Profile</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body"><h3>Are you sure you want to select this record?</h3></div>
                    <div class="modal-footer">
                        <div class="buttonflexright">
                            <button name="savearchiveprofile" type="submit" class="yes">Yes</button>
                            <button type="submit" class="cancel no modal-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal of Restore Stock MessageBox -->
        <div class="modal" id="modal3">
            <div class="modal-content">
                <div class="modal-header"><h1>Unarchive Stock</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body"><h3>THIS IS TABLE TRANSACTION HISTORY</h3></div>
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
                        <input type="text" placeholder="Search here"><span class="material-symbols-sharp">search</span>
                        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                        </div>
                    </div>
                </div> 
                   
                <div class="modal-body">
                <section class="tableprofile">
                <div class="table-profile">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>ProfileID</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Sex</th>
                                    <th>Weight</th>
                                    <th>Owner</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>        </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Choco</td>
                                    <td>3</td>
                                    <td>Male</td>
                                    <td>15kg</td>
                                    <td>Irene Cruz</td>
                                    <td>09345678821</td>
                                    <td>CruzIrene@gmail.com</td>
                                    <td>
                                    <button name="archiveaccount" class="modal-open" ><span class="material-symbols-sharp archive" title="Select the record">done</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Brownie</td>
                                    <td>5</td>
                                    <td>Male</td>
                                    <td>20kg</td>
                                    <td>Stephanie Corpuz</td>
                                    <td>09125568219</td>
                                    <td>StephCorpuz@gmail.com</td>
                                    <td>
                                    <button name="archiveaccount"><span class="material-symbols-sharp archive">done</span></button>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Chanel</td>
                                    <td>4</td>
                                    <td>Female</td>
                                    <td>4kg</td>
                                    <td>Michelle Nervez</td>
                                    <td>09055459215</td>
                                    <td>mitchnervez22@gmail.com</td>
                                    <td>
                                    <button name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp archive">done</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Antibiotic</td>
                                    <td>5</td>
                                    <td>12/07/2022</td>
                                    <td>12/01/2022</td>
                                    <td>12/01/2022</td>
                                    <td>12/01/2022</td>
                                    <td>12/01/2022</td>
                                    <td>
                                    <button name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp archive">done</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Beef Jerky Food</td>
                                    <td>10</td>
                                    <td>12/10/2022</td>
                                    <td>12/01/2022</td>
                                    <td>12/01/2022</td>
                                    <td>12/01/2022</td>
                                    <td>12/01/2022</td>
                                    <td>
                                    <button name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp archive">done</span></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </section>
                </div>
            </div>
        </div>
        <!-- Modal of Select Profile -->
        <div class="modal" id="modal5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Select Profile</h1>
                    <div class="accrecsearch">
                        <div class="searchbar">
                        <input type="text" placeholder="Search here"><span class="material-symbols-sharp">search</span>
                        <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                        </div>
                    </div>
                </div> 
                   
                <div class="modal-body">
                <section class="tableprofile">
                    <div class="table-profile">
                        <table class="content-table table-archive">
                            <thead>
                                <tr>
                                    <th>Stock ID</th>
                                    <th>Item Name</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>       </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Stock ID</td>
                                    <td>Item Name</td>
                                    <td>Category</td>
                                    <td>waonrawdwadwadwawawaadwadwaadwadwawawawawadwaidipton</td>
                                    <td>Quantity</th>
                                    <td>
                                    <button name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp archive">done</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Stock ID</td>
                                    <td>Item Name</th>
                                    <td>Category</td>
                                    <td>waonrawdwadwadwawawaadwadwaadwadwawawawawadwaidiptonn</td>
                                    <td>Quantity</td>
                                    <td>
                                    <button name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp archive">done</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Stock ID</td>
                                    <td>Item Name</th>
                                    <td>Category</td>
                                    <td>waonrawdwadwadwawawaadwadwaadwadwawawawawadwaidiptonn</td>
                                    <td>Quantity</td>
                                    <td>
                                    <button name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp archive">done</span></button>
                                    </td>
                                </tr>
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

    <?php include 'scriptingfiles.php'; ?>
</body>
</html>

