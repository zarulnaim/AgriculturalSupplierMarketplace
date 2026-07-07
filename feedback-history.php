<?php
session_start();
include('includes/config.php');

// Check if the vendor is logged in
if (!isset($_SESSION['vendor_id'])) {
    header('Location: /AgriHub/AgriHub/User/user-login.php');
    exit();
}

$vendor_id = intval($_SESSION['vendor_id']);

// Fetch feedback history from the database
$query = mysqli_query($con, "
    SELECT vendor_id, subject, created_at, status 
    FROM feedback 
    WHERE vendor_id = '$vendor_id' 
    ORDER BY created_at DESC
");
$feedbackCount = mysqli_num_rows($query); // Count feedback entries
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Feedback History</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">


</head>

<body>
<?php include('includes/header2.php'); ?>

<div class="container">
    <h2 class="text-center">Feedback History</h2>
    <p class="text-center">Below is a list of all feedback you've submitted.</p>

    <?php if ($feedbackCount > 0) { ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Date Submitted</th>
                    <th>Status</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cnt = 1;
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td><?php echo $cnt++; ?></td>
                    <td><?php echo htmlentities($row['subject']); ?></td>
                    <td><?php echo date("F j, Y, g:i a", strtotime($row['created_at'])); ?></td>
                    <td>
                        <?php if ($row['status'] == 'Resolved') { ?>
                            <span class="status-resolved">Improved</span>
                        <?php } else { ?>
                            <span class="status-pending">Pending</span>
                        <?php } ?>
                    </td>
                    <td>
                        <a href="feedback-detail.php?vendor_id=<?php echo $row['vendor_id']; ?>" class="btn btn-primary btn-sm">More</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <div class="alert alert-info text-center">
            <strong>No feedback found!</strong> You haven't submitted any feedback yet.
        </div>
    <?php } ?>
</div>

<?php include('includes/footer.php'); ?>
</body>
</html>
