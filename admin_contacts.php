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
    $user_id = isset($_GET['user']) ? $_GET['user'] : '';
    mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('query failed');
    if ($user_id) {
        header("location:admin_contacts.php?user=$user_id");
    } else {
        header('location:admin_contacts.php');
    }
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send_reply'])) {
    $reply = mysqli_real_escape_string($conn, $_POST['reply']);
    $user_id = $_POST['user_id'];

    // Find the latest message from this user to attach the reply to
    $latest_msg_query = mysqli_query($conn, "SELECT id FROM `message` WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1");
    if (mysqli_num_rows($latest_msg_query) > 0) {
        $latest_msg = mysqli_fetch_assoc($latest_msg_query);
        $message_id = $latest_msg['id'];
        mysqli_query($conn, "UPDATE `message` SET admin_reply = '$reply' WHERE id = '$message_id'");
    }
    header("Location: admin_contacts.php?user=$user_id");
    exit();
}

// Fetch all unique users who have sent messages
$select_users = mysqli_query($conn, "SELECT DISTINCT user_id, name, email FROM `message` ORDER BY id DESC") or die('query failed');

$selected_user_id = isset($_GET['user']) ? $_GET['user'] : null;
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
       .messages-container {
           display: flex;
           height: calc(100vh - 150px);
           background: #fff;
           margin: 20px;
           border: var(--border);
           border-radius: .5rem;
           overflow: hidden;
       }

       .users-list {
           width: 300px;
           border-right: var(--border);
           overflow-y: auto;
           background: #f9f9f9;
       }

       .user-item {
           padding: 1.5rem;
           border-bottom: 1px solid #eee;
           cursor: pointer;
           transition: .2s;
       }

       .user-item:hover {
           background: #eee;
       }

       .user-item.active {
           background: var(--purple);
           color: #fff;
           border-left: 5px solid aqua;
       }

       .user-item h4 {
           font-size: 1.6rem;
           margin-bottom: .5rem;
       }

       .user-item p {
           font-size: 1.2rem;
           opacity: 0.8;
       }

       .chat-area {
           flex: 1;
           display: flex;
           flex-direction: column;
           background: #fff;
       }

       .chat-header {
           padding: 1.5rem 2rem;
           border-bottom: var(--border);
           background: #f5f5f5;
       }

       .chat-header h3 {
           font-size: 2rem;
           color: var(--black);
       }

       .chat-history {
           flex: 1;
           padding: 2rem;
           overflow-y: auto;
           display: flex;
           flex-direction: column;
           gap: 1.5rem;
       }

       .chat-bubble {
           max-width: 70%;
           padding: 1.2rem 1.6rem;
           border-radius: 1rem;
           font-size: 1.6rem;
           line-height: 1.5;
           position: relative;
       }

       .user-bubble {
           align-self: flex-start;
           background: #eee;
           color: var(--black);
           border-bottom-left-radius: 0;
       }

       .admin-bubble {
           align-self: flex-end;
           background: var(--purple);
           color: #fff;
           border-bottom-right-radius: 0;
       }

       .bubble-info {
           display: block;
           font-size: 1.1rem;
           margin-top: .5rem;
           opacity: 0.7;
       }

       .admin-bubble .bubble-info {
           text-align: right;
       }

       .reply-form {
           padding: 1.5rem 2rem;
           border-top: var(--border);
           display: flex;
           gap: 1.5rem;
           align-items: center;
           background: #fff;
       }

       .reply-form textarea {
           flex: 1;
           padding: 1.2rem;
           border: var(--border);
           border-radius: .5rem;
           font-size: 1.6rem;
           resize: vertical;
           height: 80px; /* Increased height */
           min-height: 50px;
       }

       .reply-form .btn {
           width: 120px; /* Set a fixed width so it's not "long" */
           height: 50px; /* Match a reasonable height */
           padding: 0;
           background: var(--purple);
           color: #fff;
           border-radius: .5rem;
           font-size: 1.8rem;
           cursor: pointer;
           margin: 0; /* Remove any top margin from admin_style.css */
           display: flex;
           align-items: center;
           justify-content: center;
       }

       .reply-form .btn:hover {
           background: var(--black);
       }

       .no-chat-selected {
           display: flex;
           align-items: center;
           justify-content: center;
           height: 100%;
           font-size: 2rem;
           color: var(--light-color);
       }
       
       .delete-chat-btn {
           color: var(--red);
           font-size: 1.4rem;
           margin-top: 1rem;
           display: inline-block;
       }
   </style>
