<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <ul id="category-list">
                        <li data-category="all" class="active">All</li>
                        <?php 
                        $sql = mysqli_query($con, "SELECT id, categoryName FROM category");
                        while ($row = mysqli_fetch_array($sql)) { ?>
                            <li data-category="<?php echo $row['id']; ?>"><?php echo htmlentities($row['categoryName']); ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row featured__filter">
            <!-- Products will be dynamically loaded here -->
        </div>
    </div>
</section>
