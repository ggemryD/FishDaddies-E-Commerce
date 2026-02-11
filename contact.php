<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

// Fetch all messages for the user including admin replies
$select_messages = mysqli_query($conn, "SELECT * FROM `message` WHERE user_id = '$user_id'") or die('query failed');

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/home.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Contact Us</h3>
   <p> <a href="home.php">Home</a> / Contact </p>
</div>

<section class="contact">

   <?php
   // Loop through each message and display them
   while ($fetch_message = mysqli_fetch_assoc($select_messages)) {
   ?>
   <div class="message-box">
      <!-- Display the message -->
      <p><strong><?php echo $fetch_message['name']; ?>:</strong> <?php echo $fetch_message['message']; ?></p>
      <!-- Display admin's reply if available -->
      <?php if (!empty($fetch_message['admin_reply'])): ?>
      <p><strong>Admin:</strong> <?php echo $fetch_message['admin_reply']; ?></p>
      <?php endif; ?>
   </div>
   <?php
   }
   ?>

   <form action="" method="post">
      <h3>Say something!</h3>
      <!-- Display user's name (assuming it's already stored in session) -->
      <input type="text" name="name" value="<?php echo $_SESSION['user_name']; ?>" readonly required placeholder="Enter your name" class="box">
      <!-- User only needs to enter the message -->
      <textarea name="message" class="box" placeholder="Enter your message" id="" cols="30" rows="10" required></textarea>
      <input type="submit" value="Send Message" name="send" class="btn">
   </form>

</section>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
