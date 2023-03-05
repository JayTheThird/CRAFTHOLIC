    <div class="User-login-register">

        <!-- Temp close -->
        <!-- <a><i class="fa-solid fa-magnifying-glass" id="search_box"></i></a> -->

        <!--insted of search using this  -->
        <a><i class="fa-solid fa-bell"></i></a>
        <a><i class="fa-solid fa-user" id="User-Menu"></i> </a>
        <?php
        $select_Rows = mysqli_query($conn, "SELECT * FROM `cart`") or die("Query Failed");
        $Row_Count = mysqli_num_rows($select_Rows);

        ?>
        <a href="ShopingCART.php"><i class="fa-solid fa-cart-shopping"></i><span><?php echo $Row_Count; ?></span></a>
    </div>


    <!-- For User Profile Slider -->
    <div id="User-slider">
        <div class="container">
            <h1>
                <?php
                if (isset($_SESSION['UserFirstName'], $_SESSION['UserLastName'])) {

                ?>
                    WELCOME,<span>
                        <?php
                        // echo "$_SESSION[UserID]";
                        echo "$_SESSION[UserFirstName] $_SESSION[UserLastName]";

                        ?>

                    </span>

                    <div class="othr-stuf">
                        <a onclick="track_order('Track-order')" href="#Track-order">Track order</a>
                        <p>
                            Want to Return a <a href="ReturnProduct.php">Product?</a>
                        </p>
                    </div>
                    <div class="user-btn">
                        <button class="normal" onclick="window.location.href='User_Logout.php';">Logout</button>
                    </div>
                <?php
                } else {
                ?>

                    <div class="user-btn">
                        <button class="normal" onclick="window.location.href='User_login.php';">login</button>
                    </div>
                <?php
                }
                ?>
            </h1>





        </div>


        <a id="User-Close"><i class="fa fa-times"></i></a>
    </div>

    <!-- For Mobile And Ipad  -->
    <div class="mobile">
        <a><i class="fa-solid fa-magnifying-glass mob-click" id="#search-btn" onclick="popup('search-btn')"></i></a>
        <a href="User_login.php"><i class="fa-solid fa-user mob-click"></i> </a>
        <a href="#"><i class="fa-solid fa-cart-shopping mob-click"></i></a>
        <a><i id="bar" class="fas fa-outdent mob-click"> </i></a>
    </div>