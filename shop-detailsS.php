<?php 
session_start();
error_reporting(0);
include('includes/config.php');

$pid=intval($_GET['pid']);



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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">


    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/shop-details.css">
</head>

<body>

<?php include('includes/header2.php');?>

<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Vegetable’s Package</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <a href="./index.html">Vegetables</a>
                            <span>Vegetable’s Package</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
<!-------------------------------------------------------------------------------------------------------------->
    <!-- Product Details Section Begin -->


    
<!--------------------------------stil under construct----------------------------------------------->
    <?php 
$ret=mysqli_query($con,"select * from product where product_id='$pid'");
while($row=mysqli_fetch_array($ret))
{

?>

    <section class="product-details spad">
    <div class="container">
        <div class="row">
            <!-- Product Image Section -->
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <!-- Main Product Image -->
                    <div class="product__details__pic__item">
                        <?php
                        // Generate the main image path dynamically
                        $imagePath = 'Farmer/' . $row['product_pic'];
                        ?>
                        <img class="product__details__pic__item--large" 
                             src="<?php echo htmlspecialchars($imagePath); ?>" 
                             alt="Product Image">
                    </div>

                    <!-- Slider Thumbnails -->
                    <div class="product__details__pic__slider owl-carousel">
                        <?php
                        // Example: Display multiple thumbnails dynamically
                        // Add more images if available in your database or array
                        $thumbnails = [
                            'Farmer/' . $row['product_pic'], 
                            'Farmer/' . $row['product_pic1'], 
                            'Farmer/' . $row['product_pic2'], 
                            'Farmer/' . $row['product_pic3'], 
                        ];

                        foreach ($thumbnails as $thumbnail) {
                            ?>
                            <img data-imgbigurl="<?php echo htmlspecialchars($thumbnail); ?>" 
                                 src="<?php echo htmlspecialchars($thumbnail); ?>" 
                                 alt="Thumbnail Image">
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>


<!--------------------------------stil under construct----------------------------------------------->





                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                        <div class="product__details__price">RM <?php echo htmlspecialchars($row['price']); ?></div>
<?php ?>
<?php
$ret=mysqli_query($con,"select farmer.username as productName from farmer join product on farmer.farmer_id=product.farmer_id  where product.product_id='$pid'");
while ($row=mysqli_fetch_array($ret)) {

?>
                        <ul>
                            <li><b>From</b> <span class="value"><?php echo htmlspecialchars($row['productName']); ?></span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <?php 
$ret=mysqli_query($con,"select * from product where product_id='$pid'");
while($row=mysqli_fetch_array($ret))
{

?>
                            <li><b>Scale</b><span class="value"><?php echo htmlspecialchars($row['scale']); } ?> : KG</span></li>
                        </ul>
<?php } ?>
                  
<?php
// Fetch the farmer's details from the database
$ret = mysqli_query($con, "SELECT farmer.username, farmer.phone_no, farmer.email 
                           FROM farmer 
                           JOIN product ON farmer.farmer_id = product.farmer_id  
                           WHERE product.product_id = '$pid'");

while ($row = mysqli_fetch_array($ret)) {
    // Fetch farmer's WhatsApp and Email for dynamic links
    $whatsapp = $row['phone_no'];
    $email = $row['email'];
?>
                        <!-- WhatsApp Button -->
                        <a href="https://wa.me/<?php echo $whatsapp; ?>" target="_blank" class="btn btn-success btn-lg">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>

                        <!-- Email Button -->
                        <a href="mailto:<?php echo $email; ?>" class="btn btn-success btn-lg">
                            <i class="fa fa-envelope"></i> 
                        </a>
                    </div>
                </div>
<?php 
    } // End of contact details loop
?>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Description</a>
                            </li>
                        </ul>
                        <?php 
$ret=mysqli_query($con,"select * from product where product_id='$pid'");
while($row=mysqli_fetch_array($ret))
{

?>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Product Information</h6>
                                    <p><?php echo htmlspecialchars($row['descript']); ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>




    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -------------------------------------------------------------------->
    <?php
// Step 1: Get the farmer's ID and username based on the product ID
$farmerQuery = mysqli_query($con, "SELECT farmer.farmer_id, farmer.username AS farmerName 
                                    FROM farmer 
                                    JOIN product ON farmer.farmer_id = product.farmer_id 
                                    WHERE product.product_id = '$pid'");

// Fetch the farmer's details
$farmerData = mysqli_fetch_assoc($farmerQuery);
$farmerId = $farmerData['farmer_id']; // Farmer ID
$farmerName = $farmerData['farmerName']; // Farmer's username

?>

<section class="from-same-farmer-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from__same__farmer__title">
                    <h2>More From <?php echo htmlspecialchars($farmerName); ?></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <?php 
            // Step 2: Fetch all products by the same farmer, excluding the current product
            $productQuery = mysqli_query($con, "SELECT * FROM product WHERE farmer_id = '$farmerId' AND product_id != '$pid'");

            // Step 3: Loop through the products and display them
            while ($product = mysqli_fetch_assoc($productQuery)) {
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <!-- Product Image Section -->
                        <div class="product__item__pic" 
     style="background-image: url('Farmer/<?php echo htmlentities($product['product_pic']); ?>');">
    <ul class="product__item__pic__hover">
        <li><a href="#"><i class="fa fa-heart"></i></a></li>
        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
    </ul>
</div>

                        <!-- Product Text Section -->
                        <div class="product__item__text">
                            <h6><a href="shop-detailsS.php?pid=<?php echo htmlentities($product['product_id']); ?>">
                                <?php echo htmlentities($product['name']); ?>
                            </a></h6>
                            <h5>RM<?php echo htmlentities($product['price']); ?></h5>
                        </div>
                    </div>
                </div>
            <?php } // End of product loop ?>
        </div>
    </div>
</section>

    <!-- Related Product Section End -->

    <!------------------- Footer Section Begin ------------------------------------------------->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 6 CasaView Cybersouth Sepang 63000 Selangor</li>
                            <li>Phone: +60 11 1173 8656</li>
                            <li>Email: muhdsoleh7399@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
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