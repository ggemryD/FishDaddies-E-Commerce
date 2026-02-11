<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <!-- <link rel="stylesheet" href="css/style.css"> -->
   <link rel="stylesheet" href="css/orders.css">
   <link rel="stylesheet" href="css/home.css">
   <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="container">
   <div class="heading">
      <h3>your orders</h3>
      <!-- <p> <a href="home.php">home</a> / orders </p> -->
   </div>

   <section class="placed-orders">

      <div class="orders-table-container">
         <table class="orders-table">
            <thead>
               <tr>
                  <th>Placed On</th>
                  <th>Order Items</th>
                  <th>Total Price</th>
                  <th>Shipping Address</th>
                  <th>Status</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id' ORDER BY id DESC") or die('query failed');
                  if(mysqli_num_rows($order_query) > 0){
                     while($fetch_orders = mysqli_fetch_assoc($order_query)){
               ?>
               <tr>
                  <td data-label="Placed On"><?php echo $fetch_orders['placed_on']; ?></td>
                  <td data-label="Order Items" class="order-items"><?php echo $fetch_orders['total_products']; ?></td>
                  <td data-label="Total Price" class="price">₱<?php echo number_format($fetch_orders['total_price'], 2); ?></td>
                  <td data-label="Shipping Address"><?php echo $fetch_orders['address']; ?></td>
                  <td data-label="Status">
                     <span class="status-badge <?php echo $fetch_orders['payment_status']; ?>">
                        <?php echo $fetch_orders['payment_status']; ?>
                     </span>
                  </td>
               </tr>
               <?php
                  }
               }else{
                  echo '<tr><td colspan="5" class="empty">no orders placed yet!</td></tr>';
               }
               ?>
            </tbody>
         </table>
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

      <!-- Footer -->
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

<!-- <?php include 'footer.php'; ?> -->

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>