</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="messages">
   <h1 class="title">Customer Messages</h1>

   <div class="messages-container">
       <div class="users-list">
           <?php
           if (mysqli_num_rows($select_users) > 0) {
               while ($fetch_user = mysqli_fetch_assoc($select_users)) {
                   $active_class = ($selected_user_id == $fetch_user['user_id']) ? 'active' : '';
                   echo "
                   <div class='user-item $active_class' onclick=\"location.href='admin_contacts.php?user={$fetch_user['user_id']}'\">
                       <h4>{$fetch_user['name']}</h4>
                       <p>{$fetch_user['email']}</p>
                   </div>
                   ";
               }
           } else {
               echo '<p class="empty">No messages yet!</p>';
           }
           ?>
       </div>

       <div class="chat-area">
           <?php if ($selected_user_id): ?>
               <?php
               $user_info_query = mysqli_query($conn, "SELECT name FROM `message` WHERE user_id = '$selected_user_id' LIMIT 1");
               $user_info = mysqli_fetch_assoc($user_info_query);
               ?>
               <div class="chat-header">
                   <h3>Chat with <?php echo $user_info['name']; ?></h3>
               </div>
               
               <div class="chat-history" id="chat-history">
                   <?php
                   $select_chat = mysqli_query($conn, "SELECT * FROM `message` WHERE user_id = '$selected_user_id' ORDER BY id ASC");
                   while ($chat = mysqli_fetch_assoc($select_chat)) {
                       ?>
                       <div class="chat-bubble user-bubble">
                           <?php echo $chat['message']; ?>
                           <span class="bubble-info">Customer - <a href="admin_contacts.php?delete=<?php echo $chat['id']; ?>&user=<?php echo $selected_user_id; ?>" onclick="return confirm('Delete this message?');" style="color:var(--red)">Delete</a></span>
                       </div>
                       <?php if (!empty($chat['admin_reply'])): ?>
                           <div class="chat-bubble admin-bubble">
                               <?php echo $chat['admin_reply']; ?>
                               <span class="bubble-info">You (Admin)</span>
                           </div>
                       <?php endif; ?>
                   <?php } ?>
               </div>

               <form action="" method="post" class="reply-form" id="reply-form">
                   <input type="hidden" name="user_id" value="<?php echo $selected_user_id; ?>">
                   <textarea name="reply" id="reply-input" placeholder="Type your reply..." required></textarea>
                   <input type="submit" name="send_reply" value="Send" class="btn">
               </form>
           <?php else: ?>
               <div class="no-chat-selected">
                   <p>Select a user from the list to view conversation</p>
               </div>
           <?php endif; ?>
       </div>
   </div>
</section>

<script>
   const chatHistory = document.getElementById('chat-history');
   const replyForm = document.getElementById('reply-form');
   const replyInput = document.getElementById('reply-input');
   const selectedUserId = '<?php echo $selected_user_id; ?>';

   function scrollToBottom() {
       if (chatHistory) {
           chatHistory.scrollTop = chatHistory.scrollHeight;
       }
   }

   function fetchMessages() {
       if (!selectedUserId) return;
       
       const xhr = new XMLHttpRequest();
       xhr.open('GET', 'fetch_messages.php?user_id=' + selectedUserId + '&view=admin', true);
       xhr.onload = function() {
           if (this.status === 200) {
               const wasAtBottom = chatHistory.scrollHeight - chatHistory.clientHeight <= chatHistory.scrollTop + 50;
               chatHistory.innerHTML = this.responseText;
               if (wasAtBottom) scrollToBottom();
           }
       };
       xhr.send();
   }

   // Fetch messages every 2 seconds if a user is selected
   if (selectedUserId) {
       setInterval(fetchMessages, 2000);
       scrollToBottom();

       // AJAX for sending reply
       replyForm.onsubmit = function(e) {
           e.preventDefault();
           const formData = new FormData(this);
           formData.append('send_reply', 'Send');

           const xhr = new XMLHttpRequest();
           xhr.open('POST', 'admin_contacts.php', true);
           xhr.onload = function() {
               if (this.status === 200) {
                   replyInput.value = '';
                   fetchMessages();
               }
           };
           xhr.send(formData);
       };
   }
</script>

<script src="js/admin_script.js"></script>
</body>
</html>
