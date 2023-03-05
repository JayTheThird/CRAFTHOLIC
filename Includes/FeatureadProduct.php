<?php
// Db Connecting
require('/xampp/htdocs/craftholic/Includes/Connection.php');
// require('../Includes/config.php');


?>

<head>
    <link rel="stylesheet" href="../CSS//indexed.css">
</head>
<!-- Prodect Section -->
<section id="product-sec" class="section-p1 upcommin-prodcut">
    <h1>FEATURED <span>PRODUCTS.</span></h1>
    <p>Everything has a place, and everything in its place.</p>
    <div class="pro-container" id="pro-container">
        <?php
        // For Display 
        // $search = '';
        // $url_components = parse_url($_SERVER['REQUEST_URI']);
        // if (isset($url_components['query'])) {

        //     parse_str($url_components['query'], $params);
        //     $search = '';
        //     if (isset($params['search'])) {
        //         $search = $params['search'];
        //         if($params['search']){
        //             echo "<a href='WallDecor.php' class='normal Cart-Btn cart1'>Back</a>";
        //         }
        //     }
        // }

        // $params['search'];

        // $Select_Product = mysqli_query($conn, "SELECT * FROM `products` where P_names like '%$search%'");
        $Select_Product = mysqli_query($conn, "SELECT * FROM `products`");
        if (mysqli_num_rows($Select_Product) > 0) {
            while ($Fetch_Products = mysqli_fetch_assoc($Select_Product)) {
        ?>
                <div class="pro">
                    <form action="" method="post">
                        <img src="/craftholic/Admin/images/<?php echo $Fetch_Products['P_Image1']; ?>" alt=" Image Not Load">
                        <div class="des">
                            <span>@<?php echo $Fetch_Products['Category_Name']; ?></span>
                            <h5 id="the-list" class="PName"><?php echo $Fetch_Products['P_names']; ?></h5>
                            <h4> &#8360; <?php echo $Fetch_Products['P_price']; ?> </h4>
                        </div>

                        <button>
                            <a href="sproduct.php?id=<?php echo $Fetch_Products['P_ID']; ?>" class="normal Cart-Btn cart">View Product</a>
                        </button>
                    </form>
                </div>
        <?php
            };
        };

        ?>
    </div>
</section>

<script>
    function popup(search_name) {
        get_popup = document.getElementById(search_name);
        if (get_popup.style.display == "flex") {
            get_popup.style.display = "none";
        } else {
            get_popup.style.display = "flex";
        }
    }
</script>