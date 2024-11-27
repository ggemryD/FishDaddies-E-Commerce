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
    $product_category = $_POST['product_category']; // Capture category

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('Query failed');

    if (mysqli_num_rows($check_cart_numbers) > 0) {
        $message[] = 'Already added to cart!';
    } else {
        // Insert into the cart with the category
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
    <title>Betta Fish Shop</title>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="css/shop.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">


    <style>
        /* Modal styling */
        .modal {
            display: none; 
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999; 
        }

        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-btn:hover,
        .close-btn:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Star rating styling */
        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
            font-size: 2em;
        }

        .star {
            cursor: pointer;
            color: #ccc;
            transition: color 0.2s;
        }

        .star:hover,
        .star:hover ~ .star,
        input[name="rating"]:checked ~ label.star {
            color: #f5b301;
        }

        textarea {
            width: 100%;
            height: 100px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }

        button {
            background-color: #23374b;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .review .stars {
            font-size: 1.5em;
        }

        .review .star {
            color: #f5b301;
        }

    </style>

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">
    <div class="heading">
        <!-- <h3>Our Betta Fish Shop</h3> -->
    </div>

    <section class="products">
        <h1 class="title">Betta Fish</h1>
        <div class="betta">
            <img src="betta/betta-fish.jpg" alt="Betta Fish" class="betta-image">
            <p class="betta-description">The Siamese fighting fish, commonly known as the betta, is a freshwater fish native to Southeast Asia, namely Cambodia, Laos, Myanmar, Malaysia, Indonesia, Thailand, and Vietnam.
                <br><br>
                Lifespan: 2-5 years
                <br>
                Class: Actinopterygii
                <br>
                Domain: Eukaryota
                <br>
                Family: Osphronemidae
                <br>
                Kingdom: Animalia
                <br>
                Phylum: Chordata
                <br>
                Species: B. splendens
            </p>
        </div>

        <div class="box-container">
            <?php
            // Select products with category 'betta'
            $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE category = 'betta'");

            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                    ?>
                    <div class="box">
                        <img class="image" src="uploaded_img/<?= $fetch_products['image']; ?>" alt="Betta Fish"> <!-- Betta-specific alt text -->
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
                        </div>
                    </div>
                    <?php
                }
            } else {
                // Message if no Betta Fish products are available
                echo '<p class="empty">No Betta Fish products available!</p>';
            }
            ?>
        </div>

        <!-- Modal HTML Structure -->
        <!-- <div id="review-modal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>  Close button for modal 
                <h2>Product Review</h2>
                <form action="submit_review.php" method="post">
                    <input type="hidden" name="product_id" id="product_id" value="">
                    <textarea name="review_text" placeholder="Write your review here..." required></textarea>
                    <button type="submit">Submit Review</button>
                </form>
            </div>
        </div> -->   
        <div id="review-modal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <h2>Product Review</h2>
                <form action="submit_review.php" method="post">
                    <input type="hidden" name="product_id" id="product_id" value="">
                    <input type="hidden" name="user_id" id="user_id" value=""> <!-- Assuming you have user_id -->
                    
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

<!-- Custom JS file link -->
<script src="js/script.js"></script>

</body>
</html>
