<!-- <?php

$conn = mysqli_connect('localhost','root','','shop_db') or die('connection failed');

?> -->


<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Predefined admin credentials
if (!defined('ADMIN_EMAIL')) {
    define('ADMIN_EMAIL', 'admin@gmail.com');
}

if (!defined('ADMIN_PASSWORD')) {
    define('ADMIN_PASSWORD', md5('admin'));
}
?>