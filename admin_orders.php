<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_POST['update_order'])){

   $order_update_id = $_POST['order_id'];
   $update_payment = $_POST['update_payment'];
   mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_update_id'") or die('query failed');
   $message[] = 'payment status has been updated!';

}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_orders.php');
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

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">
   <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="orders">

   <h1 class="title">placed orders</h1>

   <div class="orders-table-container">
      <table class="orders-table">
         <thead>
            <tr>
               <th>User ID</th>
               <th>Placed On</th>
               <th>Customer</th>
               <th>Contact</th>
               <th>Products</th>
               <th>Total Price</th>
               <th>Method</th>
               <th>Status</th>
               <th>Actions</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders` ORDER BY id DESC") or die('query failed');
            if(mysqli_num_rows($select_orders) > 0){
               while($fetch_orders = mysqli_fetch_assoc($select_orders)){
                  $status_class = ($fetch_orders['payment_status'] == 'pending') ? 'pending' : 'completed';
            ?>
            <tr>
               <td data-label="User ID"><?php echo $fetch_orders['user_id']; ?></td>
               <td data-label="Placed On"><?php echo $fetch_orders['placed_on']; ?></td>
               <td data-label="Customer">
                  <div class="customer-info">
                     <span class="name"><?php echo $fetch_orders['name']; ?></span>
                     <span class="email"><?php echo $fetch_orders['email']; ?></span>
                  </div>
               </td>
               <td data-label="Contact"><?php echo $fetch_orders['number']; ?></td>
               <td data-label="Products">
                  <div class="products-list"><?php echo $fetch_orders['total_products']; ?></div>
               </td>
               <td data-label="Total Price" class="price">₱<?php echo number_format($fetch_orders['total_price'], 2); ?></td>
               <td data-label="Method"><?php echo $fetch_orders['method']; ?></td>
               <td data-label="Status">
                  <form action="" method="post" class="status-form">
                     <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                     <select name="update_payment" onchange="this.form.submit()" class="status-select <?php echo $status_class; ?>">
                        <option value="pending" <?php if($fetch_orders['payment_status'] == 'pending') echo 'selected'; ?>>Pending</option>
                        <option value="completed" <?php if($fetch_orders['payment_status'] == 'completed') echo 'selected'; ?>>Completed</option>
                     </select>
                     <input type="hidden" name="update_order">
                  </form>
               </td>
               <td data-label="Actions">
                  <a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('delete this order?');" class="delete-icon" title="Delete Order">
                     <i class="fas fa-trash"></i>
                  </a>
               </td>
            </tr>
            <?php
               }
            }else{
               echo '<tr><td colspan="9" class="empty">no orders placed yet!</td></tr>';
            }
            ?>
         </tbody>
      </table>
   </div>

</section>










<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>