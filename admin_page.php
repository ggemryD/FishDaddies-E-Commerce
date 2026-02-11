<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">
   <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<!-- admin dashboard section starts  -->

<section class="dashboard">

   <h1 class="title">dashboard</h1>

   <div class="box-container">

      <div class="box">
         <?php
            $total_pendings = 0;
            $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'pending'") or die('query failed');
            if(mysqli_num_rows($select_pending) > 0){
               while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
                  $total_price = $fetch_pendings['total_price'];
                  $total_pendings += $total_price;
               };
            };
         ?>
         <i class="fas fa-clock"></i>
         <div class="content">
            <h3>₱<?php echo number_format($total_pendings); ?></h3>
            <p>total pendings</p>
         </div>
      </div>

      <div class="box">
         <?php
            $total_completed = 0;
            $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'completed'") or die('query failed');
            if(mysqli_num_rows($select_completed) > 0){
               while($fetch_completed = mysqli_fetch_assoc($select_completed)){
                  $total_price = $fetch_completed['total_price'];
                  $total_completed += $total_price;
               };
            };
         ?>
         <i class="fas fa-check-circle"></i>
         <div class="content">
            <h3>₱<?php echo number_format($total_completed); ?></h3>
            <p>completed payments</p>
         </div>
      </div>

      <div class="box">
         <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
         <i class="fas fa-shopping-cart"></i>
         <div class="content">
            <h3><?php echo $number_of_orders; ?></h3>
            <p>order placed</p>
         </div>
      </div>

      <div class="box">
         <?php 
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            $number_of_products = mysqli_num_rows($select_products);
         ?>
         <i class="fas fa-fish"></i>
         <div class="content">
            <h3><?php echo $number_of_products; ?></h3>
            <p>products added</p>
         </div>
      </div>

      <div class="box">
         <?php 
            $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
            $number_of_account = mysqli_num_rows($select_account);
         ?>
         <i class="fas fa-users"></i>
         <div class="content">
            <h3><?php echo $number_of_account; ?></h3>
            <p>total accounts</p>
         </div>
      </div>

      <div class="box">
         <?php 
            $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
            $number_of_messages = mysqli_num_rows($select_messages);
         ?>
         <i class="fas fa-envelope"></i>
         <div class="content">
            <h3><?php echo $number_of_messages; ?></h3>
            <p>total messages</p>
         </div>
      </div>

   </div>

   <div class="dashboard-details">

      <div class="detail-box">
         <h3><i class="fas fa-shopping-bag"></i> Recent Orders</h3>
         <div class="table-container">
            <table>
               <thead>
                  <tr>
                     <th>Customer</th>
                     <th>Status</th>
                     <th>Price</th>
                     <th>Date</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     $select_recent_orders = mysqli_query($conn, "SELECT * FROM `orders` ORDER BY id DESC LIMIT 5") or die('query failed');
                     if(mysqli_num_rows($select_recent_orders) > 0){
                        while($fetch_orders = mysqli_fetch_assoc($select_recent_orders)){
                  ?>
                  <tr>
                     <td><?php echo $fetch_orders['name']; ?></td>
                     <td><span class="status <?php echo $fetch_orders['payment_status']; ?>"><?php echo $fetch_orders['payment_status']; ?></span></td>
                     <td>₱<?php echo number_format($fetch_orders['total_price']); ?></td>
                     <td><?php echo $fetch_orders['placed_on']; ?></td>
                  </tr>
                  <?php
                        }
                     }else{
                        echo '<tr><td colspan="4" class="empty">no orders placed yet!</td></tr>';
                     }
                  ?>
               </tbody>
            </table>
         </div>
         <a href="admin_orders.php" class="option-btn">view all orders</a>
      </div>

      <div class="detail-box">
         <h3><i class="fas fa-comment-dots"></i> Recent Messages</h3>
         <div class="message-list">
            <?php
               $select_recent_msgs = mysqli_query($conn, "SELECT * FROM `message` ORDER BY id DESC LIMIT 4") or die('query failed');
               if(mysqli_num_rows($select_recent_msgs) > 0){
                  while($fetch_msgs = mysqli_fetch_assoc($select_recent_msgs)){
            ?>
            <div class="msg-item">
               <div class="user">
                  <span class="name"><?php echo $fetch_msgs['name']; ?></span>
                  <span class="date"><?php echo $fetch_msgs['email']; ?></span>
               </div>
               <p><?php echo substr($fetch_msgs['message'], 0, 50); ?>...</p>
            </div>
            <?php
                  }
               }else{
                  echo '<p class="empty">no messages yet!</p>';
               }
            ?>
         </div>
         <a href="admin_contacts.php" class="option-btn">view all messages</a>
      </div>

   </div>

</section>

<!-- admin dashboard section ends -->









<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>