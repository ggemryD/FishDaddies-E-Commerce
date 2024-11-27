<!-- <?php
// include 'config.php';

// // Get the product ID from the URL parameter
// $product_id = $_GET['id'];

// // Fetch product details from the database
// $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$product_id'") or die('Query failed');

// if (mysqli_num_rows($select_product) > 0) {
//     $product = mysqli_fetch_assoc($select_product);
// } else {
//     die('Product not found');
// }

// // Get the referer to determine where to go back
// $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'all_products.php'; // Default to a general products page
// ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $product['name']; ?> - Product Details</title>

    <link rel="stylesheet" href="css/product_details.css">
</head>
<body>
<div class="product-details">
    <h1><?php echo $product['name']; ?></h1>

    <img src="uploaded_img/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">

    <div class="description">
        <p><?php echo $product['description']; ?></p>

        <p>Price: ₱<?php echo $product['price']; ?></p>
    </div>

    <a href="<?php echo $referer; ?>" class="btn">Back to Products</a> 
</div>


<script src="js/script.js"></script> 
</body>
</html> -->

<?php
include 'config.php';
session_start();

// Get user ID from session (if logged in)
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

// Get the product ID from the URL parameter
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch product details from the database
$select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$product_id'") or die('Query failed');

if (mysqli_num_rows($select_product) > 0) {
    $product = mysqli_fetch_assoc($select_product);
} else {
    die('Product not found');
}

// Fetch reviews for the product
$select_reviews = mysqli_query($conn, "SELECT * FROM `reviews` WHERE product_id = '$product_id' ORDER BY created_at DESC") or die('Query failed');

// Get the referer to determine where to go back
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'all_products.php'; // Default to a general products page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($product['name']); ?> - Product Details</title>
    <!-- Include your CSS and other dependencies -->
    <link rel="stylesheet" href="css/product_details.css">

    <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">
</head>
<body>

<div class="product-details">
    <h1><?php echo htmlspecialchars($product['name']); ?></h1>
    <!-- Display the product image -->
    <img src="uploaded_img/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
    <!-- Display the product description -->
    <div class="description">
        <p><?php echo htmlspecialchars($product['description']); ?></p>
        <!-- Display the product price -->
        <p>Price: ₱<?php echo number_format($product['price'], 2); ?></p>
    </div>

    <!-- Link to go back to the referer -->
    <a href="<?php echo htmlspecialchars($referer); ?>" class="btn">Back to Products</a>

    <!-- User review section -->
    <h2>User Reviews</h2>
    <div class="reviews-section">
        <?php
        if (mysqli_num_rows($select_reviews) > 0) {
            while ($review = mysqli_fetch_assoc($select_reviews)) {
                ?>
                <div class="review">
                    <p><?php echo htmlspecialchars($review['review_text']); ?></p>
                    <span>Reviewed on <?php echo date('F j, Y', strtotime($review['created_at'])); ?></span>
                </div>
                <?php
            }
        } else {
            echo "<p>No reviews yet. Be the first to leave a review!</p>";
        }
        ?>
    </div>

    <!-- Review submission form (visible only to logged-in users) -->
    <?php if ($user_id): ?>
        <h2>Write a Review</h2>
        <form method="post" action="submit_review.php"> <!-- Link to review submission -->
            <textarea name="review_text" placeholder="Write your review here..." required></textarea>
            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
            <button type="submit" class="btn">Submit Review</button>
        </form>
    <?php endif; ?>
</div>

<!-- Include your scripts -->
<script src="js/script.js"></script> <!-- Link to your scripts -->
</body>
</html>
