<?php
include ('Include\config.php'); // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize input
    $vaddress = htmlspecialchars(trim($_POST['vaddress'] ?? ''));
    $vemail = filter_var(trim($_POST['vemail'] ?? ''), FILTER_VALIDATE_EMAIL);
    $vusername = htmlspecialchars(trim($_POST['vusername'] ?? ''));
    $vpassword = password_hash($_POST['vpassword'] ?? '', PASSWORD_DEFAULT); // Hash the password for security
    $vphone = htmlspecialchars(trim($_POST['vphone'] ?? ''));
    $vic = htmlspecialchars(trim($_POST['vic'] ?? '')); // Treat vic as a regular string input

    if (!$vemail) {
        echo "Invalid email format.";
        exit;
    }

    // Handle image file upload (profile picture)
    $image = $_FILES['image'] ?? null;
    if ($image && $image['error'] === UPLOAD_ERR_OK) {
        $imageFileName = uniqid() . "_" . basename($image["name"]);
        $targetDir = "Upload/"; // Directory for uploads
        $imageFilePath = $targetDir . $imageFileName;
        move_uploaded_file($image["tmp_name"], $imageFilePath);
    } else {
        $imageFilePath = ''; // Handle case when no image is uploaded
    }
    
    // SQL Insert Query
    $sql = "INSERT INTO vendor (address, email, username, password, phone_no, mykad_pic, mykad_no) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute the query
        $stmt->bind_param("sssssss", $vaddress, $vemail, $vusername, $vpassword, $vphone, $imageFilePath, $vic);

        // Execute the query and check for success
        if ($stmt->execute()) {
            echo "Data successfully uploaded!";
        } else {
            echo "Database Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Statement preparation failed: " . $con->error;
    }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
    <body>
        <a href="user-login.php">Login Page</a>
    </body>
</html>
