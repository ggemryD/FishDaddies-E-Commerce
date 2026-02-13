<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Betta Grooming Guide</title>

    <link rel="stylesheet" href="careguides/betta.css">
    <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <div class="care-guide-container">
        <center>
            <img src="groom/img/betta groom.jpg" alt="Betta Grooming" class="care-guide-img">
        </center>

        <div class="care-guide-content">
            <h2>Betta Grooming & Nutrition Guide</h2>
            <p style="text-align: center; margin-bottom: 2rem;">Proper nutrition and care are essential for maintaining your Betta's vibrant colors and long fins. Here's a guide to grooming your Betta through diet:</p>
            
            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-cookie-bite"></i> High-Quality Betta Pellets</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>High-quality betta pellets should form the staple of your betta fish's diet. Look for pellets specifically formulated for bettas, as they contain the right balance of protein, vitamins, and minerals. Pellets should be small enough for bettas to consume easily.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-bug"></i> Frozen or Live Foods</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>Betta fish enjoy a variety of live and frozen foods, which provide essential nutrients and help mimic their natural diet. Offer foods such as bloodworms, brine shrimp, daphnia, and mosquito larvae as occasional treats. Ensure live foods are from a reputable source to avoid introducing parasites or diseases to your tank.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-snowflake"></i> Freeze-Dried Foods</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>Freeze-dried foods offer convenience and can be stored for longer periods. Look for freeze-dried options such as bloodworms, daphnia, brine shrimp, and tubifex worms. Rehydrate freeze-dried foods before feeding to your betta fish.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-carrot"></i> Vegetables</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>While betta fish are primarily carnivorous, they can benefit from occasional vegetable matter in their diet. Offer blanched or finely chopped vegetables such as peas, zucchini, and cucumber as treats. These provide essential nutrients and can help with digestion.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-apple-alt"></i> Fruits</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>Offer small pieces of fruits such as oranges, grapes (seedless), and watermelon as occasional treats. Fruits should be offered sparingly due to their sugar content. Remove any uneaten fruit from the tank to prevent water quality issues.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-flask"></i> Live Food Cultures</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>Consider cultivating live food cultures at home to provide a constant supply of nutritious live foods for your betta fish. Cultures such as microworms, vinegar eels, and grindal worms can be relatively easy to maintain and provide a diverse diet for your betta.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-mortar-pestle"></i> Homemade Betta Treats</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>You can create homemade betta treats using gelatin and a mixture of blended vegetables, fruits, and protein sources like fish or shrimp. These treats can be customized to meet the specific dietary needs of your betta fish.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <p style="margin-top: 2rem; text-align: center; font-style: italic;">When feeding your betta fish, offer a varied diet to ensure they receive all the essential nutrients they need for optimal health and well-being. Monitor their feeding behavior and adjust the amount of food accordingly to prevent overfeeding and maintain water quality in your tank.</p>
        </div>

        <center>
            <a href="groomingguides.php" class="back-button">Back to Grooming Guides</a>
        </center>
    </div>

    <script>
        document.querySelectorAll('.accordion-header').forEach(button => {
            button.addEventListener('click', () => {
                const accordionContent = button.nextElementSibling;

                button.classList.toggle('active');

                if (button.classList.contains('active')) {
                    accordionContent.style.maxHeight = accordionContent.scrollHeight + "px";
                } else {
                    accordionContent.style.maxHeight = 0;
                }

                // Close other open accordion items
                document.querySelectorAll('.accordion-header').forEach(otherButton => {
                    if (otherButton !== button && otherButton.classList.contains('active')) {
                        otherButton.classList.remove('active');
                        otherButton.nextElementSibling.style.maxHeight = 0;
                    }
                });
            });
        });
    </script>

</body>
</html>