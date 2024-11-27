let userBox = document.querySelector('.header .header-2 .user-box');

document.querySelector('#user-btn').onclick = () =>{
   userBox.classList.toggle('active');
   navbar.classList.remove('active');
}

let navbar = document.querySelector('.header .header-2 .navbar');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   userBox.classList.remove('active');
}

window.onscroll = () =>{
   userBox.classList.remove('active');
   navbar.classList.remove('active');

   if(window.scrollY > 60){
      document.querySelector('.header .header-2').classList.add('active');
   }else{
      document.querySelector('.header .header-2').classList.remove('active');
   }
}

// ari kutob
// JavaScript to handle modal functionality
document.addEventListener("DOMContentLoaded", function () {
   const modal = document.getElementById("review-modal");
   const closeBtn = document.querySelector(".close-btn");

   // Open the modal when the review icon is clicked
   const reviewIcons = document.querySelectorAll(".review-icon");
   reviewIcons.forEach((icon) => {
       icon.addEventListener("click", function () {
           const productId = this.getAttribute("data-product-id");
           document.getElementById("product_id").value = productId;
           modal.style.display = "block";
       });
   });

   // Close the modal when the close button is clicked
   closeBtn.addEventListener("click", function () {
       modal.style.display = "none";
   });

   // Close the modal when clicking outside the modal content
   window.addEventListener("click", function (event) {
       if (event.target === modal) {
           modal.style.display = "none";
       }
   });
});





// Show modal Para sa rating ni 6/5/2024
document.querySelectorAll('.review-icon').forEach(icon => {
    icon.addEventListener('click', function () {
        document.getElementById('product_id').value = this.dataset.productId;
        document.getElementById('review-modal').style.display = 'block';
    });
});

// Close modal
document.querySelector('.close-btn').addEventListener('click', function () {
    document.getElementById('review-modal').style.display = 'none';
});

// Close modal when clicking outside the content Para sa rating ni 6/5/2024
window.onclick = function(event) {
    if (event.target == document.getElementById('review-modal')) {
        document.getElementById('review-modal').style.display = 'none';
    }
};












// Hide the success message after 5 seconds (5000 milliseconds)
window.onload = function () {
   setTimeout(function () {
       var successMessage = document.getElementById('success-message');
       if (successMessage) {
           successMessage.style.display = 'none';
       }
   }, 5000); // Adjust the time delay as needed
};

// Function to close the message when the close button is clicked
function closeMessage() {
   var message = document.querySelector('.success-message, .error-message');
   if (message) {
       message.style.display = 'none';
   }
}
