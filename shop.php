<?php
include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
    exit();
}

if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    // Check if the product is already in the cart
    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('Query failed');

    if (mysqli_num_rows($check_cart_numbers) > 0) {
        $message[] = 'Already added to cart!';
    } else {
        // Insert into the cart
        mysqli_query($conn, "INSERT INTO `cart` (user_id, name, price, quantity, image) VALUES ('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('Query failed');
        $message[] = 'Product added to cart!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="css/shop.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container">
    <div class="heading">
        <!-- <h3>Our Products</h3> -->
    </div>

    <section class="products">
        <h1 class="title">All Products</h1>
        <div class="box-container">
            <?php
            // Select all products and calculate average rating
            $select_products = mysqli_query($conn, 
            "SELECT p.*, IFNULL(AVG(r.rating), 0) as avg_rating 
            FROM products p
            LEFT JOIN reviews r ON p.id = r.product_id 
            GROUP BY p.id"
            ) or die('Query failed: ' . mysqli_error($conn));

            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                    $average_rating = round($fetch_products['avg_rating'], 1); // Round the average rating to one decimal
                    ?>
                    <div class="box">
                        <img class="image" src="uploaded_img/<?= $fetch_products['image']; ?>" alt="Product Image">
                        <!-- Display the average rating -->
                        <div class="rating">
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $average_rating) {
                                    echo '&#9733;'; // Filled star
                                } else {
                                    echo '&#9734;'; // Empty star
                                }
                            }
                            ?>
                            <span>(<?= $average_rating; ?>)</span>
                        </div>
                        <div class="name"><?= $fetch_products['name']; ?></div>
                        <div class="price">₱<?= $fetch_products['price']; ?></div>
                        <!-- <div class="stock">Available: <span class="stock-number"><?= $fetch_products['stock']; ?></span></div> -->

                        <div class="actions"> <!-- Container to align icons -->
                            <!-- Link for View Details -->
                            <a href="product_details.php?id=<?= $fetch_products['id']; ?>" class="icon-btn">
                                <i class="fas fa-eye"></i>
                            </a>
                            <!-- Form for Add to Cart -->
                            <form action="" method="post" class="inline-form">
                                <input type="hidden" name="product_quantity" value="1">
                                <input type="hidden" name="product_name" value="<?= $fetch_products['name']; ?>">
                                <input type="hidden" name="product_price" value="<?= $fetch_products['price']; ?>">
                                <input type="hidden" name="product_image" value="<?= $fetch_products['image']; ?>">
                                <!-- Button to add to cart -->
                                <button type="submit" name="add_to_cart" class="icon-btn">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </form>
                            <!-- Link for Reviews -->
                            <a href="javascript:void(0)" class="icon-btn review-icon" data-product-id="<?= $fetch_products['id']; ?>">
                                <i class="fas fa-comment-dots"></i> <!-- Icon for reviews -->
                            </a>

                            <div class="stock">Available: <span class="stock-number"><?= $fetch_products['stock']; ?></span></div>
                        
                        </div>
                    </div>
                    <?php
                }
            } else {
                // Message if no products are available
                echo '<p class="empty">No products available!</p>';
            }
            ?>
        </div>

        <!-- Modal HTML Structure -->
        <div id="review-modal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <h2>Product Review</h2>
                <form action="submit_review.php" method="post">
                    <input type="hidden" name="product_id" id="product_id" value="">
                    <input type="hidden" name="user_id" id="user_id" value="<?= $user_id; ?>"> <!-- Added user_id -->

                    <div class="star-rating">
                        <input type="radio" name="rating" id="5-stars" value="5" required>
                        <label for="5-stars" class="star">&#9733;</label>
                        <input type="radio" name="rating" id="4-stars" value="4">
                        <label for "4-stars" class="star">&#9733;</label>
                        <input type="radio" name="rating" id="3-stars" value="3">
                        <label for="3-stars" class="star">&#9733;</label>
                        <input type="radio" name="rating" id="2-stars" value="2">
                        <label for="2-stars" class="star">&#9733;</label>
                        <input type="radio" name="rating" id="1-star" value="1">
                        <label for="1-star" class="star">&#9733;</label>
                    </div>

                    <textarea name="review_text" placeholder="Write your review here..." required></textarea>
                    <button type="submit" name="submit_review">Submit Review</button>
                </form>
            </div>
        </div>

    </section>

    <section class="links">
        <div class="links-inner">
            <ul>
                <li><h3>FISH DADDIES</h3></li>
                <img src="image/dadiko.png" alt="">
                <p>Carmelo, Tuburan, Cebu</p>
                <p>09703851090</p>
                <p>fishdaddies@gmail.com</p>
            </ul>
            <ul>
                <li><h3>Support</h3></li>
                <li><a href="#">Contact us</a></li>
                <li><a href="#">Privacy</a></li>
            </ul>
            <ul>
                <li><h3>Information</h3></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms and Condition</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">FAQ</a></li>
            </ul>
            <ul>
                <li><h3>About</h3></li>
                <li><a href="#">Return and Refund Policy</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Our Goals</a></li>
            </ul>
        </div>
    </section>

    <!-- Footer content -->
    <footer class="footer">
        <div class="footer-inner">
            <div><i class="fas fa-globe fa-2x"></i> English (United States)</div>
            <ul>
                <li><a href="#">Privacy & cookies</a></li>
                <li><a href="#">Terms of use</a></li>
                <li><a href="#">&copy; Fish Daddies 2024</a></li>
            </ul>
        </div>
    </footer>
</div>

<!-- Custom JS file -->
<script src="js/script.js"></script>

</body>
</html>
