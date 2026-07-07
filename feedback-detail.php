<?php
session_start();
include('includes/config.php');

// Check if the vendor is logged in
if (!isset($_SESSION['vendor_id'])) {
    header('Location: /AgriHub/AgriHub/User/user-login.php');
    exit();
}
if (!isset($_GET['vendor_id']) || empty($_GET['vendor_id'])) {
    die("Invalid request. Vendor ID is missing.");
}

$vendor_id = intval($_GET['vendor_id']); // Fetch vendor_id from URL
// Fetch the feedback details from the database
$query = mysqli_query($con, "
    SELECT subject, message, file_path, created_at, status 
    FROM feedback 
    WHERE vendor_id = '$vendor_id'
    ORDER BY created_at DESC
    LIMIT 1
");

if (mysqli_num_rows($query) == 0) {
    die("Error: Feedback not found or access denied.");
}

$feedback = mysqli_fetch_assoc($query); // Fetch feedback details
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Details</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include('includes/header2.php'); ?>

<div class="container">
    <h2 class="text-center">Feedback Details</h2>
    <p class="text-center">Here are the full details of your feedback.</p>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><strong>Subject:</strong> <?php echo htmlentities($feedback['subject']); ?></h5>
            <p><strong>Date Submitted:</strong> <?php echo date("F j, Y, g:i a", strtotime($feedback['created_at'])); ?></p>
            <p><strong>Status:</strong> 
                <?php if ($feedback['status'] == 'Resolved') { ?>
                    <span style="color: green; font-weight: bold;">Improved</span>
                <?php } else { ?>
                    <span style="color: red; font-weight: bold;">Pending</span>
                <?php } ?>
            </p>
            <p><strong>Message:</strong> <?php echo nl2br(htmlentities($feedback['message'])); ?></p>
            <?php if (!empty($feedback['file_path'])) { ?>
                <a href="<?php echo htmlentities($feedback['file_path']); ?>" target="_blank" class="btn btn-primary">
                    <i class="fa fa-eye"></i> View Attachment
                </a>
                    <?php } else { ?>
                <p>No Attachment</p>
            <?php } ?>
        </div>
    </div>

    <div class="text-center mt-3">
        <a href="feedback-history.php" class="btn btn-secondary">Back to Feedback History</a>
    </div>
</div>

<?php include('includes/footer.php'); ?>
</body>
</html>
