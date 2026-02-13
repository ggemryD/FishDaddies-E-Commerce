<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koi Care Guide</title>

    <link rel="stylesheet" href="careguides/betta.css">
    <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <div class="care-guide-container">
        <center>
            <img src="assets/img/the koi.jpg" alt="Koi Care" class="care-guide-img">
        </center>

        <div class="care-guide-content">
            <h2>Koi Fish Care Guide</h2>
            <p style="text-align: center; margin-bottom: 2rem;">Caring for koi fish is similar to caring for goldfish but with a few differences due to their larger size and specific needs. Here are the steps to care for koi:</p>
            
            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-water"></i> Pond Setup</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <ul>
                                <li>Koi fish thrive in ponds rather than tanks. Ensure your pond is large enough (at least 1000 gallons).</li>
                                <li>The pond should have a depth of at least 3 feet to provide adequate swimming space and protection from predators.</li>
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
                                <li>Maintaining good water quality is crucial for koi health. Use a quality filtration system designed for ponds.</li>
                                <li>Regularly test the water for pH, ammonia, nitrite, and nitrate levels, and perform water changes as needed.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-wind"></i> Aeration & Circulation</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <ul>
                                <li>Ensure proper aeration and circulation to oxygenate the water and prevent stagnant areas.</li>
                                <li>This can be achieved with air pumps, water pumps, and fountains.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-thermometer-half"></i> Temperature & Shelter</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <ul>
                                <li>Koi prefer water temperatures between 59-77°F (15-25°C).</li>
                                <li>Provide shade and shelter in the pond to protect them from extreme temperatures and predators.</li>
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
                                <li>Feed a high-quality diet formulated specifically for koi.</li>
                                <li>Offer a variety of foods including pellets, flakes, and occasional treats like fruits and vegetables.</li>
                                <li>Feed them 2-3 times a day, only what they can consume in a few minutes.</li>
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
                                <li>Regularly inspect your koi for signs of illness or distress such as changes in behavior, appetite, or appearance.</li>
                                <li>Quarantine new fish before introducing them to the pond to prevent the spread of diseases.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-shield-alt"></i> Protection from Predators</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <ul>
                                <li>Install a pond cover or netting to prevent birds and other predators from preying on your koi.</li>
                                <li>Provide hiding places such as plants, rocks, and caves for koi to seek refuge.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-leaf"></i> Plant Life</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <ul>
                                <li>Incorporate aquatic plants into your pond to provide natural filtration, oxygenation, and habitat.</li>
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
                                <li>Perform regular pond maintenance tasks such as cleaning filters, removing debris, and trimming plants.</li>
                                <li>Check equipment to ensure everything is functioning properly.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <p style="margin-top: 2rem; text-align: center; font-style: italic;">By following these guidelines, you can create a healthy and thriving environment for your koi fish to thrive in.</p>
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