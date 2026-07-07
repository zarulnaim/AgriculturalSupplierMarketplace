<?php



// Get category ID and validate it
$cid = isset($_GET['cid']) ? $_GET['cid'] : '';

$sql = "SELECT * FROM product"; // Replace 'products' with your table name
$result = $con->query($sql);

// Fetch categories
$categories_result = $con->query("SELECT DISTINCT category FROM product");

// Fetch latest products
$latest_products_result = $con->query("SELECT * FROM product ORDER BY product_id DESC LIMIT 2");

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Agri Hub">
    <meta name="keywords" content="Agri Hub, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agri Hub | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>

<section class="product spad">
<div class="container">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-3 col-md-5">
            <div class="sidebar">
                <div class="sidebar__item">
                    <h4>Department</h4>
                    <ul>
                        <?php while ($category_row = $categories_result->fetch_assoc()): ?>
                            <li><a href="shop-grid.php?cid=<?php echo urlencode($category_row['category']); ?>">
                                <?php echo htmlspecialchars($category_row['category']); ?>
                            </a></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
<!---------------------------------------------------------------------->
                <?php include('./LatestProducts.php');?>
<!---------------------------------------------------------------------->
            </div>
        </div>
<!------------------------------------------------------------------------------------------------------>
<div class="col-lg-9 col-md-7"> <!-----NI list Product-->

                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>16</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
<!-------------------------------------------------------------------------------------------------->
<?php include('./ListProductCid.php');?>
<!------------------------------------------------------------------------------------------->
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div> 


                <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>
