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
        :root {
            --purple: #23374b;
            --red: #c0392b;
            --orange: #f39c12;
            --black: #333;
            --white: #fff;
            --light-color: #666;
            --light-bg: #eee;
            --border: .1rem solid var(--black);
            --box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
        }

        .contact {
            padding: 1rem;
            max-width: 500px;
            margin: 2rem auto;
            background: #fff;
            border-radius: 1rem;
            box-shadow: var(--box-shadow);
            border: var(--border);
            color: var(--black); /* Explicitly set text color to dark */
        }

        .contact h3 {
            text-align: center;
            font-size: 2rem;
            color: #23374b;
            margin-bottom: 1.5rem;
            text-transform: capitalize;
            border-bottom: 2px solid #23374b;
            padding-bottom: 1rem;
        }

        .chat-container {
            background-color: #f9f9f9;
            height: 400px;
            overflow-y: auto;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 1.5rem;
            border-radius: .5rem;
            border: 1px solid #eee;
        }

        .chat-message {
            max-width: 80%;
            padding: .8rem 1.2rem;
            border-radius: 1.5rem;
            font-size: 1.4rem;
            line-height: 1.4;
            position: relative;
            word-wrap: break-word;
            color: var(--black); /* Ensure text is dark */
        }

        .user-message {
            align-self: flex-end;
            background-color: var(--purple);
            color: var(--white) !important; /* User text must stay white */
            border-bottom-right-radius: .2rem;
        }

        .admin-message {
            align-self: flex-start;
            background-color: #e9e9eb;
            color: var(--black);
            border-bottom-left-radius: .2rem;
        }

        .message-content {
            display: block;
        }

        .message-info {
            display: block;
            font-size: 1rem;
            margin-top: .3rem;
            opacity: 0.7;
            color: inherit; /* Inherit from parent bubble */
        }

        .user-message .message-info {
            text-align: right;
            color: var(--white);
        }

        .admin-message .message-info {
            color: var(--black);
        }

        .contact form {
            display: flex;
            gap: .8rem;
            align-items: center;
            padding: .5rem;
            background: #fff;
            border-top: 1px solid #eee;
        }

        .contact form .box {
            flex: 1;
            padding: 1rem 1.5rem;
            font-size: 1.4rem;
            color: var(--black);
            border: 1px solid #ddd;
            border-radius: 2rem;
            background-color: #f0f2f5;
        }

        .contact form .btn {
            padding: .8rem 1.5rem;
            font-size: 1.4rem;
            background-color: var(--purple);
            color: var(--white);
            cursor: pointer;
            border-radius: 2rem;
            transition: .2s linear;
        }

        .contact form .btn:hover {
            background-color: var(--black);
        }

        /* Custom Scrollbar */
        .chat-container::-webkit-scrollbar {
            width: 5px;
        }
        .chat-container::-webkit-scrollbar-track {
            background: transparent;
        }
        .chat-container::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 10px;
        }

        .empty-chat {
            text-align: center;
            font-size: 1.4rem;
            color: var(--light-color);
            margin-top: 2rem;
        }

        /* Hide the user icon and box as per original code */
        .header .header-2 .flex .icons .fas.fa-user,
        .header .header-2 .flex .user-box {
            display: none !important;
        }
    </style>
    <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">
</head>

<body>

    <?php include 'header.php'; ?>

    <section class="contact">
        <h3>Chat with Admin</h3>
        <div class="chat-container" id="chat-box">
            <?php
            // Fetch all messages for the current user
            $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE user_id = '$user_id' ORDER BY id ASC") or die('query failed');
            if (mysqli_num_rows($select_message) > 0) {
                while ($fetch_message = mysqli_fetch_assoc($select_message)) {
                    ?>
                    <!-- User Message Bubble -->
                    <div class="chat-message user-message">
                        <span class="message-content"><?php echo $fetch_message['message']; ?></span>
                        <span class="message-info">You</span>
                    </div>

                    <!-- Admin Reply Bubble (if exists) -->
                    <?php if (!empty($fetch_message['admin_reply'])) : ?>
                        <div class="chat-message admin-message">
                            <span class="message-content"><?php echo $fetch_message['admin_reply']; ?></span>
                            <span class="message-info">Admin</span>
                        </div>
                    <?php endif; ?>
                <?php
                }
            } else {
                echo '<p class="empty-chat">No messages yet. Say hi!</p>';
            }
            ?>
        </div>

        <form action="" method="post" id="message-form">
            <input type="hidden" name="name" value="<?php echo $_SESSION['user_name']; ?>">
            <input type="hidden" name="email" value="<?php echo $_SESSION['user_email']; ?>">
            <input type="hidden" name="number" value="">
            <input type="text" name="message" id="message-input" class="box" placeholder="Type your message..." required autocomplete="off">
            <input type="submit" value="Send" name="send" class="btn">
        </form>
    </section>

    <script>
        const chatBox = document.getElementById('chat-box');
        const messageForm = document.getElementById('message-form');
        const messageInput = document.getElementById('message-input');
        const userId = '<?php echo $user_id; ?>';

        function scrollToBottom() {
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        function fetchMessages() {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetch_messages.php?user_id=' + userId + '&view=user', true);
            xhr.onload = function() {
                if (this.status === 200) {
                    const wasAtBottom = chatBox.scrollHeight - chatBox.clientHeight <= chatBox.scrollTop + 50;
                    chatBox.innerHTML = this.responseText;
                    if (wasAtBottom) scrollToBottom();
                }
            };
            xhr.send();
        }

        // Fetch messages every 2 seconds
        setInterval(fetchMessages, 2000);

        // Initial scroll
        scrollToBottom();

        // AJAX for sending message
        messageForm.onsubmit = function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            formData.append('send', 'Send');

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'messageee2.php', true);
            xhr.onload = function() {
                if (this.status === 200) {
                    messageInput.value = '';
                    fetchMessages();
                }
            };
            xhr.send(formData);
        };
    </script>

    <!-- Include footer if needed -->

    <!-- Include custom JavaScript file if needed -->
</body>

</html>
