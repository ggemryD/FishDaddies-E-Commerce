<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/home.css">
   <link rel="stylesheet" href="css/about.css">
   <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="container">
   <div class="heading">
      <h3>about us</h3>
      <!-- <p> <a href="home.php">home</a> / about </p> -->
   </div>

   <section class="about">
      <div class="about-inner">
         <center><img src="image/dadiko.png" alt="" class="logoA"></center>

         <center><h2>Welcome to Fish Daddies!</h2></center>
         <p>
         Fish Daddies is your trusted online store for a wide variety of beautiful pet fish, including goldfish, koi, guppies, and bettas. Based in Carmelo, Tuburan, Cebu, our journey began in 2020 with a passion for aquatic life and a mission to bring high-quality, healthy fish to enthusiasts and hobbyists around the world.
         </p>
         <br>
         <p>
         Our goal is to provide our customers with the finest selection of pet fish, along with all the necessary information and supplies to ensure their aquatic friends thrive in their new homes. We are dedicated to promoting responsible pet ownership and the well-being of all our fish.
         </p>
         <center><h2>Our Mission</h2></center>
         <p>
         To deliver healthy, vibrant pet fish to your doorstep while promoting responsible fish keeping and offering expert advice and quality supplies.
         </p>
         <center><h2>Our Values</h2></center>
         <ul>
            <li><strong>Quality:</strong> We ensure that every fish we sell is healthy, well-cared for, and meets the highest standards.</li>
            <li><strong>Education:</strong> We provide our customers with the knowledge they need to care for their aquatic pets properly.</li>
            <li><strong>Sustainability:</strong> We support sustainable practices in fish breeding and habitat conservation.</li>
            <li><strong>Community:</strong> We are committed to fostering a community of fish enthusiasts and supporting local breeders.</li>
            <li><strong>Customer Service:</strong> We strive to provide exceptional service and support to all our customers.</li>
         </ul>
         <center><h2>Our Story</h2></center>
         <p>
            Fish Daddies was founded by Gemry,Samy,Jerome, and Rodney,  four brothers with a lifelong passion for aquatics. Growing up surrounded by the vibrant marine life of Cebu, they developed a deep love for fish keeping and a desire to share this joy with others. Starting with just a small collection, they have expanded Fish Daddies into a comprehensive online store offering a wide variety of pet fish and supplies.
         </p>
         <p>
            Today, Fish Daddies is known for its commitment to quality, customer education, and sustainability. Whether you're a beginner or an experienced aquarist, we have everything you need to create a thriving aquatic environment.
         </p>
      </div>
   </section>

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

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>