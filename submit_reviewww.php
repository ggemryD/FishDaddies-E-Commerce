<?php
// submit_review.php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
    exit();
}

if (isset($_POST['product_id']) && isset($_POST['review_text']) && isset($_POST['return_url'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = intval($_POST['product_id']);
    $review_text = mysqli_real_escape_string($conn, $_POST['review_text']); 
    $return_url = mysqli_real_escape_string($conn, $_POST['return_url']);

    // Insert the review into the database
    $insert_review = mysqli_query(
        $conn,
        "INSERT INTO `reviews` (user_id, product_id, review_text) VALUES ('$user_id', '$product_id', '$review_text')"
    );

    if ($insert_review) {
        // Redirect back to the original page with a success message
        header("Location: $return_url?review_success=1");
        exit();
    } else {
        // Redirect back to the original page with an error message
        header("Location: $return_url?review_error=1");
        exit();
    }
} else {
    // Missing required data, redirect to a default page
    header("Location: default_page.php?review_error=1"); 
    exit();
}

?>