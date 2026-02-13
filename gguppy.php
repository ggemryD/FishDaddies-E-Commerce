<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guppy Grooming Guide</title>

    <link rel="stylesheet" href="careguides/betta.css">
    <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <div class="care-guide-container">
        <center>
            <img src="groom/img/guppy grooming.jpg" alt="Guppy Grooming" class="care-guide-img">
        </center>

        <div class="care-guide-content">
            <h2>Guppy Grooming & Nutrition Guide</h2>
            <p style="text-align: center; margin-bottom: 2rem;">Vibrant colors and active behavior in guppies are direct results of excellent nutrition. Here's how to feed your guppies for success:</p>
            
            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-cookie-bite"></i> High-Quality Guppy Pellets</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>High-quality commercial guppy pellets should make up the main part of your guppy fish's diet. Look for pellets specifically formulated for guppies, as they contain the right balance of protein, vitamins, and minerals. Pellets should be small enough for guppies to consume easily.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-bug"></i> Live Foods</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>Guppy fish enjoy a variety of live foods, which provide essential nutrients and help mimic their natural diet. Offer live foods such as brine shrimp, daphnia, mosquito larvae, and microworms as occasional treats. Live foods can enhance their coloration and stimulate natural feeding behaviors.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-snowflake"></i> Frozen Foods</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>Frozen foods offer convenience and can provide nutritional benefits similar to live foods. Look for frozen options such as brine shrimp, bloodworms, daphnia, and mysis shrimp. Thaw frozen foods before feeding to your guppy fish.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-wind"></i> Freeze-Dried Foods</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>Freeze-dried foods are another convenient option and can be stored for longer periods. Look for freeze-dried options such as bloodworms, daphnia, brine shrimp, and tubifex worms. Rehydrate freeze-dried foods before feeding to your guppies.</p>
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
                            <p>While guppies are primarily carnivorous, they can benefit from occasional vegetable matter in their diet. Offer blanched or finely chopped vegetables such as peas, zucchini, and cucumber as treats. These provide essential nutrients and can aid digestion.</p>
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
                        <span><i class="fas fa-mortar-pestle"></i> Homemade Guppy Treats</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>You can create homemade guppy treats using gelatin and a mixture of blended vegetables, fruits, and protein sources like fish or shrimp. These treats can be customized to meet the specific dietary needs of your guppy fish.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <p style="margin-top: 2rem; text-align: center; font-style: italic;">When feeding your guppy fish, offer a varied diet to ensure they receive all the essential nutrients they need for optimal health and well-being. Monitor their feeding behavior and adjust the amount of food accordingly to prevent overfeeding and maintain water quality in your tank.</p>
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