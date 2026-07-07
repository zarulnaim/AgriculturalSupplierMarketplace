<div class="col-lg-3 col-md-5"> <!----NI BAHAGIAN SORTING-->
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>

                            
<?php $sql=mysqli_query($con,"select category  from product ");
while($row=mysqli_fetch_array($sql))
{
?>
                            <ul>
                                <li><a href="shop-grid.php?cid=<?php echo $row['category'];?>"> <?php echo $row['category'];?></a></li>
                                <?php } ?>                               
                            </ul>
                        </div>                       
                    </div>
                </div> 

                
                        