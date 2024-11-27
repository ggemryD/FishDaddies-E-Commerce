<?php
include 'config.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
    exit();
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_contacts.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['reply']) && isset($_POST['message_id'])) {
        $reply = mysqli_real_escape_string($conn, $_POST['reply']);
        $message_id = $_POST['message_id'];

        // Insert the admin's reply into the database
        $insert_reply = mysqli_query($conn, "UPDATE `message` SET admin_reply = '$reply' WHERE id = '$message_id'");

        if ($insert_reply) {
            // Reply inserted successfully
            header("Location: admin_contacts.php");
            exit();
        } else {
            // Error inserting reply
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Reply or message_id not set
        echo "Reply and message ID must be set.";
    }
}

// Fetch all messages sent by users
$select_messages = mysqli_query($conn, "SELECT * FROM `message` WHERE admin_reply IS NULL ORDER BY id DESC") or die('query failed');

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Messages</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/admin_style.css">
   <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">
   <style>
       .box-container {
           max-height: 300px; /* Set max height for scroll */
           overflow-y: auto; /* Enable vertical scroll */
       }
       .chat-box {
           display: flex;
           flex-direction: column;
           margin-bottom: 20px;
       }
       .chat-box .message {
           background-color: #f1f0f0;
           padding: 10px;
           border-radius: 10px;
           margin-bottom: 10px;
           max-width: 70%;
           font-size: 18px; /* Increase font size */
       }
       .chat-box .admin-reply {
           background-color: #dff0d8;
           font-size: 15px; /* Increase font size for admin reply */
       }
       textarea {
           font-size: 18px; /* Increase font size for textarea */
       }
       .send-reply-btn {
           width: 100px; /* Adjust width */
           padding: 10px; /* Adjust padding */
           background-color: #007bff; /* Change background color */
           color: #fff; /* Change text color */
           border: none; /* Remove border */
           border-radius: 5px; /* Add border radius */
           cursor: pointer; /* Add cursor pointer */
           transition: background-color 0.3s; /* Add smooth transition */
           margin-top: 10px; /* Add margin-top */
       }
       .send-reply-btn:hover {
           background-color: #0056b3; /* Change background color on hover */
       }
       .delete-btn {
           text-align: center; /* Center the text */
           display: block; /* Make the link a block element */
           margin-top: 10px; /* Add margin-top */
       }
   </style>
</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="messages">
   <h1 class="title">Messages</h1>

   <div class="box-container">
   <?php
      if (mysqli_num_rows($select_messages) > 0) {
         while ($fetch_message = mysqli_fetch_assoc($select_messages)) {
   ?>
            <div class="chat-box">
               <div class="message">
                  <p><strong><?php echo $fetch_message['name']; ?>:</strong> <?php echo $fetch_message['message']; ?></p>
               </div>
               <form action="admin_contacts.php" method="post">
                  <input type="hidden" name="message_id" value="<?php echo $fetch_message['id']; ?>">
                  <textarea name="reply" placeholder="Type your reply..." required></textarea>
                  <input type="submit" value="Send Reply" class="send-reply-btn">
               </form>
               <a href="admin_contacts.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('Delete this message?');" class="delete-btn">Delete message</a>
            </div>
   <?php
         }
      } else {
         echo '<p class="empty">You have no messages!</p>';
      }
   ?>
   </div>
</section>

<script src="js/admin_script.js"></script>
</body>
</html>
