	
<!---------------------------------------------------------------------------------------->

<?php
// Include database connection// Make sure this file initializes $conn

// Fetch all products from the database
$sql = "SELECT * FROM product where category='$cid'";// Replace 'product' with your actual table name
$result = $con->query($sql);

// Check if products exist
if ($result->num_rows > 0) {
    echo '<div class="row">';
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="product__item">
            <div class="featured__item__pic" style="background-image: url('<?php echo htmlspecialchars($imagePath); ?>');">
                    <ul class="product__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6><a href="shop-detailsS.php?pid=<?php echo htmlentities($row['product_id']); ?>">
                        <?php echo htmlentities($row['name']); ?>
                    </a></h6>
                    <h5>RM<?php echo htmlentities($row['price']); ?></h5>
                </div>
            </div>
        </div>
        <?php
    }
    echo '</div>';
} else {
    echo "<p>No products found.</p>";
}
?>
<!------------------------------------------------------------------------------------------->
                   
      
                
           
