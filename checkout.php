<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

if (isset($_POST['order_btn'])) {

    $region = mysqli_real_escape_string($conn, $_POST['region']);
    $province = mysqli_real_escape_string($conn, $_POST['province']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $barangay = mysqli_real_escape_string($conn, $_POST['barangay']);
    $address = "Region: $region, Province: $province, City: $city, Barangay: $barangay";
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = $_POST['number'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $placed_on = date('d-M-Y');

    $cart_total = 0;
    $cart_products = [];
    $shipping_fee = 100;

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    if (mysqli_num_rows($cart_query) > 0) {
        while ($cart_item = mysqli_fetch_assoc($cart_query)) {
            $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;
        }
    }

    $total_products = implode(', ', $cart_products);
    $final_total = $cart_total + $shipping_fee;

    $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$final_total'") or die('query failed');

    if ($cart_total == 0) {
        $message[] = 'Your cart is empty';
    } else {
        if (mysqli_num_rows($order_query) > 0) {
            $message[] = 'Order already placed!';
        } else {
            mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$final_total', '$placed_on')") or die('query failed');
            
            if ($method == 'gcash') {
                $gcash_number = '09703851090'; // Replace with your GCash number
                $message[] = "Order placed successfully! Please transfer ₱$final_total to GCash number: $gcash_number.";
            } else {
                $message[] = 'Order placed successfully!';
            }

            // mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');

            // // Get the cart items again to update the stock
            // $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            // while ($cart_item = mysqli_fetch_assoc($cart_query)) {
            //     $product_name = $cart_item['name'];
            //     $quantity_bought = $cart_item['quantity'];

            //     // Update the product's stock
            //     $update_stock_query = mysqli_query($conn, "UPDATE `products` SET stock = stock - $quantity_bought WHERE name = '$product_name'") or die('query failed');
            // } SUWAYAN KONI KUHAON ANG $update_stock_query PARIHAS UBOS


            // legit ni
            // Get the cart items again to update the stock
            $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            while ($cart_item = mysqli_fetch_assoc($cart_query)) {
                $product_name = $cart_item['name'];
                $quantity_bought = $cart_item['quantity'];

                // Update the product's stock
                mysqli_query($conn, "UPDATE `products` SET stock = stock - $quantity_bought WHERE name = '$product_name'") or die('query failed');
            }

            mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS File Link -->
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">

</head>
<body>

<?php include 'header.php'; ?>

<div class="heading">
    <h3>Checkout</h3>
</div>

<section class="display-order">
    <?php  
    $grand_total = 0;
    $shipping_fee = 100;
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    if (mysqli_num_rows($select_cart) > 0) {
        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
    ?>
    <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo '₱'.$fetch_cart['price'].''.' x '. $fetch_cart['quantity']; ?>)</span> </p>
    <?php
        }
    } else {
        echo '<p class="empty">Your cart is empty</p>';
    }
    ?>
    <div class="grand-total"> 
        Subtotal: <span>₱<?php echo $grand_total; ?></span> <br>
        Shipping Fee: <span>₱<?php echo $shipping_fee; ?></span> <br>
        Final Total: <span>₱<?php echo $grand_total + $shipping_fee; ?></span> 
    </div>
</section>

<section class="checkout">
    <form action="" method="post">
        <h3>Place Your Order</h3>
        <div class="flex">
            <div class="inputBox">
                <span>Full Name:</span>
                <input type="text" name="name" required placeholder="Enter your full name">
            </div>
            <div class="inputBox">
                <span>Phone Number:</span>
                <input type="number" name="number" required placeholder="Enter your phone number">
            </div>
            <div class="inputBox">
                <span>Email:</span>
                <input type="email" name="email" required placeholder="Enter your email">
            </div>
            <div class="inputBox">
                <span>Payment Method:</span>
                <select name="method">
                    <option value="cash on delivery">Cash on Delivery</option>
                    <option value="gcash">GCash</option>
                </select>
            </div>
            <div class="inputBox">
                <span>Region:</span>
                <input type="text" name="region" required placeholder="Enter your region">
            </div>
            <div class="inputBox">
                <span>Province:</span>
                <input type="text" name="province" required placeholder="Enter your province">
            </div>
            <div class="inputBox">
                <span>City:</span>
                <input type="text" name="city" required placeholder="Enter your city">
            </div>
            <div class="inputBox">
                <span>Barangay:</span>
                <input type="text" name="barangay" required placeholder="Enter your barangay">
            </div>
        </div>
        <input type="submit" value="Order Now" class="btn" name="order_btn">
    </form>
</section>

<?php
if (isset($message)) {
    foreach ($message as $msg) {
        echo '<p>'.$msg.'</p>';
    }
}
?>

<!-- Custom JS File Link -->
<script src="js/script.js"></script>

</body>
</html>
