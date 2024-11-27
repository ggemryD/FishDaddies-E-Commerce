<?php
// Ensure $message is an array before using foreach
if (isset($message) && is_array($message)) {
   foreach ($message as $msg) {
      echo '
      <div class="message">
         <span>' . htmlspecialchars($msg, ENT_QUOTES, 'UTF-8') . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

//sa header ni 
if (!isset($conn)) {
   include 'config.php'; // Include your database configuration if $conn is not set
}

if (!isset($_SESSION)) {
   session_start();
}

$user_id = $_SESSION['user_id'] ?? null;

if ($user_id) {
   // Perform database queries related to the user
   $query = "SELECT * FROM `cart` WHERE user_id = '$user_id'";
   $result = mysqli_query($conn, $query) or die('Query failed');

   // Your existing code to handle the result
} else {
   // Handle cases where user_id is not set, if necessary
}

?>

<header class="header">
   <div class="header-2">
      <div class="flex">
         <a href="home.php" class="logo">
            <img src="image/dadiko.png" alt="Logo Diri" class="logo">
         </a>

         <nav class="navbar">
            <!-- <a href="home.php">home</a> -->
            <div class="dropdown">
               <a href="#" class="dropdown-btn">Aquarium Fish</a>
               <div class="dropdown-content">
                  <a href="guppy_product.php" style="font-size: 20px;">Guppy Fish</a>
                  <a href="betta_product.php" style="font-size: 20px;">Betta Fish</a>
                  <a href="goldfish_product.php" style="font-size: 20px;">Gold Fish</a>
                  <a href="koi_product.php" style="font-size: 20px;">Koi Fish</a>
               </div>
            </div>
            <div class="dropdown">
               <a href="#" class="dropdown-btn">Fish Care</a>
               <div class="dropdown-content">
                  <a href="careguides.php" style="font-size: 20px;">Care Guides</a>
                  <a href="groomingguides.php" style="font-size: 20px;">Grooming Guides</a>
               </div>
            </div>
            <a href="messageee2.php">Message</a>
            <a href="orders.php">Orders</a>
            <a href="about.php">About</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('Query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>

         <div class="user-box">
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">logout</a>
         </div>
      </div>
   </div>
</header>
