<?php
include('includes/config.php');

$cid = isset($_GET['cid']) ? $_GET['cid'] : 'all';

if ($cid == 'all') {
    $ret = mysqli_query($con, "SELECT * FROM product");
} else {
    $ret = mysqli_query($con, "SELECT * FROM product WHERE category = '$cid'");
}

$num = mysqli_num_rows($ret);
if ($num > 0) {
    while ($row = mysqli_fetch_array($ret)) { ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
    <div class="featured__item">
        <!-- Use data-setbg to set the background image -->
        <?php
// Prepend "Farmer/" to the image path dynamically
$imagePath = 'Farmer/' . $row['product_pic'];
?>
<div class="featured__item__pic" style="background-image: url('<?php echo htmlspecialchars($imagePath); ?>');">

    <!-- Content like icons or buttons on top of the background image -->
    <ul class="featured__item__pic__hover">
        <li><a href="#"><i class="fa fa-heart"></i></a></li>
        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
    </ul>


        </div>
        <div class="featured__item__text">
            <h6><a href="shop-detailsS.php?pid=<?php echo htmlentities($row['product_id']); ?>">
                <?php echo htmlentities($row['name']); ?>
            </a></h6>
            <h5>RM<?php echo htmlentities($row['price']); ?></h5>
            
        </div>
    </div>
</div>

    <?php } 
} else { ?>
    <div class="col-lg-12">
        <h3>No Products Found</h3>
    </div>
    
<?php } ?>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Convert data-setbg to background-image
        const setBgElements = document.querySelectorAll('.set-bg');
        setBgElements.forEach(function (element) {
            const bgImage = element.getAttribute('data-setbg');
            if (bgImage) {
                element.style.backgroundImage = `url('${bgImage}')`;
                element.style.backgroundSize = 'cover';
                element.style.backgroundPosition = 'center';
            }
        });
    });
</script>
