<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goldfish Care Guide</title>

    <link rel="stylesheet" href="careguides/betta.css">
    <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <div class="care-guide-container">
        <center>
            <img src="assets/img/true goldfish.jpg" alt="Goldfish Care" class="care-guide-img">
        </center>

        <div class="care-guide-content">
            <h2>Goldfish Care Guide</h2>
            <p style="text-align: center; margin-bottom: 2rem;">Caring for a goldfish involves providing the right environment, nutrition, and attention. Here are the key steps to keep them healthy:</p>
            
            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-fish"></i> Tank Setup</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <ul>
                                <li>Ensure you have an appropriate-sized tank for your goldfish. They need space to swim and grow. A general rule is 20 gallons for the first goldfish and an additional 10 gallons for each additional fish.</li>
                                <li>Make sure the tank is properly cycled before adding fish to it.</li>
                            </ul>
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
                            <ul>
                                <li>Goldfish are sensitive to poor water quality. Regularly test the water for pH, ammonia, nitrite, and nitrate levels.</li>
                                <li>Keep the water clean by doing partial water changes (about 20-30%) every 1-2 weeks.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-filter"></i> Filtration</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <ul>
                                <li>Invest in a good filtration system suitable for your tank size. A filter helps to remove waste and maintain water quality.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-thermometer-half"></i> Temperature & Lighting</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <ul>
                                <li>Goldfish are cold-water fish and don't need a heater. However, they should be kept in a room with stable temperatures between 65-75°F (18-24°C).</li>
                                <li>Provide moderate lighting, but avoid direct sunlight as it can promote algae growth.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-utensils"></i> Feeding</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <ul>
                                <li>Feed your goldfish a balanced diet of high-quality flakes or pellets specifically formulated for goldfish.</li>
                                <li>Offer small amounts of food once or twice a day, being careful not to overfeed as it can lead to health issues and water pollution.</li>
                                <li>Supplement their diet with occasional treats like frozen or live foods (bloodworms, brine shrimp) or fresh vegetables like peas and zucchini.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-users"></i> Tank Mates</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <ul>
                                <li>Choose tank mates carefully. Avoid fish that are too small and may be viewed as food, as well as aggressive species that could stress your goldfish.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-medkit"></i> Monitoring Health</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <ul>
                                <li>Keep an eye on your goldfish for any signs of illness or distress such as changes in behavior, appetite, or appearance.</li>
                                <li>Quarantine new fish before introducing them to the main tank to prevent the spread of diseases.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-broom"></i> Regular Maintenance</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <ul>
                                <li>Clean the tank regularly, including removing uneaten food, debris, and algae.</li>
                                <li>Check equipment like filters and heaters to ensure they are working properly.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <p style="margin-top: 2rem; text-align: center; font-style: italic;">By following these guidelines, you can help ensure your goldfish live a healthy and happy life in your care.</p>
        </div>

        <center>
            <a href="careguides.php" class="back-button">Back to Care Guides</a>
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