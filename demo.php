<?php
// Step 1: Include the database connect
include('includes/configg.php');

// Get category ID and validate it



// Step 2: Fetch Products from the Database
$sql = "SELECT * FROM product"; // Replace 'products' with your table name
$result = $conn->query($sql);
?>

<div class="col-lg-9 col-md-7">

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
                   

<!---------------------------------------------------------------------------------------->
<?php
            // Step 3: Display Products
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
<div class="col-lg-9 col-md-7">
         <div class="filter__item">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="admin/productimages/<?php echo htmlentities($row['product_id']); ?>/<?php echo htmlentities($row['product_pic']); ?>">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                        <h6><a href="shop-detailsS.php?pid=<?php echo htmlentities($row['product_id']); ?>"><?php echo htmlentities($row['name']); ?></a></h6>
                        <h5>RM<?php echo htmlentities($row['price']); ?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            } else {
                echo "<p class='text-center'>No products found.</p>";
            }
            ?>
<!------------------------------------------------------------------------------------------->
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
</section>
</body>

</html>
<?php
// Step 4: Close the Connection
$conn->close();
?>