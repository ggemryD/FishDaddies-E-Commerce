<?php
// Include configuration and start session
include 'config.php';
session_start();

// Get the product ID from the URL parameter
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch product details from the database
$select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$product_id'") or die('Query failed');

// Ensure the product is found
if (mysqli_num_rows($select_product) > 0) {
    $product = mysqli_fetch_assoc($select_product);
} else {
    die('Product not found'); // Stop execution if no product is found
}

// Fetch reviews along with usernames
$select_reviews = mysqli_query(
    $conn,
    "SELECT reviews.*, users.name AS username 
     FROM `reviews`
     JOIN `users` ON reviews.user_id = users.id 
     WHERE reviews.product_id = '$product_id' 
     ORDER BY reviews.created_at DESC"
) or die('Query failed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($product['name']); ?> - Product Details</title>
    <!-- Include your CSS and other dependencies -->
    <link rel="stylesheet" href="css/product_details.css">
    <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">

    <style>
        /* Star rating display */
        .rating {
            display: inline-block;
            font-size: 1.5em;
            color: #f5b301;
        }
    </style>
</head>
<body>

<div class="product-details">
    <h1><?php echo htmlspecialchars($product['name']); ?></h1>
    <!-- Display the product image -->
    <img src="uploaded_img/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
    
    <!-- Display the product description and price -->
    <div class="description">
        <p><?php echo htmlspecialchars($product['description']); ?></p>
        <p>Price: ₱<?php echo number_format($product['price'], 2); ?></p>
    </div>

    <!-- Link to go back to the referring page -->
    <a href="javascript:history.back()" class="btn">Back to Products</a>

    <!-- User review section -->
    <h2>User Reviews</h2>
    <div class="reviews-section" style="max-height: 200px; overflow-y: auto;">
        <?php
        if (mysqli_num_rows($select_reviews) > 0) {
            while ($review = mysqli_fetch_assoc($select_reviews)) {
                ?>
                <div class="review">
                    <!-- Display the rating as stars -->
                    <div class="rating">
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $review['rating']) {
                                echo '&#9733;'; // Filled star
                            } else {
                                echo '&#9734;'; // Empty star
                            }
                        }
                        ?>
                    </div>
                    <p><?php echo htmlspecialchars($review['review_text']); ?></p>
                    <!-- Display the username and date -->
                    <span>Reviewed by <?php echo htmlspecialchars($review['username']); ?> on <?php echo date('F j, Y', strtotime($review['created_at'])); ?></span>
                </div>
                <?php
            }
        } else {
            echo "<p>No reviews yet.</p>";
        }
        ?>
    </div>
</div>

<!-- Include your scripts -->
<script src="js/script.js"></script>
</body>
</html>
