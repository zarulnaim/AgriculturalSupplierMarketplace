<?php
session_start();
include('includes/config.php');

// Check if the vendor is logged in
if (!isset($_SESSION['vendor_id'])) {
    header('Location: /AgriHub/AgriHub/User/user-login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Feedback Options</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact-page.css">
    
</head>
<body>
    <?php include('includes/header2.php'); ?>

    <div class="container">
        <div class="option-container">
            <!-- Send Feedback Option -->
            <div class="option-card">
                <h3>Send Feedback</h3>
                <p>Share your thoughts or report any issues with us.</p>
                <a href="feedback-page.php">Go to Feedback Form</a>
            </div>

            <!-- View Feedback History Option -->
            <div class="option-card">
                <h3>View Feedback History</h3>
                <p>Check the feedback you've submitted in the past.</p>
                <a href="feedback-history.php">Go to Feedback History</a>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
</body>
</html>
