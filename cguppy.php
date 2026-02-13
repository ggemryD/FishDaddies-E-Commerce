<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guppy Care Guide</title>

    <link rel="stylesheet" href="careguides/betta.css">
    <link rel="shortcut icon" href="image/dadiko.png" type="image/x-icon">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <div class="care-guide-container">
        <center>
            <img src="assets/img/guppy-5.jpg" alt="Guppy Care" class="care-guide-img">
        </center>

        <div class="care-guide-content">
            <h2>Guppy Care Guide</h2>
            <p style="text-align: center; margin-bottom: 2rem;">Caring for guppies involves providing them with a suitable environment, proper nutrition, and attention to their health. Here's a basic guide on how to care for them:</p>
            
            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-fish"></i> Aquarium Setup</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <ul>
                                <li>Guppies are small fish and can thrive in relatively small tanks, but they still need space to swim. A 10-gallon tank or larger is suitable for a small group of guppies.</li>
                                <li>Provide hiding places such as plants, rocks, or caves to offer them security and shelter.</li>
                                <li>Ensure the tank is properly cycled before introducing guppies to maintain water quality.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-tint"></i> Water Conditions</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <ul>
                                <li>Guppies prefer slightly alkaline water with a pH between 6.8 and 7.8.</li>
                                <li>Maintain a water temperature between 72°F and 82°F (22°C to 28°C).</li>
                                <li>Regularly test the water for ammonia, nitrite, and nitrate levels, and perform partial water changes to keep these parameters in check.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-utensils"></i> Diet</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <ul>
                                <li>Offer a varied diet to ensure they receive all the necessary nutrients. Commercial guppy flakes or pellets are a good base.</li>
                                <li>Supplement their diet with live or frozen foods like brine shrimp, bloodworms, or daphnia to provide additional protein.</li>
                                <li>Feed them small amounts multiple times a day, only giving them what they can consume in a few minutes to prevent overfeeding and water pollution.</li>
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
                                <li>Guppies are generally peaceful fish and can coexist with other peaceful community fish such as tetras, mollies, and platies.</li>
                                <li>Avoid aggressive or large fish that may harass or prey on guppies.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-heart"></i> Breeding</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <ul>
                                <li>Guppies are prolific breeders, so be prepared for population growth if you have males and females together.</li>
                                <li>If you don't want them to breed, either keep only one sex or separate males and females.</li>
                                <li>Provide dense plant cover for fry to hide from adult guppies, as they may eat their own young.</li>
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
                                <li>Keep an eye out for signs of illness such as loss of appetite, lethargy, abnormal swimming behavior, or visible spots on the body.</li>
                                <li>Quarantine new fish before introducing them to the main tank to prevent the spread of diseases.</li>
                                <li>If you suspect a fish is sick, isolate it in a quarantine tank and treat with appropriate medications.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-broom"></i> Maintenance</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <ul>
                                <li>Perform regular water changes (around 25% of the tank volume weekly) to remove waste and maintain water quality.</li>
                                <li>Clean the tank, filter, and decorations periodically to prevent the buildup of debris and algae.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <p style="margin-top: 2rem; text-align: center; font-style: italic;">By following these guidelines and providing proper care, you can enjoy healthy and vibrant guppies in your aquarium.</p>
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