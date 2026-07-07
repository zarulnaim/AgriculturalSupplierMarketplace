<?php
// Include database connection
// Fetch only 2 products
$sql = "SELECT * FROM product ORDER BY product_id DESC LIMIT 2"; // Replace 'created_at' with your timestamp column if applicable
$result = mysqli_query($con, $sql);

if (!$result) {
    die("SQL Error: " . mysqli_error($con)); // Handle query error
}

if (mysqli_num_rows($result) > 0) {
?>

<link rel="stylesheet" href="css/latest-product.css">

    <div class="sidebar__item">
        <div class="latest-product__text">
            <h4>Latest Products</h4>
              <div class="latest-product__slider owl-carousel">

<?php
while ($row = mysqli_fetch_assoc($result)) {
?>
                 <div class="latest-prdouct__slider__item">
    <!-- Product Link -->
    <a href="shop-detailsS.php?pid=<?php echo htmlentities($row['product_id']); ?>" class="latest-product__item">
        
        <!-- Image Section -->
        <div class="latest-product__item__pic">
            <?php
            // Generate the image path dynamically
            $imagePath = 'Farmer/' . $row['product_pic'];
            ?>
            <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="Product Image">
        </div>

        <!-- Text Section -->
        <div class="latest-product__item__text">
            <h6 class="product-name"><?php echo htmlentities($row['name']); ?></h6>
            <span class="product-price">RM<?php echo htmlentities($row['price']); ?></span>
        </div>
    </a>
</div>






<?php
                }
?>
            </div>
        </div>
    </div>
    <?php
} else {
    echo "<p>No products available.</p>";
}
?>
