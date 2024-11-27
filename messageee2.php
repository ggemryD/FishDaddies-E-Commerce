<?php
include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
    exit;
}

if (isset($_POST['send'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = $_POST['number'];
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

    if (mysqli_num_rows($select_message) > 0) {
      //   $message[] = 'Message sent already!';
    } else {
        mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS file links -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/home.css">
    <style>
         /* para hide */
         /* Hide the user icon */
         .header .header-2 .flex .icons .fas.fa-user {
            display: none; /* This hides the user icon */
         }

         /* Hide the user box */
         .header .header-2 .flex .user-box {
            display: none; /* This hides the user box */
         }

        .chat-container {
            max-height: 300px;
            overflow-y: auto;
            padding-right: 20px;
        }

        .chat-container .chat {
            margin-bottom: 10px;
            padding-right: 20px;
        }

        .chat-container .admin-chat {
            text-align: right;
        }

      textarea.box {
         width: calc(100% - 20px); /* Adjust width */
         padding: 10px; /* Adjust padding */
         margin-bottom: 10px; /* Adjust margin */
         resize: vertical; /* Allow vertical resizing */
      }

      input[type="submit"].btn {
         width: 80px; /* Adjust width */
         padding: 10px; /* Adjust padding */
         background-color: #007bff; /* Change background color */
         color: #fff; /* Change text color */
         border: none; /* Remove border */
         border-radius: 5px; /* Add border radius */
         cursor: pointer; /* Add cursor pointer */
         transition: background-color 0.3s; /* Add smooth transition */
      }

      input[type="submit"].btn:hover {
         background-color: #0056b3; /* Change background color on hover */
      }

      form{
         width: 500px;
      }

    </style>
    <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">
</head>

<body>

    <?php include 'header.php'; ?>

    <section class="contact">
        <h3>Chat with Admin</h3>
        <div class="chat-container">
            <?php
            $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 10") or die('query failed');
            if (mysqli_num_rows($select_message) > 0) {
                while ($fetch_message = mysqli_fetch_assoc($select_message)) {
                    ?>
                    <div class="chat <?php echo ($fetch_message['admin_reply'] != '') ? 'admin-chat' : ''; ?>">
                        <p><strong><?php echo $fetch_message['name']; ?>:</strong> <?php echo $fetch_message['message']; ?></p>
                        <?php if (!empty($fetch_message['admin_reply'])) : ?>
                            <p><strong>Admin:</strong> <?php echo $fetch_message['admin_reply']; ?></p>
                        <?php endif; ?>
                    </div>
                <?php
                }
            } else {
                echo '<p>No messages available.</p>';
            }
            ?>
        </div>

        <center>
            <form action="" method="post">
               <input type="hidden" name="name" value="<?php echo $_SESSION['user_name']; ?>">
               <input type="hidden" name="email" value="<?php echo $_SESSION['user_email']; ?>">
               <input type="hidden" name="number" value="">
               <textarea name="message" class="box" placeholder="Type your message..." required></textarea>
               <input type="submit" value="Send" name="send" class="btn">
         </form>
        </center>

    </section>

    <!-- Include footer if needed -->

    <!-- Include custom JavaScript file if needed -->
</body>

</html>
