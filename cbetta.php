<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Betta Fish Care Guide</title>

    <link rel="stylesheet" href="careguides/betta.css">
    <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <div class="care-guide-container">
        <center>
            <img src="assets/img/the betta.jpg" alt="Betta Fish Care" class="care-guide-img">
        </center>

        <div class="care-guide-content">
            <h2>Betta Fish Care Guide</h2>
            <p style="text-align: center; margin-bottom: 2rem;">Caring for betta fish, also known as Siamese fighting fish, involves creating a suitable environment, providing proper nutrition, and ensuring their overall well-being.</p>
            
            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-fish"></i> Tank Setup</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <ul>
                                <li>Provide a tank with a minimum size of 5 gallons for a single betta fish. Larger tanks offer more stable water parameters and room for enrichment.</li>
                                <li>Bettas are labyrinth fish, meaning they can breathe air from the surface, but they still need access to clean, filtered water. Ensure there's minimal water movement to prevent stress.</li>
                                <li>Decorate the tank with live or silk plants, smooth-edged ornaments, and hiding spots such as caves or driftwood.</li>
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
                                <li>Maintain water temperature between 78°F to 80°F (25°C to 27°C). Use a heater to regulate temperature, especially in cooler climates.</li>
                                <li>Bettas prefer slightly acidic to neutral water with a pH range of 6.5 to 7.5. Regularly test water parameters and perform partial water changes (20-25% weekly) to maintain water quality.</li>
                                <li>Use a gentle filter with low flow or baffled flow to prevent betta fins from being damaged.</li>
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
                                <li>Feed a high-quality betta pellet or flake food as the main diet. Look for foods with protein as the first ingredient.</li>
                                <li>Offer occasional treats such as freeze-dried or frozen bloodworms, brine shrimp, or daphnia.</li>
                                <li>Feed small portions once or twice a day, only what they can consume in a couple of minutes to prevent overfeeding.</li>
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
                                <li>Bettas are often best kept alone due to their aggressive nature, especially males. However, some bettas may tolerate certain tank mates like small, peaceful fish or invertebrates in a larger tank with plenty of hiding spots.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-medkit"></i> Healthcare</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <ul>
                                <li>Keep an eye on your betta for signs of illness, including changes in behavior, appetite, or appearance.</li>
                                <li>Quarantine new fish before introducing them to the main tank to prevent the spread of diseases.</li>
                                <li>Treat any illnesses promptly and consult with a veterinarian experienced in fish care if necessary.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-eye"></i> Observation & Interaction</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <ul>
                                <li>Spend time observing your betta to familiarize yourself with its normal behavior and appearance.</li>
                                <li>Avoid tapping on the glass or making sudden movements that could stress the fish.</li>
                                <li>Betta fish can recognize their owners and may enjoy interaction like gentle hand-feeding or playing with toys.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <p style="margin-top: 2rem; text-align: center; font-style: italic;">By following these guidelines, you can ensure that your betta fish thrive and bring beauty to your aquarium.</p>
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