
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <!-- Materical Icons Link -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Stylesheet  -->
    <link rel="stylesheet" href="../css/settings.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/aac.jpg"/>
</head>
<body>
    <div class="container">
        <?php  include 'aside.php'; ?>    

        <!--  Main Tag  -->
        <main>
            <section class="tableprofile">
                <h1>Category and Services</h1>
                <div class="table-profile">
                    <form action="" method="POST" >
                        <div class="formprofile">
                            <div> 
                                <input type="text" name="categoryid" placeholder="Enter Category ID" required>
                                <span>Category ID</span>
                            </div>
                            <div>
                                <input type="text" name="categoryname" placeholder="Enter Category Name" required>
                                <span>Category Name</span>
                            </div>

                        </div>
                            <div class="buttonflex">
                                <button name="saveprofile" type="submit" class="save" title="Save the record">Save</button>
                                <button name="saveprofile" type="submit" class="cancel" title="Clear all inputs">Clear</button>
                            </div>
                    </form>
                    <form action="" method="POST" >
                        <div class="formprofile">
                            <div> 
                                <input type="text" name="serviceid" placeholder="Enter Service ID" required>
                                <span>Service ID</span>
                            </div>
                            <div>
                                <input type="text" name="servicename" placeholder="Enter Service Name" required>
                                <span>Service Name</span>
                            </div>

                        </div>
                            <div class="buttonflex">
                                <button name="saveprofile" type="submit" class="save" title="Save the record">Save</button>
                                <button name="saveprofile" type="submit" class="cancel" title="Clear all inputs">Clear</button>
                            </div>
                    </form>
                </div>
            </section>

            <!--  End of profile   -->
            <section class="tableprofile">
                <div class="accrecsearch">
                    <h1>List of Tables</h1>
                </div>
                <div class="table-profile-category">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>CID</th>
                                    <th>Category Name</th>
                                    <th>       </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Item Name</td>
                                    <td>
                                    <button class="modal-open" name="savechanges" data-modal="modal1" title="Edit this record"><span class="material-symbols-sharp edit" >edit</span></button>
                                    <button class="modal-open" name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp remove" title="Remove this record">delete</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Item Name</th>
                                    <td>
                                    <button class="modal-open" name="savechanges" data-modal="modal1"><span class="material-symbols-sharp edit">edit</span></button>
                                    <button class="modal-open" name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp remove">delete</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Item Name</td>
                                    <td>
                                    <button class="modal-open" name="savechanges" data-modal="modal1" title="Edit this record"><span class="material-symbols-sharp edit" >edit</span></button>
                                    <button class="modal-open" name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp remove" title="Remove this record">delete</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Item Name</td>
                                    <td>
                                    <button class="modal-open" name="savechanges" data-modal="modal1" title="Edit this record"><span class="material-symbols-sharp edit" >edit</span></button>
                                    <button class="modal-open" name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp remove" title="Remove this record">delete</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Item Name</td>
                                    <td>
                                    <button class="modal-open" name="savechanges" data-modal="modal1" title="Edit this record"><span class="material-symbols-sharp edit" >edit</span></button>
                                    <button class="modal-open" name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp remove" title="Remove this record">delete</span></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>SID</th>
                                    <th>Service Name</th>
                                    <th>       </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Item Name</td>
                                    <td>
                                    <button class="modal-open" name="savechanges" data-modal="modal3" title="Edit this record"><span class="material-symbols-sharp edit">edit</span></button>
                                    <button class="modal-open" name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp remove" title="Remove this record">delete</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Item Name</th>
                                    <td>
                                    <button class="modal-open" name="savechanges" data-modal="modal3"><span class="material-symbols-sharp edit">edit</span></button>
                                    <button class="modal-open" name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp remove">delete</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Item Name</td>
                                    <td>
                                    <button class="modal-open" name="savechanges" data-modal="modal3" title="Edit this record"><span class="material-symbols-sharp edit" >edit</span></button>
                                    <button class="modal-open" name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp remove" title="Remove this record">delete</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Item Name</td>
                                    <td>
                                    <button class="modal-open" name="savechanges" data-modal="modal1" title="Edit this record"><span class="material-symbols-sharp edit" >edit</span></button>
                                    <button class="modal-open" name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp remove" title="Remove this record">delete</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Item Name</td>
                                    <td>
                                    <button class="modal-open" name="savechanges" data-modal="modal1" title="Edit this record"><span class="material-symbols-sharp edit" >edit</span></button>
                                    <button class="modal-open" name="archiveaccount" data-modal="modal2"><span class="material-symbols-sharp remove" title="Remove this record">delete</span></button>
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
        <div class="rightbottom">
        <h1>Dark Theme</h1>
            <div class="buttons">
                <h2>Enable Dark Mode</h2><br>
                <button id="dark-mode-toggle" class="theme-toggler">
                    <span class="material-symbols-sharp active">light_mode</span>
                    <span class="material-symbols-sharp ">dark_mode</span>
                </button>
            </div>
        </div>
        
        <!-- Start of Modal --> 
        <!-- Modal of Edit Category -->
        <div class="modal" id="modal1">
            <div class="modal-content">
                <div class="modal-header"><h1>Edit Category</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                    <div class="modal-body">
                    <div class="table-profile">
                    <form action="" method="POST" >
                        <div class="formprofile">
                            <div> 
                                <input type="text" name="categoryid" placeholder="Enter Item Name" required>
                                <span>Category ID</span>
                            </div>
                            <div>
                                <input type="text" name="categoryname" placeholder="Enter Category Name" required>
                                <span>Category Name</span>
                            </div>

                        </div>
                            <div class="buttonflex">
                                <button name="saveprofile" type="submit" class="save" title="Save the record">Save</button>
                                <button name="saveprofile" class="cancel modal-close" title="Cancel">Cancel</button>
                            </div>
                    </form>
                </div>

                    </div>
            </section>

                </div>
                    
            </div>
        </div>
        <!-- Modal of Remove record  MessageBox -->
        <div class="modal" id="modal2">
            <div class="modal-content">
                <div class="modal-header"><h1>Remove</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                <div class="modal-body"><h3>Are you sure you want to remove this record?</h3></div>
                    <div class="modal-footer">
                        <div class="buttonflexright">
                            <button name="savearchiveprofile" type="submit" class="yes">Yes</button>
                            <button type="submit" class="cancel no modal-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <!-- Modal of Edit Category -->
      <div class="modal" id="modal3">
            <div class="modal-content">
                <div class="modal-header"><h1>Edit Services</h1>
                    <button class="icon modal-close"><span class="material-symbols-sharp">close</span></button>
                </div>
                    <div class="modal-body">
                    <div class="table-profile">
                    <form action="" method="POST" >
                        <div class="formprofile">
                            <div> 
                                <input type="text" name="serviceid" placeholder="Enter Service ID" required>
                                <span>Service ID</span>
                            </div>
                            <div>
                                <input type="text" name="servicename" placeholder="Enter Service Name" required>
                                <span>Service Name</span>
                            </div>

                        </div>
                            <div class="buttonflex">
                                <button name="saveprofile" type="submit" class="save" title="Save the record">Save</button>
                                <button name="saveprofile" class="cancel modal-close" title="Cancel">Cancel</button>
                            </div>
                    </form>
                </div>

                    </div>
            </section>

                </div>
                    
            </div>
        </div>
        <!-- Modal of Edit Category -->
        <div class="modal" id="modal4">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Restore Stocks</h1>
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
                                    <td><button class="modal-open" name="restorestock" data-modal="modal3"><span class="material-symbols-sharp restore">unarchive</span></button></td>
                                </tr>
                                <tr>
                                    <td>Stock ID</td>
                                    <td>Item Name</th>
                                    <td>Category</td>
                                    <td>waonrawdwadwadwawawaadwadwaadwadwawawawawadwaidiptonn</td>
                                    <td>Quantity</td>
                                    <td><button class="modal-open" name="restorestock" data-modal="modal3"><span class="material-symbols-sharp restore">unarchive</span></button></td>
                                </tr>
                                <tr>
                                    <td>Stock ID</td>
                                    <td>Item Name</th>
                                    <td>Category</td>
                                    <td>waonrawdwadwadwawawaadwadwaadwadwawawawawadwaidiptonn</td>
                                    <td>Quantity</td>
                                    <td><button class="modal-open" name="restorestock" data-modal="modal3"><span class="material-symbols-sharp restore">unarchive</span></button></td>
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
        <!-- Modal of View Stock -->
        <div class="modal" id="modal5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>View Stocks</h1>
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
                                </tr>
                                <tr>
                                    <td>Stock ID</td>
                                    <td>Item Name</th>
                                    <td>Category</td>
                                    <td>waonrawdwadwadwawawaadwadwaadwadwawawawawadwaidiptonn</td>
                                    <td>Quantity</td>
                                </tr>
                                <tr>
                                    <td>Stock ID</td>
                                    <td>Item Name</th>
                                    <td>Category</td>
                                    <td>waonrawdwadwadwawawaadwadwaadwadwawawawawadwaidiptonn</td>
                                    <td>Quantity</td>
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

    <?php  include 'scriptingfiles.php';  ?>
</body>
</html>

