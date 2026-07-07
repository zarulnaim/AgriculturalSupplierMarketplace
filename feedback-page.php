<?php
session_start();
include('includes/config.php');

if (!isset($_SESSION['vendor_id'])) {
    // Redirect to login page if the user is not logged in
    header('Location: /AgriHub/AgriHub/User/user-login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $vendor_id = $_SESSION['vendor_id']; // Assume `user_id` is stored in the session when the user logs in
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Handle file upload
    $file_path = null;
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = "admin/uploadFeedback/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
    
        $file_name = uniqid() . "_" . basename($_FILES['attachment']['name']);
        $file_path = "/AgriHub/AgriHub/admin/uploadFeedback/" . $file_name; // Save full path relative to root
    
        if (!move_uploaded_file($_FILES['attachment']['tmp_name'], $upload_dir . $file_name)) {
            die("Failed to upload attachment.");
        }
    }
    

    // Insert feedback into the database
    $query = $con->prepare("INSERT INTO feedback (vendor_id, subject, message, file_path) VALUES (?, ?, ?, ?)");
    $query->bind_param("isss", $vendor_id, $subject, $message, $file_path);

    if ($query->execute()) {
        $_SESSION['msg'] = "Feedback submitted successfully!";
    } else {
        $_SESSION['msg'] = "Error: " . $query->error;
    }

    // Redirect to the same page to avoid resubmission
    header("Location: contact.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Agri Hub Template">
    <meta name="keywords" content="Agri Hub, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> | Template</title>

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
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/feedback-page.css">
    
</head>

<body>
<?php include('includes/header2.php');?>
    

<div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="feedback-container">
                    <div class="feedback-header">
                        <h2>Send Us Your Feedback</h2>
                        <p>We value your input! Please share your feedback or report any issues below.</p>
                    </div>

                    <?php if (isset($_SESSION['msg'])) { ?>
                        <div class="alert alert-info">
                            <?php echo $_SESSION['msg'];
                            unset($_SESSION['msg']); ?>
                        </div>
                    <?php } ?>

                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter the subject of your feedback" required>
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" rows="5" class="form-control" placeholder="Write your message here" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="attachment">Attachment (Optional)</label>
                            <input type="file" name="attachment" id="attachment" class="form-control">
                            <small class="form-text text-muted">Attach a file or screenshot if needed.</small>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Submit Feedback</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

  


    <!-- Contact Form End -->

    <!-- Footer Section Begin ---------------------------------------------------------------------------------------->
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
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>



</body>

</html>