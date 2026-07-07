<?php
session_start();
include('includes/config.php');

if (!isset($_SESSION['vendor_id'])) {
    // Redirect to login page if the user is not logged in
    header('Location: /AgriHub/AgriHub/User/user-login.php');
    exit();
}

$username = $_SESSION['vendor_id'];

if (isset($_POST['update'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $address = mysqli_real_escape_string($con, $_POST['adress']);
    $phone_no = mysqli_real_escape_string($con, $_POST['phone_id']);
    $id = $_SESSION['vendor_id'];

    $query = mysqli_query($con, "UPDATE vendor SET address='$address', username='$username', phone_no='$phone_no' WHERE vendor_id='$id'");
    if ($query) {
        echo "<script>alert('Profile updated successfully');</script>";
        echo "<script type='text/javascript'> document.location ='/AgriHub/AgriHub/profile-page.php'; </script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
        echo "<script type='text/javascript'> document.location ='/AgriHub/AgriHub/profile-page.php'; </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/profile-page.css">
</head>
<body>

<?php include('includes/header2.php'); ?>

<?php
$query = mysqli_query($con, "SELECT * FROM vendor WHERE vendor_id='$username'");
while ($result = mysqli_fetch_array($query)) {
?>

<div class="profile-container rounded bg-white">
    <!-- Profile Section -->
    <form method="POST" action="">
        <div class="row">
            <!-- Profile Picture Section -->
            <div class="col-md-4 text-center">
                <div class="profile-picture-section">
                    <img class="profile-picture rounded-circle mt-3" width="150px" 
                         src="https://via.placeholder.com/150" 
                         alt="User Profile Picture">
                    <h5 class="font-weight-bold"><?php echo htmlentities($result['username']); ?></h5>
                    <p><?php echo htmlentities($result['email']); ?></p>
                </div>
            </div>

            <!-- Profile Details Section -->
            <div class="col-md-8">
                <div class="p-3 py-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="profile-title">Edit Profile</h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="profile-labels">Username</label>
                            <input type="text" name="username" class="profile-input form-control" value="<?php echo htmlentities($result['username']); ?>" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="profile-labels">Contact Number</label>
                            <input type="text" name="phone_id" class="profile-input form-control" value="<?php echo htmlentities($result['phone_no']); ?>" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="profile-labels">Address</label>
                            <input type="text" name="adress" class="profile-input form-control" value="<?php echo htmlentities($result['address']); ?>" required>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <button class="btn profile-save-button" type="submit" name="update">Save Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php } ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                           
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


</body>
</html>
