
<aside>
    <div class="top">
        <div class="logo">
            <a href="dashboard.php"><img src="../images/aac.jpg" alt="IVET Logo"></a>
        </div>
        <div class="close" id="close-btn">
            <span class="material-symbols-sharp">close</span>
        </div>
    </div>

    <div class="sidebar">
        <a class="decoration" href="dashboard.php">
            <span class="material-symbols-sharp">grid_view</span>
            <h3>Dashboard</h3>
        </a>
        <a style="display: <?php echo $display_style; ?>; display: <?php echo $display_stylea; ?>" href="useraccount.php">
            <span class="material-symbols-sharp">person</span>
            <h3>User Account</h3>
        </a>
        <a href="profile.php">
            <span class="material-symbols-sharp">pets</span>
            <h3>Customer</h3>
        </a>
        <a style="display: <?php echo $display_style; ?>" href="stockandaddstock.php">
            <span class="material-symbols-sharp">inventory</span>
            <h3>Stocks</h3>
        </a>
        <a style="display: <?php echo $display_style; ?>" href="productsandservices.php">
            <span class="material-symbols-sharp">medical_information</span>
            <h3>Transactions / Appointment</h3>
        </a>
        <a href="appointments.php">
            <span class="material-symbols-sharp">book_online</span>
            <h3>Appointments</h3>
        </a>
        <a style="display: <?php echo $display_style; ?>; display: <?php echo $display_stylea; ?>" href="audittrail.php">
            <span class="material-symbols-sharp">find_in_page</span>
            <h3>Audit Trail</h3>
        </a>
        <a style="display: <?php echo $display_stylea; ?>" href="reports.php">
            <span class="material-symbols-sharp">report</span>
            <h3>Reports</h3>
        </a>
        <a href="settings.php">
            <span class="material-symbols-sharp">settings</span>
            <h3>Settings</h3>
        </a>
        <a href="logout.php" type="button" onclick="return confirm('Are you sure you want to logout?')">
            <span class="material-symbols-sharp">logout</span>
            <h3>Logout</h3>
        </a>
    </div>
</aside>