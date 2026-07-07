<section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                
<?php $sql=mysqli_query($con,"SELECT id, categoryName FROM category ");
while($row=mysqli_fetch_array($sql))
{
?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-2.jpg">
                            <h5><a href="shop-grid.php?cid=<?php echo $row['id'];?>"> <?php echo $row['categoryName'];?></a></h5>
                        </div>
                    </div>
                    
<?php } ?>    
                </div>
            </div>
        </div>
    </section>
  