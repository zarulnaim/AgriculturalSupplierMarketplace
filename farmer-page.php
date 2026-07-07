<?php
session_start();
include('includes/config.php');

// Fetch farmers from the database
$query = "SELECT * FROM farmer";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmers</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/farmer-page.css">
    </head>
<body>
<?php include('includes/header2.php'); ?>

    <div class="farmers-page-container">
        
        <main>
            <!-- Banner Section -->
            <section class="farmers-banner">
                <h4>Our Farmers</h4>
                <p>Dedicated individuals who ensure you get the best organic produce.</p>
            </section>

            <!-- Farmers Section -->
            <section class="farmers-container">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="farmer-card">
                    <img src="<?php echo isset($row['profile_pic']) && !empty($row['profile_pic']) ? 'Farmer/' . htmlentities($row['profile_pic']) : 'No picture/'; ?>">
                <h3><?php echo $row['username']; ?></h3>
        <!-- Button inside a form -->
                    <form action="view-profile.php" method="GET">
                        <input type="hidden" name=" id" value="<?php echo $row['farmer_id']; ?>">
                            <button type="submit" class="view-more">More</button>
                    </form>
                </div>
            <?php } ?>

            </section>
        </main>

        <footer>
            <p style="text-align: center; padding: 20px; font-size: 0.9rem; color: #555;">&copy; <?php echo date('Y'); ?> Your Website. All Rights Reserved.</p>
        </footer>
    </div>
</body>
</html>
