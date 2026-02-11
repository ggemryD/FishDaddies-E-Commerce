<?php
include 'config.php';
session_start();

if (isset($_GET['user_id'])) {
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
    
    $view = isset($_GET['view']) ? $_GET['view'] : 'user';
    
    // Check if requester is authorized
    if ($view == 'admin' && !isset($_SESSION['admin_id'])) {
        die('Unauthorized');
    }
    if ($view == 'user' && (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != $user_id)) {
        // If it's a user view, but the requester is an admin, let them see it (for testing/support)
        if (!isset($_SESSION['admin_id'])) {
            die('Unauthorized');
        }
    }

    $select_chat = mysqli_query($conn, "SELECT * FROM `message` WHERE user_id = '$user_id' ORDER BY id ASC");
    $output = '';
    
    while ($chat = mysqli_fetch_assoc($select_chat)) {
        if ($view == 'admin') {
            // Admin View structure
            $output .= '<div class="chat-bubble user-bubble">' . $chat['message'];
            $output .= '<span class="bubble-info">Customer - <a href="admin_contacts.php?delete=' . $chat['id'] . '&user=' . $user_id . '" onclick="return confirm(\'Delete this message?\');" style="color:var(--red)">Delete</a></span></div>';
            
            if (!empty($chat['admin_reply'])) {
                $output .= '<div class="chat-bubble admin-bubble">' . $chat['admin_reply'] . '<span class="bubble-info">You (Admin)</span></div>';
            }
        } else {
            // User View structure (Bubbles)
            $output .= '<div class="chat-message user-message">
                <span class="message-content">' . $chat['message'] . '</span>
                <span class="message-info">You</span>
            </div>';
            
            if (!empty($chat['admin_reply'])) {
                $output .= '<div class="chat-message admin-message">
                    <span class="message-content">' . $chat['admin_reply'] . '</span>
                    <span class="message-info">Admin</span>
                </div>';
            }
        }
    }
    echo $output;
}
?>
