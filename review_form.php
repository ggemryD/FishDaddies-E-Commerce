<?php
include 'config.php';
session_start();

// Ensure the user is logged in
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if (!$user_id) {
    header('Location: login.php');
    exit();
}

// Get the product ID from the URL parameter
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;

// Check for the last page visited (referer)
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'product_list.php';

if (isset($_POST['submit_review'])) {
    $review_text = mysqli_real_escape_string($conn, trim($_POST['review_text'])); // Sanitize input
    
    // Insert the review into the reviews table
    $query = "INSERT INTO `reviews` (product_id, user_id, review_text) VALUES ('$product_id', '$user_id', '$review_text')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect back to the last page
        header("Location: " . htmlspecialchars($referer)); // Use referer to go back
        exit(); // Ensure no additional code is executed
    } else {
        // Handle insertion failure
        $message = 'Review submission failed. Please try again later.';
    }
}

// Fetch product details
$select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$product_id'") or die('Query failed');
$product = mysqli_fetch_assoc($select_product);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Review Product - <?php echo htmlspecialchars($product['name']); ?></title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Include your CSS -->

    <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">
</head>
<body>

<div class="review-form">
    <h1>Review Product - <?php echo htmlspecialchars($product['name']); ?></h1> <!-- Escape output -->

    <?php if (isset($message)): ?> <!-- Display any messages -->
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <form method="post"> <!-- Post form to submit review -->
        <textarea name="review_text" placeholder="Write your review here..." required></textarea>
        <button type="submit" name="submit_review" class="btn">Submit Review</button> <!-- Submit button -->
    </form>

    <!-- Back to product details -->
    <!-- <a href="product_details.php?id=<?php echo htmlspecialchars($product_id); ?>" class="btn">Back to Product</a> -->

    <!-- Link to go back to the referer -->
    <a href="<?php echo htmlspecialchars($referer); ?>" class="btn">Back to Products</a>
</div>

<!-- Include your scripts -->
<script src="js/script.js"></script> <!-- Include your scripts -->
</body>
</html>
