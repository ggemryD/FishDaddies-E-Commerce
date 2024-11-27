<?php
// submit_review.php
include 'config.php'; // Include your database configuration

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
    exit();
}

// if (isset($_POST['submit_review'])) {
//     $product_id = intval($_POST['product_id']);
//     $review_text = mysqli_real_escape_string($conn, $_POST['review_text']); // Sanitize input
//     $rating = intval($_POST['rating']); // Ensure rating is an integer

//     $insert_review = mysqli_query(
//         $conn,
//         "INSERT INTO reviews (product_id, user_id, review_text, rating) VALUES ('$product_id', '$user_id', '$review_text', '$rating')"
//     );

//     if ($insert_review) {
//         // Redirect to the specified page with a success message
//         header("Location: http://localhost/FishDaddies/shop.php?review_success=1");
//         exit(); // Ensure redirection
//     } else {
//         // Redirect to the specified page with an error message
//         header("Location: http://localhost/FishDaddies/shop.php?review_error=1");
//         exit(); // Ensure redirection
//     }
// } else {
//     // Missing required data, redirect with an error
//     header("Location: http://localhost/FishDaddies/shop.php?review_error=1");
//     exit(); // Ensure redirection
// }


if (isset($_POST['submit_review'])) {
    $product_id = intval($_POST['product_id']);
    $review_text = mysqli_real_escape_string($conn, $_POST['review_text']); // Sanitize input
    $rating = intval($_POST['rating']); // Ensure rating is an integer
    $category = mysqli_real_escape_string($conn, $_POST['category']); // Get the category
    $current_page = mysqli_real_escape_string($conn, $_POST['current_page']); // Get the current page

    $insert_review = mysqli_query(
        $conn,
        "INSERT INTO reviews (product_id, user_id, review_text, rating) VALUES ('$product_id', '$user_id', '$review_text', '$rating')"
    );

    if ($insert_review) {
        // Redirect to the specific current page with a success message
        header("Location: {$current_page}?review_success=1");
        exit(); // Ensure redirection
    } else {
        // Redirect to the specific current page with an error message
        header("Location: {$current_page}?review_error=1");
        exit(); // Ensure redirection
    }
} else {
    // Missing required data, redirect with an error
    header("Location: shop.php?review_error=1");
    exit(); // Ensure redirection
}

?>
