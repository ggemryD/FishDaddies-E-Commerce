<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koi Grooming Guide</title>

    <link rel="stylesheet" href="careguides/betta.css">
    <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <div class="care-guide-container">
        <center>
            <img src="groom/img/superior-champion-japan-koi-show.jpg" alt="Koi Grooming" class="care-guide-img">
        </center>

        <div class="care-guide-content">
            <h2>Koi Grooming & Nutrition Guide</h2>
            <p style="text-align: center; margin-bottom: 2rem;">Maintaining the majestic beauty of Koi requires a carefully managed nutritional program. Here's how to feed your Koi for health and color:</p>
            
            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-balance-scale"></i> Balanced Nutrition</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>Just like any other pet, koi require a balanced diet to stay healthy and vibrant. A good koi diet consists of a mix of proteins, carbohydrates, fats, vitamins, and minerals.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-cookie-bite"></i> Commercial Koi Pellets</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>High-quality commercial koi pellets are often recommended as the staple diet for koi. These pellets come in various formulations, including floating and sinking types, and are specifically designed to meet the nutritional needs of koi.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-list-ul"></i> Ingredients to Look For</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>When selecting koi pellets, it's important to look for products with high-quality ingredients. This includes fish meal, shrimp meal, spirulina, wheat germ, and other sources of protein, as well as vitamins and minerals.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-plus-circle"></i> Supplemental Food</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>In addition to pellets, koi can benefit from occasional treats and supplemental foods. These might include fresh fruits and vegetables like lettuce, peas, or watermelon (chopped into small pieces to prevent choking), as well as live or frozen foods like brine shrimp, bloodworms, or daphnia.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-exclamation-triangle"></i> Avoid Overfeeding</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>Overfeeding can lead to poor water quality and health issues for koi. It's important to feed koi sparingly, only what they can consume in a few minutes, and adjusting feeding amounts based on factors like water temperature and fish activity level.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-cloud-sun"></i> Seasonal Feeding</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>Koi have different nutritional needs depending on the season. In colder months, when their metabolism slows down, they require lower-protein foods that are easier to digest, while in warmer months, they may benefit from higher-protein foods to support growth and energy.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-layer-group"></i> Variety in Diet</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>Introducing variety into the koi diet helps ensure they receive a wide range of nutrients. Rotating between different types of pellets, supplementing with fresh or frozen foods, and occasionally offering treats keeps the koi interested and stimulated.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-eye"></i> Observing Feeding Behavior</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>Monitoring koi feeding behavior is essential for assessing their health and appetite. Observe how actively the fish feed, whether they show interest in food, and whether there are any changes in feeding behavior that could indicate health problems.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <p style="margin-top: 2rem; text-align: center; font-style: italic;">By providing healthy feeding practices and selecting nutritious foods, you can promote the overall well-being and majestic beauty of your koi.</p>
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