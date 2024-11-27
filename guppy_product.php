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
    $product_category = $_POST['product_category'];

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('Query failed');

    if (mysqli_num_rows($check_cart_numbers) > 0) {
        $message[] = 'Already added to cart!';
    } else {
        mysqli_query($conn, "INSERT INTO `cart` (user_id, name, price, quantity, image, category) VALUES ('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image', '$product_category')") or die('Query failed');
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
    <title>Guppy Shop</title>

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

    <!-- Display success or error messages -->
    <!-- <?php if (isset($_GET['review_success'])) : ?>
        <div class="alert-message success">
            <p>Review submitted successfully!</p>
            <button onclick="closeAlert()">×</button> 
        </div>
    <?php elseif (isset($_GET['review_error'])) : ?>
        <div class="alert-message error">
            <p>Failed to submit the review. Please try again.</p>
            <button onclick="closeAlert()">×</button> 
        </div>
    <?php endif; ?> -->

    <div class="heading">
        <!-- <h3>Our Guppy Fish Shop</h3> -->
    </div>

    <section class="products">
        <h1 class="title">Guppy Fish</h1>
        
        <div class="guppy">
            <img src="guppy/guppy-5.jpg" alt="Guppy Fish" class="guppy-image">
            <p class="guppy-description">
                The guppy, also known as millionfish or the rainbow fish, is one of the world's most widely distributed tropical fish and one of the most popular freshwater aquarium fish species.
                <br><br>
                Lifespan: 2-3 years
            </p>
        </div>

        <div class="box-container">
            <?php
            // Select products with category 'guppy' and calculate average rating
            $select_products = mysqli_query($conn, 
            "SELECT p.*, IFNULL(AVG(r.rating), 0) as avg_rating 
            FROM products p
            LEFT JOIN reviews r ON p.id = r.product_id 
            WHERE p.category = 'guppy' 
            GROUP BY p.id"
            ) or die('Query failed: ' . mysqli_error($conn));

            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                    $average_rating = round($fetch_products['avg_rating'], 1); // Round the average rating to one decimal
                    ?>
                    <div class="box">
                        <img class="image" src="uploaded_img/<?= $fetch_products['image']; ?>" alt="Guppy Fish">
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
                                <input type="hidden" name="product_category" value="<?= $fetch_products['category']; ?>">
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
                // Message if no Guppy Fish products are available
                echo '<p class="empty">No Guppy Fish products available!</p>';
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
                    <input type="hidden" name="category" value="guppy"> <!-- Added category -->
                    <input type="hidden" name="current_page" value="<?= $_SERVER['PHP_SELF']; ?>"> <!-- Added current page -->

                    <div class="star-rating">
                        <input type="radio" name="rating" id="5-stars" value="5" required>
                        <label for="5-stars" class="star">&#9733;</label>
                        <input type="radio" name="rating" id="4-stars" value="4">
                        <label for="4-stars" class="star">&#9733;</label>
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

    <!-- Footer content (if applicable) -->
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

<script>
    // JavaScript for modal handling
    var modal = document.getElementById("review-modal");
    var span = document.getElementsByClassName("close-btn")[0];

    // When the user clicks on the review icon, open the modal
    document.querySelectorAll('.review-icon').forEach(function(element) {
        element.addEventListener('click', function() {
            var productId = this.getAttribute('data-product-id');
            document.getElementById('product_id').value = productId;
            modal.style.display = "block";
        });
    });

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Close alert message
    function closeAlert() {
        document.querySelectorAll('.alert-message').forEach(function(alert) {
            alert.style.display = 'none';
        });
    }
</script>

</body>
</html>
