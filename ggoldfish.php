<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goldfish Grooming Guide</title>

    <link rel="stylesheet" href="careguides/betta.css">
    <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <div class="care-guide-container">
        <center>
            <img src="groom/img/gf groom.jpg" alt="Goldfish Grooming" class="care-guide-img">
        </center>

        <div class="care-guide-content">
            <h2>Goldfish Grooming & Nutrition Guide</h2>
            <p style="text-align: center; margin-bottom: 2rem;">A balanced diet is the foundation of a healthy, vibrant goldfish. Here's how to manage their nutrition for optimal growth and health:</p>
            
            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-layer-group"></i> Variety is Key</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>Goldfish, like humans, need a balanced diet. Offer them a variety of foods to ensure they get all the necessary nutrients. This can include pellets, flakes, frozen or live foods like bloodworms, brine shrimp, daphnia, and vegetables like peas or blanched zucchini.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-cookie-bite"></i> High-Quality Pellets or Flakes</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>Look for high-quality goldfish pellets or flakes that contain a good balance of proteins, fats, carbohydrates, vitamins, and minerals. Avoid overfeeding, as this can lead to health problems and water quality issues.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-leaf"></i> Fresh Vegetables</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>Goldfish can also benefit from fresh vegetables. Blanched peas with the skins removed are a popular option. You can also try blanched zucchini, cucumber, or spinach. These provide fiber and essential nutrients.</p>
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
                            <p>Goldfish have a tendency to overeat, which can lead to obesity and health problems. Feed them small amounts a few times a day, only giving them what they can consume in a couple of minutes.</p>
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
                            <p>Frozen or live foods like bloodworms, brine shrimp, and daphnia are excellent treats for goldfish. They provide variety and are closer to their natural diet. However, these should be fed in moderation and make sure they are from a trusted source to avoid introducing parasites or diseases into your aquarium.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-heartbeat"></i> Monitor Their Health</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>Keep an eye on your goldfish to ensure they are eating well and maintaining a healthy weight. Any sudden changes in appetite or behavior could be a sign of health issues.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-tint"></i> Water Quality</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>Remember that good nutrition goes hand in hand with good water quality. Ensure that your aquarium is properly maintained with regular water changes and filtration to keep your goldfish healthy.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <p style="margin-top: 2rem; text-align: center; font-style: italic;">By following these tips and providing your goldfish with a varied and nutritious diet, you can help them thrive and live a long, healthy life.</p>
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