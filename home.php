<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>HOME</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <!-- <link rel="stylesheet" href="css/style.css"> -->
   <link rel="stylesheet" href="css/home.css">
   <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">

   <style>
    .showcase{
      /* background-image: url(image/pexels-fox-213399.jpg); */
      background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.40)),
                        url('image/pexels-fox-213399.jpg') no-repeat center center;
      width: 100%;
      height: 580px;
      background-size: cover;
    }
   </style>

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="container">
    <!-- <nav class="main-nav">
      <img src="image/dadiko.png" alt="Logo Diri" class="logo">
      <ul class="main-menu">
        <li class="dropdown">
          <a href="#" class="dropbtn">Aquarium Fish</a>
          <div class="dropdown-content">
              <a href="guppy.html">Guppy</a>
              <a href="betta.html">Betta</a>
              <a href="#">Koi</a>
              <a href="goldfish.html">Goldfish</a>
          </div>
        </li>
        <li><a href="#">Care Guides</a></li>
        <li><a href="#">Grooming Guides</a></li>
        <li><a href="#">About</a></li>
      </ul>

      <ul class="right-menu">
        <li>
          <a href="#" class="btnLogin-popup">
            <i><img src="image/user-login.png" alt=""></i>
          </a>
        </li>
        <li>
          <a href="#">
            <i>
              <img src="image/shopping-cart.png" alt="">
            </i>
          </a>
        </li>
      </ul>
    </nav> -->

    <!-- login and register -->
    <div class="wrapper">
      <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
      
      <div class="form-box login">
          <h2>Login</h2>
          <form action="#">
              <div class="input-box">
                  <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                  <input type="email" required>
                  <label for="">Email</label>
              </div>
              <div class="input-box">
                  <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                  <input type="password" required> 
                  <label for="">Password</label>
              </div>
              <div class="remember-forgot">
                  <label for=""><input type="checkbox">Remember me</label>
                  <a href="#">Forgot Password?</a>
              </div>
              <button type="submit" class="btn">Login</button>
              <div class="login-register">
                  <p>Don't have an account?<a href="#" class="register-link">Register</a></p>
              </div>
          </form>
      </div>

      <div class="form-box register">
          <h2>Registration</h2>
          <form action="#">
              <div class="input-box">
                  <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                  <input type="text" required>
                  <label for="">Username</label>
              </div>
              <div class="input-box">
                  <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                  <input type="email" required>
                  <label for="">Email</label>
              </div>
              <div class="input-box">
                  <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                  <input type="password" required> 
                  <label for="">Password</label>
              </div>
              <div class="remember-forgot">
                  <label for=""><input type="checkbox">I agree to the terms and conditions</label>
              </div>
              <button type="submit" class="btn">Register</button>
              <div class="login-register">
                  <p>Already have an account?<a href="#" class="login-link">Login</a></p>
              </div>
          </form>
      </div>
    </div>

    <!-- Showcase -->
    <header class="showcase">
    <h2>FISH DADDIES</h2>
    <p>
        Dive into a world of vibrant aquatic life! <br> Find your perfect finned friend and create an enchanting underwater world in your home.
    </p>
      <a href="shop.php" class="shopnow-btn">
        Shop Now <i class="fas fa-chevron-right"></i>
      </a>
    </header>

    <section class="second">
      <h1>Video of the Week</h1>
      <video controls>
        <source src="video/v1.mp4" type="video/mp4">
      </video>
    </section>
    
    <section class="first">
      <h1>Popular collections</h1>
      <div class="firstP">
        <img src="guppy/abtguppy.jpg" alt="">
        <img src="guppy/akguppy.jpg" alt="">
        <img src="guppy/aycguppy.jpg" alt="">
        <img src="guppy/pdertguppy.png" alt="">
      </div>
      <div class="secondP">
        <img src="guppy/bgguppy.jpg" alt="">
        <img src="guppy/mbssguppy.jpg" alt="">
        <img src="guppy/rdssguppy.jpg" alt="">
        <img src="guppy/rktguppy.jpg" alt="">
      </div>
    </section>

    <!-- Links -->
    <section class="links">
        <div class="links-inner">
          <ul>
            <li><h3>FISH DADDIES</h3></li>
            <img src="image/dadiko.png" alt="">

                <p>Carmelo, Tuburan, Cebu</p>
                <p>09703851090</p>
                <p>fishdaddies@gmail.com</p>
          </ul>
          <ul>
            <li><h3>Support</h3></li>
            <li><a href="#">Contact us</a></li>
            <li><a href="#">Privacy</a></li>
          </ul>
          <ul>
            <li><h3>Information</h3></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms and Condition</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">FAQ</a></li>
          </ul>
          <ul>
            <li><h3>About</h3></li>
            <li><a href="#">Return and Refund Policy</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Our Goals</a></li>
          </ul>
        </div>
      </section>

      <!-- Footer -->
      <footer class="footer">
        <div class="footer-inner">
          <div><i class="fas fa-globe fa-2x"></i> English (United States)</div>
          <ul>
          <li><a href="#">Privacy & cookies</a></li>
          <li><a href="#">Terms of use</a></li>
          <li><a href="#">&copy; Fish Daddies 2024</a></li>
          </ul>
        </div>
      </footer>
  </div>

 <!-- <?php include 'footer.php'; ?> -->

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>