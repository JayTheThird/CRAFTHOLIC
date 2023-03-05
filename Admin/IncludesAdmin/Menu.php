<section id="Menu">
    <div class="logo">
        <h2><a href="../Admin/CRAFTHOLIC-admin.php"> CRAFTHOLIC</a></h2>
    </div>

    <div class="items">
        <li>
            <i class="fa-solid fa-chart-pie"></i>
            <a href="../Admin/CRAFTHOLIC-admin.php">Dashboard</a>
        </li>
        <li>
            <i class="fa-solid fa-bag-shopping"></i>
            <a href="../Admin/Admin-orders.php">Orders</a>
        </li>
        <li>
            <i class="fa-solid fa-circle-plus"></i>
            <a href="../Admin/Admin-AddProducts.php">Add Products</a>
        </li>
        <li>
            <i class="fa-solid fa-rotate-left"></i>
            <a href="#">Returns/Replace Products</a>
        </li>
        <li>
            <i class="fa-solid fa-comment-dots"></i>
            <a href="Reports.php">Reports</a>
        </li>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <a href="Admin_Logout.php" class="normal">Logout</a>
        </form>


    </div>

</section>